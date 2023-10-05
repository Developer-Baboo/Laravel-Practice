<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    // Method for rendering the homepage
    public function index()
    {
        // Retrieve 15 trending products from the database
        $featured_products = Product::where('trending', '1')->take(15)->get();

        // dd($featured_products);

        // Retrieve 15 popular categories from the database
        $trending_categories = Category::where('popular', '1')->take(15)->get();

        // Return the 'frontend.index' view, passing the retrieved data to the view
        return view('frontend.index', compact('featured_products', 'trending_categories'));
    }

    // Method for rendering the category page
    public function category()
    {
        // Retrieve all categories with 'status' equal to '0' from the database
        $category = Category::where('status', '0')->get();

        // Return the 'frontend.category' view, passing the retrieved data to the view
        return view('frontend.category', compact('category'));
    }

    // Method for viewing products in a specific category
    public function view_category($slug)
    {
        // Check if a category with the given 'slug' exists in the database
        if (Category::where('slug', $slug)->exists()) {
            // Retrieve the first category with the matching 'slug'
            $category = Category::where('slug', $slug)->first();

            // Retrieve all products in the selected category
            $products = Product::where('cate_id', $category->id)->get();

            // Return the 'frontend.products.index' view, passing the retrieved data to the view
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            // Redirect to the homepage with a status message if the category doesn't exist
            return redirect('')->with('status', "slug doesn't exist");
        }
    }

    // Method for viewing a specific product within a category
    public function productview($cate_slug, $prod_slug)
    {
        // Check if a category with the given 'cate_slug' exists in the database
        if (Category::where('slug', $cate_slug)->exists()) {
            // Check if a product with the given 'prod_slug' exists in the database
            if (Product::where('slug', $prod_slug)->exists()) {
                // Retrieve the product with the matching 'prod_slug'
                $products = Product::where('slug', $prod_slug)->first();
                // Retrieve all ratings for the product
                $ratings = Rating::where('prod_id', $products->id)->get();
                // Calculate the sum of all ratings for the product
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                // Retrieve the user's rating for the product (if available)
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                // Retrieve all reviews for the product
                $reviews = Review::where('prod_id', $products->id)->get();
                // Calculate the average rating for the product
                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count(); // Calculate average rating
                } else {
                    $rating_value = 0; // Set average rating to 0 if there are no ratings
                }
                return view('frontend.products.view',  compact('products', 'ratings', 'reviews', 'rating_value', 'user_rating'));
            } else {
                // Redirect to the homepage with a status message if the product doesn't exist
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            // Redirect to the homepage with a status message if the category doesn't exist
            return redirect('/')->with('status', 'No Such category found');
        }
    }

    // Method to retrieve a list of product names for autocomplete functionality
    function productlistAjax()
    {
        // Retrieve names of products with status '0' (assuming '0' represents an active status)
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name']; // Extract product names and store them in the $data array
        }
        return $data;
    }
    // Method to handle product search
    function searchproduct(Request $request)
    {
        // Retrieve the searched product name from the form input
        $searched_product = $request->product_name;
        if ($searched_product) {
            // Attempt to find a product with a name similar to the searched term
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                // Redirect to the product's page if a matching product is found
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                // Redirect back with a status message if no matching products are found
                return redirect()->back()->with("status", "No Products matched your search");
            }
        } else {
            // Redirect back if no search term is provided
            return redirect()->back();
        }
    }
}
