<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\Models\Review;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;
class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::whereHas('food', function($query){
            return $query->where('restaurant_id', Helpers::get_restaurant_id());
        })->latest()->paginate(config('default_pagination'));
        return view('vendor-views.review.index', compact('reviews'));
    }
    public function addReview(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        $review = new Review;
        $review->create($data);
        return redirect()->back()->with([
            "message" => "Product Updated Successfully",
            "code"      => 1,
            "status"    => true
        ]);
    }
}
