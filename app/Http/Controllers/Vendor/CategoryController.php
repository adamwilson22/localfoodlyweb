<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;
use Redirect;

class CategoryController extends Controller
{
    function index()
    {
        $categories=Category::where(['position'=>0])->latest()->paginate(config('default_pagination'));
        return view('vendor-views.category.index',compact('categories'));
    }

    public function edit(Request $request)
    {
        
        $category = Category::where('id', $request->id)->get()->first();
        return view('vendor-views.addon.editcategory', compact('category'));
    }

    function update(Request $request)
    {
        $rules = [
            "name"  => "required",
            "status" => "required",
            // "image" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $img = $request->old_image;
        if($request->hasFile('image'))
        {
            // dd('test');
            $imagefile = $request->file('image');
            $img = 'category'.time().'.'.$imagefile->getClientOriginalName();  
            $imagefile->move(public_path('images'), $img);
        }
        

        $create = [
            "name"                      => $request->name,
            "image"                     => $img,
            "status"               => $request->status,
            // "id"               => $request->id
        ];
        $cat = Category::find($request->id);
        // dd($cat);
        $cat->update($create);
        if(1)
        {
            return Redirect('vendor-panel/addon/categories')->with([
                "message" => "Category Updated Successfully", 
                "code"      => 1,
                "status"    => true
            ]);
        }
        else
        {
            return Redirect('Vendor-panel/addon/categories')->with([
                "code"      => 0,
                'message'   => "Category Not Updated",
                "status"    => false
            ]);
            
        }

    }

    public function get_all(Request $request){
        $data = Category::where('name', 'like', '%'.$request->q.'%')->limit(8)->get([DB::raw('id, CONCAT(name, " (", if(position = 0, "'.trans('messages.main').'", "'.trans('messages.sub').'"),")") as text')]);
        if(isset($request->all))
        {
            $data[]=(object)['id'=>'all', 'text'=>'All'];
        }
        return response()->json($data);
    }

    function sub_index()
    {
        $categories=Category::with(['parent'])->where(['position'=>1])->latest()->paginate(config('default_pagination'));
        return view('vendor-views.category.sub-index',compact('categories'));
    }

    public function search(Request $request){
        $key = explode(' ', $request['search']);
        $categories=Category::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->limit(50)->get();
        return response()->json([
            'view'=>view('vendor-views.category.partials._table',compact('categories'))->render(),
            'count'=>$categories->count()
        ]);
    }

    function store(Request $request)
    {

        $resturantID = Helpers::get_restaurant_id();
        // dd($resturantID);

        $rules = [
            "name"  => "required|unique:categories",
            "status" => "required",
            "image" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }


        $imagefile = $request->file('image');
        $img = 'category'.time().'.'.$imagefile->getClientOriginalName();  
        $imagefile->move(public_path('images'), $img);

        $create = [
            "name"                      => $request->name,
            "image"                     => $img,
            "status"               => $request->status,
            "restaurant_id"         => $resturantID
        ];

        $insert = Category::create($create);
        if($insert)
        {
            return Redirect('vendor-panel/addon/categories')->with([
                "message" => "Category Created Successfully", 
                "code"      => 1,
                "status"    => true
            ]);
        }
        else
        {
            return Redirect('Vendor-panel/addon/categories')->with([
                "code"      => 0,
                'message'   => "Category Not Created",
                "status"    => false
            ]);
            
        }

    }
}
