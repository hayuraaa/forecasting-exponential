<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/menustyle.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="jquery.min.js">
	<link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>

	<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		header('location:index.php');
	}
		require_once("koneksi.php");

	 ?>

	<div class="login-form">

			<form action="ceklogin.php" method="post">
				<div id="judul">
				<h3 class="text-center title-login">LOGIN</h3>
				</div>

				<div class="input-group mb-3">
					<div class="input-group-append">
						<span class="input-group-text"><i class="fa fa-user prefix fa-fw"></i></span>
					</div>
					<input type="text" name="txtusername" placeholder="Username" class="form-control" required="required">
				</div>

				<div class="input-group mb-2">
					<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-key prefix fa-fw"></i></span>
					</div>
					<input type="password" class="form-control" name="txtpassword" placeholder="Password" required="required">
				</div>

				<input type="submit" id="masuk" class="btn btn-primary" value="Login">
					<a href="register.php" id="daftar"><p>Daftar akun</p></a>
			</form>

	</div>

</body>
</html>