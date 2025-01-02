<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShopItemController extends Controller
{
    /**
     * Display a listing of the items in the shop.
     */
    public function index(Request $request)
    {
        // Fetch all items with their categories
        $items = Item::with('category')->get();

        return view('PublicSite.shop.shop', compact('items'));
    }

    /**
     * Display the details of a specific item.
     */
    public function show($id)
    {
        // Fetch the specific item
        $item = Item::with('category')->findOrFail($id);

        // Fetch related products (e.g., random products excluding the current one)
        $relatedProducts = Item::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(4) // Adjust the number of related products as needed
            ->get();

        // Pass the item and related products to the view
        return view('PublicSite.shop-details.shop-details', compact('item', 'relatedProducts'));
    }

    /**
     * Fetch related products for a given item.
     */
    public function relatedProducts($itemId)
    {
        // Fetch 4 random items excluding the current item
        $relatedItems = Item::where('id', '!=', $itemId)->inRandomOrder()->take(4)->get();

        return response()->json($relatedItems);
    }

    /**
     * Add an item to the wishlist.
     */
    public function addToWishList(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to add to the wishlist.'], 401);
        }

        $itemId = $request->input('item_id');
        $userId = Auth::id();

        // Check for duplicate
        $exists = WishList::where('user_id', $userId)->where('item_id', $itemId)->exists();

        if ($exists) {
            return response()->json(['success' => false, 'message' => null]); // No toastr message for duplicate
        }

        WishList::create([
            'user_id' => $userId,
            'item_id' => $itemId,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added to wishlist.']);
    }

    /**
     * Remove an item from the wishlist.
     */
    public function removeFromWishList(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to remove from the wishlist.'], 401);
        }

        $itemId = $request->input('item_id');
        $userId = Auth::id();

        WishList::where('user_id', $userId)->where('item_id', $itemId)->delete();

        return response()->json(['success' => true, 'message' => 'Item removed from wishlist.']);
    }

    /**
     * Fetch wishlist items for the sidebar.
     */
    public function fetchWishList()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to view your wishlist.'], 401);
        }

        $wishlistItems = WishList::where('user_id', Auth::id())
            ->with('item:id,item_name,item_picture,item_price') // Include all required fields
            ->get();

        return response()->json(['success' => true, 'items' => $wishlistItems]);
    }
}
