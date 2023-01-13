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

	$product_id = $_GET['id'];
	$email = $_SESSION['customer'];
	$subtotal = 0;
	// echo("<div style='position: absolute; z-index: 9999'>fafa $email </div>");

	$data = http_request("http://localhost/belanjain/api/product/product-details.php?id=$product_id");
	$data = json_decode($data, TRUE);

	$data_product = http_request("http://localhost/belanjain/api/product/product-random.php");
	$data_product = json_decode($data_product, TRUE); 

	$cart_list = http_request("http://localhost/belanjain/api/customer_cart/cart-list.php?email='$email'");
	$cart_list = json_decode($cart_list, TRUE); 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Product Detail</title>
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

		<!-- breadcrumb -->
		<?php foreach ($data as $data) { ?>
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
					<?php 
						if($data["category"] != null){
							echo(ucfirst($data["category"]));
						}else{
							echo("All Product");
						}
					?>
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4"> 
					<?= $data["brand_name"] . " - " . $data["product_name"] ?> 
				</span>
			</div>
		</div>

		<form action="../api/customer_cart/cart-add.php" method="post">
		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="../product-image/<?= $data["image1"]?>">
										<div class="wrap-pic-w pos-relative">
											<img src="../product-image/<?= $data["image1"]?>" alt="IMG-PRODUCT" />

											<a
												class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
												href="../product-image/<?= $data["image1"]?>"
											>
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="../product-image/<?= $data["image2"]?>">
										<div class="wrap-pic-w pos-relative">
											<img src="../product-image/<?= $data["image2"]?>" alt="IMG-PRODUCT" />

											<a
												class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
												href="../product-image/<?= $data["image2"]?>"
											>
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="../product-image/<?= $data["image3"]?>">
										<div class="wrap-pic-w pos-relative">
											<img src="../product-image/<?= $data["image3"]?>" alt="IMG-PRODUCT" />

											<a
												class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
												href="../product-image/<?= $data["image3"]?>"
											>
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
					
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?= $data["brand_name"] . " - " . $data["product_name"] ?>
								<input 
									type="text" 
									name="product_name"
									value="<?= $data["brand_name"] . " - " . $data["product_name"] ?>" 
									hidden
								>
							</h4>

							<span class="mtext-106 cl2">
								<?php echo "Rp " .number_format($data['price'], 0, '', '.') ?> 
								<input 
									type="text" 
									name="price"
									value="<?= $data['price'] ?>" 
									hidden
								>
							</span>

							<p class="stext-102 cl3 p-t-23">
								<?= $data["description"]?>
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">Size</div>
									
									<div class="size-204 respon6-next">
										<div class="form-group rs1-select2 bor8 bg0">
											<select class="form-control js-select2" name="size">
												<option value="">Choose an option</option>
												<option value="S">S</option>
												<option value="M">M</option>
												<option value="L">L</option>
												<option value="XL">XL</option>
												<option value="XXL">XXL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">Color</div>

									<div class="size-204 respon6-next">
										<div class="form-group rs1-select2 bor8 bg0">
											<select class="form-control js-select2" name="color">
												<option value="">Choose an option</option>
												<option value="Red">Red</option>
												<option value="Blue">Black</option>
												<option value="White">White</option>
												<option value="Grey">Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1" />

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<input 
											type="text" 
											name="user_id"
											value="<?= $_SESSION['customer'] ?>" 
											hidden
										>

										<input 
											type="text" 
											name="product_id"
											value="<?= $data['id'] ?>" 
											hidden
										>

										<input 
											type="text" 
											name="image"
											value="<?= $data['image1'] ?>" 
											hidden
										>
										

										<button
											type="submit" 
											class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
										>
											Add to cart
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="bor10 m-t-50 p-t-43 p-b-40">
					<!-- Tab01 -->
					<div class="tab01">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item p-b-10">
								<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content p-t-43">
							<!-- - -->
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md">
									<p class="stext-102 cl6">
										Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in
										blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum
										sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut
										ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius
										molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim,
										nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in
										arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</form>
		<?php } ?>

		<!-- Related Products -->
		<section class="sec-relate-product bg0 p-t-45 p-b-105">
			<div class="container">
				<div class="p-b-45">
					<h3 class="ltext-106 cl5 txt-center">You Might Also Like</h3>
				</div>

				<!-- Slide2 -->
				<div class="wrap-slick2">
					<div class="slick2">
						<?php $i = 0; foreach ($data_product as $data_product => $val) { ?>
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 <?= $val["category"] ?>">
								<!-- Block2 -->
								<a href="product-detail.php?id=<?= $val["id"] ?>">
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="../product-image/<?= $val["image1"] ?>" alt="IMG-PRODUCT" />
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l">
												<a href="product-detail.php?id=<?= $val["id"] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?= $val["brand_name"] . " - " . $val["product_name"] ?>
												</a>

												<span class="stext-105 cl3"> 
													<?php echo "Rp " .number_format($val['price'], 0, '', '.') ?> 
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>	
						<?php if (++$i == 8) break; } ?>
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
				var nameProduct = "";
				$(this).on("click", function () {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass("js-addedwish-b2");
					$(this).off("click");
				});
			});

			$(".js-addwish-detail").each(function () {
				var nameProduct = "";

				$(this).on("click", function () {
					swal(nameProduct, "is added to wishlist !", "success");

					$(this).addClass("js-addedwish-detail");
					$(this).off("click");
				});
			});

			/*---------------------------------------------*/

			$(".js-addcart-detail").each(function () {
				var nameProduct = "";
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
