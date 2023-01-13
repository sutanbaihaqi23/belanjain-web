<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	
	session_start();

	function http_request($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	$email = $_SESSION['customer'];
	$subtotal = 0;

	$data = http_request("http://localhost/belanjain/api/product/product-list.php");
	$data = json_decode($data, TRUE); 

	$cart_list = http_request("http://localhost/belanjain/api/customer_cart/cart-list.php?email='$email'");
	$cart_list = json_decode($cart_list, TRUE); 

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Product</title>
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
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css" />
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

								<li class="active-menu">
									<a href="product.php">Shop</a>
								</li>
							</ul>
						</div>

						<!-- Icon header -->
						<div class="wrap-icon-header flex-w flex-r-m">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>

							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
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

					<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
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
						<?php foreach ((array)$cart_list as $cart_list) { ?>
							<li class="header-cart-item flex-w flex-t m-b-12">
								<div class="header-cart-item-img">
								<img src="../product-image/<?= $cart_list["image"]?>" alt="IMG" />
								</div>

								<div class="header-cart-item-txt p-t-8">
									<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04"> <?= $cart_list["product_name"] ?> </a>

									<span class="header-cart-item-info"> 
										<?= $cart_list["quantity"] ?> x <?php echo "Rp " .number_format(($cart_list['price']*$cart_list["quantity"]), 0, '', '.') ?> 
									</span>
								</div>
							</li>

							<?php 
								$subtotal += ($cart_list['price']*$cart_list["quantity"]);
							?>
							
						<?php } ?>
					</ul>

					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">Total: 
							<?php 
								echo "Rp " .number_format($subtotal, 0, '', '.')
							?> 
						</div>

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

		<!-- Product -->
		<div class="bg0 m-t-23 p-b-140">
			<div class="container">
				<div class="flex-w flex-sb-m p-b-52">
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
							All Products
						</button>

						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">Women</button>

						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">Men</button>

						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".kids">Kids</button>
					</div>
				</div>

				<div class="row isotope-grid">
					<?php foreach ($data as $data) { ?>
						<a href="product-detail.php?id=<?= $data["id"] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= $data["category"] ?>">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="../product-image/<?= $data["image1"] ?>" alt="IMG-PRODUCT" />
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l">
											<a href="product-detail.php?id=<?= $data["id"] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?= $data["brand_name"] . " - " . $data["product_name"] ?>
											</a>

											<span class="stext-105 cl3"> 		
												<?php echo "Rp " .number_format($data['price'], 0, '', '.') ?>
											</span>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>

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
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/slick/slick.min.js"></script>
		<script src="js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/parallax100/parallax100.js"></script>
		<script>
			$(".parallax100").parallax100();
		</script>
		<!--===============================================================================================-->
		<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
		<script>
			$(".gallery-lb").each(function () {
				// the containers for all your galleries
				$(this).magnificPopup({
					delegate: "a", // the selector for gallery item
					type: "image",
					gallery: {
						enabled: true,
					},
					mainClass: "mfp-fade",
				});
			});
		</script>
		<!--===============================================================================================-->
		<script src="vendor/isotope/isotope.pkgd.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/sweetalert/sweetalert.min.js"></script>
		<script>
			$(".js-addwish-b2, .js-addwish-detail").on("click", function (e) {
				e.preventDefault();
			});

			$(".js-addwish-b2").each(function () {
				var nameProduct = $(this).parent().parent().find(".js-name-b2").html();
				$(this).on("click", function () {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass("js-addedwish-b2");
					$(this).off("click");
				});
			});

			$(".js-addwish-detail").each(function () {
				var nameProduct = $(this).parent().parent().parent().find(".js-name-detail").html();

				$(this).on("click", function () {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass("js-addedwish-detail");
					$(this).off("click");
				});
			});

			/*---------------------------------------------*/

			$(".js-addcart-detail").each(function () {
				var nameProduct = $(this).parent().parent().parent().parent().find(".js-name-detail").html();
				$(this).on("click", function () {
					swal(nameProduct, "is added to cart !", "success");
				});
			});
		</script>
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
		<script src="js/main.js"></script>
	</body>
</html>
