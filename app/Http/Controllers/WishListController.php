<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Item;

class WishListController extends Controller
{
    /**
     * Display a listing of all wishlist entries.
     */
    public function index()
    {
        $wishlists = Wishlist::with('user', 'item')->get(); // Load related user and item data
        return view('admin.wishListTable.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new wishlist entry.
     */
    public function create()
    {
        $users = User::all(); // Retrieve all users
        $items = Item::all(); // Retrieve all items
        return view('admin.wishListTable.create', compact('users', 'items'));
    }

    /**
     * Store a newly created wishlist entry in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
            'item_id' => 'required|exists:items,id', // Ensure item_id exists in the items table
            'state' => 'required|in:1,0', // Validate state (1 = wished, 0 = not wished)
        ]);

        Wishlist::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'state' => $request->state,
        ]);

        return redirect()->route('admin.wishList.index')->with('success', 'Wishlist item added successfully!');
    }

    /**
     * Display the specified wishlist entry.
     */
    public function show($id)
    {
        $wishlist = Wishlist::with('user', 'item')->findOrFail($id); // Load related user and item data
        return view('admin.wishListTable.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified wishlist entry.
     */
    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $users = User::all(); // Retrieve all users
        $items = Item::all(); // Retrieve all items
        return view('admin.wishListTable.update', compact('wishlist', 'users', 'items'));
    }

    /**
     * Update the specified wishlist entry in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'exists:users,id',
        'item_id' => 'exists:items,id',
        'state' => 'required|in:1,0',
    ]);

    $wishlist = Wishlist::findOrFail($id);

    // Update the wishlist entry
    $wishlist->update([
        // 'user_id' => $request->user_id,
        // 'item_id' => $request->item_id,
        'state' => $request->state,
    ]);

    return redirect()->route('admin.wishList.index')->with('success', 'Wishlist entry updated successfully!');
}


    /**
     * Remove the specified wishlist entry from storage.
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('admin.wishList.index')->with('success', 'Wishlist item removed successfully!');
    }
}
