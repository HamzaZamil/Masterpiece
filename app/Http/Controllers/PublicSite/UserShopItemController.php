<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;


class UserShopItemController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all items with their categories
        $items = Item::with('category')->get();
        
        // Check if items exist before trying to get popupItem
        if ($items->isEmpty()) {
            $popupItem = null; // or create a default/empty item object
        } else {
            // Get the selected item for the popup, or default to the first item
            $popupItem = $request->has('item_id') ? 
                Item::find($request->item_id) : 
                $items->first();
        }
        
        return view('PublicSite.shop.shop', compact('items', 'popupItem'));
    }

    
    public function show(Item $item)
{
    $items = Item::with('category')->get();
    $popupItem = $item;
    
    return view('public.shop', compact('items', 'popupItem'));
}
   
    
}
