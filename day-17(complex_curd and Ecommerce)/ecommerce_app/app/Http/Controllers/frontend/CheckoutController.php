<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    function index(){
        // Step 1: Retrieve all cart items associated with the authenticated user
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        // Step 2: Iterate through each cart item
        foreach ($old_cartitems as $item) {
             // Step 3: Check if the product associated with the cart item exists and has sufficient quantity
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
                 // Step 4: If the product doesn't meet the quantity requirement, remove the cart item
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        // Step 5: Retrieve the updated list of cart items after removal
        $cartitems = Cart::where('user_id', Auth::id())->get();
         // Step 6: Return the checkout view with the updated list of cart items
        return view('frontend.checkout', compact('cartitems'));
    }

    function place_order(){
        
    }
}
