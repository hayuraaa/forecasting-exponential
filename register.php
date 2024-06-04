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
	 ?>

	 <div class="register-form">
	 
		 <form action="registrasi.php" method="post">
		 	<div id="judul">
				<h3 class="text-center title-login">DAFTAR</h3>
			</div>

		 	<div class="input-group mb-3">
		 		<div class="input-group-append">
			 		<span class="input-group-text"><i class="fas fa-male prefix fa-fw"></i></span>
		 		</div>
		 		<input type="text" class="form-control" id="isinama" name="txtnama" placeholder="Nama" required="required"></input>
		 	</div>

		 	<div class="input-group mb-3">
		 		<div class="input-group-append">
			 		<span class="input-group-text"><i class="fa fa-user prefix fa-fw"></i></span>
			 	</div>
			 	<input type="text" class="form-control" id="isiusername" name="txtusername" placeholder="Username" required="required"></input>
		 	</div>

		 	<div class="input-group mb-3">
		 		<div class="input-group-append">
			 		<span class="input-group-text"><i class="fa fa-lock prefix fa-fw"></i></span>
			 	</div>
			 	<input type="password" class="form-control" id="isipassword" name="txtpassword" placeholder="Password" required="required">
		 	</div>

		 	<input id="masuk" type="submit" class="btn btn-primary" value="Register"></input>
		 		<a href="login.php" id="daftar"><p>Sudah Punya Akun</p></a>
		 </form>

	 </div>

</body>

</body>
</html>