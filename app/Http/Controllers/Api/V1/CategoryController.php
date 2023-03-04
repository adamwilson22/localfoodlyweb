<?php

namespace App\Http\Controllers\Api\V1;

use App\CentralLogics\CategoryLogic;
use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Restaurant;
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
            if(!$categories->isEmpty()){
                foreach ($categories as $category) {
                $category->image =  asset('public/images/'.$category->image);
                }
            
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Categories found",
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
