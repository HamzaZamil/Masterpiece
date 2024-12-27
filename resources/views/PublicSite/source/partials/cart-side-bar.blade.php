<div id="cart-sidebar" class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fas fa-times"></i></button>
        <h2 class="heading_title text-uppercase">Cart Items - <span id="cart-item-count">0</span></h2>
        <div id="cart-items-container">
            <p>Your cart is empty.</p>
        </div>
        <div class="total_price text-uppercase">
            <span>Sub Total:</span>
            <span id="cart-subtotal">$0.00</span>
        </div>
        <ul class="btns_group ul_li">
            <li><a href="/cart" class="btn btn_primary text-uppercase">View Cart</a></li>
            <li><a href="/checkout" class="btn btn_border border_black text-uppercase">Checkout</a></li>
        </ul>
    </div>
    <div class="cart_sidebar_overlay"></div>
</div>


<!-- JavaScript for Remove Functionality -->
{{-- <script>
   
    // Function to fetch cart items
    function fetchCartData() {
        fetch("{{ route('cart.fetch') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data.cart);
                const cartItemsContainer = document.getElementById('cart-items-container');
                const cartItemCount = document.getElementById('cart-item-count');
                const cartSubtotal = document.getElementById('cart-subtotal');

                if (data.cart && Object.keys(data.cart).length > 0) {
                    let cartHTML = '';
                    let subtotal = 0;
                    let itemCount = 0;

                    // Iterate over the object
                    Object.entries(data.cart).forEach(([productId, item]) => {
                        subtotal += (item.price * item.quantity);
                        itemCount += item.quantity;

                        cartHTML += `
                            <div class="cart_item">
                                <div class="item_image">
                                    <img src="${item.image ?? '/storage/items/default.jpg'}" alt="Product Image">
                                </div>
                                <div class="item_content">
                                    <h4 class="item_title">${item.item_name ?? 'Unknown Product'}</h4>
                                    <span class="item_price">Price: $${parseFloat(item.price).toFixed(2)}</span>
                                    <span class="item_quantity">Qty: ${item.quantity}</span>
                                    <button type="button" class="remove_btn" data-product-id="${productId}"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        `;
                    });

                    cartItemsContainer.innerHTML = cartHTML;
                    cartItemCount.textContent = itemCount;
                    cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;

                    // Attach remove functionality to new buttons
                    attachRemoveItemFunctionality();
                } else {
                    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
                    cartItemCount.textContent = '0';
                    cartSubtotal.textContent = '$0.00';
                }
            })
            .catch(error => {
                console.error('Error fetching cart data:', error);
            });
    }

    // Function to attach remove item functionality
    function attachRemoveItemFunctionality() {
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
                            fetchCartData(); // Reload the cart data dynamically
                        }
                    })
                    .catch(error => {
                        console.error('Error removing item:', error);
                    });
            });
        });
    }

    // Call fetchCartData on page load
    fetchCartData();


</script> --}}
