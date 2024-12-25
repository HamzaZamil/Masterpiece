<div class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fas fa-times"></i></button>
        <h2 class="heading_title text-uppercase">Cart Items - <span>{{ count(session('cart', [])) }}</span></h2>

        <div class="cart_items_list">
            @php
                $cart = session('cart', []);
            @endphp

            @if(empty($cart))
                <p>Your cart is empty.</p>
            @else
                @foreach($cart as $productId => $item)
                    <div class="cart_item">
                        <div class="item_image">
                            <img src="{{ $item['image'] ?? asset('storage/items/default.jpg') }}" alt="Product Image">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">
                                {{ $item['item_name'] ?? 'Product ' . $productId }}
                            </h4>
                            <span class="item_price">Price: ${{ number_format($item['price'] ?? 0, 2) }}</span>
                            <span class="item_quantity">Qty: {{ $item['quantity'] }}</span>
                            <button type="button" class="remove_btn" data-product-id="{{ $productId }}"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="total_price text-uppercase">
            <span>Sub Total:</span>
            <span>${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</span>
        </div>

        <ul class="btns_group ul_li">
            <li><a href="{{ route('cart.view') }}" class="btn btn_primary text-uppercase">View Cart</a></li>
            <li><a href="checkout" class="btn btn_border border_black text-uppercase">Checkout</a></li>
        </ul>
    </div>
    <div class="cart_sidebar_overlay"></div>
</div>

<!-- JavaScript for Remove Functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const removeButtons = document.querySelectorAll('.remove_btn');

        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');

                fetch("{{ route('cart.remove') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ product_id: productId }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            alert(data.message);
                            location.reload(); // Reload the page to reflect changes
                        }
                    })
                    .catch(error => {
                        console.error('Error removing item:', error);
                    });
            });
        });
    });
</script>
