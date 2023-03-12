<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\Category;
use App\Models\Badge;


use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KitchenGallery;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\CentralLogics\Helpers;
use App\Models\AddOn as ModelsAddOn;
use App\Models\User;
use App\Models\AddOn;

class RestaurantController extends Controller
{
    public function restaurantList(Request $request)
    {
        $listRestaurants = Restaurant::latest()->get();
        return view('user-views.restaurant.index', compact('listRestaurants'));
    }

    public function customerDetails(){
        $user = Auth::user();
        return view('user-views.restaurant.profile', compact('user'));
    }

    public function filterCategory(Request $request,$id)
    {
        $query = $request->input('category');
        
        // dd($query);
        

        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->where('category_id', $query)->get();
        $vendor = Vendor::where('id',$restaurant->vendor_id)->first();
        $follower = Follower::where([
            ['restaurant_id', $id],
            ['customer_id', Auth::user()->id],
            ['status','1']
        ])->first();
        $followerCount = Follower::where([
                ['restaurant_id', $id]
        ])->count();
        
        $cart = session()->get('cart');
        foreach ((array) session('cart') as $details) {
            if($id != $details['restaurant_id'])
            {
                // dd();
                session()->forget('cart');
            }
        }
        $kitchengallery = KitchenGallery::where('restaurant_id', $id)->get();
        $categories = Category::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // $badges = Badge::where('restaurant_id', $restaurant->id)->orderBy('name')->get();
        $badges = Badge::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // dd($badges1);
        return view('user-views.products.index', compact('foods' , 'restaurant', 'vendor', 'followerCount', 'follower', 'kitchengallery','categories','badges'));



        // $foods = Food::where('name', 'like', "%$query%")->get();
        // return view('foods.index', compact('foods'));
    }

    public function filterBadges(Request $request,$id)
    {
       
        $query1 = $request->input('badges');
        // dd($query1);
        
        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->whereJsonContains('badges', [$query1])->get();
        $vendor = Vendor::where('id',$restaurant->vendor_id)->first();
        $follower = Follower::where([
            ['restaurant_id', $id],
            ['customer_id', Auth::user()->id],
            ['status','1']
        ])->first();
        $followerCount = Follower::where([
                ['restaurant_id', $id]
        ])->count();
        
        $cart = session()->get('cart');
        foreach ((array) session('cart') as $details) {
            if($id != $details['restaurant_id'])
            {
                // dd();
                session()->forget('cart');
            }
        }
        $kitchengallery = KitchenGallery::where('restaurant_id', $id)->get();
        $categories = Category::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // $badges = Badge::where('restaurant_id', $restaurant->id)->orderBy('name')->get();
        $badges = Badge::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // dd($badges1);
        return view('user-views.products.index', compact('foods' , 'restaurant', 'vendor', 'followerCount', 'follower', 'kitchengallery','categories','badges'));


        // $foods = Food::where('name', 'like', "%$query%")->get();
        // return view('foods.index', compact('foods'));
    }
    public function updateProfile(Request $request){
// dd($request);
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|max:20',
            'l_name' => 'required|max:20',
            'email' => 'required|unique:users,email,'.$request->user()->id,
            'phone' => 'required|max:11',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        
        if ($request->has('image')) {
            $imageName = Helpers::update('profile/', $request->user()->image, 'png', $request->file('image'));
        } else {
            $imageName = $request->user()->image;
        }

        if ($request['password'] != null && strlen($request['password']) > 5) {
            $pass = bcrypt($request['password']);
        } else {
           $pass = bcrypt($request['password']);
        }

        // dd($pass);
        
        $userDetails = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName,
            'password' => $pass,
            'updated_at' => now()
        ];

        User::where(['id' => Auth::user()->id])->update($userDetails);
        // DB::update('update users set f_name = ? where id = ?',[$name,Auth::user()->id]);
        Toastr::success(trans('messages.customer').trans('messages.status_updated'));
        return back();
        // return response()->json(['message' => trans('messages.successfully_updated')], 200);
        
    }

    public function restaurantView($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->get();
        $vendor = Vendor::where('id',$restaurant->vendor_id)->first();
        $follower = Follower::where([
            ['restaurant_id', $id],
            ['customer_id', Auth::user()->id],
            ['status','1']
        ])->first();
        $followerCount = Follower::where([
                ['restaurant_id', $id]
        ])->count();
        
        $cart = session()->get('cart');
        foreach ((array) session('cart') as $details) {
            if($id != $details['restaurant_id'])
            {
                // dd();
                session()->forget('cart');
            }
        }
        $kitchengallery = KitchenGallery::where('restaurant_id', $id)->get();
        $categories = Category::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // $badges = Badge::where('restaurant_id', $restaurant->id)->orderBy('name')->get();
        $badges = Badge::where('restaurant_id', $id)->pluck('name', 'id')->all();
        // dd($badges1);
        return view('user-views.products.index', compact('foods' , 'restaurant', 'vendor', 'followerCount', 'follower', 'kitchengallery','categories','badges'));
    }




    public function restaurantMenu($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->get();
        $vendor = Vendor::where('id',$restaurant->vendor_id)->first();
        $follower = Follower::where([
            ['restaurant_id', $id],
            ['customer_id', Auth::user()->id],
            ['status','1']
        ])->first();
        $followerCount = Follower::where([
                ['restaurant_id', $id]
        ])->count();
        
        $cart = session()->get('cart');
        foreach ((array) session('cart') as $details) {
            if($id != $details['restaurant_id'])
            {
                // dd();
                session()->forget('cart');
            }
        }
        $kitchengallery = KitchenGallery::where('restaurant_id', $id)->get();
        // dd($kitchengallery);
        return view('user-views.products.restaurant-menu', compact('foods' , 'restaurant', 'vendor', 'followerCount', 'follower', 'kitchengallery'));
    }

    public function foodView($id)
    {
        $food = Food::where('id',$id)->first();
        $reviews = Review::where('food_id', $id)->get();

        $addonsData = AddOn::where('restaurant_id',$food->restaurant_id)->get();
        // dd(json_decode($food->variations));
        $variations = json_decode($food->variations);
        // dd($variations);
        // foreach(array_values($variations) as $key=>$option)
        // {
        //     // dd($option->values);
        //     foreach($option->values as $value)
        //     {
        //         dd($value);     
        //     }
        // }
        
        // foreach ($reviews as $key => $value) {
        //     # code...
        //     dd($value->customer());
        // }
        // dd(empty($reviews->all()));

        return view('user-views.products.detail', compact('food', 'reviews', 'addonsData', 'variations'));
    }
    
    public function userFollow(Request $request)
    {
        // dd($request->all());
        $follower = Follower::where([
            ['restaurant_id', $request->rest_id],
            ['customer_id', Auth::user()->id],
            ['status','1']
        ])->first();
        // dd($follower);
        if(!empty($follower))
        {
            $follower->delete();
            $followerCount = Follower::where([
                ['restaurant_id', $request->rest_id]
                ])->count();
            return [
                "status" => "unfollow",
                "message" => "you can unfollow this restaurant now....",
                "data" =>  $followerCount
            ];
        } else {
            $addFollower = new Follower();
            $addFollower->customer_id = Auth::user()->id;
            $addFollower->restaurant_id = $request->rest_id;
            $addFollower->status = "1";
            $addFollower->save();
            $followerCount = Follower::where([
                ['restaurant_id', $request->rest_id]
                ])->count();
            return [
                "status" => "follow",
                "message" => "you are follow this restaurant now....",
                "data" =>  $followerCount
            ];
        }
    }
}