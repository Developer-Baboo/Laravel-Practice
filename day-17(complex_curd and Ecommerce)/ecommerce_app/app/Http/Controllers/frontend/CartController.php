<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Method for adding a product to the cart
    function addProduct(Request $request)
    {
        // Get the product_id and product_qty from the request
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            // Check if a product with the given 'product_id' exists in the database
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                // Check if the product already exists in the user's cart
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    // If it exists, return a JSON response with a status message
                    return response()->json(['status' => $prod_check->name . ' already exists in the cart']);
                } else {
                    // If it doesn't exist, create a new Cart item and save it
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    // Return a JSON response with a status message indicating the product was added to the cart
                    return response
                    ()->json(['status' => $prod_check->name . ' added to the cart']);
                }
            }
        } else {
            // If the user is not logged in, return a JSON response with a status message
            return response()->json(['status' => 'Login to continue']);
        }
    }

    // View cart page
    function viewcart(){
        $cartitems = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('frontend.cart', compact('cartitems'));
    }


    //change price on increment/decrement quantity
    function update_cart(Request $request){
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=>"Quantity Updated"]);
            }
        }
    }

    // delete product item from cart
    function deleteproduct( Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id'); // product coming from ajax custom.js file
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
               $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
               $cartItem->delete();
               return response()->json(['status' => "Product Removed Successfully"]);
            }
        }else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }


    // Count number of products exist in cart and show on navbar
    function cartcount(){
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }


}
