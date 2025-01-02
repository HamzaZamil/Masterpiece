<section class="cart-section">
    <div class="container">
        <div class="row mb-n6 mb-lg-n10">
            <h2 class="cart-title mb-4">Cart List</h2>

            <div class="col-12 mb-6 mb-lg-10">

                <!-- Cart Table For Tablet & Up Devices Start -->
                @php
                    $cart = session('cart', []);
                @endphp

                @if(empty($cart))
                    <p>Your cart is empty.</p>
                @else
                    <table class="cart-table table table-bordered text-center align-middle mb-6 d-none d-md-table">
                        <thead>
                            <tr>
                                <th class="imag">Image</th>
                                <th class="titl">Product</th>
                                <th class="pric">Price</th>
                                <th class="quantit">Quantity</th>
                                <th class="tota">Total</th>
                                <th class="remov">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @foreach($cart as $productId => $item)
                                <tr>
                                    <td><img class="cart-thumb" src="{{ $item['image'] ?? asset('storage/items/default.jpg') }}" height="150px" width="250px" alt="Product Image"></td>
                                    <td>{{ $item['item_name'] ?? 'Product ' . $productId }}</td>
                                    <td>${{ number_format($item['price'] ?? 0, 2) }}</td>
                                    <td>{{ $item['quantity'] }}</td> <!-- Display Quantity -->
                                    <td>${{ number_format(($item['price'] ?? 0) * $item['quantity'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $productId }}">
                                            <button type="submit" class="remove-btn"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-between gap-3">
                        <div class="col-auto cat-shop-btn">
                            <a href="/shop">Continue Shopping <i class="bi bi-arrow-right-short"></i> <span></span></a>
                        </div>
                        <div class="col-auto d-flex flex-wrap gap-3 cat-shop-btn">
                            <button id="clearCartButton">Clear Cart <i class="bi bi-arrow-right-short"></i> <span></span></button>
                        </div>
                    </div>
                @endif
                <!-- Cart Table For Tablet & Up Devices End -->

                <!-- Cart Totals Start -->
                <div class="col mb-6 d-none d-md-table" style="text-align: right;">
                    <div class="cart-totals" style="width: 400px; margin-left: auto; margin-right: 0; text-align: center;">
                        <h4 class="title" style="font-size: 1.5rem; text-align: center;">Cart totals</h4>
                        <table class="table table-borderless bg-transparent">
                            <tbody>
                                <tr class="subtotal">
                                    <th style="font-size: 1.2rem; text-align: left;">Subtotal</th>
                                    <td style="font-size: 1.2rem; text-align: right;"><span id="subtotal">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</span></td>
                                </tr>
                                <tr class="shopping-fee">
                                    <th style="font-size: 1.2rem; text-align: left;">Shopping Fee</th>
                                    <td style="font-size: 1.2rem; text-align: right;"><span id="shopping">$5.00</span></td>
                                </tr>
                                <tr class="total">
                                    <th style="font-size: 1.4rem; font-weight: bold; text-align: left;">Total</th>
                                    <td style="font-size: 1.4rem; font-weight: bold; text-align: right;"><span id="total">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) + 5, 2) }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/checkout" class="show-alert btn btn-dark" style="width: 100%; padding: 10px; font-size: 1.2rem;">Proceed to checkout</a>
                    </div>
                </div>
                <!-- Cart Totals End -->
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Cart Actions -->
<script>
    document.getElementById('clearCartButton').addEventListener('click', function () {
        fetch("{{ route('cart.clear') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                toastr.success(data.message);
                location.reload(); // Reload the page to reflect cleared cart
            }
        })
        .catch(error => {
            console.error('Error clearing cart:', error);
        });
    });
</script>
