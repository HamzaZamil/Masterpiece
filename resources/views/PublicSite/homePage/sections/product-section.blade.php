<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cat-shop-section-title style2 wow fadeInUp">
                    <h1>Best Seller <span>Products</span></h1>
                </div>
            </div>
        </div>
        <div class="product-box" id="best/seller">
            <div class="row">
                @foreach($firstItems as $item)
                <div class="col-lg-3 col-md-6 product-item">
                    <div class="collection-single-box wow fadeInUp">
                        <div class="collection-box-thumb">
                            <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="250px" width="300px" alt="{{ $item->item_name }}" style="object-fit: contain">
                        </div>
                        <div class="collection-box-content">
                            <div class="collection-icon">
                                <ul>
                                    <li>
                                        <button 
                                            class="product-action-btn wishlistBtn {{ in_array($item->id, $wishlistItems ?? []) ? 'in-wishlist' : '' }}" 
                                            data-item-id="{{ $item->id }}" 
                                            data-item-picture="{{ $item->item_picture }}" 
                                            data-item-name="{{ $item->item_name }}" 
                                            data-item-price="{{ $item->item_price }}" 
                                            data-tooltip-text="Add to Wish list" onClick="toggleWishlist({{ $item->id }}, this)">
                                            <i class="{{ in_array($item->id, $wishlistItems ?? []) ? 'fas' : 'far' }} fa-heart"></i>
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
    </div>

    <script>

toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right", // Adjust as needed
        timeOut: 2000, // Display duration: 2000ms (2 seconds)
        extendedTimeOut: 1000, // Extra time when hovering
    };


        document.addEventListener("DOMContentLoaded", function () {
            const wishlistContainer = document.getElementById('wishlistContainer'); // Access sidebar container

            // Add item to the sidebar dynamically
            function addItemToSidebar(item, itemId) {
                if (!document.getElementById(`wishlist-item-${itemId}`)) { // Prevent duplicates
                    const wishlistHtml = `
                        <div class="white_item" id="wishlist-item-${itemId}">
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
                }
                // Synchronize heart icon for the item
                document
                    .querySelectorAll(`.wishlistBtn[data-item-id="${itemId}"]`)
                    .forEach(button => {
                        button.classList.add('in-wishlist');
                        button.innerHTML = '<i class="fas fa-heart"></i>';
                    });
            }

            // Remove item from the sidebar dynamically
            function removeItemFromSidebar(itemId) {
                const itemElement = document.getElementById(`wishlist-item-${itemId}`);
                if (itemElement) {
                    itemElement.remove();
                }
                // Synchronize heart icon for the item
                document
                    .querySelectorAll(`.wishlistBtn[data-item-id="${itemId}"]`)
                    .forEach(button => {
                        button.classList.remove('in-wishlist');
                        button.innerHTML = '<i class="far fa-heart"></i>';
                    });
            }

           
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
            console.log(data)
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
                console.log("اشتغلت")
                toastr.sucess(data.message);
            }
        })
        .catch(error => console.error('Error adding/removing item:', error));
}

            // Fetch initial wishlist state for the sidebar
            fetch('{{ route('wishlist.fetch') }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => response.json())
                .then(data => {
                    wishlistContainer.innerHTML = ''; // Clear existing content
                    if (data.success && data.items.length > 0) {
                        data.items.forEach(wishlistItem => {
                            const item = wishlistItem.item;
                            addItemToSidebar(item, wishlistItem.item_id); // Populate sidebar
                        });
                    } else {
                        wishlistContainer.innerHTML = `<p class="text-center">Your wishlist is empty.</p>`;
                    }
                })
                .catch(error => console.error('Error fetching wishlist:', error));

            // Add to Cart Functionality
            const addToCartButtons = document.querySelectorAll(".cartConfirm");
            const cartCounter = document.querySelector('.cart_counter'); // Use your existing counter element

            addToCartButtons.forEach(button => {
                button.addEventListener("click", function (e) {
                    e.preventDefault();

                    const productId = this.getAttribute("data-product-id");

                    fetch("{{ route('cart.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({ product_id: productId, quantity: 1 }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            toastr.clear();
                            if (data.success) {
                                toastr.success('Item added to cart successfully.');

                                // Safely update the cart counter
                                let currentCount = parseInt(cartCounter.textContent, 10); // Parse the current value safely
                                if (isNaN(currentCount)) {
                                    currentCount = 0; // Initialize to 0 if the counter is empty or invalid
                                }
                                cartCounter.textContent = currentCount + 1; // Increment the counter
                            } else {
                                toastr.error(data.message || 'Error adding item to cart.');
                            }
                        })
                        .catch(error => {
                            console.error('Error adding to cart:', error);
                            toastr.error('An unexpected error occurred.');
                        });
                });
            });

        });
    </script>
</section>
