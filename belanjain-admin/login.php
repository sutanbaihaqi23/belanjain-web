<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- favicon1 -->
    <link rel="shortcut icon" href="public/img/favicon1.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">
  </head>

  <body class="">

    <main class="main">

      <div class="content">

			<div class="container-fluid pb-5">

				<div class="row justify-content-md-center">
					<div class="card-wrapper col-12 col-md-4 mt-5">
						<div class="brand text-center mb-3">
							<a href="/"><img src="public/img/ReLogo1.png"></a>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Login</h4>
								<form action="../api/admin/admin-login.php" method="post" id="form_login">
									<div class="form-group">
										<label for="email">E-Mail</label>
										<input id="email" type="email" class="form-control" name="email" required="" autofocus="">
									</div>

									<div class="form-group">
										<label for="password">Password
										</label>
										<input id="password" type="password" class="form-control" name="password" required="">
									</div>

									<div class="form-group no-margin">
										<button class="btn btn-primary btn-block">
											Sign In
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

      </div>
    </main>

	<script src="public/graindashboard/js/graindashboard.js"></script>
    <script src="public/graindashboard/js/graindashboard.vendor.js"></script>
  </body>
</html>