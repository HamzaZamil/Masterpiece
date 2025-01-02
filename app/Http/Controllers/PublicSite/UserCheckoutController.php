<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheckoutController extends Controller
{
    /**
     * Handle the checkout process.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Retrieve the cart from the session
        $cart = session('cart', []);

        // Validate the cart
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate totals
        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $shipping = 5.00; // Fixed shipping fee
        $grandTotal = $subtotal + $shipping;

        // Get the selected payment method (if any)
        $paymentMethod = $request->input('payment-method', 'cash_on_delivery'); // Default to 'cash_on_delivery'

        // Begin the checkout process
        try {
            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_total' => $grandTotal,
                'order_address' => Auth::user()->address,
                'order_status' => 'pending',
                'payment_method' => $paymentMethod, // Store selected payment method
            ]);

            // Insert order items
            foreach ($cart as $productId => $item) {
                OrderItems::create([
                    'order_id' => $order->id, // Use $order->id here instead of $order->order_id
                    'item_id' => $productId,
                    'user_id' => Auth::id(),
                    'quantity' => $item['quantity'],
                ]);
            }

            // Clear the cart session
            session()->forget('cart');

            // Redirect to the home page with a success message
            return redirect('/')->with('success', 'Your order has been placed successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error processing order: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }
}