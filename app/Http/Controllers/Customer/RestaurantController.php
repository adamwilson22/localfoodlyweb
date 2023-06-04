<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\Category;
use App\Models\Badge;
use DB;

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
use App\Models\Conversation;
use Pusher\Pusher;

class RestaurantController extends Controller
{
    
     private $pusher = null;

    /**
     * __construct
     *-----------------------------------------------------------------------*/
    public function __construct()
    {
        $pusherAppId     = env('PUSHER_APP_ID');
        $pusherKey       = env('PUSHER_APP_KEY', '8a27f6a084dc0320ada0v');
        $pusherSecret   = env('PUSHER_APP_SECRET');
        // Pusher call
        $this->pusher = new Pusher(
            $pusherKey,
            $pusherSecret,
            $pusherAppId,
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );
    }
    
    public function restaurantList(Request $request)
    {
        $listRestaurants = Restaurant::latest()->get();
        return view('user-views.restaurant.index', compact('listRestaurants'));
    }

    public function customerDetails(){
        $user = Auth::user();
        return view('user-views.restaurant.profile', compact('user'));
    }

    public function filterCategory(Request $request)
    {
        // Git Check
        $query = $request->input('category');
        $id = $request->input('id');
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->where('category_id', $query)->get();
        foreach ($foods as $food) {
            $food->image = unserialize($food->image);
            $food->image = json_encode($food->image);
        }    
        return response()->json($foods);
    }

    public function filterBadges(Request $request,$id)
    {
       
        $query1 = $request->input('badges');
        // dd($query1);
        
        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->whereJsonContains('badges', [$query1])->get();
        $vendor = Vendor::where('id',$restaurant->vendor_id)->first();
        $conversation_lists = Conversation::with('user','restaurant')->where('user2_id', $id)->get();
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
        return view('user-views.products.index', compact('foods' , 'restaurant', 'vendor', 'conversation_lists', 'followerCount', 'follower', 'kitchengallery','categories','badges'));


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
        // dd($restaurant);
        // $foods = Food::where('restaurant_id',$id)->where('status', 1)->get();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->orderBy('position')->orderBy('id')->get();
        $conversation_lists = Conversation::with('user','restaurant')->where('user2_id', $id)->get();
        // dd($foods);
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
        $categories = Category::where('restaurant_id', $id)->get();
        session(['logoData' => $restaurant->logo]);

        // $badges = Badge::where('restaurant_id', $restaurant->id)->orderBy('name')->get();
        $badges = Badge::where('restaurant_id', $id)->get();
        // dd($foods);
        return view('user-views.products.index', compact('foods' , 'restaurant', 'vendor', 'conversation_lists', 'followerCount', 'follower', 'kitchengallery','categories','badges'));
    }




    public function restaurantMenu($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        $foods = Food::where('restaurant_id',$id)->where('status', 1)->orderBy('position')->orderBy('id')->get();
        // dd($foods);
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
        // $food = Food::where('id',81)->get();
        $food = DB::table('food')->where('id', $id)->first();

        $reviews = Review::where('food_id', $id)->get();
        // dd($food);
        $addons = json_decode($food->add_ons);
        if(!empty($addons)){
            $addonsData = AddOn::whereIn('id',$addons)->get();
        }else{
            $addonsData = [];

        }
        // dd(json_decode($food->variations));

        $variations = json_decode($food->variations);

        // $badges = Badge::where('restaurant_id', $food->restaurant_id)->pluck('name', 'id','image')->all();
        $badges = Badge::where('restaurant_id', $food->restaurant_id)->orderBy('name')->get();
        

        // dd($food->restaurant_id);
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
        // dd($addonsData);


        return view('user-views.products.detail', compact('food', 'reviews', 'addonsData', 'variations','badges'));
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
    
    
    public function SendMessage(Request $request)
    {
        $conversation = new Conversation();
        $conversation->reply = $request->submit_message;
        $conversation->type = $request->type;
        $conversation->user2_id = $request->seller_id;
        $conversation->user1_id = auth()->user()->id;

        if ($conversation->save()) {

            $listConversation = Conversation::where('user2_id', $request->seller_id)->get();

            $restaurant = Restaurant::where('id', $request->seller_id)->first();

            $restaurant = [
                "id" => "{$restaurant->id}",
                "name" => "{$restaurant->name}",
                "email" => "{$restaurant->email}",
                "address" => "{$restaurant->address}",
                "logo" => "{$restaurant->logo}",
            ];

            $user = User::where('id', auth()->user()->id)->first();

            $User = [
                "id" => "{$user->id}",
                "firstname" => "{$user->f_name}",
                "lastname" => "{$user->l_name}",
                "email" => "{$user->email}",
                "image" => "{$user->image}",
            ];

            $chatData = [
                "id" => "{$conversation->id}",
                "type" => "{$conversation->type}",
                "sent_user" => "{$conversation->user2_id}",
                "recieved_user" => "{$conversation->user1_id}",
                "message" => "{$conversation->reply}",
                "MessageDateTime" => "{$conversation->created_at}",
                "senderData" => $restaurant,
                "User" => $User
            ];

            $pusherData =  [
                "conservationData" => $chatData
            ];

            // $eventName = "$messageSubject-CSR";

            $this->pusher->trigger('local.chat', 'seller-Chat', $pusherData);

            return [
                'status' => true,
                'message' => 'Message Sent...!',
                'chatlists' => $listConversation,
                'receiver_id' => $request->seller_id,
                "senderData" => $restaurant,
                "User" => $User
            ];
        } else {
            return response()->json(['error' => 'Message Not Sent...!']);
        }
    }
}