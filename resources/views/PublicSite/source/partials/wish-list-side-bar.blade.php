<div class="sidebar-menu-wrapper">
    <div class="white_sidebar">
        <button type="button" class="close_btn"><i class="fas fa-times"></i></button>
        <h2 class="heading_title text-uppercase">Your WishList</h2>

        <div class="white_items_list" id="wishlistContainer">
            <!-- Wishlist items will be dynamically populated -->
        </div>
    </div>
    <div class="white_sidebar_overlay"></div>
</div>

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
                        });
                    } else {
                        wishlistContainer.innerHTML = `<p class="text-center">Your wishlist is empty.</p>`;
                    }
                })
                .catch(error => console.error('Error fetching wishlist:', error));
        }

        // Add item to the sidebar dynamically
        function addItemToSidebar(item, itemId) {
            if (!document.getElementById(`wishlist-item-${itemId}`)) {
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
        }

        // Remove item from the sidebar dynamically
        function removeItemFromSidebar(itemId) {
            const itemElement = document.getElementById(`wishlist-item-${itemId}`);
            if (itemElement) {
                itemElement.remove();
            }
        }

        // Dynamically add/remove items from wishlist
        document.addEventListener('click', function (event) {
            if (event.target.closest('.wishlistBtn')) {
                const button = event.target.closest('.wishlistBtn');
                const itemId = button.getAttribute('data-item-id');
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
                                // Add item to sidebar immediately
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
        });

        // Initial fetch of the wishlist
        fetchWishlist();
    });
</script>
