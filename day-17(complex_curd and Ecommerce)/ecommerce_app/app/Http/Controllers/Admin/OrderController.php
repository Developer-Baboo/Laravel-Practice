<?php
namespace App\Http\Controllers\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    function index(){
        $orders = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    function view($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }
}
