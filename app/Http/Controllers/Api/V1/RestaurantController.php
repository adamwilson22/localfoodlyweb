<?php

namespace App\Http\Controllers\Api\V1;

use App\CentralLogics\Helpers;
use App\CentralLogics\RestaurantLogic;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    public function get_restaurants(Request $request, $filter_data = "all")
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $longitude = $request->header('longitude');
        $latitude = $request->header('latitude');
        $type = $request->query('type', 'all');
        $name = $request->query('name');
        $zone_id = json_decode($request->header('zoneId'), true);
        $restaurants = RestaurantLogic::get_restaurants($zone_id, $filter_data, $request['limit'], $request['offset'], $type, $name, $longitude, $latitude);
        $restaurants['restaurants'] = Helpers::restaurant_data_formatting($restaurants['restaurants'], true);

        return response()->json($restaurants, 200);
    }

    public function get_latest_restaurants(Request $request, $filter_data = "all")
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');
        $longitude = $request->header('longitude');
        $latitude = $request->header('latitude');
        $zone_id = json_decode($request->header('zoneId'), true);
        $restaurants = RestaurantLogic::get_latest_restaurants($zone_id, $request['limit'], $request['offset'], $type, $longitude, $latitude);
        $restaurants['restaurants'] = Helpers::restaurant_data_formatting($restaurants['restaurants'], true);

        return response()->json($restaurants['restaurants'], 200);
    }

    public function get_popular_restaurants(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $longitude = $request->header('longitude');
        $latitude = $request->header('latitude');
        $type = $request->query('type', 'all');
        $zone_id = json_decode($request->header('zoneId'), true);
        $restaurants = RestaurantLogic::get_popular_restaurants($zone_id, $request['limit'], $request['offset'], $type, $longitude, $latitude);
        $restaurants['restaurants'] = Helpers::restaurant_data_formatting($restaurants['restaurants'], true);

        return response()->json($restaurants['restaurants'], 200);
    }

    public function get_details($id)
    {
        $restaurant = RestaurantLogic::get_restaurant_details($id);
        if ($restaurant) {
            $category_ids = DB::table('food')
                ->join('categories', 'food.category_id', '=', 'categories.id')
                ->selectRaw('IF((categories.position = "0"), categories.id, categories.parent_id) as categories')
                ->where('food.restaurant_id', $id)
                ->where('categories.status', 1)
                ->groupBy('categories')
                ->get();
            // dd($category_ids->pluck('categories'));
            $restaurant = Helpers::restaurant_data_formatting($restaurant);
            $restaurant['category_ids'] = array_map('intval', $category_ids->pluck('categories')->toArray());
        }
        return response()->json($restaurant, 200);
    }

    public function get_searched_restaurants(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $type = $request->query('type', 'all');
        $longitude = $request->header('longitude');
        $latitude = $request->header('latitude');
        $zone_id = json_decode($request->header('zoneId'), true);
        $restaurants = RestaurantLogic::search_restaurants($request['name'], $zone_id, $request->category_id, $request['limit'], $request['offset'], $type, $longitude, $latitude);
        $restaurants['restaurants'] = Helpers::restaurant_data_formatting($restaurants['restaurants'], true);
        return response()->json($restaurants, 200);
    }

    public function reviews(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'restaurant_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $id = $request['restaurant_id'];


        $reviews = Review::with(['customer', 'food'])
            ->whereHas('food', function ($query) use ($id) {
                return $query->where('restaurant_id', $id);
            })
            ->active()->latest()->get();

        $storage = [];
        foreach ($reviews as $item) {
            $item['attachment'] = json_decode($item['attachment']);
            $item['food_name'] = null;
            $item['food_image'] = null;
            $item['customer_name'] = null;
            if ($item->food) {
                $item['food_name'] = $item->food->name;
                $item['food_image'] = $item->food->image;
                if (count($item->food->translations) > 0) {
                    $translate = array_column($item->food->translations->toArray(), 'value', 'key');
                    $item['food_name'] = $translate['name'];
                }
            }
            if ($item->customer) {
                $item['customer_name'] = $item->customer->f_name . ' ' . $item->customer->l_name;
            }

            unset($item['food']);
            unset($item['customer']);
            array_push($storage, $item);
        }

        return response()->json($storage, 200);
    }

    // public function get_product_rating($id)
    // {
    //     try {
    //         $product = Food::find($id);
    //         $overallRating = ProductLogic::get_overall_rating($product->reviews);
    //         return response()->json(floatval($overallRating[0]), 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['errors' => $e], 403);
    //     }
    // }


    public function create_store(Request $request)
    {
        // dd($request->bearerToken());
        // dd(Auth::user());
        $validator = Validator::make($request->all(), [
            'store_name'            => 'required',
            'store_logo'            => 'required',
            'store_cover_picture'   => 'required',
            'about'                 => 'required',
            'store_template'        => 'required',
            'color_for_store'       => 'required',
            'is_deactivated'        => 'required',
            // 'vendor_id'             => 'required|unique:restaurants',

        ]);
        // name	logo	cover_picture	about	store_template	color_for_store	is_deactivated

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
        
        $restaurant =  Restaurant::where('vendor_id', $vendor->id)->first();
        if(!empty($restaurant))
        {
            return response()->json([
                // "code" => 1,
                "status" => false,
                "message" => "Store already created"
            ], 200);
        }
        try {

            $logo = 'logo'.time().'.'.$request->store_logo->extension();  
            $request->store_logo->move(public_path('images'), $logo);

            $cover = 'cover'.time().'.'.$request->store_cover_picture->extension();  
            $request->store_cover_picture->move(public_path('images'), $cover);
            
            $createRestaurant =  new Restaurant();
            $createRestaurant->name = $request->store_name;
            $createRestaurant->logo  = $logo;
            $createRestaurant->cover_photo = $cover;
            $createRestaurant->about = $request->about;
            $createRestaurant->store_template = $request->store_template;
            $createRestaurant->color_for_store = $request->color_for_store;
            $createRestaurant->is_deactivated = $request->is_deactivated;
            $createRestaurant->vendor_id = $vendor->id;
            $createRestaurant->phone = $vendor->phone;
            $createRestaurant->save();

            if ($createRestaurant) {
                return response()->json([
                    // "code" => 1,
                    "status" => true,
                    "message" => "Store created Successfully",
                    "body"  => $createRestaurant
                ], 200);
            } else {
                return response()->json([
                    // "code" => 0,
                    "status" => false,
                    "message" => "Store Not created",
                ], 200);
            }
        } catch (\Exception $ex) {
            return response()->json([
                // "code" => 0,
                "status" => false,
                "message" => "Store Not created",
                "error" => $ex->getMessage()
            ], 200);
        }
    }

    public function get_all_stores(Request $request)
    {
        // $records = Restaurant::select(
        //     "restaurants.id",
        //     "name",
        //     "logo",
        //     "cover_picture",
        //     "about",
        //     "store_template",
        //     "color_for_store",
        //     "is_deactivated",
        //     "vendor_id",
        //     "vendors.l_name"
        // )->join("vendors", "vendors.id", "=", "restaurants.vendor_id")->get();
        $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
        $restaurant =  Restaurant::where('vendor_id', $vendor->id)->first();
        
        // foreach ($records as $record) {
            //     # code...
            //     $record->logo = asset('images/'.$record->logo);
            //     $record->cover_picture = asset('images/'.$record->cover_picture);
            
            // }
            
        if ($restaurant) {

            $restaurant->logo = asset('images/'.$restaurant->logo);
            $restaurant->cover_picture = asset('images/'.$restaurant->cover_photo);

            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => "Store Found Successfully",
                "body" => $restaurant
            ], 200);
        } else {
            return response()->json([
                // "code" => 0,
                "status" => false,
                "message" => "Store Not Found",
            ], 200);
        }
    }

    public function edit_store(Request $request, $id)
    {
        if (!$id) {
            return response()->json(['errors' => "User id is required"], 403);
        }

        $record = Restaurant::select(
            "name",
            "logo",
            "cover_picture",
            "about",
            "store_template",
            "color_for_store",
            "is_deactivated",
            "vendor_id",
        )->join("vendors", "vendors.id", "=", "restaurants.vendor_id")->where("restaurants.vendor_id", $id)->first();

        if ($record) {
            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => "Store Found Successfully",
                "body" => $record
            ], 200);
        } else {
            return response()->json([
                // "code" => 0,
                "status" => false,
                "message" => "Store Not Found",
            ], 200);
        }
    }

    public function update_store(Request $request, $id)
    {
        // dd(asset('images'));
        // $validator = Validator::make($request->all(), [
        //     'store_name'            => 'required',
        //     'store_logo'            => 'required',
        //     'store_cover_picture'   => 'required',
        //     'about'                 => 'required',
        //     'store_template'        => 'required',
        //     'color_for_store'       => 'required',
        //     'is_deactivated'        => 'required',
        //     // 'vendor_id'             => 'required|unique:restaurants',
        // ]);
        // dd($request->store_name);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        // }

        if (!$id) {
            return response()->json(['errors' => "Store id is required"], 403);
        }

        $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
        $update = Restaurant::where('vendor_id', $vendor->id)->first();

        $data = $request->all();
        unset($data['vendor']);
        unset($data['store_logo']);
        unset($data['store_cover_picture']);

        if($request->file('store_logo')){

            $logo = 'logo'.time().'.'.$request->store_logo->extension();  
            $request->store_logo->move(public_path('images'), $logo);
            $data['logo']  = $logo;
        }

        if($request->file('store_cover_picture')){

            $cover = 'cover'.time().'.'.$request->store_cover_picture->extension();  
            $request->store_cover_picture->move(public_path('images'), $cover);
            $data['cover_photo'] = $cover;

        }
        if($request->has('store_name'))
        {
            unset($data['store_name']);
            $data['name'] = $request->store_name;
            // dd($data);
        }
        // $update->about = $request->about;
        // $update->store_template = $request->store_template;
        // $update->color_for_store = $request->color_for_store;
        // $update->is_deactivated = $request->is_deactivated;
        // $update->vendor_id = $request->vendor_id;
        $update->update($data);

        if ($update) {
            return response()->json([
                // "code" => 1,
                "status" => true,
                "message" => "Store Updated Successfully",
            ], 201);
        } else {
            return response()->json([
                // "code" => 0,
                "status" => false,
                "message" => "Store Not Updated",
            ], 200);
        }
    }
}
