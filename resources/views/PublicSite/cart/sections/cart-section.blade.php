<section class="cart-section">
    <div class="container">
        <div class="row mb-n6 mb-lg-n10">
            <h2 class="cart-title mb-4">Cart List</h2>

            <div class="col-12 mb-6 mb-lg-10">

                <!-- Cart Table For Tablet & Up Devices Start -->
                <table class="cart-table table table-bordered text-center align-middle mb-6 d-none d-md-table">
                    <thead>
                        <tr>
                            <th class="imag">Image</th>
                            <th class="titl">Product</th>
                            <th class="pric">Price</th>
                            <th class="quantit">Quantity</th>
                            <th class="tota">Total</th>
                            <th class="remov">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <tr data-id="1">
                            <th><a href="shop-details.html">
                                    <img class="cart-thumb" src={{("assets/user/images/main-thumb/collection-thumb8.jpg")}} alt="thumb">
                                </a></th>
                            <td><a href="shop-details.html">House Coffee Original</a></td>
                            <td class="price">$110.00</td>
                            <td>
                                <div class="product-quantity-count">
                                    <input class="quantity" type="number" name="quantity" min="1" value="1">
                                </div>
                            </td>
                            <td class="total">$110.00</td>
                            <td><button class="remove-btn"><i class="fas fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <th><a href="shop-details.html">
                                    <img class="cart-thumb" src={{("assets/user/images/main-thumb/collection-thumb4.jpg")}} alt="thumb">
                                </a></th>
                            <td><a href="shop-details.html">Medium Roast Ground Coffee</a></td>
                            <td class="price">$19.00</td>
                            <td>
                                <div class="product-quantity-count">
                                    <input class="quantity" type="number" name="quantity" min="1" value="1">
                                </div>
                            </td>
                            <td class="total">$19.00</td>
                            <td><button class="remove-btn"><i class="fas fa-times"></i></button></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Cart Table For Tablet & Up Devices End -->

                <!-- Cart Table For Mobile Devices Start -->
                <div class="cart-products-mobile d-md-none">
                    <div class="cart-product-mobile">
                        <div class="cart-product-mobile-thumb">
                            <a href="shop-details.html" class="cart-product-mobile-image">
                                <img src={{("assets/user/images/main-thumb/collection-thumb8.jpg")}} alt="House Coffee Original" width="90" height="103">
                            </a>
                            <button class="cart-product-mobile-remove"><i class="bi bi-x-circle"></i></button>
                        </div>
                        <div class="cart-product-mobile-content">
                            <h5 class="cart-product-mobile-title"><a href="shop-details.html">House Coffee Original</a></h5>
                            <span class="cart-product-mobile-quantity">1 x <span class="price2">$110.00</span></span>
                            <span class="cart-product-mobile-total"><b>Total:</b> <span class="total2">$110.00</span> </span>
                            <div class="product-quantity-count">
                                <input class="quantity2" type="number" name="quantity" min="1" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="cart-product-mobile">
                        <div class="cart-product-mobile-thumb">
                            <a href="shop-details.html" class="cart-product-mobile-image">
                                <img src={{("assets/user/images/main-thumb/collection-thumb4.jpg")}} alt="" width="90" height="103">
                            </a>
                            <button class="cart-product-mobile-remove"><i class="bi bi-x-circle"></i></button>
                        </div>
                        <div class="cart-product-mobile-content">
                            <h5 class="cart-product-mobile-title"><a href="shop-details.html">Medium Roast Ground Coffee</a></h5>
                            <span class="cart-product-mobile-quantity">1 x <span class="price2">$18.00</span></span>
                            <span class="cart-product-mobile-total"><b>Total:</b> <span class="total2">$18.00</span> </span>
                            <div class="product-quantity-count">
                                <input class="quantity2" type="number" name="quantity" min="1" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart Table For Mobile Devices End -->

                <!-- Cart Action Buttons Start -->
                <div class="row justify-content-between gap-3">
                    <div class="col-auto cat-shop-btn "><button>Continue Shopping <i class="bi bi-arrow-right-short"></i> <span></span></button></div>
                    <div class="col-auto d-flex flex-wrap gap-3 cat-shop-btn ">
                        <button>Update Cart <i class="bi bi-arrow-right-short"></i> <span></span></button>
                        <button>Clear Cart <i class="bi bi-arrow-right-short"></i> <span></span></button>
                    </div>
                </div>
                <!-- Cart Action Buttons End -->

            </div>

            <!-- Cart Totals Start -->
            <div class="col mb-6 d-none d-md-table">
                <div class="cart-totals">
                    <h4 class="title">Cart totals</h4>
                    <table class="table table-borderless bg-transparent">
                        <tbody>
                            <tr class="subtotal">
                                <th>Subtotal</th>
                                <td><span id="subtotal">£242.00</span></td>
                            </tr>
                            <tr class="shopping-fee">
                                <th>Shopping Fee</th>
                                <td><span id="shopping">$5.00</span></td>
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                <td><strong><span id="total">£242.00</span></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="show-alert btn btn-dark">Proceed to checkout</button>
                </div>
            </div>
            <!-- Cart Totals End -->

            <!-- Cart Totals For Mobile Devices Start -->
            <div class="col d-md-none">
                <div class="cart-totals">
                    <h4 class="title">Cart totals</h4>
                    <table class="table table-borderless bg-transparent">
                        <tbody>
                            <tr class="subtotal">
                                <th>Subtotal</th>
                                <td><span id="subtotal2">£242.00</span></td>
                            </tr>
                            <tr class="shopping-fee">
                                <th>Shopping Fee</th>
                                <td><span id="shopping2">$5.00</span></td>
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                <td><strong><span id="total2">£242.00</span></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="show-alert btn btn-dark">Proceed to checkout</button>
                </div>
            </div>
            <!-- Cart Totals For Mobile Devices End -->

        </div>
    </div>
</section>