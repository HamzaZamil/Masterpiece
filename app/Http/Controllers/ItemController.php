<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); // Retrieve all products
        return view('admin.itemsTable.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(['category_id', 'category_name']);
        return view('admin.itemsTable.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,category_id', // Ensure category_id exists in categories table
            'item_type' => 'required|in:cat,dog', // Only allow 'cat' or 'dog'
            'item_name' => 'required|string|max:255', // Item name should be a string with max 255 characters
            'item_description' => 'required|string', // Description is required and should be a string
            'item_price' => 'required|numeric|min:0', // Price should be a non-negative number
            'item_stock' => 'required|integer|min:0', // Stock should be a non-negative integer
            'item_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // URL for the image (ensure it's a valid URL)
        ]);
    
        // Create a new Item using the validated data
        Item::create($validated);
    
        // Redirect the user with a success message
        return redirect()->route('admin.items.index')->with('success', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Item::all();
        return view('admin.itemsTable.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();  // Get all categories
        // dd($item);
        return view('admin.itemsTable.update', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'category_id' => 'required|exists:categories,category_id', // Ensure the category exists in the categories table
        'item_type' => 'required|in:cat,dog', // Only 'cat' or 'dog' are valid item types
        'item_name' => 'required|string|max:255', // Item name should be a string and up to 255 characters
        'item_description' => 'required|string', // Item description should be a string
        'item_price' => 'required|numeric|min:0', // Price should be numeric and non-negative
        'item_stock' => 'required|integer|min:0', // Stock should be a non-negative integer
        'item_picture' => 'nullable|max:2048', // Image URL is optional, but if provided, should be a valid URL
    ]);

    // Find the item by ID or fail
    $item = Item::findOrFail($id);

    // Update the item with the validated data
    $item->update($validatedData);

    // Redirect to the items index page with a success message
    return redirect()->route('admin.items.index')->with('success', 'Item updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the item by ID or fail (if not found, a 404 error will be thrown)
        $item = Item::findOrFail($id);
    
        // Delete the item
        $item->delete();
    
        // Redirect to the items index page with a success message
        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully!');
    }
}
