<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    // Add item to cart
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
    
        // Fetch product details from the database
        $product = Item::find($productId);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found!'], 404);
        }
    
        // Retrieve the existing cart from the session or create a new one
        $cart = session()->get('cart', []);
    
        // Check if the product already exists in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                'item_name' => $product->item_name,
                'price' => $product->item_price,
                'quantity' => $quantity,
                'image' => asset('storage/items/' . $product->item_picture),
            ];
        }
    
        // Save the cart back to the session
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
    }
    
    



    // View cart items
    public function viewCart()
    {
        $cart = session('cart', []); // Retrieve cart from session
        return view('publicSite.cart.cart', compact('cart')); // Pass the cart to the view
    }




    // Remove item from cart
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Remove the product if it exists in the cart
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart); // Update the session
        }


        return view('publicSite.cart.cart')->with('success', 'Item removed from cart successfully!');
        
    }


    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $cart = session('cart', []);

        foreach ($quantities as $productId => $quantity) {
            if (isset($cart[$productId]) && $quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Cart updated successfully!']);
    }

    public function clearCart()
    {
        session()->forget('cart');
        return response()->json(['message' => 'Cart cleared successfully']);
    }

    public function fetch()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return response()->json(['cart' => [], 'message' => 'Cart is empty.']);
        }

        return response()->json(['cart' => $cart]);
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);

            return response()->json(['message' => 'Product removed from cart.']);
        }

        return response()->json(['message' => 'Product not found in cart.']);
    }



}