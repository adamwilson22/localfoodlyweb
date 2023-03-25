<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddOn;
use App\Models\Badge;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;
use Redirect;
use App\Models\Food;
use App\Models\Category;
use App\Models\Restaurant;

class ProductController extends Controller
{
    //

    public function index()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $products = [];
        if ($restaurant) {

            $products = Food::where('restaurant_id', $restaurant->id)->orderBy('position', 'asc')->orderBy('id', 'asc')->get();
            foreach ($products as $product) {
                $product->image = unserialize($product->image);
                $images = [];
                // foreach ($product->image as $img) {
                //     # code...
                //     $images[] = asset('images/'.$img);
                // }
                $product->image =  asset('public/images/' . $product->image[0]);
            }
        }

        // dd($products);
        return view('vendor-views.addon.products', compact('products'));
    }
    public function create_product(Request $request)
    {
        // dd($request->all());

        $rules = [
            "name"  => "required",
            "description" => "required",
            "images" => "required|",
            "images.*" => "image|mimes:jpeg,png,jpg,gif",
            "featureVideo" => "mimes:mp4,mov,ogg,qt|nullable",
            "featureImage" => "image|mimes:jpeg,png,jpg,gif|nullable",
            "category_id" => "required",
            "price" => "required",
            // "discount" => "required",
            // "available_time_starts" => "required",
            // "available_time_ends" => "required",
            // "restaurant_id" => "required",
            // "tax"=> "required",
            "product_type" => "required"
        ];


        // $create = [
        //     "name"                  => $request->name,
        //     "description"           => $request->description,
        //     "image"                 => $img ?? "",
        //     "category_id"           => $request->category_id,
        //     "price"                 => $request->price,
        //     "discount"              => $request->discount,
        //     "available_time_starts" => $request->available_time_starts,
        //     "available_time_ends"   => $request->available_time_ends,
        //     "restaurant_id"         => auth('vendor')->user()->id,
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
        //         "restaurant_id"             => auth('vendor')->user()->id,
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
        //         "restaurant_id"             => auth('vendor')->user()->id,
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
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data = $request->except('token', 'images', 'featureImage','options');
        // dd($data);
        $input = [];
        foreach ($data as $key => $value) {
            if (is_array($value)){
                if(!empty($data[$key])){
                    $input[$key] = implode(",", $value);
                }
            } else {
                $input[$key] = $value;
            }
        }
        // $input = $request->all();
        if ($request->has('images')) {

            $images = [];
            foreach ($request->file('images') as $imagefile) {

                $img = 'prods' . time() . '.' . $imagefile->getClientOriginalName();
                $imagefile->move(public_path('images'), $img);

                array_push($images, $img);
                // $images[]= $imagefile->getClientOriginalName();
            }
            $img = serialize($images);
            $input['image'] = $img;
        }
        
        $featureImage = "";
        if ($request->hasfile("featureImage")) {
            $file = $request->featureImage;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $featureImage  = asset("images/" . $file_name);
        }

        $featureVideo = "";
        if ($request->hasfile("featureVideo")) {
            $file = $request->featureVideo;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $featureVideo  = asset("images/" . $file_name);
        }

        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();

        $input['restaurant_id'] = $restaurant->id;
        // $input['image'] = $img;
        
        // *********************** Hassan Code - Food Variations ***********************
        // $variations = [];
        // foreach(array_values($request->variation) as $key=>$option)
        // {
        //     // dd($request->variation);
        //     $temp_value = [];
        //     // dd($option);
            
        //     if(isset($option['label'])){
        //         $temp_option['label'] = $option['label'];
        //     }
        //     $temp_option['price'] = $option['price'];
        //     array_push($temp_value,$temp_option);
            
        //     $temp_variation['values']= $temp_value;
        //     array_push($variations,$temp_variation);
        // }

        // *********************** Hassan Code - Food Variations ***********************
        $variations = [];
        if(isset($request->options))
        {
            foreach(array_values($request->options) as $key=>$option)
            {

                $temp_variation['name']= $option['name'];
                // $temp_variation['type']= $option['type'];
                // $temp_variation['min']= $option['min'] ?? 0;
                // $temp_variation['max']= $option['max'] ?? 0;
                $temp_variation['required']= $option['required']??'off';
                // if($option['min'] > 0 &&  $option['min'] > $option['max']  ){
                //     $validator->getMessageBag()->add('name', translate('messages.minimum_value_can_not_be_greater_then_maximum_value'));
                //     return response()->json(['errors' => Helpers::error_processor($validator)]);
                // }
                if(!isset($option['values'])){
                    $validator->getMessageBag()->add('name', translate('messages.please_add_options_for').$option['name']);
                    return response()->json(['errors' => Helpers::error_processor($validator)]);
                }

                // dd($option['max'] > count($option['values']));
                // if($option['max'] > count($option['values'])  ){
                //     $validator->getMessageBag()->add('name', translate('messages.please_add_more_options_or_change_the_max_value_for').$option['name']);
                //     // return response()->json(['errors' => Helpers::error_processor($validator)]);
                //     // return Redirect('Vendor-panel/addon/products')->with([
                //     //     "code"      => 0,
                //     //     'message'   => "Please add more options or change the max value",
                //     //     "status"    => false
                //     // ]);
                //     return redirect()->back()->withInput();
                // }
                $temp_value = [];

                foreach(array_values($option['values']) as $value)
                {
                    if(isset($value['label'])){
                        $temp_option['label'] = $value['label'];
                    }
                    $temp_option['optionPrice'] = $value['optionPrice'];
                    array_push($temp_value,$temp_option);
                }
                $temp_variation['values']= $temp_value;
                array_push($variations,$temp_variation);
            }
        }
        // dd(json_encode($variations));
        //combinations end
        $input['variations'] = json_encode($variations);
        $input['feature_image'] = $featureImage;
        $input['feature_video'] = $featureVideo;
        $input['add_ons'] = $request->has('add_ons') ? json_encode($request->add_ons) : json_encode([]);
        $input['badges'] = $request->has('Badge') ? json_encode($request->Badge) : json_encode([]);
        $insert = Food::create($input);
        // dd($input);
        if ($insert) {
            return Redirect('vendor-panel/addon/products')->with([
                "message" => "Product Created Successfully",
                "code"      => 1,
                "status"    => true
            ]);
        } else {
            // return Redirect('Vendor-panel/addon/products')->with([
            //     "code"      => 0,
            //     'message'   => "Product Not Created",
            //     "status"    => false
            // ]);
            return redirect()->back()->withInput()->with([
                    "code"      => 0,
                    'message'   => "Product Not Created",
                    "status"    => false
                ]);
        }
    }

    public function show($id)
    {
        $product = Food::where('id', $id)->first();
        $addon = AddOn::where('restaurant_id', $product->restaurant_id)->get();
        // dd($addon);
        $product->image = unserialize($product->image);
        $images = [];
        foreach ($product->image as $img) {
            # code...
            $images[] = asset('public/images/' . $img);
            // $x =str_replace(" ", "%20", asset('public/images/' . $img));
            // $mimetype[] = mime_content_type('http://testapp.thesuitchstaging.com/public/images/prods1677017460.Customer%20Signup.webm');
        }
        $product->image = $images;
        $badges = Badge::where('restaurant_id', $product->restaurant_id)->orderBy('name')->get();
        // dd($badges) ;
        return view('vendor-views.addon.product-detail', compact('product','addon','badges'));

        // dd(strstr($mimetype, "video/"));
    }

    public function edit($id)
    {
        $product = Food::where('id', $id)->first(); 
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $addon = AddOn::where('restaurant_id', $restaurant->id)->orderBy('name')->paginate(config('default_pagination'));
        $badges = Badge::where('restaurant_id', $restaurant->id)->orderBy('name')->paginate(config('default_pagination'));
        $product->image = unserialize($product->image);
        $images = [];
        // $imageName = [];
        foreach ($product->image as $key => $img) {
            # code...
            $images[$key]['link'] = asset('public/images/' . $img);
            $images[$key]['name'] = $img;
        }
        $product->image = $images;
        // dd($product->image);
        $category = Category::all();
        $ingredients = explode(",", $product->ingredients);
        $allergens = explode(",", $product->allergens);
        $related_tags = explode(",", $product->related_tags);
        // dd ($related_tags);
        // dd($product);

        if ($product->product_type != "preorder") {
            # code...
            return view('vendor-views.product.edit', compact('product', 'category', 'ingredients', 'allergens', 'related_tags', 'addon', 'badges'));
        } else {
            return view('vendor-views.product.edit2', compact('product', 'category', 'ingredients', 'allergens', 'related_tags', 'addon', 'badges'));
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

        $rules = [
            "name"  => "required",
            "description" => "required",
            // "images" => "required|",
            // "images.*" => "image|mimes:jpeg,png,jpg,gif",
            "featureVideo" => "mimes:mp4,mov,ogg,qt|nullable",
            "featureImage" => "image|mimes:jpeg,png,jpg,gif|nullable",
            "category_id" => "required",
            "price" => "required",
            // "discount" => "required",
            // "available_time_starts" => "required",
            // "available_time_ends" => "required",
            // "restaurant_id" => "required",
            // "tax"=> "required",
            "product_type" => "required"
        ];
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

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            dd(Helpers::error_processor($validator));
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $data = $request->except('vendor', 'options');
        $images = [];
        $input = [];
        foreach ($data as $key => $value) {
            if (is_array($value))
            $input[$key] = implode(",", $value);
            else
                $input[$key] = $value;
        }
            // dd($request->all());

        if ($request->has('oldimages')) {
            $product = Food::where('id', $id)->first();
            $product->image = unserialize($product->image);
            $product->image = array_diff($product->image, $request->oldimages);
            foreach ($product->image as $key => $img) {
                $images[] = $img;
            }
        }
        // dd('stop');
        if ($request->has('images')) {

            // $images = [];
            foreach ($request->file('images') as $imagefile) {

                $img = 'prods' . time() . '.' . $imagefile->getClientOriginalName();
                $imagefile->move(public_path('images'), $img);

                // $images[]= $imagefile->getClientOriginalName();
                array_push($images, $img);
            }
            $img = serialize($images);
            // dd($img);
            $input['image'] = $img;
        }
        
        $featureImage = "";
        if ($request->hasfile("featureImage")) {
            $file = $request->featureImage;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $featureImage  = asset("images/" . $file_name);
        }
        
        $variations = [];
        if(isset($request->options))
        {
            foreach(array_values($request->options) as $key=>$option)
            {

                $temp_variation['name']= $option['name'];
                // $temp_variation['type']= $option['type'];
                // $temp_variation['min']= $option['min'] ?? 0;
                // $temp_variation['max']= $option['max'] ?? 0;
                $temp_variation['required']= $option['required']??'off';
                // if($option['min'] > 0 &&  $option['min'] > $option['max']  ){
                //     $validator->getMessageBag()->add('name', translate('messages.minimum_value_can_not_be_greater_then_maximum_value'));
                //     return response()->json(['errors' => Helpers::error_processor($validator)]);
                // }
                if(!isset($option['values'])){
                    $validator->getMessageBag()->add('name', translate('messages.please_add_options_for').$option['name']);
                    return response()->json(['errors' => Helpers::error_processor($validator)]);
                }

                // dd($option['max'] > count($option['values']));
                // if($option['max'] > count($option['values'])  ){
                //     $validator->getMessageBag()->add('name', translate('messages.please_add_more_options_or_change_the_max_value_for').$option['name']);
                //     // return response()->json(['errors' => Helpers::error_processor($validator)]);
                //     // return Redirect('Vendor-panel/addon/products')->with([
                //     //     "code"      => 0,
                //     //     'message'   => "Please add more options or change the max value",
                //     //     "status"    => false
                //     // ]);
                //     return redirect()->back()->withInput();
                // }
                $temp_value = [];

                foreach(array_values($option['values']) as $value)
                {
                    if(isset($value['label'])){
                        $temp_option['label'] = $value['label'];
                    }
                    $temp_option['optionPrice'] = $value['optionPrice'];
                    array_push($temp_value,$temp_option);
                }
                $temp_variation['values']= $temp_value;
                array_push($variations,$temp_variation);
            }
        }
        // dd(json_encode($variations));
        //combinations end
        $input['variations'] = json_encode($variations);
        $input['feature_image'] = $featureImage;
        $input['add_ons'] = $request->has('add_ons') ? json_encode($request->add_ons) : json_encode([]);
        $input['badges'] = $request->has('Badge') ? json_encode($request->Badge) : json_encode([]);
        $update = Food::where("id", $id)->first();
        
        $update->update($input);
        if ($update) {
            return Redirect('vendor-panel/addon/products')->with([
                "message" => "Product Updated Successfully",
                "code"      => 1,
                "status"    => true
            ]);
        } else {
            return Redirect('Vendor-panel/addon/products')->with([
                "code"      => 0,
                'message'   => "Product Not Updated",
                "status"    => false
            ]);
        }
    }

    public function sort(Request $request)
    {
        
        $ids = explode(',', $request->input('ids'));
        $position = 0;
        foreach ($ids as $id) {
            Food::where('id', $id)->update(['position' => $position]);
            $position++;
        }
        return response()->json(['success' => true]);
    }
}
