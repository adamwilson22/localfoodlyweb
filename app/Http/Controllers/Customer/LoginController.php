<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\{Customer, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Mail, Session};

class LoginController extends Controller
{
    public function index()
    {
        // dd('index');
        return view('user-views.login.index');
    }

    public function create()
    {
        // dd('index');
    
        return view('user-views.login.create');
    }

    public function signup(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $customer = User::create($input);
        if (!empty($customer)) {
            $user = user::where('email', $request->email)->first();
            $otp = rand(12,9912);
            $user->otp = $otp;
            $user->save();
            $details = [
                'title' => 'Send Email OTP Local Foodly',
                'otp' => $otp
            ];
            session()->start();
            session()->put('email',  $request->email);
            session()->put('userId',     $user->id);

            Mail::to($request->email)->send(new \App\Mail\OtpSendMail($details));
            return redirect()->route('customer.otp')->with('alert', 'first you verify your account');
            // return redirect()->route('login.page')->with('success', 'Your Account Created Successfully');
        }

        return redirect()->back()->with('alert', 'Your Sign Up Account Not Created');
    }
    
    public function otp()
    {
        $email = session()->get('email');
        // $value = session()->get('key');

        return view('user-views.login.verify',compact('email'));
    }

    public function resendCustomerOtp(Request $request)
    {
        $email = session()->get('email');
        $id = session()->get('userId');
        // $value = session()->get('key');
        $otp = rand(12,9912);
        $userDetails = [
          
            'otp' => $otp,
            'updated_at' => now()
        ];

        User::where(['id' =>$id])->update($userDetails);
        $message = 'Resend otp send successfully.';
        return response()->json(['success' => true, 'message' => $message]);


    }

    public function otpVerified(Request $request)
    {
        $user = user::where('email', $request->email)->first();

        $credentials = [
            'email' => $user->email,
            'password' => $user->password,
        ];
        // dd(Auth::login($user));
        if($user->otp === $request->otp)
        {
            $user->otp = '';
            $user->save();
            Auth::login($user);
            return redirect()->route('restaurant.list');
        } else {
      
            return redirect()->back()->withErrors(['Invalid OTP']);
        }

    }

    public function loginSubmit(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd(Auth::guard('customer')->attempt($credentials)); guard('customer')->
        if (Auth::attempt($credentials)) {
        // dd(Auth::attempt($credentials));
            return redirect()->route('restaurant.list')->with('success', 'Your Sign Up Account Created');
        }

        // return redirect()->back()->with('alert','Login details are not valid');
        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    public function signOut() {
        Session::flush();
        Auth::guard('customer')->logout();

        return Redirect()->route('login.page');
    }
}
