<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // How user his list of order
    function index(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.Orders.index', compact('orders'));
    }

    //user can check his order details
    //Here we will use here many relationships
    function view($id){
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        // dd($orders->orderitems);
        return view('frontend.orders.view', compact('orders'));
    }
}
