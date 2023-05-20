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

class CategoryController extends Controller
{
    public function get_categories(Request $request)
    {
        try {
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


            // return response()->json([
            //     'title' => $request->title,
            //     'code' => $request->code,
            //     'limit' => $request->limit,
            //     'startDate' => $request->startDate,
            //     'endDate' => $request->endDate,
            //     'discountType' => $request->discountType,
            //     'discount' => $request->discount,
            // ], 201);
                
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'code' => 'required',
                'limit' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'discountType' => 'required',
                'discount' => 'required',
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
            
        $data = Coupon::insert([
             'title' => $request->title,
             'code' => $restaurant->code,
             'limit' => $request->limit,
             'startDate' => $request->startDate,
             'endDate' => $request->endDate,
             'discountType' => $request->discountType,
             'discount' => $request->discount,
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
    public function search_coupon(Request $search)
    {
        try {
            return Response()->json($search); 
            // $validator = Validator::make($search->all(), [
            //     'search' => 'required',
            // ]);


            $result = coupon::where('code', 'LIKE', '%'. 'c6123'. '%')->get();
            if(count($result)){
             return Response()->json($result);
            }
            else
            {
            return response()->json(['Result' => 'No Data not found'], 404);
          }
        
        //     if ($validator->fails()) {
        //         return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        //     }


        //     $vendor = Vendor::where('auth_token', $search->bearerToken())->first();
        //     $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
            
        // $data = Coupon::search([
        //      'title' => $search->search,
        //  // add more columns as needed
        // ]);

        //     if ($data) {
        //         return response()->json([
        //             // "code" => 1,
        //             "status" => true,
        //             "Coupons" => $data
        //         ], 201);
        //     } else {
        //         return response()->json([
        //             // "code" => 0,
        //             "status" => false,
        //             "message" => "nothing found"
        //         ], 200);
        //     }
        } catch (\Exception $e) {
            return response()->json(['errors' => Helpers::error_processor($e)], 403);
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
