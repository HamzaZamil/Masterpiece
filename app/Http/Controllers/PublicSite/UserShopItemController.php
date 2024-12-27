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

    // Fetch related products (e.g., random products excluding the current one)
    $relatedProducts = Item::where('id', '!=', $id)
                            ->inRandomOrder()
                            ->take(4) // Adjust the number of related products as needed
                            ->get();

    // Pass the item and related products to the view
    return view('PublicSite.shop-details.shop-details', compact('item', 'relatedProducts'));
}


    public function relatedProducts($itemId)
    {
        // Fetch 4 random items excluding the current item
        $relatedItems = Item::where('id', '!=', $itemId)->inRandomOrder()->take(4)->get();

        return response()->json($relatedItems);
    }


}


