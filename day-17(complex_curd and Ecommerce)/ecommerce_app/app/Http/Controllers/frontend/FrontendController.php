<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        //take 15 Products
        $featured_products = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products'));
        // return view('frontend.index');
    }
}
