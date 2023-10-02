<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_orders = Order::count(); // Fetch total count of orders
        $orders_completed = Order::where('status', 'completed')->count(); // Fetch count of completed orders
        $total_products = Product::count(); // Fetch total count of products
        $total_categories = Category::count(); // Fetch total count of categories
        $pending_orders = Order::where('status', 'pending')->count(); // Fetch count of Pending orders

        return view('admin.index', compact('total_users', 'total_orders', 'orders_completed', 'total_products', 'total_categories', 'pending_orders'));
    }


}
