
 <header class="header-manu-section" id="header-sticky" style="padding: 10px 0px 0px 0px; background-color: #fff;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-lg-2">
                <div class="cat-shop-logo" style="text-align: center;">
                    <a href="/" title="Cat Master">
                        <img src="{{ asset('assets/img/pettieLogo.png') }}" alt="logo" style="height: 80px; width: auto;">
                    </a>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="col-lg-5">
                <nav class="header-menu d-none d-lg-block">
                    <ul >
                        <li><a href="/" style="color: #b17457; text-decoration: none;">Home</a></li>
                        <li><a href="/shop" style="text-decoration: none;">Shop</a></li>
                        <li><a href="/whyChooseUs" style="text-decoration: none;">Why Choose Us</a></li>
                        <li><a href="/contactPage" style="text-decoration: none;">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Right Menu Section -->
            <div class="col-lg-5">
                <div class="header-menu-right" style="text-align: right;">
                    <div class="header-menu-btn">
                        <ul style="display: inline-flex; list-style: none; gap: 15px; padding: 0; margin: 0;">
                            <!-- Cart Button -->
                            <li>
                                <button class="cart_btn headers-button" id="open-cart-btn" type="button" style="background: none; border: none; cursor: pointer;">
                                    <i class="bi bi-cart3"></i>
                                    <small class="cart_counter"></small>
                                </button>
                            </li>
                            <!-- Wishlist Button -->
                            <li>
                                <button class="white_btn headers-button wishlist-btn" type="button" id="wishlistButton" style="background: none; border: none; cursor: pointer;">
                                    <i class="far fa-heart"></i>
                                </button>
                            </li>
                            <!-- Profile Dropdown -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle text-dark fs-5" role="button" id="newProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                        <i class="bi bi-person"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="newProfileDropdown">
                                        @if(Auth::check())
                                            <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        @else
                                            <li><a class="dropdown-item" href="/login">Log In</a></li>
                                            <li><a class="dropdown-item" href="/register">Register</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Mobile Menu Area -->
    <div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none">
        <div class="mobile-menu">
            <nav class="header-menu">
                <ul class="nav_scroll">
                    <li><a href="/">Home</a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/whyChooseUs">Why Choose Us</a></li>
                    <li><a href="/contactPage">Contact</a></li>
                </ul>
            </nav>
            
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
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
                const cartCounter = document.querySelector('.cart_counter'); // Use your existing counter element

                if (data.cart && Object.keys(data.cart).length > 0) {
                    let cartHTML = '';
                    let subtotal = 0;
                    let itemCount = 0;

                    // Iterate over the object
                    Object.entries(data.cart).forEach(([productId, item]) => {
                        subtotal += item.price * item.quantity;
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

                    // Update the cart counter dynamically
                    if (cartCounter) {
                        cartCounter.textContent = itemCount;
                    }

                    // Update cart items and subtotal
                    if (cartItemsContainer) {
                        cartItemsContainer.innerHTML = cartHTML;
                    }
                    if (cartItemCount) {
                        cartItemCount.textContent = itemCount;
                    }
                    if (cartSubtotal) {
                        cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
                    }

                    // Attach remove functionality to new buttons
                    attachRemoveItemFunctionality();
                } else {
                    // Update the cart counter and other elements to show empty cart
                    if (cartCounter) {
                        cartCounter.textContent = '0';
                    }
                    if (cartItemsContainer) {
                        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
                    }
                    if (cartItemCount) {
                        cartItemCount.textContent = '0';
                    }
                    if (cartSubtotal) {
                        cartSubtotal.textContent = '$0.00';
                    }
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

                fetch("{{ route('side-cart.remove') }}", {
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
                            toastr.success(data.message); // Display success message
                            fetchCartData(); // Reload the cart data dynamically
                        }
                    })
                    .catch(error => {
                        console.error('Error removing item:', error);
                    });
            });
        });
    }

    // Event listener for cart opening
    const openCartButton = document.getElementById('open-cart-btn');
    const cartSidebar = document.getElementById('cart-sidebar');

    if (openCartButton) {
        openCartButton.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default anchor behavior
            if (cartSidebar) {
                cartSidebar.style.display = 'block'; // Show the cart sidebar
            }
            fetchCartData(); // Fetch cart data every time cart is opened
        });
    }

    // Hide cart sidebar
    const closeCartButton = document.querySelector('.close_btn');
    if (closeCartButton) {
        closeCartButton.addEventListener('click', function () {
            if (cartSidebar) {
                cartSidebar.style.display = 'none'; // Hide the cart sidebar
            }
        });
    }

    // Call fetchCartData on page load to initialize cart counter
    fetchCartData();
});

    </script>
 
</header> 
