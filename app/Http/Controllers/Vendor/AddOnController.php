<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\AddOn;
use App\Models\Restaurant;
use App\Models\Food;
use App\Models\Badge;
use Pusher\Pusher;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\Models\Translation;
use App\Models\Category;
use App\Models\Conversation;
use App\Models\Customer;
use App\Models\CustomerGroupAssigned;
use App\Models\CustomerGroups;
use App\Models\Units;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
class AddOnController extends Controller
{
    private $pusher = null;

    /**
     * __construct
     *-----------------------------------------------------------------------*/
    public function __construct()
    {
        $pusherAppId     = env('PUSHER_APP_ID');
        $pusherKey         = env('PUSHER_APP_KEY', 'eb48d91d4024959f20e0');
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
    public function index()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $addons = AddOn::where('restaurant_id', $restaurant->id)
            ->orderBy('name')
            ->paginate(config('default_pagination'));
        return view('vendor-views.addon.index', compact('addons'));
    }

    public function getAddons()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $addons = AddOn::where('restaurant_id', $restaurant->id)
            ->orderBy('name')
            ->get();

        return $addons;
    }
    // getBadges

    public function getBadges()
    {
      
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $badges = Badge::where('restaurant_id', $restaurant->id)->get();
            

        return $badges;
    }

    public function profile()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        if (!$restaurant) {
            Toastr::error('Please create your store first from settings');
            return back();
            $products = '';
        } else {
            $products = Food::where('restaurant_id', $restaurant->id)->get();
            // foreach ($products as $product) {
            //     $product->image = unserialize($product->image);
            //     $images = [];
            //     // foreach ($product->image as $img) {
            //     //     # code...
            //     //     $images[] = asset('images/'.$img);
            //     // }
                
            //     // 
            //     $product->image =  asset('public/images/' . $product->image[0]);               
                
            //     // $product->image = asset('images/' . $product->image[0]);
            //     // 

            // }
        }
        return view('vendor-views.addon.profile', compact('restaurant', 'products'));
    }

    public function products()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        // return view('vendor-views.addon.products');
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        if (!$restaurant) {
            Toastr::error('Please create your store first from settings');
            return back();
        }
        return view('vendor-views.addon.products');
    }

    public function addproduct($type)
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        // $category = Category::all();
        // $restaurantID = Helpers::get_restaurant_id();
        // dd($restaurantID);
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        if (!$restaurant) {
            Toastr::error('Please create your store first from settings');
            return back();
        }
        $category = Category::where('restaurant_id', Helpers::get_restaurant_id())->get();
        $addon = AddOn::all();
        $badges = Badge::where('restaurant_id', $restaurant->id)->get();
        $units = Units::where('restaurant_id', Helpers::get_restaurant_id())->get();
        // dd( $addon);
        return view('vendor-views.addon.addproduct', compact(['category', 'type', 'addon', 'badges', 'units']));
    }

    public function addUnit(Request $request)
    {
        $unitFound = DB::table('units')
            ->where('unit_name', $request->unitName)
            ->where('restaurant_id', Helpers::get_restaurant_id())
            ->get();

        if (count($unitFound) > 0) {
            return '0';
        } else {
            DB::table('units')->insert([
                'unit_name' => $request->unitName,
                'restaurant_id' => Helpers::get_restaurant_id(),
            ]);

            return response()->json($request->unitName);
        }
    }

    public function addproduct2()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        if (!$restaurant) {
            Toastr::error('Please create your store first from settings');
            return back();
        }
        $category = Category::all();
        $addon = AddOn::all();
        $addon = AddOn::all();
        $badges = Badge::where('restaurant_id', $restaurant->id)->get();
        $units = Units::where('restaurant_id', Helpers::get_restaurant_id())->get();
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.addproduct2', compact(['category', 'addon', 'badges', 'units']));
    }
    public function pizza_products()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.pizza-products');
    }
    public function upload_images()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.upload-images');
    }
    public function product_detail()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.product-detail');
    }
    public function product_pre_order()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.product-pre-order');
    }
    public function product_subscription()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.product-subscription');
    }
    public function categories()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        // $categories=Category::latest()->paginate(config('default_pagination'));
        // dd($categories);
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $categories = [];
        if ($restaurant) {
            $categories = Category::where('restaurant_id', $restaurant->id)->get();
        }
        return view('vendor-views.addon.categories', compact('categories'));
    }

    public function addcategory()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        if (!$restaurant) {
            Toastr::error('Please create your store first from settings');
            return back();
        }
        return view('vendor-views.addon.addcategory');
    }

    public function addategory()
    {
        return view('vendor-views.addon.addproduct');
    }

    public function addcustomergroup(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $customerGroupFields = new CustomerGroups();
        $customerGroupFields->name = $request->name;
        $insert = $customerGroupFields->save();
        // dd($insert);

        // $insert = Food::create($customerGroupFields);
        if ($insert) {
            return Redirect('vendor-panel/addon/customer')->with([
                'message' => 'Customer Group Created Successfully',
                'code' => 1,
                'status' => true,
            ]);
        } else {
            return Redirect('Vendor-panel/addon/customer')->with([
                'code' => 0,
                'message' => 'Customer Group Not Created',
                'status' => false,
            ]);
        }
    }

    public function updateProductStatusAndCategory(Request $request)
    {
        $catID = (int)$request->categoryID;

        foreach ($request->products as $productID) {
            if($catID != 0){
                DB::table('food')
                ->where('id', $productID)
                ->where('restaurant_id', Helpers::get_restaurant_id())
                ->update(['category_id' => $catID, 'status' => $request->productStatus]);
            }
            else{
                // dd('else');
                DB::table('food')
                ->where('id', $productID)
                ->where('restaurant_id', Helpers::get_restaurant_id())
                ->update(['status' => $request->productStatus]);
            }
        }

        return Redirect('vendor-panel/addon/products')->with([
            'message' => "Product Status OR Category updated Successfully",
            'code' => 1,
            'status' => true,
        ]);
    }

    public function deleteBulkProducts(Request $request)
    {
        foreach ($request->products as $productID) {
        DB::table('food')
            ->where('id', $productID)
            ->where('restaurant_id', Helpers::get_restaurant_id())
            ->delete();
        }

        return Redirect('vendor-panel/addon/products')->with([
            'message' => "Product Deleted Successfully",
            'code' => 1,
            'status' => true,
        ]);
    }

    public function assignGroupToCustomers(Request $request)
    {
        $event = '';
        foreach ($request->customers as $customer) {
            // dd($customer);
            $customerFound = DB::table('customer_group_assigned')
                ->where('customer_id', $customer)
                ->get();

            if (count($customerFound) > 0) {
                $event = 'updated';

                DB::table('customer_group_assigned')
                    ->where('customer_id', $customer)
                    ->update(['group_id' => $request->groupID]);
            } else {
                $event = 'inserted';

                DB::table('customer_group_assigned')->insert([
                    'customer_id' => $customer,
                    'group_id' => $request->groupID,
                ]);
            }
        }

        return Redirect('vendor-panel/addon/customer')->with([
            'message' => "Customer Group(s) . $event . Successfully",
            'code' => 1,
            'status' => true,
        ]);
    }

    public function customer()
    {
        $assignedCustomerGroups = DB::table('customers as cc')
            ->leftJoin('customer_group_assigned as cga', 'cga.customer_id', '=', 'cc.id')
            ->leftJoin('customer_groups as cg', 'cg.id', '=', 'cga.group_id')
            ->select('cc.id as id', 'cc.ful_name as customer_name', 'cg.name as customer_group_name', 'cg.id as group_ID', 'cc.email', 'cc.phone_number', 'cc.address', 'cc.image')
            ->get();
        $customerGroups = CustomerGroups::all();

        $coupons = DB::table('coupons as cc')
        ->where('cc.status' , '=' , 1)
        // ->where('cc.expire_date' , '<=' , date('Y-m-d'))
        ->select('cc.id as id', 'cc.title as title')
        ->get();
        
        // dd($coupons);

        return view('vendor-views.addon.customer', compact('assignedCustomerGroups', 'customerGroups', 'coupons'));
    }
    public function filterCustomers(Request $request)
    {
        $groupId = $request->input('group_id');
        // $customers = Customer::where('group_id', $groupId)->get();
        $assignedCustomerGroups = DB::table('customers as cc')
        ->leftJoin('customer_group_assigned as cga', 'cga.customer_id', '=', 'cc.id')
        ->leftJoin('customer_groups as cg', 'cg.id', '=', 'cga.group_id')
        ->select('cc.id as id', 'cc.ful_name as customer_name', 'cg.name as customer_group_name', 'cg.id as group_ID', 'cc.email', 'cc.phone_number', 'cc.address', 'cc.image')
        ->where('cg.id' , '=' , $groupId)
        ->get();
        return response()->json($assignedCustomerGroups);
    }
    public function settings()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.settings' /**/);
    }
    public function single_customer(Request $request)
    {
        $customerDetails = DB::table('customers as cc')
            ->where('id', '=', $request->id)
            ->select('cc.id as id', 'cc.ful_name as customer_name', 'cc.email', 'cc.phone_number', 'cc.address', 'cc.image')
            ->first();
        $coupons = DB::table('coupons as cc')
            ->where('cc.status' , '=' , 1)
            // ->where('cc.expire_date' , '<=' , date('Y-m-d'))
            ->select('cc.id as id', 'cc.title as title')
            ->get();
        // dd($customerDetails);
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.single-customer', compact('customerDetails', 'coupons'));
    }
    public function order()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.order');
    }
    public function invoices()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        $orderDetails = DB::table('orders as oo')
            ->Join('order_details as od', 'od.order_id', '=', 'oo.id')
            ->Join('food as ff', 'ff.id', '=', 'od.food_id')
            ->Join('users as uu', 'uu.id', '=', 'oo.user_id')
            ->where('oo.restaurant_id', Helpers::get_restaurant_id())
            ->select('oo.id as order_id', 'od.id as order_details_id', 'oo.restaurant_id as restaurant_id', 'od.food_id', 'ff.name as food_name', 'uu.f_name', 'oo.payment_status', 'oo.order_amount')
            ->get();

        $paidInvoices = DB::table('orders as oo')
            ->Join('order_details as od', 'od.order_id', '=', 'oo.id')
            ->Join('food as ff', 'ff.id', '=', 'od.food_id')
            ->Join('users as uu', 'uu.id', '=', 'oo.user_id')
            ->where('oo.payment_status', 'paid')
            ->where('oo.restaurant_id', Helpers::get_restaurant_id())
            ->select('oo.id as order_id', 'od.id as order_details_id', 'oo.restaurant_id as restaurant_id', 'od.food_id', 'ff.name as food_name', 'uu.f_name', 'oo.payment_status', 'oo.order_amount')
            ->get();

        $unpaidInvoices = DB::table('orders as oo')
            ->Join('order_details as od', 'od.order_id', '=', 'oo.id')
            ->Join('food as ff', 'ff.id', '=', 'od.food_id')
            ->Join('users as uu', 'uu.id', '=', 'oo.user_id')
            ->where('oo.restaurant_id', Helpers::get_restaurant_id())
            ->where('oo.payment_status', 'unpaid')
            ->select('oo.id as order_id', 'od.id as order_details_id', 'oo.restaurant_id as restaurant_id', 'od.food_id', 'ff.name as food_name', 'uu.f_name', 'oo.payment_status', 'oo.order_amount')
            ->get();
        // dd($orderDetails);

        return view('vendor-views.addon.invoices', compact('orderDetails', 'paidInvoices', 'unpaidInvoices'));
    }
    public function messages()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        // dd(Helpers::get_restaurant_id());
        $conversation_lists = Conversation::with('user')->where('user2_id', Helpers::get_restaurant_id())->get()->unique('user1_id');
        // dd($conversation_lists->toArray());
        return view('vendor-views.addon.messages',compact('conversation_lists'));
    }
    public function fetchMessage(Request $request){
        $chatlists = Conversation::where('user2_id', $request->SellerId)
            ->get();
        // dd($chatlists->toArray());
        $Seller = Restaurant::where('id', $request->SellerId)->first();
        $User = User::where('id', $request->UserId)->first();
        
        return [
            "status" => true,
            "message" => "data found",
            "chatlists" => $chatlists,
            "Seller" => $Seller,
            "User" => $User,
        ];
    }

    public function SendMessage(Request $request)
    {
        $conversation = new Conversation();
        $conversation->reply = $request->submit_message;
        $conversation->type = $request->type;
        $conversation->user2_id = Helpers::get_restaurant_id();
        $conversation->user1_id = $request->receiver_id;

        if ($conversation->save()) {

            $listConversation = Conversation::where('user1_id', $request->receiver_id)->get();

            $restaurant = Restaurant::where('id', Helpers::get_restaurant_id())->first();

            $restaurant = [
                "id" => "{$restaurant->id}",
                "name" => "{$restaurant->name}",
                "email" => "{$restaurant->email}",
                "address" => "{$restaurant->address}",
                "logo" => "{$restaurant->logo}",
            ];

            $user = User::where('id', $request->receiver_id)->first();

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

            $this->pusher->trigger('local.chat', 'customer-Chat', $pusherData);

            return [
                'status' => true,
                'message' => 'Message Sent...!',
                'chatlists' => $listConversation,
                'receiver_id' => $request->receiver_id,
                "senderData" => $restaurant,
                "User" => $User
            ];
        } else {
            return response()->json(['error' => 'Message Not Sent...!']);
        }
    }
    public function review()
    {
        $customerReviews = DB::table('reviews as rr')
            ->Join('users as uu', 'uu.id', '=', 'rr.user_id')
            ->Join('food as ff', 'ff.id', '=', 'rr.food_id')
            ->where('rr.restaurant_id', '=', Helpers::get_restaurant_id())
            ->select('rr.id as review_id', 'uu.f_name', 'uu.image as customer_image', 'uu.email', 'rr.comment as comment', 'ff.name as food_name', 'ff.image as food_image', 'ff.description as food_desc', 'rr.rating')
            ->orderByDesc('rr.id')
            ->get();

        foreach ($customerReviews as $product) {
            // dd(asset($product->customer_image));
            $product->food_image = unserialize($product->food_image);
            $product->food_image = asset('public/images/' . $product->food_image[0]);
            $product->customer_image = asset('public/assets/admin/img/' . $product->customer_image);
        }

        $repliedReviews = DB::table('reviews as rr')
            ->Join('users as uu', 'uu.id', '=', 'rr.user_id')
            ->Join('food as ff', 'ff.id', '=', 'rr.food_id')
            ->where('rr.restaurant_id', '=', Helpers::get_restaurant_id())
            ->where('rr.replied', '=', 1)
            ->select('rr.id as review_id', 'uu.f_name', 'uu.image as customer_image', 'uu.email', 'rr.comment as comment', 'ff.name as food_name', 'ff.image as food_image', 'ff.description as food_desc', 'rr.rating', 'rr.seller_reply')
            ->orderByDesc('rr.id')
            ->get();

        foreach ($repliedReviews as $product) {
            // dd(asset($product->customer_image));
            $product->food_image = unserialize($product->food_image);
            $product->food_image = asset('public/images/' . $product->food_image[0]);
            $product->customer_image = asset('public/assets/admin/img/' . $product->customer_image);
        }

        // dd($repliedReviews);

        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.review', compact('customerReviews', 'repliedReviews'));
    }

    public function savereview(Request $request)
    {
        // dd($request);

        DB::table('reviews')
            ->where('id', $request->reviewID)
            ->update(['seller_reply' => $request->sellerComment, 'replied' => 1]);

        return Redirect('vendor-panel/addon/review')->with([
            'message' => 'Reply Sent Successfully!',
            'code' => 1,
            'status' => true,
        ]);
    }

    public function coupon()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.coupon');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if (!Helpers::get_restaurant_data()->food_section) {
            Toastr::warning(trans('messages.permission_denied'));
            return back();
        }
        $request->validate(
            [
                'name' => 'required|',
                // 'name.*' => 'max:191', array
                'price' => 'required|numeric|between:0,999999999999.99',
            ],
            [
                'name.required' => trans('messages.Name is required!'),
            ],
        );

        $image = '';
        if ($request->hasfile('addon_image')) {
            $file = $request->addon_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . '.' . $extension;
            $file->move('public/images/', $file_name);
            $image = asset('public/images/' . $file_name);
        } // [array_search('en', $request->lang)]

        $addon = new AddOn();
        $addon->name = $request->name;
        $addon->price = $request->price;
        $addon->image = $image;
        $addon->restaurant_id = \App\CentralLogics\Helpers::get_restaurant_id();
        $addon->save();
        // $data = [];
        // foreach ($request->lang as $index => $key) {
        //     if ($request->name[$index] && $key != 'en') {
        //         array_push($data, array(
        //             'translationable_type'  => 'App\Models\AddOn',
        //             'translationable_id'    => $addon->id,
        //             'locale'                => $key,
        //             'key'                   => 'name',
        //             'value'                 => $request->name[$index],
        //         ));
        //     }
        // }
        // if (count($data)) {
        //     Translation::insert($data);
        // }
        Toastr::success(trans('messages.addon_added_successfully'));
        return back();
    }

    public function edit($id)
    {
        if (!Helpers::get_restaurant_data()->food_section) {
            Toastr::warning(trans('messages.permission_denied'));
            return back();
        }
        $addon = AddOn::withoutGlobalScope('translate')->findOrFail($id);
        return view('vendor-views.addon.edit', compact('addon'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        if (!Helpers::get_restaurant_data()->food_section) {
            Toastr::warning(trans('messages.permission_denied'));
            return back();
        }
        $request->validate(
            [
                'name' => 'required|max:191',
                'price' => 'required|numeric|between:0,999999999999.99',
            ],
            [
                'name.required' => trans('messages.Name is required!'),
            ],
        );

        $image = '';
        if ($request->hasfile('addon_image')) {
            $file = $request->addon_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . '.' . $extension;
            $file->move('public/images/', $file_name);
            $image = asset('public/images/' . $file_name);
        }

        $addon = AddOn::find($id);
        $addon->name = $request->name;
        $addon->image = $image;
        $addon->price = $request->price;
        $addon->save();

        // foreach ($request->lang as $index => $key) {
        //     if ($request->name[$index] && $key != 'en') {
        //         Translation::updateOrInsert(
        //             [
        //                 'translationable_type'  => 'App\Models\AddOn',
        //                 'translationable_id'    => $addon->id,
        //                 'locale'                => $key,
        //                 'key'                   => 'name'
        //             ],
        //             ['value'                 => $request->name[$index]]
        //         );
        //     }
        // }

        Toastr::success(trans('messages.addon_updated_successfully'));
        return redirect(route('vendor.addon.add-new'));
    }

    public function delete(Request $request)
    {
        if (!Helpers::get_restaurant_data()->food_section) {
            Toastr::warning(trans('messages.permission_denied'));
            return back();
        }
        $addon = AddOn::find($request->id);
        $addon->delete();
        Toastr::success(trans('messages.addon_deleted_successfully'));
        return back();
    }
}
