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

    function razorpaycheck(Request $request){

        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item){
            $total_price +=$item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total_price' => $total_price,

        ]);
    }
}


/* APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:2fyzuEHNPPd4XevDDIWMe4EkbfqiHkE+XQQb8hzbGPA=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce2
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=babooheerani999@gmail.com
MAIL_PASSWORD=kysxzzhguzxqwocj
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="babooheerani999@gmail.com"
MAIL_FROM_NAME="Developer Baboo"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


GOOGLE_CLIENT_ID = "327306363228-2gk9dkr6hprkb7pgpm43g35m3irn6rb4.apps.googleusercontent.com"
GOOGLE_CLIENT_SECRET = "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"
=================================================================
Authenticaiton with google and facebook
icon
otp verification
product add email goes to
footer added
=================================================================
- Slider movement
- Opt verification (email sending) Pending...!
- Google login set is_verified as 1
- Footer styling
- Add product email sending with file sending with file
- Add to cart
- Add to wishlist
- Blur page while loading
- Animations
- Dark Mode
- Mobile Responsive
- Api for mobile applications
- Contact us forms
- Frontend on React
- recaptcha
- place order man address man google map use krno aha
- daily database backup

******************errors***************
validations
**************************
=================================================================



Todo:: debugging main page ......!............???????
index.blade.php..................!
app.blade.php....................!
font.blade.php...................!

if (Auth::check()) {
    $user = Auth::user();

    // Check if the user is verified
    if ($user->is_verified == 1) {
        // Check if a product with the given 'product_id' exists in the database
        $prod_check = Product::where('id', $product_id)->first();

        if ($prod_check) {
            // Your logic for a verified user and existing product goes here
            // ...

        } else {
            // Product not found
            // You may want to handle this case, redirect, show an error, etc.
        }
    } else {
        // User is not verified
        // You may want to handle this case, redirect, show an error, etc.
    }
} else {
    // User is not authenticated
    // You may want to handle this case, redirect to login, show an error, etc.
}












================================================================
https://icons8.com/icon/V5cGWnc9R4xj/google
https://codeanddeploy.com/category/laravel



 */
