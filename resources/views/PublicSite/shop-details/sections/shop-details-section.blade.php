<style>
    /* Style for buttons to remove borders and center text */
.btn {
    background-color: #5c636a; /* Change to your preferred color */
    color: #fff; /* Text color */
    padding: 1px;
    border: none; /* Remove borders */
    border-radius: 5px; /* Optional: Add some rounding */
    cursor: pointer;
}

/* Hover effect for buttons */
.btn:hover {
    background-color: #5c636a; /* Slightly darker shade on hover */
}


</style>

<section class="shop-details-section" id="shop-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="thumb-tabs">
                    <!-- Main Image -->
                    <div class="tab-content active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shop-details-thumb">
                                    <img src="{{ asset('storage/items/' . $item->item_picture) }}" alt="{{ $item->item_name }}" width="400px" style="object-fit: contain;"  height="400px">
                                    {{-- <div class="add-to-favourite">
                                        <a href="#"><i class="far fa-heart"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
 
                </div>
            </div>

            <div class="col-lg-6">
                <div class="shop-details-content wow fadeInUp">
                    <div class="shop-details-title">
                        <h2>{{ $item->item_name }}</h2>
                    </div>
                    <br>
                 

                    <!-- Price Section -->
                    <div class="shop-details-price">
                        <h5>Price: {{ number_format($item->item_price, 2) }} JD</h5>
                    </div>

                    <!-- stock Section -->
                    {{-- <div class="shop-details-price">
                        <h5>Stock: <small>{{ ($item->item_stock) }}</small></h5>
                    </div> --}}

                    <!-- Description -->
                    <div class="shop-details-desc">
                        <p>{{ $item->item_description }}</p>
                    </div>

                    <!-- Color Section -->
                    <div class="shop-details-color">
                        <h5>Category: <span>{{ $item->item_type }}</span></h5>
                    </div>

                    <!-- Quantity Selector -->
                        <div class="quantity">
                            <div class="cart-plus-minus">
                                <button class="dec ctnbutton">-</button>
                                <input id="quantity2" name="quantity" class="cart-plus-minus-box" value="1" type="text">
                                <button class="inc ctnbutton">+</button>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="add-to-cart-btn">
                            <a href="#" class="btn btn-secondary add-to-cart-link" data-product-id="{{ $item->id }}">Add to Cart</a>
                        </div>
                        <br>

                        <!-- Back to Shop Button -->
                        <div class="add-to-cart-btn">
                            <a href="{{ route('shop') }}" class="btn btn-secondary">Back to Shop Page</a>
                        </div>



                  
                </div>
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


    document.addEventListener("DOMContentLoaded", function () {
    const quantityInput = document.getElementById("quantity2");
    const decrementButton = document.querySelector(".dec");
    const incrementButton = document.querySelector(".inc");

    // Ensure only one event listener is added for decrement button
    decrementButton.addEventListener("click", function (e) {
        e.preventDefault();
        const currentValue = parseInt(quantityInput.value) || 1;
        if (currentValue > 1) {
            quantityInput.value = currentValue - 0;
        }
    });

    // Ensure only one event listener is added or infcrement button
    incrementButton.addEventListener("click", function (e) {
        e.preventDefault();
        const currentValue = parseInt(quantityInput.value) || 1;
        quantityInput.value = currentValue + (0);
    });

    // Add to Cart AJAX Functionality
    const addToCartButton = document.querySelector(".add-to-cart-link");
    addToCartButton.addEventListener("click", function (e) {
        e.preventDefault();
        const productId = this.getAttribute("data-product-id");
        const quantity = parseInt(quantityInput.value) || 1;

        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ product_id: productId, quantity: quantity }),
        })
        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success('Item added to cart successfully.');
                                // Optionally, update the cart counter here
                            } else {
                                toastr.error(data.message || 'Error adding item to cart.');
                            }
                        })
                        .catch(error => {
                            console.error('Error adding to cart:', error);
                        });
    });
});

</script>