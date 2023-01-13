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
		<title>Customers</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />

		<!-- Favicon -->
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
					<li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
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
						<ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block">
							<li class="side-nav-menu-item active">
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
					<li class="side-nav-menu-item side-nav-has-menu">
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
						<ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
							<li class="side-nav-menu-item">
								<a class="side-nav-menu-link" href="products.php">Product List</a>
							</li>
							<li class="side-nav-menu-item">
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
						<div class="card-body">
							<div class="mb-3 mb-md-4 d-flex justify-content-between">
								<div class="h3 mb-0">Customers List</div>
							</div>

							<!-- Users -->
							<div class="table-responsive-xl">
								<table class="table text-nowrap mb-0">
									<thead>
										<tr>
											<th class="font-weight-semi-bold border-top-0 py-2">#</th>
											<th class="font-weight-semi-bold border-top-0 py-2">Name</th>
											<th class="font-weight-semi-bold border-top-0 py-2">Email</th>
											<th class="font-weight-semi-bold border-top-0 py-2">Registration Date</th>
											<th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($data as $data) { ?>
											<tr>
												<td class="py-3"><?= $number++ ?></td>
												<td class="align-middle py-3">
													<div class="d-flex align-items-center">
														<div class="position-relative mr-2">
															<!--img class="avatar rounded-circle" src="#" alt="John Doe"-->
															<span class="avatar-placeholder mr-md-2">
																<?php
																	echo substr($data["name"],0,1);
																?>
															</span>
														</div>
														<?= $data["name"] ?>
													</div>
												</td>
												<td class="py-3">
													<?= $data["email"] ?>
												</td>
												<td class="py-3">
													<?= $data["create_at"] ?>
												</td>
												
												<td class="py-3">
													<div class="position-relative m-auto">
														<a
															id="dropDown<?= $number ?>Invoker"
															class="link-dark d-flex"
															href="#"
															aria-controls="dropDown<?= $number ?>"
															aria-haspopup="true"
															aria-expanded="false"
															data-unfold-target="#dropDown<?= $number ?>"
															data-unfold-event="click"
															data-unfold-type="css-animation"
															data-unfold-duration="300"
															data-unfold-animation-in="fadeIn"
															data-unfold-animation-out="fadeOut"
														>
															<i class="gd-more-alt icon-text"></i>
														</a>

														<ul
															id="dropDown<?= $number ?>"
															class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden"
															aria-labelledby="dropDown<?= $number ?>Invoker"
															style="min-width: 150px; animation-duration: 300ms; right: 0px"
														>
															<li class="unfold-item">
																<a class="unfold-link media align-items-center text-nowrap" href="#">
																	<i class="gd-eye unfold-item-icon mr-3"></i>
																	<span class="media-body">View</span>
																</a>
															</li>

															<li class="unfold-item">
																<a class="unfold-link media align-items-center text-nowrap" href="#">
																	<i class="gd-pencil unfold-item-icon mr-3"></i>
																	<span class="media-body">Edit</span>
																</a>
															</li>
															<li class="unfold-item">
																<a 
																	href="../api/users/user-delete.php?id=<?= $data['id'] ?>" 
																	onclick="return confirm('Are you sure to delete <?= $data['name'] ?>?')" 
																	class="unfold-link media align-items-center text-nowrap" 
																>
																	<i class="gd-close unfold-item-icon mr-3"></i>
																	<span class="media-body">Delete</span>
																</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<!-- End Users -->
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

		<script>
			var el_up = document.getElementById("GFG_UP");
				
			el_up.innerHTML = 
				"Click on the LINK for further confirmation."; 
		</script> 

		<script src="public/graindashboard/js/graindashboard.js"></script>
		<script src="public/graindashboard/js/graindashboard.vendor.js"></script>
	</body>
</html>
