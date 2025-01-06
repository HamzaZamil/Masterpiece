<html>
{{-- <header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
     <style>
         .toast {
     opacity: 1 !important;
     z-index: 9999; /* Ensure it appears above other elements */
     }
     .toast-success {
         background-color: #1d9f3c !important; /* Light green */
         color: #dfe0df !important; /* Dark green text */
     }
     </style>
</header> --}}
<section class="shop-related">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cat-shop-section-title style2 wow fadeInUp">
                    <h1>More <span>Products</span></h1>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="row">
                @foreach($relatedProducts as $relatedItem)
                <div class="col-lg-3 col-md-6 product-item">
                    <div class="collection-single-box wow fadeInUp">
                        <div class="collection-box-thumb">
                            <img src="{{ asset('storage/items/' . $relatedItem->item_picture) }}" height="250px" width="300px" style="object-fit: contain;"  alt="{{ $relatedItem->item_name }}">
                        </div>
                        <div class="collection-box-content text-center">
                            <div class="collection-icon">
                                <ul>
                                    <li>
                                        <button 
                                            class="product-action-btn wishlistBtn {{ in_array($relatedItem->id, $wishlistItems ?? []) ? 'in-wishlist' : '' }}" 
                                            data-item-id="{{ $relatedItem->id }}" 
                                            data-item-picture="{{ $relatedItem->item_picture }}" 
                                            data-item-name="{{ $relatedItem->item_name }}" 
                                            data-item-price="{{ $relatedItem->item_price }}" 
                                            data-tooltip-text="Add to Wish list" onClick="toggleWishlist({{ $relatedItem->id }}, this)">
                                            <i class="{{ in_array($relatedItem->id, $wishlistItems ?? []) ? 'fas' : 'far' }} fa-heart"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button 
                                            class="product-action-btn" 
                                            data-tooltip-text="Quick View" 
                                            onclick="window.location.href='{{ route('shop.show', $relatedItem->id) }}'">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button 
                                            class="product-action-btn cartConfirm" 
                                            data-tooltip-text="Add to Cart" 
                                            data-product-id="{{ $relatedItem->id }}">
                                            <i class="bi bi-cart4"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="collection-box-title">
                                <h6 class="product-name">{{ $relatedItem->item_name }}</h6>
                            </div>
                            <div class="collection-box-price">
                                <h6>{{ number_format($relatedItem->item_price, 2) }} JD</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wishlistContainer = document.getElementById('wishlistContainer');

        // Fetch and populate the wishlist sidebar
        function fetchWishlist() {
            fetch('{{ route('wishlist.fetch') }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => response.json())
                .then(data => {
                    wishlistContainer.innerHTML = ''; // Clear the container
                    if (data.success && data.items.length > 0) {
                        data.items.forEach(wishlistItem => {
                            const item = wishlistItem.item;
                            addItemToSidebar(item, wishlistItem.item_id);
                            // Pre-fill wishlist buttons
                            document
                                .querySelectorAll(`.wishlistBtn[data-item-id="${wishlistItem.item_id}"]`)
                                .forEach(button => {
                                    button.classList.add('in-wishlist');
                                    button.innerHTML = '<i class="fas fa-heart"></i>';
                                });
                        });
                    } else {
                        wishlistContainer.innerHTML = `<p class="text-center">Your wishlist is empty.</p>`;
                    }
                })
                .catch(error => console.error('Error fetching wishlist:', error));
        }

        // Add item to the sidebar dynamically
        function addItemToSidebar(item, itemId) {
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

        // Remove item from the sidebar dynamically
        function removeItemFromSidebar(itemId) {
            const itemElement = document.getElementById(`wishlist-item-${itemId}`);
            if (itemElement) {
                itemElement.remove();
            }
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
                toastr.error(data.message);
            }
        })
        .catch(error => console.error('Error adding/removing item:', error));
}

       // Add to Cart functionality
const addToCartButtons = document.querySelectorAll('.cartConfirm');
const cartCounter = document.querySelector('.cart_counter'); // Use your existing counter element

addToCartButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();

        const productId = this.getAttribute('data-product-id');

        fetch("{{ route('cart.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1, // Default quantity is 1
            }),
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
                toastr.error('An unexpected error occurred.');
            });
    });
});

        // Fetch initial wishlist state
        fetchWishlist();
    });
</script>
</html>