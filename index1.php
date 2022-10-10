<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Sistem</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="css/stylelogin.css">
</head>

<body>
	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">

							<div class="mb-md-5 mt-md-4 pb-5">

								<h2 class="fw-bold mb-2 text-uppercase">Hello.</h2>
								<p class="text-white-50 mb-5">Please enter your username and password!</p>
								<form method="POST" action="">
									<div class="form-outline form-white mb-4">
										<input name="username" type="text" id="typeEmailX" class="form-control form-control-lg" />
										<label class="form-label" for="typeEmailX">Username</label>
									</div>

									<div class="form-outline form-white mb-4">
										<input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
										<label class="form-label" for="typePasswordX">Password</label>
									</div>

									<p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

									<button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
								</form>
								<div class="d-flex justify-content-center text-center mt-4 pt-1">
									<a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
									<a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
									<a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
								</div>

							</div>

							<div>
								<p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	if (isset($_POST['username'])) {
		require "fungsi.php";
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "select * from user where username='$username' and password='$password'";
		$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
		$row = mysqli_fetch_assoc($hasil);
		if (mysqli_affected_rows($koneksi) > 0) {
			$_SESSION['username'] = $username;
			if (substr($username, 0, 3) == "A12") {
				header("location: updateMhs.php");
			} elseif (substr($username, 0, 4) == "0686") {
				header("location: updateDosen.php");
			} elseif (substr($username, 0, 5) == "admin") {
				header("location: updateUser.php");
			}
		} else {
			echo "<div class='alert alert-danger w-25 mx-auto text-center mt-1 alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				Maaf, login gagal. Ulangi login.
				</div>";
		}
	} ?>
</body>

</html>