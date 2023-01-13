<?php

	session_start();

	if($_SESSION['admin']==""){
		header("location: login.php?");
	}

	function http_request($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			return $output;
	}

	$email = $_SESSION['admin'];

	$admin = http_request("http://localhost/belanjain/api/admin/admin-details.php?email='$email'");
	$admin = json_decode($admin, TRUE); 

	$data = http_request("http://localhost/belanjain/api/users/user-list.php");
	$data = json_decode($data, TRUE); 

	$number = 1;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>Add Product</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />

		<!-- favicon1 -->
		<link rel="shortcut icon" href="public/img/favicon1.ico" />

		<!-- Template -->
		<link rel="stylesheet" href="public/graindashboard/css/graindashboard.css" />
	</head>

	<body class="has-sidebar has-fixed-sidebar-and-header">
		<!-- Header -->
		<header class="header bg-body">
			<nav class="navbar flex-nowrap p-0">
				<div class="navbar-brand-wrapper d-flex align-items-center col-auto">
					<!-- Logo For Mobile View -->
					<a class="navbar-brand navbar-brand-mobile" href="/">
						<img class="img-fluid w-100" src="public/img/logo_mini.png" alt="Graindashboard" />
					</a>
					<!-- End Logo For Mobile View -->

					<!-- Logo For Desktop View -->
					<a class="navbar-brand navbar-brand-desktop" href="/">
						<img
							class="side-nav-show-on-closed"
							src="public/img/logo_mini.png"
							alt="Graindashboard"
							style="width: auto; height: 33px"
						/>
						<img
							class="side-nav-hide-on-closed"
							src="public/img/ReLogo1.png"
							alt="Graindashboard"
							style="width: auto; height: 33px"
						/>
					</a>
					<!-- End Logo For Desktop View -->
				</div>

				<div class="header-content col px-md-3">
					<div class="d-flex align-items-center">
						<!-- Side Nav Toggle -->
						<a
							class="js-side-nav header-invoker d-flex mr-md-2"
							href="#"
							data-close-invoker="#sidebarClose"
							data-target="#sidebar"
							data-target-wrapper="body"
						>
							<i class="gd-align-left"></i>
						</a>
						<!-- End Side Nav Toggle -->

						<?php foreach ($admin as $admin) { ?>
							<!-- User Avatar -->
							<div class="dropdown mx-3 dropdown ml-auto">
								<a
									id="profileMenuInvoker"
									class="header-complex-invoker"
									href="#"
									aria-controls="profileMenu"
									aria-haspopup="true"
									aria-expanded="false"
									data-unfold-event="click"
									data-unfold-target="#profileMenu"
									data-unfold-type="css-animation"
									data-unfold-duration="300"
									data-unfold-animation-in="fadeIn"
									data-unfold-animation-out="fadeOut"
								>
									<!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
									<span class="mr-md-2 avatar-placeholder">
										<?php
											echo substr($admin["name"],0,1);
										?>
									</span>
									<span class="d-none d-md-block">
										<?= $admin["name"] ?>
									</span>
									<i class="gd-angle-down d-none d-md-block ml-2"></i>
								</a>

								<ul
									id="profileMenu"
									class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
									aria-labelledby="profileMenuInvoker"
									style="animation-duration: 300ms"
								>
									<li class="unfold-item">
										<a class="unfold-link d-flex align-items-center text-nowrap" href="#">
											<span class="unfold-item-icon mr-3">
												<i class="gd-user"></i>
											</span>
											My Profile
										</a>
									</li>
									<li class="unfold-item unfold-item-has-divider">
										<a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
											<span class="unfold-item-icon mr-3">
												<i class="gd-power-off"></i>
											</span>
											Sign Out
										</a>
									</li>
								</ul>
							</div>
							<!-- End User Avatar -->
						<?php } ?>
					</div>
				</div>
			</nav>
		</header>
		<!-- End Header -->

		<main class="main">
			<!-- Sidebar Nav -->
			<aside id="sidebar" class="js-custom-scroll side-nav">
				<ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
					<!-- Title -->
					<li class="sidebar-heading h6">Dashboard</li>
					<!-- End Title -->

					<!-- Dashboard -->
					<li class="side-nav-menu-item">
							<a class="side-nav-menu-link media align-items-center" href="index.php">
						<span class="side-nav-menu-icon d-flex mr-3">
							<i class="gd-dashboard"></i>
						</span>
									<span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
							</a>
					</li>
					<!-- End Dashboard -->

					<!-- Title -->
					<li class="sidebar-heading h6">Customers</li>
					<!-- End Title -->

					<!-- Users -->
					<li class="side-nav-menu-item side-nav-has-menu">
						<a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUsers">
							<span class="side-nav-menu-icon d-flex mr-3">
								<i class="gd-user"></i>
							</span>
							<span class="side-nav-fadeout-on-closed media-body">Customers</span>
							<span class="side-nav-control-icon d-flex">
								<i class="gd-angle-right side-nav-fadeout-on-closed"></i>
							</span>
							<span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
						</a>

						<!-- Users: subUsers -->
						<ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
							<li class="side-nav-menu-item">
								<a class="side-nav-menu-link" href="users.php">Customers List</a>
							</li>
							<li class="side-nav-menu-item">
								<a class="side-nav-menu-link" href="user-edit.php">Add new</a>
							</li>
						</ul>
						<!-- End Users: subUsers -->
					</li>
					<!-- End Users -->

					<!-- Title -->
					<li class="sidebar-heading h6">Products</li>
					<!-- End Title -->

					<!-- Product -->
					<li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
						<a class="side-nav-menu-link media align-items-center" href="#" data-target="#subPages">
							<span class="side-nav-menu-icon d-flex mr-3">
								<i class="gd-package"></i>
							</span>
							<span class="side-nav-fadeout-on-closed media-body">Products</span>
							<span class="side-nav-control-icon d-flex">
								<i class="gd-angle-right side-nav-fadeout-on-closed"></i>
							</span>
							<span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
						</a>

						<!-- Pages: subPages -->
						<ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block">
							<li class="side-nav-menu-item">
								<a class="side-nav-menu-link" href="products.php">Product List</a>
							</li>
							<li class="side-nav-menu-item active">
								<a class="side-nav-menu-link" href="product-register.php">Add new</a>
							</li>
						</ul>
						<!-- End Pages: subPages -->
					</li>
					<!-- End Product -->

					<!-- Settings -->
					<li class="side-nav-menu-item">
						<a class="side-nav-menu-link media align-items-center" href="#">
							<span class="side-nav-menu-icon d-flex mr-3">
								<i class="gd-settings"></i>
							</span>
							<span class="side-nav-fadeout-on-closed media-body">Settings</span>
						</a>
					</li>
					<!-- End Settings -->
				</ul>
			</aside>
			<!-- End Sidebar Nav -->

			<div class="content">
				<div class="py-4 px-3 px-md-4">
					<div class="card mb-3 mb-md-4">
						<div class="card-header">
							<h3 class="font-weight-semi-bold mb-0">Add Product</h3>
						</div>
						<div class="card-body pt-0">
							<!-- Form -->
							<div>
								<form action="../api/product/product-add.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="brand_name">Brand name</label>
										<input
											type="text"
											class="form-control"
											id="brand_name"
											name="brand_name"
											placeholder="Brand name"
										/>
									</div>

									<div class="form-group">
										<label for="product_name">Product name</label>
										<input
											type="text"
											class="form-control"
											id="product_name"
											name="product_name"
											placeholder="Product name"
										/>
									</div>

									<div class="form-group">
										<label for="category">Select category</label>
										<select class="form-control" id="category" name="category">
											<option value="" hidden>Select category</option>
											<option value="unisex">Unisex</option>
											<option value="men">Men</option>
											<option value="women">Women</option>
											<option value="kids">Kids</option>
										</select>
									</div>

									<div class="form-group">
										<label for="price">Product price</label>
										<input type="text" class="form-control" id="price" name="price" placeholder="Product price" />
									</div>

									<div class="form-group">
										<label for="quantity">Product quantity</label>
										<input
											type="text"
											class="form-control"
											id="quantity"
											name="quantity"
											placeholder="Product quantity"
										/>
									</div>

									<div class="form-group">
										<label for="description">Product description</label>
										<textarea
											class="form-control"
											id="description"
											name="description"
											rows="5"
										></textarea>
									</div>

									<div class="form-group">
										<label for="image1">Product image 1</label>
										<input type="file" class="form-control-file" id="image1" name="image0" />
									</div>

									<div class="form-group">
										<label for="image2">Product image 2</label>
										<input type="file" class="form-control-file" id="image2" name="image1" />
									</div>

									<div class="form-group">
										<label for="image3">Product image 3</label>
										<input type="file" class="form-control-file" id="image3" name="image2" />
									</div>

									<div class="mt-5">
										<button type="submit" class="btn btn-primary mb-2 mr-2">
											<i class="gd-check icon-text align-middle mr-2"></i>
											<span class="align-middle">Submit</span>
										</button>
										<button type="reset" class="btn btn-danger mb-2 mr-2">
											<i class="gd-close icon-text align-middle mr-2"></i>
											<span class="align-middle">Cancel</span>
										</button>
										<!-- <button class="btn btn-primary mr-3" type="submit">Submit</button>
										<button class="btn btn-secondary" type="submit">Cancel</button> -->
									</div>
								</form>
							</div>
							<!-- End Form -->
						</div>
					</div>
				</div>

				<!-- Footer -->
				<footer class="small p-3 px-md-4 mt-auto">
					<div class="row justify-content-between">
						<div class="col-lg text-center text-lg-right">&copy; 2022 belanjain. All Rights Reserved.</div>
					</div>
				</footer>
				<!-- End Footer -->
			</div>
		</main>

		<script src="public/graindashboard/js/graindashboard.js"></script>
		<script src="public/graindashboard/js/graindashboard.vendor.js"></script>
	</body>
</html>
