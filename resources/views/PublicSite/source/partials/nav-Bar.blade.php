<!--==================================================-->
	<!-- Start Cat Shop Header Menu Section -->
	<!--==================================================-->
	<header class="header-manu-section" id="header-sticky">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-2">
					<div class="Cat Shop-logo ">
						<a href="index-2.html" title="Cat Master"><img src="assets/images/main-thumb/cat-logo.png"
								alt="logo"></a>
					</div>
				</div>
				<div class="col-lg-5">
					<nav class="header-menu ">
						<ul>
							<li><a href="/" class="active">Home</a>
							</li>
							<li><a href="/shop">Shop </a>
							</li>
							<li><a href="whyChooseUs">Why Choose Us</a></li>
							<li><a href="contactPage">Contact</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-5">
					<div class="header-menu-right">
						
						<div class="header-menu-btn">
							<ul>
								<li><button class="cart_btn headers-button" type="button">
										<i class="bi bi-cart3"></i>
										<small class="cart_counter">4</small>
									</button>
								</li>
								<li><button class="white_btn headers-button" type="button">
										<i class="far fa-heart"></i>
									</button>
								</li>
								<li><button class="white_btn headers-button" type="button">
									<i class="bi bi-person"></i>
									
									</button>
								</li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<button type="submit" class="btn btn-danger">
										Logout
									</button>
								</form>
								

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--==================================================-->
	<!-- End Cat Shop Header Main Section -->
	<!--==================================================-->





	<!--==================================================-->
	<!-- Start Main Menu Area -->
	<!--==================================================-->
	<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
		<div class="mobile-menu">
			<nav class="header-menu">
				<ul class="nav_scroll">
					<li class="menu-item-has-children"><a href="#">Home</a>
					</li>
					<li><a href="#">Shop </a>
					</li>
				<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!--==================================================-->
	<!-- End Main Menu Area -->
	<!--==================================================-->
