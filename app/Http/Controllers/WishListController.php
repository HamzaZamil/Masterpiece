<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the wishlist items.
     */
    public function index()
    {
        // Fetch all wishlist items with related user and item names
        $wishlists = WishList::with('user', 'item')->get();

        // Pass data to the index view
        return view('admin.wishListsTable.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new wishlist item.
     */
    public function create()
    {
        // Fetch all users and items for the dropdowns
        $users = User::all();
        $items = Item::all();

        // Pass data to the create view
        return view('admin.wishListsTable.create', compact('users', 'items'));
    }

    /**
     * Store a newly created wishlist item in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'state' => 'required|in:1,0', // 1: Wished, 0: Not wished
        ]);

        // Create the wishlist entry
        WishList::create($request->all());

        // Redirect to index with success message
        return redirect()->route('admin.wishList.index')->with('success', 'Wishlist item created successfully.');
    }

    /**
     * Display the specified wishlist item.
     */
    public function show($id)
    {
        // Fetch the wishlist item by ID with its relationships
        $wishlist = WishList::with('user', 'item')->findOrFail($id);

        // Pass data to the show view
        return view('admin.wishListsTable.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified wishlist item.
     */
    public function edit($id)
    {
        // Fetch the wishlist item by ID
        $wishlist = WishList::findOrFail($id);

        // Fetch all users and items for the dropdowns
        $users = User::all();
        $items = Item::all();

        // Pass data to the edit view
        return view('admin.wishListsTable.update', compact('wishlist', 'users', 'items'));
    }

    /**
     * Update the specified wishlist item in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request to ensure the state matches the enum values
    $validated = $request->validate([
        'state' => 'required|in:in_wishlist,not_in_wishlist', // Ensure it matches enum values
    ]);


    // Find the wishlist entry
    $wishlist = WishList::findOrFail($id);

    // Update the state
    $wishlist->update(['state' => $validated['state']]);

    // Redirect with a success message
    return redirect()->route('admin.wishList.index')->with('success', 'Wishlist status updated successfully!');
}

    

    /**
     * Remove the specified wishlist item from storage.
     */
    public function destroy($id)
    {
        // Find and delete the wishlist entry
        $wishlist = WishList::findOrFail($id);
        $wishlist->delete();

        // Redirect to index with success message
        return redirect()->route('admin.wishListsTable.index')->with('success', 'Wishlist item deleted successfully.');
    }
}
