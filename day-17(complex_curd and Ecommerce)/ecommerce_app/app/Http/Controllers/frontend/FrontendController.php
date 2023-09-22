<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        //take 15 Products
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_categories = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products','trending_categories' ));
        // return view('frontend.index');
    }

    function category(){
        $category = Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }
}
