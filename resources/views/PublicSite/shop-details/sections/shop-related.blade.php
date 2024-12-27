<section class="shop-related">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cat-shop-section-title style2 wow fadeInUp">
                    <h1>Related <span>Products</span></h1>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="row" id="relatedProductsContainer">
                <!-- Related products will be dynamically injected here -->
            </div>
        </div>
    </div>
</section>

<script>

toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right", // Adjust as needed
                timeOut: 2000, // Display duration: 2000ms (2 seconds)
                extendedTimeOut: 1000, // Extra time when hovering
            };

    document.addEventListener('DOMContentLoaded', function () {
        const itemId = "{{ $item->id }}"; // Current item ID

        // Fetch related products
        fetch(`/shop/related-products/${itemId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch related products.');
                }
                return response.json();
            })
            .then(data => {
                const container = document.getElementById('relatedProductsContainer');
                container.innerHTML = ''; // Clear existing content

                if (data.length === 0) {
                    container.innerHTML = '<p>No related products found.</p>';
                    return;
                }

                data.forEach(item => {
                    container.innerHTML += `
                        <div class="col-lg-3 col-md-6 product-item">
                            <div class="collection-single-box wow fadeInUp">
                                <div class="collection-box-thumb">
                                    <img src="/storage/items/${item.item_picture}" height="300px" width="400px" alt="${item.item_name}">
                                </div>
                                <div class="collection-box-content text-center">
                                    <div class="collection-icon">
                                        <ul>
                                            <li>
                                                <button class="product-action-btn whiteListConfirm" data-tooltip-text="Add to Wish list">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button 
                                                    class="product-action-btn whiteListConfirm" 
                                                    data-tooltip-text="Quick View" 
                                                    onclick="window.location.href='/shop/${item.id}'">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="product-action-btn cartConfirm" data-tooltip-text="Add to Cart" data-product-id="${item.id}">
                                                    <i class="bi bi-cart4"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="collection-box-title">
                                        <h6 class="product-name">${item.item_name}</h6>
                                    </div>
                                    <div class="collection-box-price">
                                        <h6>$${parseFloat(item.item_price).toFixed(2)}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                // Rebind the Add to Cart functionality
                bindAddToCartButtons();
            })
            .catch(error => {
                console.error('Error fetching related products:', error);
            });
    });

    // Add to Cart functionality
    function bindAddToCartButtons() {
        const addToCartButtons = document.querySelectorAll('.cartConfirm');

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
                        if (data.success) {
                            toastr.success('Item added to cart successfully.',);
                        } else {
                            toastr.error(data.message || 'Error adding item to cart.', '', { timeOut: 3000 });
                        }
                    })
                    .catch(error => {
                        console.error('Error adding to cart:', error);
                    });
            });
        });
    }
</script>
