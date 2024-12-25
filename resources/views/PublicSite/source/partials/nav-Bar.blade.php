


<header class="header-manu-section" id="header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="Cat Shop-logo">
                    <a href="index-2.html" title="Cat Master">
                        <img src="assets/images/main-thumb/cat-logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <nav class="header-menu">
                    <ul>
                        <li><a href="/" class="active">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="whyChooseUs">Why Choose Us</a></li>
                        <li><a href="contactPage">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-5">
                <div class="header-menu-right">
                    <div class="header-menu-btn">
                        <ul>
                            <!-- Cart Button -->
                            <li>
                                <button class="cart_btn headers-button" type="button">
                                    <i class="bi bi-cart3"></i>
                                    <small class="cart_counter">4</small>
                                </button>
                            </li>

                            <!-- Wishlist Button (moved beside the cart) -->
                            <li>
                                <button class="white_btn headers-button wishlist-btn" type="button" id="wishlistButton">
                                    <i class="far fa-heart"></i>
                                </button>
                            </li>

                            <!-- Profile Dropdown -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle text-dark fs-5" role="button" id="newProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                        <i class="bi bi-person"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="newProfileDropdown">
                                        @if(Auth::check())
                                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        @else
                                            <li><a class="dropdown-item" href="/login">Log In</a></li>
                                            <li><a class="dropdown-item" href="/register">Register</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
