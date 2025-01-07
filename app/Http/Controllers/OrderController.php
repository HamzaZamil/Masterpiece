<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Make sure to use the correct namespace for the Order model
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->get(); // Eager load users associated with orders
        return view('admin.ordersTable.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(['id', 'name']); // Assuming you want to select from users to assign orders
        return view('admin.ordersTable.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_total' => 'required|numeric|min:0',
            'order_address' => 'required|string|max:255',
            'order_status' => 'required|in:accepted,pending,declined,done,in_progress'
        ]);

        $order = Order::create($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Fetch the order along with its related order items and the items' details
    $order = Order::with(['orderItems.item', 'orderItems.user'])->findOrFail($id);

    // Pass the order data to the view
    return view('admin.ordersTable.show', compact('order'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all(['id', 'name']); // Assuming you need to possibly re-assign the order to another user
        return view('admin.ordersTable.editOrder', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_status' => 'required|in:accepted,pending,declined,done,in_progress'
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}
