<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\KitchenGallery;
use App\Models\Vendor;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;


use Brian2694\Toastr\Facades\Toastr;


class SettingsController extends Controller
{
    //
    public function index()
    {
        $user = auth('vendor')->user()->id;
        $data = Vendor::where('id',$user)->first();
        $restaurant = Restaurant::where('vendor_id',$user)->first();
        $kitchengallery = KitchenGallery::where('restaurant_id', $restaurant->id)->get();
        // foreach ($kitchengallery as $g) {
        //     # code...
        //     dd($g->id);
        // }
        return view('vendor-views.addon.settings', compact('data', 'restaurant', 'kitchengallery'));
    }

    public function UpdateProfile(Request $request)
    {
        // dd($request->all());
        $user = auth('vendor')->user()->id;
        $data = Vendor::where('id',$user)->first();
        if ($request->file('image')) {
            
            // $images = [];
            // // dd($request->file('image'));
            // foreach ($request->file('image') as $imagefile) {
                
                $profile = 'profile'.time().'.'.$request->image->extension();  
                $request->image->move(public_path('images/vendor'), $profile);
                $imagefile = $request->file('image');
                
                // $img = 'store'.time().'.'.$imagefile->getClientOriginalName();  
                // $imagefile->move(public_path('images'), $img);
    
                // $images[]= $imagefile->getClientOriginalName();
                // array_push($images, $img);
                $data['image'] = $profile;
        }
        $data->update($request->all());
        Toastr::success("Profile Updated");
        return back();


    }
    public function UpdateStore(Request $request)
    {
        // dd($request->logo[0]);
        $data = $request->all();
        if($request->has('is_deactivated'))
        {
        $data['is_deactivated'] = 1;
        }

        if ($request->file('logo')) {
            
            // $images = [];
            // // dd($request->file('image'));
            // foreach ($request->file('image') as $imagefile) {
                
                $logo = 'logo'.time().'.'.$request->logo->extension();  
                $request->logo->move(public_path('images'), $logo);
                $imagefile = $request->file('logo');
                
                // $img = 'store'.time().'.'.$imagefile->getClientOriginalName();  
                // $imagefile->move(public_path('images'), $img);
    
                // $images[]= $imagefile->getClientOriginalName();
                // array_push($images, $img);
                $data['logo'] = $logo;
        }
            // $img = serialize($images);
            // dd('has image');
            // }
            // dd('no image');

        $restaurant = Restaurant::where('vendor_id', auth('vendor')->user()->id)->first();
        $restaurant->update($data);
        Toastr::success("Store Updated");
        return back();
    }
    
    public function CreateStoreGallery(Request $request)
    {
        // dd($request->all());
        $user = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id',$user)->first();
        $image = "";
        if ($request->hasfile("file")) {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $image  = asset("images/" . $file_name);
        }
        $kitchen_galleries = new KitchenGallery();
        $kitchen_galleries->restaurant_id = $restaurant->id;
        $kitchen_galleries->image = $image;
        if($kitchen_galleries->save())
        {
            return [
                'status' => true,
                'message' => 'uploaded images'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'not uploaded images'
            ];
        }

    }

    public function DeleteStoreGallery(Request $request, $id)
    {
        // dd($request->all());
        // $user = auth('vendor')->user()->id;
        // $data = Vendor::where('id',$user)->first();
        // $restaurant = Restaurant::where('vendor_id',$user)->first();
        $kitchengallery = KitchenGallery::where('id', $id)->first();
        // dd($kitchengallery);
        if($kitchengallery->delete())
        {
            return [
                'status' => true,
                'message' => 'Image Deleted'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Image Not Deleted'
            ];
        }

    }
    // Create Store

    public function CreateStore(Request $request)
    {
        // dd($request->all());
        $user = auth('vendor')->user()->id;
        $data = $request->all();
        $data['vendor_id'] = $user;
        $data['phone'] = auth('vendor')->user()->phone;
        // dd($data);
        if($request->has('is_deactivated'))
        {
        $data['is_deactivated'] = 1;
        }
        if ($request->file('logo')) {
            
            // $images = [];
            // // dd($request->file('image'));
            // foreach ($request->file('image') as $imagefile) {
                
                $logo = 'logo'.time().'.'.$request->logo->extension();  
                $request->logo->move(public_path('images'), $logo);
                $imagefile = $request->file('logo');
                
                // $img = 'store'.time().'.'.$imagefile->getClientOriginalName();  
                // $imagefile->move(public_path('images'), $img);
    
                // $images[]= $imagefile->getClientOriginalName();
                // array_push($images, $img);
                $data['logo'] = $logo;
            }

        if ($request->file('cover_photo')) {
        
            // $images = [];
            // // dd($request->file('image'));
            // foreach ($request->file('image') as $imagefile) {
                
                $cover = 'cover'.time().'.'.$request->cover_photo->extension();  
                $request->cover_photo->move(public_path('images'), $cover);
                $imagefile = $request->file('cover_photo');
                
                // $img = 'store'.time().'.'.$imagefile->getClientOriginalName();  
                // $imagefile->move(public_path('images'), $img);
    
                // $images[]= $imagefile->getClientOriginalName();
                // array_push($images, $img);
                $data['cover_photo'] = $cover;
            }

        $restaurant = Restaurant::where('vendor_id', auth('vendor')->user()->id)->first();
        if($restaurant)
        {
            $restaurant->update($data);
            Toastr::success("Store Updated");
            return back();
        }else{

            $restaurant = new Restaurant;
            $restaurant->create($data);
            Toastr::success("Store Created");
            return back();
        }
    }
    
    public function ChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6'

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $user = auth('vendor')->user()->id;
        $vendor = Vendor::where('id',$user)->first();

        if (Hash::check($request->old_password, $vendor->password))
        {
            $vendor->password = bcrypt($request->password);
            $vendor->save();
            Toastr::success("Password changed");
            return back();
            
        }
        else
        {
            Toastr::error("Old password didn't match");
            return back();
        }

    }
}
