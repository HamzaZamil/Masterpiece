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
                                            class="product-action-btn" 
                                            data-tooltip-text="Quick View" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#exampleProductModal{{ $item->id }}">
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

                <!-- Modal for each item -->
                <div class="quickview-product-modal modal fade" id="exampleProductModal{{ $item->id }}">
                    <div class="modal-dialog mw-100">
                        <div class="container">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Product Image Start -->
                                        <div class="col-lg-6">
                                            <div>
                                                <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="316px" width="316px" alt="{{ $item->item_name }}">
                                            </div>
                                        </div>

                                        <!-- Product Content Start -->
                                        <div class="col-lg-6">
                                            <div class="single-product-content">
                                                <h1 class="single-product-title">{{ $item->item_name }}</h1>
                                                <div class="single-product-price">${{ number_format($item->item_price, 2) }}</div>
                                                
                                                <div class="single-product-text">
                                                    <p>{{ $item->item_description }}</p>
                                                </div>
                                                
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input id="quantity{{ $item->id }}" name="quantity" class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec ctnbutton">-</div>
                                                        <div class="inc ctnbutton">+</div>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart-btn">
                                                    <a href="#" class="add-to-cart-link" data-product-id="{{ $item->id }}">Add to Cart</a>
                                                </div>
                                                <ul class="single-product-meta">
                                                    <li>
                                                        <span class="label">Type:</span>
                                                        <span class="value">{{ $item->item_type }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="label">Stock:</span>
                                                        <span class="value">{{ $item->item_stock }}</span>
                                                    </li>
                                                    @if($item->category)
                                                    <li>
                                                        <span class="label">Category:</span>
                                                        <span class="value">{{ $item->category->name }}</span>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            const addToCartButtons = document.querySelectorAll('.add-to-cart-link, .cartConfirm');

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
                            if (data.message) {
                                alert(data.message);
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
