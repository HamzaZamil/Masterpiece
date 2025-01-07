<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="footer-logo">
                    <a href="/" title="Pettie"><img src="{{ asset('assets/img/pettieLogo.png') }}"  style="height: 100px; width: auto;"
                            alt="logo"></a>
                </div>
                <div class="footer-desc" style="margin-top: -45px !important">
                    <p>Discover joy with Pettie – premium food, toys, and care for your beloved pets.
                    </p>
                </div>
                <div class="footer-social">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> --}}
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="footer-link">
                    <div class="footer-title">
                        <h5>Useful Links</h5>
                    </div>
                    <ul>
                        <li><a href="/#new/arrivals"><i class="bi bi-arrow-right"></i>New Arrivals</a></li>
                        <li><a href="/#best/seller"><i class="bi bi-arrow-right"></i>Best Sellers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="footer-link">
                    <div class="footer-title">
                        <h5> Account</h5>
                    </div>
                    <ul>
                      @if(auth()->check())
                      <li><a href="user/profile"><i class="bi bi-arrow-right"></i>My Profile</a></li>
                      <li><a href="user/profile"><i class="bi bi-arrow-right"></i>My Order History</a></li>     
                      @else
                      <li><a href="/login"><i class="bi bi-arrow-right"></i>Login</a></li>
                      <li><a href="/register"><i class="bi bi-arrow-right"></i>Register</a></li>  
                      @endif
                        {{-- <li><a href="#"><i class="bi bi-arrow-right"></i>My Wish List</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="footer-contact">
                    <div class="footer-title">
                        <h5>Contact Us</h5>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone"></i> <a href="contactPage"> Phone:0799599201</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope"></i> <a href="contactPage"> Email: info@pettie.com</a>
                    </div>
                    <div class="footer-contact-item">
                        <div><i class="fas fa-map-marker-alt"></i> </div>
                        <div>
                            <h6> Amman, Jordan Ismail Zakaria St</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-bottom-desc wow fadeInLeft">
                        <p>Copyright 2024 @ Hamza Zamil. All rights reserved.</p>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="footer-shape">
        <div class="footer-shape1">
            <img src={{asset("assets/user/images/shape/footer-shape.png")}} alt="shape">
        </div>
        <div class="footer-shape2">
            <img src={{asset("assets/user/images/shape/footer-shape2.png")}} alt="shape">
        </div>
        <div class="footer-shape3">
            <img src={{asset("assets/user/images/shape/footer-shape3.png")}} alt="shape">
        </div>
        <div class="footer-shape4">
            <img src={{asset("assets/user/images/shape/footer-shape3.png")}} alt="shape">
        </div>
        <div class="footer-shape5">
            <img src={{asset("assets/user/images/shape/footer-shape.png")}} alt="shape">
        </div>
        <div class="footer-shape6">
            <img src={{asset("assets/user/images/shape/footer-shape.png")}} alt="shape">
        </div>
        <div class="footer-shape7">
            <img src={{asset("assets/user/images/shape/footer-shape_2.png")}} alt="shape">
        </div>
    </div>
</footer>

