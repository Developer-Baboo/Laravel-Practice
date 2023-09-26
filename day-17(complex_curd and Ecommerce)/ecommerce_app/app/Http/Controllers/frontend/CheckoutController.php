<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
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

    function place_order(Request $request){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        // Calculate grandTotal
        $grandTotal = 0;
        foreach ($cartitems as $item) {
            $itemTotal = $item->prod_qty * $item->products->selling_price;
            $grandTotal += $itemTotal;
        }
        $order = new Order();

        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->state = $request->input('state');
        $order->total_price = $grandTotal; // Assign the grandTotal value
        $order->tracking_no = 'Baboo'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach($cartitems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price'=>$item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty = $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->state = $request->input('state');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status', 'Order Placed Successfully');
    }
}
