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

    public function view_category($slug){
        if(Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->get();
            return view('frontend.products.index',compact('category','products'));
        }else{
            return redirect('')->with('status', "slug doesn't exist");
        }
    }

    public function productview($cate_slug, $prod_slug){
        if(Category::where('slug', $cate_slug)->exists()){
            if(Product::where('slug', $prod_slug)->exists()){
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view',  compact('products'));
            }else{
                return redirect('/')->with('status', 'The link was broken');
            }
        }else{
            return redirect('/')->with('status', 'No Such category found');
        }
    }
}
