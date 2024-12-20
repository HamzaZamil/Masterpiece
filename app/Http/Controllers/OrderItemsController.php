<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItems; // Ensure you have the correct path to the OrderItems model
use App\Models\Item;
use App\Models\User;
use App\Models\Order;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItems::with(['order', 'item', 'user'])->get(); // Eager load related data
        return view('admin.orderItemsTable.index', compact('orderItems')); // Assume the view is in admin/orderItems/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $items = Item::all(); // Assuming you have an Item model
    $users = User::all(); // Assuming you have a User model
    $orders = Order::all(); // Assuming you have a User model
    return view('admin.orderItemsTable.create', compact('items', 'users', 'orders'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'item_id' => 'required|exists:items,id',
        'user_id' => 'required|exists:users,id',
        'order_id' => 'required|exists:orders,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $orderItem = new OrderItems($validated);
    $orderItem->save();

    return redirect()->route('admin.orderItems.index')->with('success', 'Order Item created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderItem = OrderItems::with(['order', 'item', 'user'])->findOrFail($id);
        return view('admin.orderItemsTable.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $orderItem = OrderItems::findOrFail($id);
    $items = Item::all();
    $users = User::all();
    return view('admin.orderItemsTable.edit', compact('orderItem', 'items', 'users'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'item_id' => 'required|exists:items,id',
        'user_id' => 'required|exists:users,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $orderItem = OrderItems::findOrFail($id);
    $orderItem->update($validated);

    return redirect()->route('admin.orderItems.index')->with('success', 'Order Item updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $orderItem = OrderItems::findOrFail($id);
    $orderItem->delete();

    return redirect()->route('admin.orderItems.index')->with('success', 'Order Item deleted successfully!');
}
}
