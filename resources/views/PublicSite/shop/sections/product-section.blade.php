<html>

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
            <div class="col-md-6 d-flex">
                <label for="itemTypeFilter" class="me-2 align-self-center"><strong>Filter by: </strong></label>
                <select id="itemTypeFilter" class="form-control" style="padding: 10px; font-size: 1rem; width: 50%; border: 1px solid #ddd; box-shadow: 1px;">
                    <option value="all" selected>All Categories</option>
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="fish">Fish</option>
                    <option value="bird">Bird</option>
                </select>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <input type="text" id="productSearch" class="form-control" placeholder="Search for products..."
                    style="padding: 10px; font-size: 1rem; width: 50%; border: 1px solid #ddd; box-shadow: none;">
            </div>
        </div>

        <!-- Product Grid -->
        <div class="product-box">
            <div class="row" id="productContainer">
                @foreach($items as $index => $item)
                <div class="col-lg-3 col-md-6 product-item" data-item-type="{{ strtolower($item->item_type) }}" 
                     style="display: {{ $index < 8 ? 'block' : 'none' }};">
                    <div class="collection-single-box wow fadeInUp">
                        <div class="collection-box-thumb">
                            <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="250px" width="300px" alt="{{ $item->item_name }}">
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
                                <h6>${{ number_format($item->item_price, 2) }}</h6>
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
                <button id="showMoreBtn" class="btn btn-primary" style="display: none;">Show More</button>
            </div>
        </div>
    </div>

    <!-- Wishlist and Other Functionalities -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const showMoreBtn = document.getElementById('showMoreBtn');
            const productContainer = document.getElementById('productContainer');
            const products = productContainer.querySelectorAll('.product-item');

            let visibleCount = 8; // Number of items initially visible

            // Show the "Show More" button if there are more products than visibleCount
            if (products.length > visibleCount) {
                showMoreBtn.style.display = 'block';
            }

            showMoreBtn.addEventListener('click', function () {
                // Increase the visible count
                visibleCount += 8;

                // Show the next set of products
                let hiddenProducts = 0;
                products.forEach((product, index) => {
                    if (index < visibleCount) {
                        product.style.display = 'block';
                    } else {
                        hiddenProducts++;
                    }
                });

                // Hide the button if all products are visible
                if (hiddenProducts === 0) {
                    showMoreBtn.style.display = 'none';
                }
            });
        });
    </script>
</section>

</html>
