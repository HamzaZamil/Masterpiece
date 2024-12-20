<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishListController extends Controller
{
    /**
     * Display a listing of all wishlist entries.
     */
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('admin/wishListTable/index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/wishListTable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'state' => 'required|boolean'
        ]);

        Wishlist::create([
            'item_id' => $request->item_id,
            'state' => $request->state
        ]);

        return redirect()->route('wishlists.index')->with('success', 'Wishlist item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return view('wishlists.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return view('wishlists.edit', compact('wishlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'state' => 'required|boolean'
        ]);

        $wishlist = Wishlist::findOrFail($id);
        $wishlist->update($request->all());

        return redirect()->route('wishlists.index')->with('success', 'Wishlist item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('wishlists.index')->with('success', 'Wishlist item removed successfully!');
    }
}
