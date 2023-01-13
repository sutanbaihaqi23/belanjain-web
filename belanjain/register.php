<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon1.png" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<!--===============================================================================================-->
	</head>
	<body class="animsition">
		<!-- Header -->
		<header class="header-v2">
			<!-- Header desktop -->
			<div class="container-menu-desktop">
				<div class="wrap-menu-desktop how-shadow1">
					<nav class="limiter-menu-desktop container">
						<!-- Logo desktop -->
						<a href="#" class="logo">
							<img src="images/icons/ReLogo.png" alt="IMG-LOGO" />
						</a>

						<!-- Menu desktop -->
						<div class="menu-desktop">
							<ul class="main-menu">
								<li>
									<a href="index.php">Home</a>
								</li>

								<li>
									<a href="product.php">Shop</a>
								</li>
							</ul>
						</div>

						<!-- Icon header -->
						<div class="wrap-icon-header flex-w flex-r-m">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>

							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>

							<a href="account-details.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
								<i class="fa fa-user-circle-o"></i>
							</a>
						</div>
					</nav>
				</div>
			</div>

			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->
				<div class="logo-mobile">
					<a href="index.php"><img src="images/icons/ReLogo.png" alt="IMG-LOGO" /></a>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m m-r-15">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>

					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<a href="account-details.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
						<i class="fa fa-user-circle-o"></i>
					</a>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="main-menu-m">
					<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="product.php">Shop</a>
					</li>

					<li>
						<a href="#">About</a>
					</li>

					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
			</div>

			<!-- Modal Search -->
			<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
				<div class="container-search-header">
					<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
						<img src="images/icons/icon-close2.png" alt="CLOSE" />
					</button>

					<form class="wrap-search-header flex-w p-l-15">
						<button class="flex-c-m trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="plh3" type="text" name="search" placeholder="Search..." />
					</form>
				</div>
			</div>
		</header>

		<!-- Cart -->
		<div class="wrap-header-cart js-panel-cart">
			<div class="s-full js-hide-cart"></div>

			<div class="header-cart flex-col-l p-l-65 p-r-25">
				<div class="header-cart-title flex-w flex-sb-m p-b-8">
					<span class="mtext-103 cl2"> Your Cart </span>

					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>

				<div class="header-cart-content flex-w js-pscroll">
					<ul class="header-cart-wrapitem w-full">
						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="images/item-cart-01.jpg" alt="IMG" />
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04"> White Shirt Pleat </a>

								<span class="header-cart-item-info"> 1 x $19.00 </span>
							</div>
						</li>

						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="images/item-cart-02.jpg" alt="IMG" />
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04"> Converse All Star </a>

								<span class="header-cart-item-info"> 1 x $39.00 </span>
							</div>
						</li>

						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="images/item-cart-03.jpg" alt="IMG" />
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04"> Nixon Porter Leather </a>

								<span class="header-cart-item-info"> 1 x $17.00 </span>
							</div>
						</li>
					</ul>

					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">Total: $75.00</div>

						<div class="header-cart-buttons flex-w w-full">
							<a
								href="shoping-cart.php"
								class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10"
							>
								View Cart
							</a>

							<a
								href="shoping-cart.php"
								class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10"
							>
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Content page -->
		<section class="bg0 p-t-50 p-b-50">
			<div class="container">
				<div class="flex-w flex-tr justify-content-center">
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form action="../api/users/user-register.php" method="post" id="form_register">
							<h4 class="mtext-105 cl2 txt-center p-b-30">Register</h4>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input
									class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30"
									type="text"
									name="name"
									id="name"
									placeholder="Full Name"
								/>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input
									class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30"
									type="text"
									name="email"
									id="email"
									placeholder="Email"
								/>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input
									class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30"
									type="password"
									name="password"
									id="password"
									placeholder="Password"
								/>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input
									class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30"
									type="text"
									name="phone_number"
									id="phone_number"
									placeholder="Phone Number"
								/>
							</div>

							<div class="bor8 m-b-30">
								<textarea
									class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25"
									name="address"
									id="address"
									placeholder="Your Address"
								></textarea>
							</div>

							<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
								Sign Up
							</button>
							<div class="size-212 p-t-20">
								<span class="mtext-90 cl2"> Have an account? </span>
								<a href="login.php" class="mtext-90 cl2"> Login Here </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer class="bg3 p-t-75 p-b-32">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">Categories</h4>

						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Women </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Men </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Shoes </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Watches </a>
							</li>
						</ul>
					</div>

					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">Help</h4>

						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Track Order </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Returns </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> Shipping </a>
							</li>

							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04"> FAQs </a>
							</li>
						</ul>
					</div>

					<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">Tentang Kami</h4>

					<p class="stext-107 cl7 size-201">
					Belanjain adalah suatu website toko online yang dimana menyediakan banyak produk, terutama produk pakaian.
					</p>
						<div class="p-t-27">
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-instagram"></i>
							</a>

							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-pinterest-p"></i>
							</a>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">Newsletter</h4>

						<form>
							<div class="wrap-input1 w-full p-b-4">
								<input
									class="input1 bg-none plh1 stext-107 cl7"
									type="text"
									name="email"
									placeholder="email@example.com"
								/>
								<div class="focus-input1 trans-04"></div>
							</div>

							<div class="p-t-18">
								<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">Subscribe</button>
							</div>
						</form>
					</div>
				</div>

				<div class="p-t-40">
					<div class="flex-c-m flex-w p-b-18">
						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-01.png" alt="ICON-PAY" />
						</a>

						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-02.png" alt="ICON-PAY" />
						</a>

						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-03.png" alt="ICON-PAY" />
						</a>

						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-04.png" alt="ICON-PAY" />
						</a>

						<a href="#" class="m-all-1">
							<img src="images/icons/icon-pay-05.png" alt="ICON-PAY" />
						</a>
					</div>

					<p class="stext-107 cl6 txt-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script>
						belanjain All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
						<a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by
						<a href="https://themewagon.com" target="_blank">ThemeWagon</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</footer>

		<!-- Back to top -->
		<div class="btn-back-to-top" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="zmdi zmdi-chevron-up"></i>
			</span>
		</div>

		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function () {
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next(".dropDownSelect2"),
				});
			});
		</script>
		<!--===============================================================================================-->
		<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script>
			$(".js-pscroll").each(function () {
				$(this).css("position", "relative");
				$(this).css("overflow", "hidden");
				var ps = new PerfectScrollbar(this, {
					wheelSpeed: 1,
					scrollingThreshold: 1000,
					wheelPropagation: false,
				});

				$(window).on("resize", function () {
					ps.update();
				});
			});
		</script>
		<!--===============================================================================================-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
		<script src="js/map-custom.js"></script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>
	</body>
</html>
