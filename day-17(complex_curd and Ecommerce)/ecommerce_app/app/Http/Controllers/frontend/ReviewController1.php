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
    function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product) {

            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();

            return view('frontend.reviews.index', compact('product', 'verified_purchase'));
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    //Add review in database
    function create(Request $request){
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if($product){
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            if($new_review){
                return redirect('category/'.$category_slug.'/'.$prod_slug)->with('status', 'Thankyou for writing a review');
            }
        }else{
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }
}
