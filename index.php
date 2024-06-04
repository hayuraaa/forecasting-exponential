<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="fontawesome/css/all.css" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<body>

	<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header('location:login.php');
	} else {
		$username = $_SESSION['username'];
	}
	?>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #42a5f5">
		<a class="navbar-brand" href="index.php">
			<span class="menu-collapse">Prediksi Stok Darah</span>
		</a>

	</nav>


	<div class="row" id="body-row">
		<div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
			<ul class="list-group sticky-top sticky-offset">

				<a href="index.php" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-home fa-fw mr-3"></i>
						<span class="menu-collapse">Beranda</span>
					</div>
				</a>

				<a href="data.php" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-database fa-fw mr-3"></i>
						<span class="menu-collapse">Data</span>
					</div>
				</a>

				<a href="#prediksiSubmenu" data-toggle="collapse" aria-expanded="true" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-table fa-fw mr-3"></i>
						<span class="menu-collapse">Prediksi</span>
						<i class="fas fa-caret-down ml-auto"></i>
					</div>
				</a>
				<div id="prediksiSubmenu" class="collapse">
					<a href="doubleprediksi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-start align-items-center">
							<span class="menu-collapse">Double Exponential</span>
						</div>
					</a>
					<a href="prediksi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-start align-items-center">
							<span class="menu-collapse">Triple Exponential</span>
						</div>
					</a>
					<a href="prediksiregresi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-start align-items-center">
							<span class="menu-collapse">Linear Regression</span>
						</div>
					</a>
				</div>

				<a href="grafik.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-chart-line fa-fw mr-3"></i>
						<span class="menu-collapse">Grafik</span>
					</div>
				</a>

				<a href="logout.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-sign-out-alt fa-fw mr-3"></i>
						<span class="menu-collapse">Logout</span>
					</div>
				</a>

			</ul>
		</div>

		<div class="col-md-10 p-4" style="background-color: #e3e6e8">
			<div class="card border-0">
				<h3 class="card-header bg-transparent">Sistem Prediksi Stok Darah</h3>
				<div class="card-body">
					<p>Aplikasi ini dibuat bertujuan untuk memprediksi stok darah yang terpakai dimasa yang akan datang. Dibuatnya aplikasi ini dengan maksud memudahkan para tenaga kesehatan dalam perkiraan jumlah yang dibutuhkan. Proses prediksi menggunakan data time series. Metode prediksi (forecasting) yang digunakan adalah Exponential Smoothing, sementara Exponential Smoothing dibagi menjadi tiga kategori yaitu Single, Double dan Triple. Pada aplikasi ini akan menerapkan metode Triple Exponential Smoothing yang sesuai dengan data yang ada.</p>
					<h5>Tentang Algoritma Triple Exponential Smoothing</h5>
					<p>Metode ini merupakan metode forecasting dengan menggunakan persamaan kuadrat. Metode ini lebih cocok digunakan untuk membuat prediksi (forecasting) hal yang berfluktuasi atau mengalami gelombang pasang surut maksudnya kenaikan atau penurunan jumlah dari data tersebut biasanya terjadi secara tiba-tiba dan sukar diprediksi. </p>
					<h5>Tentang Algoritma Double Exponential Smoothing</h5>
					<p>Double Exponential Smoothing (DES), juga dikenal sebagai Holt's Linear Trend Model, adalah metode yang memperhitungkan komponen level dan tren. Metode ini cocok untuk data yang memiliki tren tetapi tidak memiliki pola musiman. DES menggunakan dua parameter smoothing: satu untuk level (α) dan satu lagi untuk tren (β)</p>
					<h5>Tentang Algoritma Regresi Linear</h5>
					<p>Regresi linear adalah metode statistik yang digunakan untuk memodelkan hubungan antara satu atau lebih variabel independen (predictor) dengan variabel dependen (outcome) melalui sebuah garis lurus (linear). Tujuan dari regresi linear adalah untuk menentukan seberapa baik variabel independen dapat memprediksi atau menjelaskan variabel dependen</p>
				</div>
			</div>
		</div>


		<script>
			$('#body-row .collapse').collapse('hide');

			$('#collapse-icon').addClass('fa-angle-double-left');

			$('[data-toggle=sidebar-collapse]').click(function() {
				SidebarCollapse();
			});

			function SidebarCollapse() {
				$('.menu-collapse').toggleClass('d-none');
				$('.sidebar-submenu').toggleClass('d-none');
				$('.submenu-icon').toggleClass('d-none');
				$('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapse');

				var SeparatorTitle = $('.sidebar-separator-title');
				if (SeparatorTitle.hasClass('d-flex')) {
					SeparatorTitle.removeClass('d-flex');
				} else {
					SeparatorTitle.addClass('d-flex');
				}

				$('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
			}
		</script>




</body>

</html>