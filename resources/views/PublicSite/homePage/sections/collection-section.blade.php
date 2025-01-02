<html>
    <section class="collection-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cat-shop-section-title wow fadeInUp">
                        <h1>New <span>Arrivals</span></h1>
                    </div>
                </div>
            </div>
            <div class="collection-box">
                <div class="row">
                    @foreach($latestItems as $item)
                    <div class="col-lg-3 col-md-6 product-item">
                        <div class="collection-single-box wow fadeInUp">
                            <div class="collection-box-thumb">
                                <img src="{{ asset('storage/items/' . $item->item_picture) }}" height="250px" width="300px" alt="{{ $item->item_name }}">
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
                                                data-tooltip-text="Add to Wish list">
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
                                    <h6>${{ number_format($item->item_price, 2) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        
    </section>
</html>
