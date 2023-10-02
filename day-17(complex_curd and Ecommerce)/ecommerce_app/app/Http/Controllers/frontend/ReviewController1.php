<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController1 extends Controller
{
    // Show the form for adding a review for a specific product
    function add($product_slug)
    {
        // Find the product with the given slug and status '0' (active)
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();
        // Check if the user has already written a review for this product (ek product pa ek review)
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            // If the user has already written a review, show the edit review form
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                // Check if the user has made a verified purchase for this product
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id', 'order_items.order_id')
                    ->where('order_items.prod_id', $product_id)->get();
            }
            // Show the add review form with product information and verified purchase status
            return view('frontend.reviews.index', compact('product', 'verified_purchase'));
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    // Store a new review in the database
    function create(Request $request)
    {
        $product_id = $request->input('product_id');
        // Find the product with the given ID and status '0' (active)
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product) {
             // Get user review input from the request
            $user_review = $request->input('user_review');
            // Create a new review record in the database
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            if ($new_review) {
                return redirect('category/' . $category_slug . '/' . $prod_slug)->with('status', 'Thankyou for writing a review');
            }
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    //edit review only fetch data
    function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            }
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    //Update it
    function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('category/' . $review->product->category->slug . '/' . $review->product->slug)->with('status', "Review Updated Successfully");
            } else {
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        } else {
            return redirect()->back()->with('status', "You cannot submit empty review");
        }
    }
}
