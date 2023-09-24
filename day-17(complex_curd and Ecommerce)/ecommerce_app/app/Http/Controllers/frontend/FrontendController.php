<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    // Method for rendering the homepage
    public function index(){
        // Retrieve 15 trending products from the database
        $featured_products = Product::where('trending', '1')->take(15)->get();

        // Retrieve 15 popular categories from the database
        $trending_categories = Category::where('popular', '1')->take(15)->get();

        // Return the 'frontend.index' view, passing the retrieved data to the view
        return view('frontend.index', compact('featured_products', 'trending_categories'));
    }

    // Method for rendering the category page
    public function category(){
        // Retrieve all categories with 'status' equal to '0' from the database
        $category = Category::where('status','0')->get();

        // Return the 'frontend.category' view, passing the retrieved data to the view
        return view('frontend.category', compact('category'));
    }

    // Method for viewing products in a specific category
    public function view_category($slug){
        // Check if a category with the given 'slug' exists in the database
        if(Category::where('slug', $slug)->exists()){
            // Retrieve the first category with the matching 'slug'
            $category = Category::where('slug', $slug)->first();

            // Retrieve all products in the selected category
            $products = Product::where('cate_id', $category->id)->get();

            // Return the 'frontend.products.index' view, passing the retrieved data to the view
            return view('frontend.products.index', compact('category', 'products'));
        }else{
            // Redirect to the homepage with a status message if the category doesn't exist
            return redirect('')->with('status', "slug doesn't exist");
        }
    }

    // Method for viewing a specific product within a category
    public function productview($cate_slug, $prod_slug){
        // Check if a category with the given 'cate_slug' exists in the database
        if(Category::where('slug', $cate_slug)->exists()){
            // Check if a product with the given 'prod_slug' exists in the database
            if(Product::where('slug', $prod_slug)->exists()){
                // Retrieve the product with the matching 'prod_slug'
                $products = Product::where('slug', $prod_slug)->first();

                // Return the 'frontend.products.view' view, passing the retrieved product data to the view
                return view('frontend.products.view',  compact('products'));
            }else{
                // Redirect to the homepage with a status message if the product doesn't exist
                return redirect('/')->with('status', 'The link was broken');
            }
        }else{
            // Redirect to the homepage with a status message if the category doesn't exist
            return redirect('/')->with('status', 'No Such category found');
        }
    }
}
