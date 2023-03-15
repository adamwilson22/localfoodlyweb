<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::where('restaurant_id', \App\CentralLogics\Helpers::get_restaurant_id())->paginate(config('default_pagination'));
        // $badges = Badge::where('restaurant_id', \App\CentralLogics\Helpers::get_restaurant_id())->get();
        // dd($badges);
        return view('vendor-views.addon.badge', compact('badges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|',
        ], [
            'name.required' => trans('messages.Name is required!'),
        ]);

        $image = "";
        if ($request->hasfile("badge_image")) {
            $file = $request->badge_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $image  = asset("images/" . $file_name);
        }

        $badge = new Badge();
        $badge->name = $request->name;
        $badge->image = $image;
        $badge->restaurant_id = \App\CentralLogics\Helpers::get_restaurant_id();
        $badge->save();

        Toastr::success(trans('messages.badge_added_successfully'));

        return back();
    }

    public function edit($id)
    {
        $badge = Badge::findOrFail($id);
        return view('vendor-views.addon.badgeEdit', compact('badge'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
        ], [
            'name.required' => trans('messages.Name is required!'),
        ]);

        $image = "";
        if ($request->hasfile("badge_image")) {
            $file = $request->badge_image;
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . rand(00000, 99999) . "." . $extension;
            $file->move("images/", $file_name);
            $image  = asset("images/" . $file_name);
        }

        $badge = Badge::find($id);
        $badge->name = $request->name;
        $badge->image = $image;
        $badge->save();

        Toastr::success(trans('messages.badge updated successfully'));

        return redirect(route('vendor.badge.add-new'));
    }

    public function delete(Request $request)
    {
        $badge = Badge::find($request->id);
        $badge->delete();
        Toastr::success(trans('messages.badge deleted successfully'));
        return back();
    }
}
