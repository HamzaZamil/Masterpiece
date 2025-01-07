<html>
<style>
    .custom-show-more {
    background-color: #b17457; /* Elegant muted brownish-pink color */
    color: #ffffff; /* White text for contrast */
    border: none; /* No border for a clean look */
    border-radius: 8px; /* Rounded corners for a modern look */
    padding: 12px 24px; /* Comfortable padding */
    font-size: 1rem; /* Easy-to-read font size */
    font-weight: bold; /* Bold text for emphasis */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: all 0.3s ease; /* Smooth transition for hover effects */
    cursor: pointer;
}

.custom-show-more:hover {
    background-color: #a0634d; /* Slightly darker shade on hover */
    color: #ffffff;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

.custom-show-more:active {
    background-color: #8f5644; /* Even darker shade on click */
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1); /* Reduced shadow on click */
    transform: translateY(0); /* Reset lift effect */
}
</style>
<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cat-shop-section-title style2 wow fadeInUp">
                    <h1>Our <span>Shop</span></h1>
                </div>
            </div>
        </div>

        <!-- Filter and Search Section -->
        <div class="row mb-4">
          
            <div class="col-md-6 d-flex ">
                <input type="text" id="productSearch" class="form-control" placeholder="Search for products..."
                       style="padding: 10px; font-size: 1rem; width: 100%; border: 1px solid #ddd; box-shadow: none;">
            </div>
          
            <div class="col-md-6 d-flex">
                <label for="itemTypeFilter" class="me-2 align-self-center"><strong>Filter by: </strong></label>
                <select id="itemTypeFilter" class="form-control" style="padding: 10px; font-size: 1rem; width: 73%; border: 1px solid #ddd; box-shadow: 1px;">
                    <option value="all" selected>All Categories</option>
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="fish">Fish</option>
                    <option value="bird">Bird</option>
                </select>
            </div>
            
        </div>

        <!-- Product Grid -->
        <div class="product-box">
            <div class="row" id="productContainer">
                @foreach($items as $item)
                <div class="col-lg-3 col-md-6 product-item" data-item-type="{{ strtolower($item->item_type) }}">
                    <div class="collection-single-box wow fadeInUp">
                        <div class="collection-box-thumb">
                            <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="250px" width="300px" alt="{{ $item->item_name }}" style="object-fit: contain">
                        </div>
                        <div class="collection-box-content">
                            <div class="collection-icon">
                                <ul>
                                    <li>
                                        <button 
                                            class="product-action-btn wishlistBtn" 
                                            data-item-id="{{ $item->id }}" 
                                            data-item-picture="{{ $item->item_picture }}" 
                                            data-item-name="{{ $item->item_name }}" 
                                            data-item-price="{{ $item->item_price }}" 
                                            data-tooltip-text="Add to Wishlist" onClick="toggleWishlist({{ $item->id }}, this)">
                                            <i class="far fa-heart"></i>
                                            
                                        </button>
                                    </li>
                                    <li>
                                        <button 
                                            class="product-action-btn" 
                                            data-tooltip-text="Quick View" 
                                            onclick="window.location.href='{{ route('shop.show', $item->id) }}'">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button 
                                            class="product-action-btn cartConfirm" 
                                            data-tooltip-text="Add to Cart" 
                                            data-product-id="{{ $item->id }}">
                                            <i class="bi bi-cart4"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="collection-box-title">
                                <h6 class="product-name">{{ $item->item_name }}</h6>
                            </div>
                            <div class="collection-box-price">
                                <h6>{{ number_format($item->item_price, 2) }} JD</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Show More Button -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <button id="showMoreBtn" class="btn custom-show-more bi bi-arrow-right"  style="display: none;"> Show More</button>
            </div>
        </div>
    </div>

    <!-- Wishlist and Other Functionalities -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const showMoreBtn = document.getElementById('showMoreBtn');
    const productContainer = document.getElementById('productContainer');
    const products = Array.from(productContainer.querySelectorAll('.product-item'));
    const productSearch = document.getElementById('productSearch');
    const itemTypeFilter = document.getElementById('itemTypeFilter');

    let visibleCount = 8; // Number of items initially visible

    function updateProductVisibility() {
        const searchValue = productSearch.value.toLowerCase();
        const selectedType = itemTypeFilter.value.toLowerCase();

        // Filter products based on search and filter criteria
        const filteredProducts = products.filter(product => {
            const productType = product.getAttribute('data-item-type').toLowerCase();
            const productName = product.querySelector('.product-name').textContent.toLowerCase();

            const matchesSearch = productName.includes(searchValue);
            const matchesFilter = selectedType === 'all' || productType === selectedType;

            return matchesSearch && matchesFilter;
        });

        // Reset visibility for all products
        products.forEach(product => (product.style.display = 'none'));

        // Show only the filtered products up to the visible count
        filteredProducts.forEach((product, index) => {
            if (index < visibleCount) {
                product.style.display = 'block';
            }
        });

        // Show or hide the "Show More" button
        if (visibleCount >= filteredProducts.length) {
            showMoreBtn.style.display = 'none';
        } else {
            showMoreBtn.style.display = 'block';
        }
    }

    // Attach event listeners for search and filter
    productSearch.addEventListener('input', () => {
        visibleCount = 8; // Reset visible count when filtering
        updateProductVisibility();
    });

    itemTypeFilter.addEventListener('change', () => {
        visibleCount = 8; // Reset visible count when filtering
        
        updateProductVisibility();
        showMoreBtn.style.display = 'none';

    });

    // Show More button click
    showMoreBtn.addEventListener('click', function () {
        visibleCount += 8; // Increase visible count
        updateProductVisibility(); // Reapply visibility logic
    });

    // Initialize visibility on page load
    updateProductVisibility();
});


    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right", // Adjust as needed
        timeOut: 2000, // Display duration: 2000ms (2 seconds)
        extendedTimeOut: 1000, // Extra time when hovering
    };


        document.addEventListener('DOMContentLoaded', function () {
            const productSearch = document.getElementById('productSearch');
            const itemTypeFilter = document.getElementById('itemTypeFilter');
            const products = document.querySelectorAll('.product-item');

            function initializeWishlist() {
    fetch('{{ route('wishlist.fetch') }}', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data, "Wishlist data");
            if (data.success && data.items.length > 0) {
                const wishlistItems = data.items.map(item => item.item_id);
                document.querySelectorAll('.wishlistBtn').forEach(button => {
                    const itemId = parseInt(button.getAttribute('data-item-id'));
                    if (wishlistItems.includes(itemId)) {
                        button.classList.add('in-wishlist');
                        button.innerHTML = '<i class="fas fa-heart"></i>';
                    } else {
                        button.classList.remove('in-wishlist');
                        button.innerHTML = '<i class="far fa-heart"></i>';
                    }
                });
                
                data.items.forEach(item => {
                    addItemToSidebar(item, item.item_id);
                });
            }
        })
        .catch(error => console.error('Error initializing wishlist:', error));
}

    initializeWishlist();

            function toggleWishlist(itemId, button) {
    const isInWishlist = button.classList.contains('in-wishlist');
    const url = isInWishlist
        ? '{{ route('wishlist.remove') }}'
        : '{{ route('wishlist.add') }}';

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ item_id: itemId }),
    })
        .then(response => response.json())
        .then(data => {
            toastr.clear(); // Clear any previous toastr messages
            if (data.success) {
                if (isInWishlist) {
                    button.classList.remove('in-wishlist');
                    button.innerHTML = '<i class="far fa-heart"></i>';
                    removeItemFromSidebar(itemId);
                } else {
                    button.classList.add('in-wishlist');
                    button.innerHTML = '<i class="fas fa-heart"></i>';
                    const newItem = {
                        item_picture: button.getAttribute('data-item-picture'),
                        item_name: button.getAttribute('data-item-name'),
                        item_price: button.getAttribute('data-item-price'),
                    };
                    addItemToSidebar(newItem, itemId);
                }
                toastr.success(data.message);
            } else {
                toastr.success(data.message);
            }
        })
        .catch(error => console.error('Error adding/removing item:', error));
    }

            // Add to Cart
    const addToCartButtons = document.querySelectorAll('.cartConfirm');
    const cartCounter = document.querySelector('.cart_counter'); // Use your existing counter element

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = button.getAttribute('data-product-id');

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 }),
            })
            .then(response => response.json())
            .then(data => {
                toastr.clear(); // Clear any previous toastr messages
                if (data.success) {
                    // Safely update the counter
                    let currentCount = parseInt(cartCounter.textContent, 10); // Parse the current value safely
                    if (isNaN(currentCount)) {
                        currentCount = 0; // Initialize to 0 if the counter is empty or invalid
                    }
                    cartCounter.textContent = currentCount + 1; // Increment the counter
                    toastr.success('Item added to cart successfully!');
                } else {
                    toastr.error(data.message || 'Error adding item to cart.');
                }
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
                toastr.error('An unexpected error occurred while adding to cart.');
            });
    });
});


            // Fetch Wishlist Sidebar
            function fetchWishlistSidebar() {
                fetch('{{ route('wishlist.fetch') }}', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        wishlistContainer.innerHTML = '';
                        if (data.success && data.items.length > 0) {
                            data.items.forEach(wishlistItem => {
                                const item = wishlistItem.item;
                                const wishlistHtml = `
                                    <div class="white_item" id="wishlist-item-${wishlistItem.item_id}">
                                        <div class="item_image">
                                            <img src="/storage/items/${item.item_picture}" alt="${item.item_name}">
                                        </div>
                                        <div class="item_content">
                                            <h4 class="item_title">${item.item_name}</h4>
                                            <span class="item_price">$${parseFloat(item.item_price).toFixed(2)}</span>
                                        </div>
                                    </div>
                                `;
                                wishlistContainer.insertAdjacentHTML('beforeend', wishlistHtml);
                            });
                        } else {
                            wishlistContainer.innerHTML = '<p>Your wishlist is empty.</p>';
                        }
                    })
                    .catch(error => console.error('Error updating wishlist:', error));
            }


            
            // Search and Filter Functionality
            function filterAndSearchProducts() {
                const searchValue = productSearch.value.toLowerCase();
                const selectedType = itemTypeFilter.value.toLowerCase();

                products.forEach(product => {
                    const productType = product.getAttribute('data-item-type').toLowerCase();
                    const productName = product.querySelector('.product-name').textContent.toLowerCase();

                    const matchesSearch = productName.includes(searchValue);
                    const matchesFilter = selectedType === 'all' || productType === selectedType;

                    if (matchesSearch && matchesFilter) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            // Attach event listeners for search and filter
            productSearch.addEventListener('input', filterAndSearchProducts);
            itemTypeFilter.addEventListener('change', filterAndSearchProducts);
        });

        
       
    </script>
</section>
</html>