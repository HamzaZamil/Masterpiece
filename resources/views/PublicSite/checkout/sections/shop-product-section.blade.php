<div class="shop-product-section">
    <div class="container">
        <form action="#" class="checkout-form">
            <div class="row g-4">

                <div class="col-lg-7">

                    <!-- Billing Address -->
                    <div id="billing-form">
                        <h4 class="mb-4">Billing Address</h4>
                        <div class="row row-cols-sm-2 row-cols-1 g-4">
                            <div class="col">
                                <label>First Name</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->name}}" id="c-name1" name="name" autocomplete="on" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Last Name</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->last_name}}" id="c-name2" name="name" autocomplete="on" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Email Address</label>
                                <input class="form-field" type="email" placeholder="{{Auth::user()->email}}" id="c-mail1" name="email" readonly disabled>
                            </div>
                            <div class="col">
                                <label>Phone number</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->phone_number}}" id="c-numb1" name="number" autocomplete="off" readonly disabled>
                            </div>
                           
                            <div class="col-sm-12">
                                <label>Address</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->address}}" id="c-addr1" name="name" autocomplete="off" readonly disabled>
                            </div>

                            <div class="col-sm-12">
                                <label>City</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->city}}" id="c-addr1" name="name" autocomplete="off" readonly disabled>
                            </div>

                            <div class="col-sm-12">
                                <label>Street</label>
                                <input class="form-field" type="text" placeholder="{{Auth::user()->street}}" id="c-addr1" name="name" autocomplete="off" readonly disabled>
                            </div>
                           
                           
                            
                            {{-- <div class="col-sm-12 d-flex flex-wrap">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="checkbox" id="create_account">
                                    <label class="form-check-label" for="create_account">Create an Acount?</label>
                                </div>
                                
                            </div> --}}
                        </div>

                    </div>

                

                </div>

                <div class="col-lg-5">

                    <!-- Checkout Summary Start -->
                    <div class="checkout-box">

                        <h4 class="mb-4">Cart Total</h4>

                        <table class="checkout-summary-table table table-borderless">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>House Coffee Original x 1</td>
                                    <td>$110.00</td>
                                </tr>
                                <tr>
                                    <td>Medium Roast Ground Coffee x 1</td>
                                    <td>$19.00</td>
                                </tr>
                                <tr>
                                    <td class="border-top">Sub Total</td>
                                    <td class="border-top">$129.00</td>
                                </tr>
                                <tr>
                                    <td class="border-top">Shipping Fee</td>
                                    <td class="border-top">$5.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="border-top">Grand Total</th>
                                    <th class="border-top">$139.00</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- Checkout Summary End -->

                    <!-- Payment Method Start -->
                    <div class="checkout-box">

                        <h4 class="mb-4">Payment Method</h4>

                        <div class="checkout-payment-method">


                            <div class="single-method form-check">
                                <input class="form-check-input" type="radio" id="payment_cash" name="payment-method">
                                <label class="form-check-label" for="payment_cash">Cash on Delivery</label>
                                <p>Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                            </div>

                            <div class="single-method form-check">
                                <input class="form-check-input" type="radio" id="payment_card" name="payment-method">
                                <label class="form-check-label" for="payment_card">Card Payment</label>
                                <p>Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                            </div>

                        </div>

                        <button class="btn btn-dark btn-primary-hover rounded-0 mt-6">Place order</button>

                    </div>
                    <!-- Payment Method End -->

                </div>

            </div>
        </form>
    </div>
</div>