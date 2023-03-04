<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Models\ContactSupport;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\PhoneVerification;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\CentralLogics\Helpers;
use Brian2694\Toastr\Facades\Toastr;

use App\CentralLogics\SMS_module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor', ['except' => 'logout']);
    }

    public function login()
    {
        $custome_recaptcha = new CaptchaBuilder;
        $custome_recaptcha->build();
        // Session::put('six_captcha', $custome_recaptcha->getPhrase());
        return view('vendor-views.auth.login', compact('custome_recaptcha'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            // 'password' => 'required|min:6'
        ]);

        // $recaptcha = Helpers::get_business_settings('recaptcha');
        // if (isset($recaptcha) && $recaptcha['status'] == 1) {
        //     $request->validate([
        //         'g-recaptcha-response' => [
        //             function ($attribute, $value, $fail) {
        //                 $secret_key = Helpers::get_business_settings('recaptcha')['secret_key'];
        //                 $response = $value;
        //                 $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;
        //                 $response = \file_get_contents($url);
        //                 $response = json_decode($response);
        //                 if (!$response->success) {
        //                     $fail(trans('messages.ReCAPTCHA Failed'));
        //                 }
        //             },
        //         ],
        //     ]);
        // } else if(session('six_captcha') != $request->custome_recaptcha)
        // {
        //     Toastr::error(trans('messages.ReCAPTCHA Failed'));
        //     return back();
        // }

        $vendor = Vendor::where('phone', $request->phone)->first();
        // if($vendor)
        // {
        //     if($vendor->restaurants[0]->status == 0)
        //     {
        //         return redirect()->back()->withInput($request->only('email', 'remember'))
        //     ->withErrors([trans('messages.inactive_vendor_warning')]);
        //     }
        // }
        if (auth('vendor')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember)) {
            return redirect()->route('vendor.dashboard');
        }

        return redirect()->back()->withInput($request->only('phone', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        auth()->guard('vendor')->logout();
        return redirect()->route('vendor.auth.login');
    }

    public function signup()
    {
        $custome_recaptcha = new CaptchaBuilder;
        $custome_recaptcha->build();
        // Session::put('six_captcha', $custome_recaptcha->getPhrase());
        return view('vendor-views.auth.signup', compact('custome_recaptcha'));
    }
    
    public function registerAndVerify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:8|max:14',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $phone = $request->country_code .''.$request->phone;
        // dd($phone);
        $user = PhoneVerification::where('phone', $phone)->first();


        if (!empty($user)) {
            $vendor = Vendor::where('phone', $phone)->first();
            if(!empty($vendor))
            {
                return redirect()->back()->withInput($request->only('phone'))
            ->withErrors(['Number Already Registered.']);
            }
            session(['phone_num' => $phone]);
            return view('vendor-views.auth.verify');

            }
        else {
            $otp = rand(1000, 9999);
            // $response = SMS_module::send($request->phone, $otp);
            // // dd($response);
            // if ($response != 'success') {
            //     $errors = [];
            //     array_push($errors, ['code' => 'otp', 'message' => translate('messages.failed_to_send_sms'), 'error' => $response]);
            //     return response()->json([
            //         'errors' => $errors
            //     ], 405);
            // }
            // Session()->put('phone_num', $request->phone);
            session(['phone_num' => $phone]);
            $check = DB::insert("INSERT INTO phone_verifications(phone, token) values('" . $phone . "', $otp) ");


            if ($check) {
                return view('vendor-views.auth.verify');

            } else {
                return response()->json([
                    "code" => 0,
                    'message' => "Error"
                ], 200);
            }
        }
    }

    public function verify_phone(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'phone' => 'required|min:11|max:14',
            'd1' => 'required',
            'd2' => 'required',
            'd3' => 'required',
            'd4' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $otp = $request->d1 .''.  $request->d2 .''.  $request->d3 .''. $request->d4;
        $phone_num = session('phone_num');
        // dd($otp);
        $otp_verify = DB::select("SELECT * from phone_verifications where phone = '" . $phone_num . "' AND token = '" . $otp . "' ");
        // $user = PhoneVerification::where('phone', $request->phone_num )->get();
        // dd($user);


        if (!empty($otp_verify)) {

            return view('vendor-views.auth.password');

            $update = DB::update("UPDATE phone_verifications SET verify = '1' where id = '" . $user[0]->id . "' ");

            if ($update) {
                // DB::delete("Delete from phone_verifications where phone = '" . $request->phone . "' AND token = '" . $request->token . "' ");
            } else {
                return response()->json([
                    "code" => 0,
                    'message' => "Phone number and OTP not matched",
                    'status' => false
                ], 400);
            }
        }
        // return response()->json([
        //     "code" => 0,
        //     'message' => "number not found",
        //     'status' => false
        // ], 400);
        return redirect()->route('vendor.auth.verify')->withErrors(['OTP not matched']);
    }

    public function number_verify()
    {     
        return view('vendor-views.auth.signup', compact('custome_recaptcha'));
    }
    public function verify()
    {
        $custome_recaptcha = new CaptchaBuilder;
        $custome_recaptcha->build();
        // Session::put('six_captcha', $custome_recaptcha->getPhrase());
        return view('vendor-views.auth.verify', compact('custome_recaptcha'));
    }
    public function password()
    {
        $custome_recaptcha = new CaptchaBuilder;
        $custome_recaptcha->build();
        // Session::put('six_captcha', $custome_recaptcha->getPhrase());
        return view('vendor-views.auth.password', compact('custome_recaptcha'));
        
    }

    public function registerVendor(Request $request)
    {
        $vendor = new Vendor();
        $vendor->phone = session('phone_num');
        $vendor->password = Hash::make($request->password);
        // $vendor->password = bcrypt($request->password);
        $vendor->status = 1;
        $vendor->save();

        $custome_recaptcha = new CaptchaBuilder;
        $custome_recaptcha->build();
        // Session::put('six_captcha', $custome_recaptcha->getPhrase());
        return view('vendor-views.auth.login', compact('custome_recaptcha'));
    }

    public function contact_support(Request $request){

        // dd($request->all());
        $input = $request->except('_token');
        $data = new ContactSupport();
        
        if($data->create($input))
        {
            Toastr::success("Form Submitted Successfully");
            return back();
        }
        else{
            Toastr::error("Unable to submit");
            return back();
        }

        
    }
   
}
