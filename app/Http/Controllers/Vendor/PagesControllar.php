<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

class PagesControllar extends Controller
{
    public function product()
    {
   
        return view('vendor-views.product', compact('product'));
    }
}
