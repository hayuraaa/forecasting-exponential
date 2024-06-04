<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="fontawesome/css/all.css" />
<script src="jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="chart/Chart.js"></script>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<body>
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
					<a href="prediksi_linier.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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
				<h3 class="card-header bg-transparent">Grafik Prediksi</h3>
				<div class="card-body">

					<form action="grafik.php" method="post">
						<div class="form-row mb-3">
							<div class="col-md-8 mr-4">
								<label class="mr-sm-2" for="pilih">Pilih Golongan Darah</label>
								<select class="form-control" name="grafik">

									<?php
									include("koneksi.php");
									$sql = "SELECT * from tb_grafik";
									$hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
									while ($data = mysqli_fetch_array($hasil)) {
										$ket = "";
										if (isset($_POST['grafik'])) {
											$grafik = trim($_POST['grafik']);

											if ($grafik == $data['nama']) {
												$ket = "selected";
											}
										}
									?>
										<option <?php echo $ket; ?> value="<?php echo $data['nama']; ?>"><?php echo $data['nama']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div id="tengah" class="col-ml-2">
								<button type="submit" class="btn btn-primary" value="Pilih">Pilih</button>
							</div>
						</div>
					</form>

					<canvas id="line-chart"></canvas>

					<?php
					if (isset($_POST['grafik'])) {
						$grafik = trim($_POST['grafik']);
						$sql = "SELECT * from tb_grafik where nama='$grafik'";
					}
					$hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");;
					$data = mysqli_fetch_array($hasil);

					?>

					<script>
						var linechart = document.getElementById('line-chart');
						var chart = new Chart(linechart, {
							type: 'line',
							data: {
								labels: <?php echo $data['waktu'] ?>,
								datasets: [{
										label: 'Data Aktual',
										data: <?php echo $data['aktual'] ?>,
										fill: false,
										lineTension: 0.1,
										backgroundColor: '#3333ff',
										borderColor: '#3333ff',
										pointHoverBackgroundColor: '#99ccff',
										pointHoverBorderColor: '#99ccff'
									},
									{
										label: 'Data Prediksi',
										data: <?php echo $data['prediksi'] ?>,
										fill: false,
										lineTension: 0.1,
										backgroundColor: '#FF8C00',
										borderColor: '#FF8C00',
										pointHoverBackgroundColor: '#FFD700',
										pointHoverBorderColor: '#FFD700'
									}
								]
							},
							options: {
								scales: {
									xAxes: [{
										ticks: {
											maxRotation: 90,
											minRotation: 45
										}
									}]
								}
							}
						});
					</script>
				</div>
			</div>
		</div>


</body>

</html>