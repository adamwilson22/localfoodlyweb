<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;

class LoyaltyController extends Controller
{
    public function index()
    {
        return view('vendor-views.loyalty.index');
    }
}