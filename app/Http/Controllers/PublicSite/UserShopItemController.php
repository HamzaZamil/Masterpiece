<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class UserShopItemController extends Controller
{
    /**
     * Display a listing of the items in the shop.
     */
    public function index(Request $request)
    {
        // Fetch all items with their categories
        $items = Item::with('category')->get();

        return view('PublicSite.shop..shop', compact('items'));
    }

    /**
     * Display the details of a specific item.
     */
    public function show($id)
    {
        // Fetch the specific item
        $item = Item::with('category')->findOrFail($id);

        // Pass the item to the shop-details-section view
        return view('PublicSite.shop-details.shop-details', compact('item'));
    }
}
