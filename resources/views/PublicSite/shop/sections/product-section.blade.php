<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cat-shop-section-title style2 wow fadeInUp">
                    <h1>Our <span>Shop</span></h1>
                </div>
            </div>
        </div>

        <!-- Quick Search Input Start -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-end">
                <input type="text" id="productSearch" class="form-control" placeholder="Search for products..." 
                style="padding: 10px; font-size: 1rem; width: 250px; border: 1px solid #ddd; box-shadow: none;">
            </div>
        </div>
        <!-- Quick Search Input End -->

        <div class="product-box">
            <div class="row" id="productContainer">
                @foreach($items as $item)
                <div class="col-lg-3 col-md-6 product-item">
                    <div class="collection-single-box wow fadeInUp">
                        <div class="collection-box-thumb">
                            <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="250px" width="300px" alt="{{ $item->item_name }}">
                        </div>
                        <div class="collection-box-content">
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
                                            onclick="window.location.href='{{ route('shop.show', $item->id) }}'">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </li>
                                    
                                    <li>
                                        <button class="product-action-btn cartConfirm" data-tooltip-text="Add to Cart" data-product-id="{{ $item->id }}">
                                            <i class="bi bi-cart4"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="collection-box-title">
                                <h6 class="product-name">{{ $item->item_name }}</h6>
                            </div>
                            <div class="collection-box-price">
                                <h6>${{ number_format($item->item_price, 2) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- JavaScript for Quick Search -->
    <script>

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "200",
    "hideDuration": "1000",
    "timeOut": "2000", // Set the duration to 2 seconds
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};


        document.getElementById('productSearch').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const products = document.querySelectorAll('.product-item');

            products.forEach(product => {
                const productName = product.querySelector('.product-name').textContent.toLowerCase();
                if (productName.includes(searchValue)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
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
                                toastr.success('Item added to cart successfully.');
                                // Optionally, update the cart counter here
                            } else {
                                toastr.success(data.message || 'Error adding item to cart.');
                            }
                        })
                        .catch(error => {
                            console.error('Error adding to cart:', error);
                        });
                });
            });
        });
    </script>
</section>
