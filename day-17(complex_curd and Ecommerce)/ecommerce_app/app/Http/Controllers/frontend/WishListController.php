<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    // fetch wishlist item form db
    function index(){
        $wishlist = WishList::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    // Add function add product to wish list
    function add(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id)){
                $wish = new WishList();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product Added to wishlist successfully"]);
            }
            else{
                return response()->json(['status' => "Product doesn't exist"]);
            }
        }
        else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    //delete wish list items
    function deleteitem(Request $request){
        if (Auth::check()) {
            $prod_id = $request->input('prod_id'); // product coming from ajax custom.js file
            if (WishList::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = WishList::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Removed Successfully"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    //Count item found in wish list
    function wishlistcount(){
        $wishcount = WishList::where('user_id', Auth::id())->count();
        return response()->json(["count" => $wishcount]);
    }
}
