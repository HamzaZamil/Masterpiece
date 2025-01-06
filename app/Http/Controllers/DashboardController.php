<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    function index(){
        $totalCustomers = User::count();
        
        $totalRevenue = round(Order::sum('order_total'));
        $rounded = intVal($totalRevenue);
        
        $totalOrders = Order::count();

        return view('admin.index', compact('totalCustomers', 'rounded', 'totalOrders'));
    }
}
