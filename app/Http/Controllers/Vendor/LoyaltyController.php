<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\CentralLogics\Helpers;
use App\Models\Food;
use Carbon\Carbon;
class LoyaltyController extends Controller
{
    public function index()
    {
        $silverProducts = "";
        $bronzeProducts = "";
        $goldProducts = "";

        // Bronze Category
        $checkBronzeCategoryProductExists = DB::table('loyalty_point_vendor')
        ->where('category_id', 1)
        ->where('restaurant_id', Helpers::get_restaurant_id())
        ->first();
        // dd($checkBronzeCategoryProductExists);

        if ($checkBronzeCategoryProductExists !== null) {
            $productIds = json_decode($checkBronzeCategoryProductExists->product_ids);
            
            $bronzeProducts = Food::where('restaurant_id', Helpers::get_restaurant_id())
            ->whereIn('id', $productIds)
            ->select('id', 'name', 'description', 'image')
            ->get();    
            
            foreach($bronzeProducts as $product){
                $product->image = unserialize($product->image);
                $product->image =  asset('public/images/' . $product->image[0]);
            }
        }

        // Silver Category
        $checkSilverCategoryProductExists = DB::table('loyalty_point_vendor')
        ->where('category_id', 2)
        ->where('restaurant_id', Helpers::get_restaurant_id())
        ->first();

        if ($checkSilverCategoryProductExists !== null) {
            dd('hassan');
            $productIds = json_decode($checkSilverCategoryProductExists->product_ids);

            $silverProducts = Food::where('restaurant_id', Helpers::get_restaurant_id())
            ->whereIn('id', $productIds)
            ->select('id', 'name', 'description', 'image')
            ->get();    
            
            foreach($silverProducts as $product){
                $product->image = unserialize($product->image);
                $product->image =  asset('public/images/' . $product->image[0]);
            }
        }

        // Gold Category
        $checkGoldCategoryProductExists = DB::table('loyalty_point_vendor')
        ->where('category_id', 3)
        ->where('restaurant_id', Helpers::get_restaurant_id())
        ->first();

        if ($checkGoldCategoryProductExists !== null) {
            $productIds = json_decode($checkGoldCategoryProductExists->product_ids);
            
            $goldProducts = Food::where('restaurant_id', Helpers::get_restaurant_id())
            ->whereIn('id', $productIds)
            ->select('id', 'name', 'description', 'image')
            ->get();    
            
            foreach($goldProducts as $product){
                $product->image = unserialize($product->image);
                $product->image =  asset('public/images/' . $product->image[0]);
            }
        }

        return view('vendor-views.loyalty.index', compact('checkBronzeCategoryProductExists', 'bronzeProducts', 
                                                        'checkSilverCategoryProductExists', 'silverProducts', 
                                                        'checkGoldCategoryProductExists', 'goldProducts'));
    }

    public function get_products(){
        $customerDetails = DB::table('food')
                 ->where('restaurant_id', Helpers::get_restaurant_id())
                 ->select('id','name','price')
                 ->orderBy('price', 'desc')
                 ->get();

        // dd($customerDetails);

        return $customerDetails;
    }

    public function get_selected_products(Request $request)
    {
        $products = []; // Initialize an empty array

        foreach ($request->productIDs as $key=>$value) {
            $products = Food::where('restaurant_id', Helpers::get_restaurant_id())
            ->whereIn('id', $request->productIDs)
            ->orderBy('position', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        }

        foreach ($products as $product) {
            $product->image = unserialize($product->image);
            $images = [];
            $product->image =  asset('public/images/' . $product->image[0]);
        }
        // dd($products);

        return $products;
    }

    public function save_products_data(Request $request){
        // dd($request);

        $event = '';
        $currentDateTime = Carbon::now();
        
        if($request->loyaltyCategory == "bronze"){
            $catID = 1;
        }
        elseif($request->loyaltyCategory == "silver"){
            $catID = 2;
        }
        elseif($request->loyaltyCategory == "gold"){
            $catID = 3;
        }

        // dd($request->loyaltyCategory . "CAT ID : " . $catID);
        
        $loyaltyCategoryFound = DB::table('loyalty_point_vendor')
        ->where('category_id', $catID)
        ->where('restaurant_id', Helpers::get_restaurant_id())
        ->get();

        if (count($loyaltyCategoryFound) > 0) {
            $event = 'updated';

            DB::table('loyalty_point_vendor')
                ->where('category_id', $catID)
                ->where('restaurant_id', Helpers::get_restaurant_id())
                ->update([
                    'category_point' => $request->categoryPoints,
                    'product_ids' => json_encode($request->productIDs),
                    'updated_at' => $currentDateTime
                ]);
        } else {
            $event = 'inserted';

            DB::table('loyalty_point_vendor')->insert([
                'restaurant_id' => Helpers::get_restaurant_id(),
                'category_id' => $catID,
                'category_point' => $request->categoryPoints,
                'product_ids' => json_encode($request->productIDs),
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime
            ]);
        }
        
        return Redirect('vendor-panel/addon/customer')->with([
            'message' => "Loyalty Points . $event . Successfully",
            'code' => 1,
            'status' => true,
        ]);
    }
}