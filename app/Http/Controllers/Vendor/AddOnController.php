<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\AddOn;
use App\Models\Restaurant;
use App\Models\Food;
use App\Models\Badge;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\Models\Translation;
use App\Models\Category;


class AddOnController extends Controller
{
    public function index()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $addons = AddOn::where('restaurant_id', $restaurant->id)->orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.index', compact('addons'));
    }

    public function profile()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $products = Food::where('restaurant_id', $restaurant->id)->get();
        foreach ($products as $product) {
            $product->image = unserialize($product->image);
            $images = [];
            // foreach ($product->image as $img) {
            //     # code...
            //     $images[] = asset('images/'.$img);
            // }
            $product->image =  asset('images/' . $product->image[0]);
        }
        return view('vendor-views.addon.profile', compact('restaurant', 'products'));
    }

    public function products()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        // return view('vendor-views.addon.products');
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
        $category = Category::where('restaurant_id', Helpers::get_restaurant_id())->get();
        $addon = AddOn::all();
        $badges = Badge::where('restaurant_id', $restaurant->id)->get();
        return view('vendor-views.addon.addproduct', compact(["category", "type", "addon", "badges"]));
    }
    public function addproduct2()
    {
        $vendor = auth('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id', $vendor)->first();
        $category = Category::all();
        $addon = AddOn::all();
        $addon = AddOn::all();
        $badges = Badge::where('restaurant_id', $restaurant->id)->get();
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.addproduct2', compact(["category", "addon", "badges"]));
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
        return view('vendor-views.addon.addcategory');
    }

    public function addategory()
    {
        return view('vendor-views.addon.addproduct');
    }

    public function customer()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.customer');
    }
    public function settings()
    {
        // $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.settings'/**/);
    }
    public function single_customer()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.single-customer');
    }
    public function order()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.order');
    }
    public function invoices()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.invoices');
    }
    public function massage()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.massage');
    }
    public function review()
    {
        $addons = AddOn::orderBy('name')->paginate(config('default_pagination'));
        return view('vendor-views.addon.review');
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
        $request->validate([
            'name' => 'required|',
            // 'name.*' => 'max:191', array
            'price' => 'required|numeric|between:0,999999999999.99',
        ], [
            'name.required' => trans('messages.Name is required!'),
        ]);

        $image = "";
        if ($request->hasfile("addon_image")) {
            $file = $request->addon_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("public/images/", $file_name);
            $image  = asset("public/images/" . $file_name);
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
        $request->validate([
            'name' => 'required|max:191',
            'price' => 'required|numeric|between:0,999999999999.99',
        ], [
            'name.required' => trans('messages.Name is required!'),
        ]);

        $image = "";
        if ($request->hasfile("addon_image")) {
            $file = $request->addon_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("public/images/", $file_name);
            $image  = asset("public/images/" . $file_name);
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
