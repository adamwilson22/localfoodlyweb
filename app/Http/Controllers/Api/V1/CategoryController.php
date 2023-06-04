<?php

namespace App\Http\Controllers\Api\V1;

use App\CentralLogics\CategoryLogic;
use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Restaurant;
use App\Models\Food;
use App\Models\Badge;
use App\Models\Units;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Reviews;
use App\Models\Order;

// use App\Models\reviews;


class CategoryController extends Controller
{
    public function get_categories(Request $request)
    {
        try {
            // $data = [
            //     'title' => "Welcome",
            //     'description' => "Your Order Will be delivered in",
            //     'order_id' => '',
            //     'image' => '',
            //     'type'=> 'block'
            // ];
            // $token = "dVdFcK3SRSWG4HEaSJQmtl:APA91bGZB06OrsFKk4ARhYZCDcBX2bkfNzJfRk43Kd3plt7i8Q7UQo-6oZdtKps-UxOu_kMgweTonGgaYYW-ci669hDSF65hw-3IZuLGqo_offA1R-HRbcb-yMPP1INjX2bFcxmSuNwF";
            // Helpers::send_push_notif_to_device($token, $data);
            // return response()->json([
            //     // "code" => 1,
            //     "status" => true,
            //     "message" => "Categoriess",
            //     "body" => $data
            // ], 201);

            $name = $request->query('name');
            // $categories = Category::withCount('products')->with(['childes' => function ($query) {
            //     $query->withCount('products');
            // }])
            //     ->where(['position' => 0, 'status' => 1])
            //     ->when($name, function ($q) use ($name) {
            //         $key = explode(' ', $name);
            //         $q->where(function ($q) use ($key) {
            //             foreach ($key as $value) {
            //                 $q->orWhere('name', 'like', '%' . $value . '%');
            //             }
            //             return $q;
            //         });
            //     })
            //     ->orderBy('priority', 'desc')->get();
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            $categories = Category::where('restaurant_id', $restaurant->id)->get();

            $foods = Food::where('category_id', $categories[0]->id)->get();

            if(!$categories->isEmpty()){
                foreach ($categories as $category) {
                $category->image =  asset('public/images/'.$category->image);
                }
            
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Categoriess",
                    "body" => $categories
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Categories Not Found"
                ], 201);
            }
            // return response()->json(Helpers::category_data_formatting($categories, true), 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
//MAAZ
//GET ORDERS STATUS
public function get_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'orderStatus' => 'required',
            ]);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            if($request->orderStatus == ""){
            $orders = Order::where('restaurant_id', $restaurant->id)->get();
            }else{
           $orders = Order::where('restaurant_id', $restaurant->id)
            ->where('order_status',$request->orderStatus)
            ->get();
            }
            if(!$orders->isEmpty()){
                return response()->json([
                    "status" => true,
                    "message" => "Orders",
                    "body" => $orders
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Orders Not Found"
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
    //Get payment status orders
public function get_paymentStatus_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'paymentStatus' => 'required',
            ]);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            if($request->paymentStatus == ""){
            $ordersPayment = Order::where('restaurant_id', $restaurant->id)->get();
            // return response()->json(['errors' => "if"], 403);

            }else{
           $ordersPayment = Order::where('restaurant_id', $restaurant->id)
            ->where('payment_status',$request->paymentStatus)
            ->get();
            }
            if(!$ordersPayment->isEmpty()){
                return response()->json([
                    "status" => true,
                    "message" => "Orders",
                    "body" => $ordersPayment
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Orders Not Found"
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
//GET MAYMENT METHOD
public function get_paymentMethod_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'paymentMethod' => 'required',
            ]);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            if($request->paymentMethod == ""){
            $orders = Order::where('restaurant_id', $restaurant->id)->get();
            }else{
           $orders = Order::where('restaurant_id', $restaurant->id)
            ->where('payment_method',$request->paymentMethod)
            ->get();
            }
            if(!$orders->isEmpty()){
                return response()->json([
                    "status" => true,
                    "message" => "Orders",
                    "body" => $orders
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Orders Not Found"
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }

    //ORDER TYPE
    public function get_orderType_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'orderType' => 'required',
            ]);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            if($request->orderType == ""){
            $orderType = Order::where('restaurant_id', $restaurant->id)->get();
            }else{
           $orderType = Order::where('restaurant_id', $restaurant->id)
            ->where('order_type',$request->orderType)
            ->get();
            }
            if(!$orderType->isEmpty()){
                return response()->json([
                    "status" => true,
                    "message" => "Orders",
                    "body" => $orderType
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Orders Not Found"
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
    //SEARCH ORDER
public function get_search_orders(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'orderName' => 'required',
            ]);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();


                $results = Coupon::where('title', 'like', "%$request->orderName%")
                        ->Where('restaurant_id', 'like', $restaurant->id)
                        ->get();
            if(!$results->isEmpty()){
                return response()->json([
                    "status" => true,
                    "message" => "Orders",
                    "body" => $results
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Orders Not Found"
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }

//MAAZ
//GET coupons
public function get_coupons(Request $request)
    {
        try {
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            $coupons = Coupon::where('restaurant_id', $restaurant->id)->get();
            if(!$coupons->isEmpty()){
                foreach ($coupons as $category) {
                $category->image =  asset('public/images/'.$category->image);
                }
            
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Coupons",
                    "body" => $coupons
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Coupons Not Found"
                ], 201);
            }
            // return response()->json(Helpers::category_data_formatting($categories, true), 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }


    public function create_coupon(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'code' => 'required',
                'limit' => 'required',
                'startDate' => 'required',
                'expiryDate' => 'required',
                'discountType' => 'required',
                'discount' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }


        //     $image = "";
        // if ($request->hasfile("image")) {
        //     $file = $request->image;
        //     $extension = $file->getClientOriginalExtension();
        //     $file_name = time() . rand(00000, 99999) . "." . $extension;
        //     $file->move("images/", $file_name);
        //     $image  = asset("images/" . $file_name);
        // }
        $string = '2023-05-21'; // Replace this with your string

        $startingDate = Carbon::parse($string);//->toDateString();

        $expDate = Carbon::parse($string);//->toDateString();


        $limit = (int)$request->limit;
        $disc = (float)$request->discount; // Using (float) casting

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            // return response()->json([
            //     'title' => $request->title,
            //     'code' => $request->code,
            //     'limit' => $request->limit,//Int
            //     'startDate' => $request->startDate,//datetime
            //     'expiryDate' => $request->expiryDate,//dateTime
            //     'discountType' => $request->discountType,
            //     'discount' => $request->discount,//decimal
            //     'restaurant_id'=>$restaurant->id,

            // ], 201);
            // return response()->json([
            //     'title' => $request->title,
            //     'code' => $request->code,
            //     'limit' => $limit,//Int
            //     'startDate' => $startingDate,//datetime
            //     'expiryDate' => $expDate,//dateTime
            //     'discountType' => $request->discountType,
            //     'discount' => $disc,//decimal
            //     'restaurant_id'=>$restaurant->id,

            // ], 201);
        $data = Coupon::insert([
             'title' => $request->title,
             'code' => $request->code,
             'restaurant_id'=>$restaurant->id,
             'limit' => $limit,
             'start_date' => $startingDate,//1,
            'expiry_date'=>$expDate,
             'discount_type' => $request->discountType,//1
             'discount' => $disc,
         // add more columns as needed
        ]);

            if ($data) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Coupon created successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Coupon not created"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }


    public function update_coupon(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'couponId'=>'required',
                'title' => 'required',
                'code' => 'required',
                'limit' => 'required',
                'startDate' => 'required',
                'expiryDate' => 'required',
                'discountType' => 'required',
                'discount' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }
        $string = '2023-05-21'; // Replace this with your string

        // $startingDate = Carbon::parse($string);//->toDateString();

        // $expDate = Carbon::parse($string);//->toDateString();


        $limit = (int)$request->limit;
        $disc = (float)$request->discount; // Using (float) casting

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            $record = Coupon::find(11);

// Update the specific fields
    $record->title = $request->title;
    $record->code = $request->code;
    // $record->restaurant_id = $restaurant->id;
    $record->limit = $limit;
    // $record->start_date = 'changes';
    // $record->expiry_date = 'changes';
    $record->discount_type = $request->discountType;
    // $record->$discount = 34.4;
    // $record->field2 = $newValue2;

// Save the changes
    $record->save();
            if ($record) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Coupon updated successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Coupon not updated"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }

    //Search Coupons
    public function search_coupon(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'keyword' => 'required',
                'restaurant_Id'=> 'required'
            ]);
            $keyword = $request->input('keyword');
            $resId = $request->input('restaurant_Id');
            // return response()->json($request->keyword);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
        $results = Coupon::where('title', 'like', "%$keyword%")
                        ->Where('restaurant_id', 'like', $resId)
                        ->get();


        if($results->isEmpty()){
        // return response()->json($results);
        return response()->json([
            // "code" => 1,
            "status" => false,
            "message" => "Coupons Not Found"
        ], 201);
        }else{
            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => $results
            ], 201);
        }

        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
    public function delete_coupon($id)
    {
    // return response()->json(['message' => $id]);

    $coupon = Coupon::where('id', $id)->first();
        $coupon->status = 0;
        $coupon->update();
    
        if($coupon)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "coupon Deleted Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "coupon Not Updated"
            ], 200);
        }
    }

    // MAAZ
    //Get Badges
public function get_badges(Request $request)
    {
        try {
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            $categories = Badge::where('restaurant_id', $restaurant->id)->get();

            $foods = Food::where('category_id', $categories[0]->id)->get();

            if(!$categories->isEmpty()){
                foreach ($categories as $category) {
                $category->image =  asset('public/images/'.$category->image);
                }
            
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Badges",
                    "body" => $categories
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Badges Not Found"
                ], 201);
            }
            // return response()->json(Helpers::category_data_formatting($categories, true), 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }

public function delete_badges($id)
    {
    // return response()->json(['message' => $id]);

    $badge = Badge::where('id', $id)->first();
        $badge->status = 0;
        $badge->update();
    
        if($badge)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "Badge Deleted Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Badge Not Updated"
            ], 200);
        }
    }
public function delete_units($ids)
    {
    $units = Units::where('id', $ids)->first();
        $units->status = 0;
        $units->delete();
    
        if($units)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "Units Deleted Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Units Not deleted"
            ], 200);
        }
    }
public function create_badges(Request $request)
    {
        try {
                
            $validator = Validator::make($request->all(), [
                'image' => 'required',
                'name' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }


            $image = "";
        if ($request->hasfile("image")) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $image  = asset("images/" . $file_name);
        }

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            
        $data = badge::insert([
             'name' => $request->name,
             'restaurant_id' => $restaurant->id,
             'image' => $request->image
         // add more columns as needed
        ]);

            if ($data) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Badges created successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Badges not created"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }

    public function update_badges(Request $request)
    {
        try {
                
            $validator = Validator::make($request->all(), [
                'image' => 'required',
                'name' => 'required',
                'badgeId' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }
            $image = "";
        if ($request->hasfile("image")) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $image  = asset("images/" . $file_name);
        }

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
        $record = Badge::find($request->badgeId);

        $record->image = $image;
        $record->name = $request->name;
        
        $record->save();
            if ($record) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Badge updated successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Badge not updated"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }

    public function create_units(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();


            $data = Units::insert([
             'unit_name' => $request->name,
             'restaurant_id' => $restaurant->id,
         // add more columns as needed
      ]);
            if ($data) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Unit created successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Unit not created"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }


    //MAAZ
    public function get_Units(Request $request)
    {
        try {
            $name = $request->query('name');

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            $categories = Units::where('restaurant_id', $restaurant->id)->get();

            $foods = Food::where('category_id', $categories[0]->id)->get();

            if(!$categories->isEmpty()){
                foreach ($categories as $category) {
                $category->image =  asset('public/images/'.$category->image);
                }
            
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Categoriess",
                    "body" => $categories
                ], 201);
            }
            else{
                return response()->json([
                    // "code" => 1,
                    "status" => false,
                    "message" => "Categories Not Found"
                ], 201);
            }
            // return response()->json(Helpers::category_data_formatting($categories, true), 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
    //Reviews
    public function get_reviews(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'isReview' => 'required',
                'restaurant_Id'=>'required'
            ]);
            $isReview = $request->input('isReview');
            $resId = $request->input('restaurant_Id');
            // return response()->json([
            //     // "code" => 1,
            //     "status" => $resId,
            //     "message" => $isReview
            // ], 201);

            // return response()->json($request->keyword);
            $name = $request->query('name');
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            //       return response()->json([
            //     // "code" => 1,
            //     "status" => $resId,
            //     "message" => $isReview
            // ], 201);

            if ($isReview){
                $results = Reviews::where('replied', 1)
                ->Where('restaurant_id', $resId)
                ->get();
            }else{
                $results = Reviews::where('replied', 0)
                // ->Where('restaurant_id', $resId)
                ->get();
            }
        $results = reviews::where('replied', 1)
                        // ->Where('restaurant_id', $resId)
                        ->get();

        if($results->isEmpty()){
        // return response()->json($results);
        return response()->json([
            // "code" => 1,
            "status" => false,
            "message" => "Coupons Not Found"
        ], 201);
        }else{
            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => $results
            ], 201);
        }

        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 200);
        }
    }
    public function get_childes($id)
    {
        try {
            $categories = Category::where(['parent_id' => $id, 'status' => 1])->orderBy('priority', 'desc')->get();
            return response()->json(Helpers::category_data_formatting($categories, true), 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }

    public function get_products($id, Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $zone_id = json_decode($request->header('zoneId'), true);

        $type = $request->query('type', 'all');

        $data = CategoryLogic::products($id, $zone_id, $request['limit'], $request['offset'], $type);
        $data['products'] = Helpers::product_data_formatting($data['products'], true, false, app()->getLocale());
        return response()->json($data, 200);
    }

    public function get_restaurants($id, Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $zone_id = json_decode($request->header('zoneId'), true);

        $type = $request->query('type', 'all');

        $data = CategoryLogic::restaurants($id, $zone_id, $request['limit'], $request['offset'], $type);
        $data['restaurants'] = Helpers::restaurant_data_formatting($data['restaurants'], true);
        return response()->json($data, 200);
    }

    public function get_all_products($id, Request $request)
    {
        try {
            return response()->json(Helpers::product_data_formatting(CategoryLogic::all_products($id), true, false, app()->getLocale()), 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }

    public function create_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            }

            $imagefile = $request->file('image');
            $img = 'category'.time().'.'.$imagefile->getClientOriginalName();  
            $imagefile->move(public_path('images'), $img);

            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

            $insert = Category::create([
                "name"       => $request->name,
                "image"      => $img,
                // "parent_id"  => $request->parent_id ?? 0,
                // "position"   => $request->position ?? 0,
                "status"     =>  $request->status,
                "restaurant_id" =>  $restaurant->id
            ]);


            if ($insert) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Category created successfully"
                ], 201);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Category not created"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }

    public function edit_category($id)
    {
        if (!$id) {
            return response()->json(["status" => false,
            "message" => "Category id is required"], 403);
        }

        $record = Category::where("id", $id)->first();

        if ($record) {
            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => "Category found",
                "body" =>  $record
            ], 200);
        } else {
            return response()->json([
                // "code" => 0,
                "status" => false,
                "message" => "Category not found",
                "body" => []
            ], 200);
        }
    }

    public function update_category(Request $request, $id)
    {
        try {
            // $validator = Validator::make($request->all(), [
            //     'name'      => 'required',
            //     'status'    => 'required',
            // ]);

            // if ($validator->fails()) {
            //     return response()->json(['errors' => Helpers::error_processor($validator)], 403);
            // }
            $data = $request->all();
            if($request->hasFile('image')) {
                $imagefile = $request->file('image');
                $img = 'category'.time().'.'.$imagefile->getClientOriginalName();  
                $imagefile->move(public_path('images'), $img);
                $data['image'] = $img;
            }
            $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
            $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            
            $category = Category::where("id", $id)->first();
            $category->update($data);

            if ($category) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Category updated successfully"
                ], 200);
            } else {
                return response()->json([
                    "code" => 0,
                    "status" => false,
                    "message" => "Category not updated"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
        }
    }
}
