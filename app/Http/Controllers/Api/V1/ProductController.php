<?php

namespace App\Http\Controllers\Api\V1;

use App\CentralLogics\Helpers;
use App\CentralLogics\ProductLogic;
use App\CentralLogics\RestaurantLogic;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Vendor;
use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function get_latest_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'restaurant_id' => 'required',
            'category_id' => 'required',
            'limit' => 'required',
            'offset' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $type = $request->query('type', 'all');

        $products = ProductLogic::get_latest_products($request['limit'], $request['offset'], $request['restaurant_id'], $request['category_id'], $type);
        $products['products'] = Helpers::product_data_formatting($products['products'], true, false, app()->getLocale());
        return response()->json($products, 200);
    }

    public function get_searched_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $zone_id= json_decode($request->header('zoneId'), true);

        $key = explode(' ', $request['name']);

        $limit = $request['limit']??10;
        $offset = $request['offset']??1;

        $type = $request->query('type', 'all');

        $products = Food::active()->type($type)
        ->whereHas('restaurant', function($q)use($zone_id){
            $q->whereIn('zone_id', $zone_id);
        })
        ->when($request->category_id, function($query)use($request){
            $query->whereHas('category',function($q)use($request){
                return $q->whereId($request->category_id)->orWhere('parent_id', $request->category_id);
            });
        })
        ->when($request->restaurant_id, function($query) use($request){
            return $query->where('restaurant_id', $request->restaurant_id);
        })
        ->where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })
        ->paginate($limit, ['*'], 'page', $offset);

        $data =  [
            'total_size' => $products->total(),
            'limit' => $limit,
            'offset' => $offset,
            'products' => $products->items()
        ];

        $data['products'] = Helpers::product_data_formatting($data['products'], true, false, app()->getLocale());
        return response()->json($data, 200);
    }

    public function get_popular_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');

        $zone_id= json_decode($request->header('zoneId'), true);
        $products = ProductLogic::popular_products($zone_id, $request['limit'], $request['offset'], $type);
        $products['products'] = Helpers::product_data_formatting($products['products'], true, false, app()->getLocale());
        return response()->json($products, 200);
    }

    public function get_most_reviewed_products(Request $request)
    {
        if (!$request->hasHeader('zoneId')) {
            $errors = [];
            array_push($errors, ['code' => 'zoneId', 'message' => translate('messages.zone_id_required')]);
            return response()->json([
                'errors' => $errors
            ], 403);
        }

        $type = $request->query('type', 'all');

        $zone_id= json_decode($request->header('zoneId'), true);
        $products = ProductLogic::most_reviewed_products($zone_id, $request['limit'], $request['offset'], $type);
        $products['products'] = Helpers::product_data_formatting($products['products'], true, false, app()->getLocale());
        return response()->json($products, 200);
    }

    public function get_product($id)
    {

        try {
            $product = ProductLogic::get_product($id);
            $product = Helpers::product_data_formatting($product, false, false, app()->getLocale());
            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => ['code' => 'product-001', 'message' => translate('messages.not_found')]
            ], 404);
        }
    }

    public function get_related_products($id)
    {
        if (Food::find($id)) {
            $products = ProductLogic::get_related_products($id);
            $products = Helpers::product_data_formatting($products, true, false, app()->getLocale());
            return response()->json($products, 200);
        }
        return response()->json([
            'errors' => ['code' => 'product-001', 'message' => translate('messages.not_found')]
        ], 404);
    }

    public function get_set_menus()
    {
        try {
            $products = Helpers::product_data_formatting(Food::active()->with(['rating'])->where(['set_menu' => 1, 'status' => 1])->get(), true, false, app()->getLocale());
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => ['code' => 'product-001', 'message' => 'Set menu not found!']
            ], 404);
        }
    }

    public function get_product_reviews($food_id)
    {
        $reviews = Review::with(['customer', 'food'])->where(['food_id' => $food_id])->active()->get();

        $storage = [];
        foreach ($reviews as $item) {
            $item['attachment'] = json_decode($item['attachment']);
            $item['food_name'] = null;
            if($item->food)
            {
                $item['food_name'] = $item->food->name;
                if(count($item->food->translations)>0)
                {
                    $translate = array_column($item->food->translations->toArray(), 'value', 'key');
                    $item['food_name'] = $translate['name'];
                }
            }

            unset($item['food']);
            array_push($storage, $item);
        }

        return response()->json($storage, 200);
    }

    public function get_product_rating($id)
    {
        try {
            $product = Food::find($id);
            $overallRating = ProductLogic::get_overall_rating($product->reviews);
            return response()->json(floatval($overallRating[0]), 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
    }

    public function submit_product_review(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
            'order_id' => 'required',
            'comment' => 'required',
            'rating' => 'required|numeric|max:5',
        ]);

        $product = Food::find($request->food_id);
        if (isset($product) == false) {
            $validator->errors()->add('food_id', translate('messages.food_not_found'));
        }

        $multi_review = Review::where(['food_id' => $request->food_id, 'user_id' => $request->user()->id, 'order_id'=>$request->order_id])->first();
        if (isset($multi_review)) {
            return response()->json([
                'errors' => [
                    ['code'=>'review','message'=> translate('messages.already_submitted')]
                ]
            ], 403);
        } else {
            $review = new Review;
        }

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $image_array = [];
        if (!empty($request->file('attachment'))) {
            foreach ($request->file('attachment') as $image) {
                if ($image != null) {
                    if (!Storage::disk('public')->exists('review')) {
                        Storage::disk('public')->makeDirectory('review');
                    }
                    array_push($image_array, Storage::disk('public')->put('review', $image));
                }
            }
        }

        $review->user_id = $request->user()->id;
        $review->food_id = $request->food_id;
        $review->order_id = $request->order_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->attachment = json_encode($image_array);
        $review->save();

        if($product->restaurant)
        {
            $restaurant_rating = RestaurantLogic::update_restaurant_rating($product->restaurant->rating, (int)$request->rating);
            $product->restaurant->rating = $restaurant_rating;
            $product->restaurant->save();
        }

        $product->rating = ProductLogic::update_rating($product->rating, (int)$request->rating);
        $product->avg_rating = ProductLogic::get_avg_rating(json_decode($product->rating, true));
        $product->save();
        $product->increment('rating_count');

        return response()->json(['message' => translate('messages.review_submited_successfully')], 200);
    }

    public function create_product(Request $request)
    {
        // dd($request->all());
        $rules = [
            "name"  => "required",
            "description" => "required",	
            "images" => "required",
            "category_id" => "required",
            "price" => "required",
            "product_type" => "required" 
            // "discount" => "required",
            // "available_time_starts" => "required",
            // "available_time_ends" => "required",
            // "restaurant_id" => "required",
            // "tax"=> "required",
        ];
        // $images = [];
        // foreach ($request->file('images') as $imagefile) {
            
        //     $img = 'prod'.time().'.'.$imagefile->getClientOriginalName();  
        //     // dd(public_path('images'));
        //     $imagefile->move(public_path('images'), $img);

        //     // $images[]= $imagefile->getClientOriginalName();
        //     array_push($images, $img);
        //   }
        //   $img = serialize($images);
        // dd($images );


        // $create = [
        //     "name"                  => $request->name,
        //     "description"           => $request->description,	
        //     "image"                 => $img,
        //     "category_id"           => $request->category_id,
        //     "price"                 => $request->price,
        //     "discount"              => $request->discount,
        //     "available_time_starts" => $request->available_time_starts,
        //     "available_time_ends"   => $request->available_time_ends,
        //     "restaurant_id"         => $request->restaurant_id,
        //     "tax"                   => $request->tax,
        //     "product_type"          => $request->product_type,
        // ];


        // if($request->product_type == 1)
        // {
        //     $rules = [
        //         "name"  => "required|unique:food",
        //         "description" => "required",	
        //         // "image" => "required",
        //         "category_id" => "required",
        //         "price" => "required",
        //         "discount" => "required",
        //         "available_time_starts" => "required",
        //         "available_time_ends" => "required",
        //         "restaurant_id" => "required",
        //         "tax"=> "required",
        //         "product_type" => "required",
        //         "fulfillment_date" => "required",
        //         "fulfillment_time" => "required",
        //         "pre_order_end_date" => "required",
        //         "pre_order_end_time" => "required",
        //         "fulfillment_type" => "required",
        //         "pre_order_quantity_limit" => "required"
        //     ];

        //     $create = [
        //         "name"                      => $request->name,
        //         "description"               => $request->description,	
        //         "image"                     => $img,
        //         "category_id"               => $request->category_id,
        //         "price"                     => $request->price,
        //         "discount"                  => $request->discount,
        //         "available_time_starts"     => $request->available_time_starts,
        //         "available_time_ends"       => $request->available_time_ends,
        //         "restaurant_id"             => $request->restaurant_id,
        //         "tax"                       => $request->tax,
        //         "product_type"              => $request->product_type,
        //         "fulfillment_date"          => $request->fulfillment_date,
        //         "fulfillment_time"          => $request->fulfillment_time,
        //         "pre_order_end_date"        => $request->pre_order_end_date,
        //         "pre_order_end_time"        => $request->pre_order_end_time,
        //         "fulfillment_type"          => $request->fulfillment_type,
        //         "pre_order_quantity_limit"  => $request->pre_order_quantity_limit
        //     ];
        // }

        // if($request->product_type == 2 || $request->product_type == 4)
        // {
        //     $rules = [
        //         "name"  => "required|unique:food",
        //         "description" => "required",	
        //         // "image" => "required",
        //         "category_id" => "required",
        //         "price" => "required",
        //         "discount" => "required",
        //         "available_time_starts" => "required",
        //         "available_time_ends" => "required",
        //         "restaurant_id" => "required",
        //         "tax"=> "required",
        //         "product_type" => "required",
        //         "fulfillment_date" => "required",
        //         "fulfillment_time" => "required",
        //         "pre_order_end_date" => "required",
        //         "pre_order_end_time" => "required",
        //         "fulfillment_type" => "required",
        //         "pre_order_quantity_limit" => "required",
        //         "add_ons" => "required",
        //         "ingredients" => "required",
        //         "allergens" => "required",
        //         "unit" => "required",
        //         "serves" => "required",
        //         "labels" => "required",
        //         "related_tags" => "required",
        //         "in_stock" => "required"
        //     ];

        //     $create = [
        //         "name"                      => $request->name,
        //         "description"               => $request->description,	
        //         "image"                     => $img,
        //         "category_id"               => $request->category_id,
        //         "price"                     => $request->price,
        //         "discount"                  => $request->discount,
        //         "available_time_starts"     => $request->available_time_starts,
        //         "available_time_ends"       => $request->available_time_ends,
        //         "restaurant_id"             => $request->restaurant_id,
        //         "tax"                       => $request->tax,
        //         "product_type"              => $request->product_type,
        //         "fulfillment_date"          => $request->fulfillment_date,
        //         "fulfillment_time"          => $request->fulfillment_time,
        //         "pre_order_end_date"        => $request->pre_order_end_date,
        //         "pre_order_end_time"        => $request->pre_order_end_time,
        //         "fulfillment_type"          => $request->fulfillment_type,
        //         "pre_order_quantity_limit"  => $request->pre_order_quantity_limit,
        //         "add_ons"                   => $request->add_ons,
        //         "ingredients"               => $request->ingredients,
        //         "allergens"                 => $request->allergens,
        //         "unit"                      => $request->unit,
        //         "serves"                    => $request->serves,
        //         "labels"                    => $request->labels,
        //         "related_tags"              => $request->related_tags,
        //         "in_stock"                  => $request->in_stock
        //     ];
        // }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $data = $request->all();
        $input = [];
        foreach ($data as $key => $value) {
            if(is_array($value))
            $input[$key] = implode(",",$value);
            else
            $input[$key] = $value;
        }
        // $input = $request->all();
        if ($request->has('images')) {
            
        $images = [];
        foreach ($request->file('images') as $imagefile) {
            
            $img = 'prods'.time().'.'.$imagefile->getClientOriginalName();  
            $imagefile->move(public_path('images'), $img);

            // $images[]= $imagefile->getClientOriginalName();
            array_push($images, $img);
        }
        $img = serialize($images);
        $input['image'] = $img;
        }
        
        $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
        $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();

        $input['restaurant_id'] = $restaurant->id;
        // $input['image'] = $img;
        $insert = Food::create($input);

        if($insert)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "Product Created Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Product Not Created"
            ], 200);
        }
    }

    public function get_all_products(Request $request)
    {
        // $records = Food::all();
        // foreach ($records as $record) {
        //     # code...
        //     $record->image = unserialize($record->image);
        //     $images = []; 
        //     foreach ($record->image as $img) {
        //         # code...
        //         $images[] = asset('images/'.$img);
        //     }
        //     $record->image = $images;
        // }
        try{
        $vendor = Vendor::where('auth_token', $request->bearerToken())->first();
        $restaurant = Restaurant::where('vendor_id', $vendor->id)->first();
        $images = [];
        $products = Food::where('restaurant_id', $restaurant->id)->where('status', 1)->get();
        foreach ($products as $product) {
            $unserialize_imgs = unserialize($product->image);
            foreach($unserialize_imgs as $image)            
            {
                $images[] =  asset('public/images/'.$image);
            }
            $product->image = $images;
            $images = [];
        }
        if($products)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message'   => "Products Found",
                "body" => $products
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Products Not Found"
            ], 200);
        }
    }catch (\Exception $e) {
        return response()->json([
                "status"    => false,
                'message'   => "Unable to get products"
        ], 404);
    }

    }

    public function get_product_for_edit(Request $request, $id)
    {
        $record = Food::where("id",$id)->first();
        $record->image = unserialize($record->image);
        $images = []; 
        foreach ($record->image as $img) {
            # code...
            $images[] = asset('public/images/'.$img);
        }
        $record->image = $images;

        if($record)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message'   => "Product Found",
                "body" => $record
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Product Not Found"
            ], 200);
        }
    }

    public function update_product(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     "name"  => "required",
        //     "description" => "required",	
        //     "image" => "required",
        //     "category_id" => "required",
        //     "price" => "required",
        //     "discount" => "required",
        //     "restaurant_id" => "required",
        //     "tax"=> "required",
        // ]);

        // $rules = [
        //     "name"  => "required",
        //     "description" => "required",	
        //     "images" => "required",
        //     "category_id" => "required",
        //     "price" => "required",
        //     "product_type" => "required" 
        //     // "discount" => "required",
        //     // "available_time_starts" => "required",
        //     // "available_time_ends" => "required",
        //     // "restaurant_id" => "required",
        //     // "tax"=> "required",
        // ];
        // $images = [];
        // foreach ($request->file('images') as $imagefile) {
            
        //     $img = 'prod'.time().'.'.$imagefile->getClientOriginalName();  
        //     $imagefile->move(public_path('images'), $img);

        //     // $images[]= $imagefile->getClientOriginalName();
        //     array_push($images, $img);
        //   }
        //   $img = serialize($images);
        // dd($images );


        // $update = [
        //     "name"                  => $request->name,
        //     "description"           => $request->description,	
        //     "image"                 => $img,
        //     "category_id"           => $request->category_id,
        //     "price"                 => $request->price,
        //     "discount"              => $request->discount,
        //     "available_time_starts" => $request->available_time_starts,
        //     "available_time_ends"   => $request->available_time_ends,
        //     "restaurant_id"         => $request->restaurant_id,
        //     "tax"                   => $request->tax,
        //     "product_type"          => $request->product_type,
        // ];


        // if($request->product_type == 1)
        // {
        //     $rules = [
        //         // "name"  => "required|unique:food",
        //         "description" => "required",	
        //         // "image" => "required",
        //         "category_id" => "required",
        //         "price" => "required",
        //         "discount" => "required",
        //         "available_time_starts" => "required",
        //         "available_time_ends" => "required",
        //         "restaurant_id" => "required",
        //         "tax"=> "required",
        //         "product_type" => "required",
        //         "fulfillment_date" => "required",
        //         "fulfillment_time" => "required",
        //         "pre_order_end_date" => "required",
        //         "pre_order_end_time" => "required",
        //         "fulfillment_type" => "required",
        //         "pre_order_quantity_limit" => "required"
        //     ];

        //     $update = [
        //         "name"                      => $request->name,
        //         "description"               => $request->description,	
        //         "image"                     => $img,
        //         "category_id"               => $request->category_id,
        //         "price"                     => $request->price,
        //         "discount"                  => $request->discount,
        //         "available_time_starts"     => $request->available_time_starts,
        //         "available_time_ends"       => $request->available_time_ends,
        //         "restaurant_id"             => $request->restaurant_id,
        //         "tax"                       => $request->tax,
        //         "product_type"              => $request->product_type,
        //         "fulfillment_date"          => $request->fulfillment_date,
        //         "fulfillment_time"          => $request->fulfillment_time,
        //         "pre_order_end_date"        => $request->pre_order_end_date,
        //         "pre_order_end_time"        => $request->pre_order_end_time,
        //         "fulfillment_type"          => $request->fulfillment_type,
        //         "pre_order_quantity_limit"  => $request->pre_order_quantity_limit
        //     ];
        // }

        // if($request->product_type == 2 || $request->product_type == 4)
        // {
        //     $rules = [
        //         // "name"  => "required|unique:food",
        //         "description" => "required",	
        //         // "image" => "required",
        //         "category_id" => "required",
        //         "price" => "required",
        //         "discount" => "required",
        //         "available_time_starts" => "required",
        //         "available_time_ends" => "required",
        //         "restaurant_id" => "required",
        //         "tax"=> "required",
        //         "product_type" => "required",
        //         "fulfillment_date" => "required",
        //         "fulfillment_time" => "required",
        //         "pre_order_end_date" => "required",
        //         "pre_order_end_time" => "required",
        //         "fulfillment_type" => "required",
        //         "pre_order_quantity_limit" => "required",
        //         "add_ons" => "required",
        //         "ingredients" => "required",
        //         "allergens" => "required",
        //         "unit" => "required",
        //         "serves" => "required",
        //         "labels" => "required",
        //         "related_tags" => "required",
        //         "in_stock" => "required"
        //     ];

        //     $update = [
        //         "name"                      => $request->name,
        //         "description"               => $request->description,	
        //         "image"                     => $img,
        //         "category_id"               => $request->category_id,
        //         "price"                     => $request->price,
        //         "discount"                  => $request->discount,
        //         "available_time_starts"     => $request->available_time_starts,
        //         "available_time_ends"       => $request->available_time_ends,
        //         "restaurant_id"             => $request->restaurant_id,
        //         "tax"                       => $request->tax,
        //         "product_type"              => $request->product_type,
        //         "fulfillment_date"          => $request->fulfillment_date,
        //         "fulfillment_time"          => $request->fulfillment_time,
        //         "pre_order_end_date"        => $request->pre_order_end_date,
        //         "pre_order_end_time"        => $request->pre_order_end_time,
        //         "fulfillment_type"          => $request->fulfillment_type,
        //         "pre_order_quantity_limit"  => $request->pre_order_quantity_limit,
        //         "add_ons"                   => $request->add_ons,
        //         "ingredients"               => $request->ingredients,
        //         "allergens"                 => $request->allergens,
        //         "unit"                      => $request->unit,
        //         "serves"                    => $request->serves,
        //         "labels"                    => $request->labels,
        //         "related_tags"              => $request->related_tags,
        //         "in_stock"                  => $request->in_stock
        //     ];
        // }

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        // }

        $data = $request->except('vendor');
        $input = [];
        foreach ($data as $key => $value) {
            if(is_array($value))
            $input[$key] = implode(",",$value);
            else
            $input[$key] = $value;
        }
        // Product Images work Start
        $images = [];
        $product = Food::where('id', $id)->first();
        $product->image = unserialize($product->image);
        
        if($request->has('deleted_images')){
            $product->image = array_diff($product->image, $request->deleted_images);
        }

        foreach ($product->image as $key => $img) {
            $images[] = $img; 
        }

        if ($request->has('images')) {
        foreach ($request->file('images') as $imagefile) {
            
            $img = 'prods'.time().'.'.$imagefile->getClientOriginalName();  
            $imagefile->move(public_path('images'), $img);
            array_push($images, $img);
        }
        }
        $new_images = serialize($images);
        $input['image'] = $new_images;
        
        // Product Images work End
        $update = Food::where("id", $id)->first();
        $update->update($input);
        if($update)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "Product Updated Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Product Not Updated"
            ], 200);
        }
    }

    public function delete_product($id)
    {
        $product = Food::where('id', $id)->first();
        $product->status = 0;
        $product->update();
    
        if($product)
        {
            return response()->json([
                // "code" => 1,
                "status"    => true,
                'message' => "Product Deleted Successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                // "code"      => 0,
                "status"    => false,
                'message'   => "Product Not Updated"
            ], 200);
        }
    }
    
}
