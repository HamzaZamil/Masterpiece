<div class="shop-product-section">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form">
            @csrf
            <div class="row g-4">
                <div class="col-lg-7">
                    <div id="billing-form">
                        <h4 class="mb-4">Billing Address</h4>
                        <div class="row row-cols-sm-2 row-cols-1 g-4">
                            <div class="col">
                                <label>First Name</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->name }}" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Last Name</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->last_name }}" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Email Address</label>
                                <input class="form-field" type="email" value="{{ Auth::user()->email }}" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Phone number</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->phone_number }}" readonly disabled>
                            </div>
                            <div class="col-sm-12">
                                <label>Address</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->address }}" readonly disabled>
                            </div>
                            <div class="col-sm-12">
                                <label>City</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->city }}" readonly disabled>
                            </div>
                            <div class="col-sm-12">
                                <label>Street</label>
                                <input class="form-field" type="text" value="{{ Auth::user()->street }}" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="checkout-box">
                        <h4 class="mb-4">Cart Total</h4>
                        @php
                            $cart = session('cart', []);
                            $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
                            $shipping = 5.00;
                            $grandTotal = $subtotal + $shipping;
                        @endphp

                        <table class="checkout-summary-table table table-borderless">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $productId => $item)
                                <tr>
                                    <td>{{ $item['item_name'] }} x {{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 2) }} JD</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="border-top">Sub Total</td>
                                    <td class="border-top">{{ number_format($subtotal, 2) }} JD</td>
                                </tr>
                                <tr>
                                    <td class="border-top">Shipping Fee</td>
                                    <td class="border-top">{{ number_format($shipping, 2) }} JD</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="border-top">Grand Total</th>
                                    <th class="border-top">{{ number_format($grandTotal, 2) }} JD</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="checkout-box">
                        <h4 class="mb-4">Payment Method</h4>
                        <div class="checkout-payment-method">
                            <div class="single-method form-check">
                                <input class="form-check-input" type="radio" id="payment_cash" name="payment-method" checked>
                                <label class="form-check-label" for="payment_cash">Cash on Delivery</label>
                            </div>
                        </div>
                        <p>Enjoy the convenience of Cash on Delivery – pay when your order arrives!</p>
                        <button type="submit" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelector('.checkout-form').addEventListener('submit', function(event) {
        event.preventDefault();
        let form = this;
        
        // Adding basic form validation here (if needed)
        // You can customize this based on your requirements
        let isValid = true;
        if (isValid) {
            form.submit(); // Submitting the form after validation
        }
    });
</script>