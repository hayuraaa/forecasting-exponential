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
	<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #42a5f5">
		<a class="navbar-brand" href="index.php">
			<span class="menu-collapse">Prediksi Penjualan Properti</span>
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

				<a href="#prediksiSubmenu" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-table fa-fw mr-3"></i>
						<span class="menu-collapse">Prediksi</span>
						<i class="fas fa-caret-down ml-auto"></i>
					</div>
				</a>
				<div id="prediksiSubmenu" class="collapse">
					<a href="prediksi_double.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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


		<?php
		include("koneksi.php");
		require_once __DIR__ . '/vendor/autoload.php';

		use Phpml\Preprocessing\Imputer;
		use Phpml\Preprocessing\Imputer\Strategy\MeanStrategy;

		$nourut = 1;
		$ini;
		$tampung;
		$panjang = 4;
		$rows = array();
		$level_simpan;
		$trend_simpan;
		$seasonal_simpan;
		$alfa = $_POST['txtalfa'];
		$beta = $_POST['txtbeta'];
		$gama = $_POST['txtgama'];
		$periode = $_POST['txtperiode'];


		if (isset($_POST['kota'])) {
			$kota = trim($_POST['kota']);
			$sql = "SELECT * from tb_data where id_kategori=$kota";
		} else {
			$sql = "SELECT * from tb_data where id_kategori=1";
		}

		$hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
		while ($data = mysqli_fetch_array($hasil)) {
			$rows[] = $data['unit'];
			$waktu[] = $data['waktu'];
		}
		$saja = [$rows];

		$imputer = new Imputer('', new MeanStrategy(), Imputer::AXIS_ROW);
		$imputer->fit($saja);
		$imputer->transform($saja);

		/*-------------------------------------------------------------------inisial_level-------------------------------------------------------------------*/
		$level = array();
		$jumlah = 0;
		for ($i = 0; $i <= $panjang - 1; $i++) {
			$ini = $saja[0][$i];
			$jumlah += $saja[0][$i];
			$level[] = null;
		}
		$level[3] = $jumlah / $panjang;

		/*-------------------------------------------------------------------inisial_trend-------------------------------------------------------------------*/
		$trend = array();
		$trend1 = 0;
		for ($i = 0; $i <= $panjang - 1; $i++) {
			$ini = $saja[0][$i];
			$trend1 += $saja[0][$i];
			$trend[] = null;
		}
		$trend1 /= $panjang;

		$trend2 = 0;
		for ($i = $panjang; $i < 2 * $panjang; $i++) {
			$ini = $saja[0][$i];
			$trend2 += $ini;
		}
		$trend2 /= $panjang;

		$trend[3] = abs($trend2 - $trend1) / $panjang;

		/*-------------------------------------------------------------------inisial_seasonal-------------------------------------------------------------------*/
		$seasonal = array();
		for ($i = 0; $i < $panjang; $i++) {
			$ini = $saja[0][$i];
			$seasonal[] = $ini / $level[$panjang - 1];
		}

		/*-------------------------------------------------------------------model-------------------------------------------------------------------*/
		$prediksi = $periode + count($rows);
		for ($i = $panjang; $i < count($rows); $i++) {
			$x = $saja[0][$i];

			$level_simpan = $level[$i - 1];
			$l0 = $level_simpan;

			$trend_simpan = $trend[$i - 1];
			$t0 = $trend_simpan;

			$seasonal_simpan = $seasonal[$i - $panjang];
			$s0 = $seasonal_simpan;

			$l = $alfa * ($x / $s0) + (1 - $alfa) * ($l0 + $t0);
			$t = $beta * ($l - $l0) + (1 - $beta) * $t0;
			$s = $gama * ($x / $l) + (1 - $gama) * $s0;
			$level[$i] = $l;
			$trend[$i] = $t;
			$seasonal[$i] = $s;
		}
		for ($i = count($rows); $i < $prediksi; $i++) {
			$seasonal_simpan = $seasonal[$i - $panjang];
			$s0 = $seasonal_simpan;
			$s = $gama * ($x / $l) + (1 - $gama) * $s0;
			$seasonal[$i] = $s;
		}

		/*-------------------------------------------------------------------forecast-------------------------------------------------------------------*/
		for ($i = 0; $i < 4; $i++) {
			$fore[] = 0;
		}
		for ($i = $panjang; $i < count($rows); $i++) {
			$k = $i - 1;
			$j = $i - $panjang;
			$fore[$i] = round(($level[$k] + $trend[$k]) * $seasonal[$j]);
		}

		/*-------------------------------------------------------------------mape-------------------------------------------------------------------*/
		for ($i = 0; $i < count($rows); $i++) {
			$jumlah = abs(($saja[0][$i] - $fore[$i]) / $saja[0][$i]) / count($rows);
			$tampung[] = $jumlah;
			$mape[] = round($jumlah * 100, 1) . "%";
		}

		/*-------------------------------------------------------------------standar deviasi----------------------------------------------------------------*/
		$jumape = 0;
		$jumkua = 0;
		for ($i = 0; $i < count($rows); $i++) {
			$kuadrat[$i] = pow($tampung[$i], 2);
			$jumkua += $tampung[$i];
			$jumape += $kuadrat[$i];
		}
		$std = sqrt((count($rows) * $jumape - pow($jumkua, 2)) / (count($rows) * (count($rows) - 1)));

		/*-------------------------------------------------------------------prediksi-------------------------------------------------------------------*/
		for ($i = count($rows); $i < $prediksi; $i++) {
			$m = $i - count($rows) + 1;
			$j = count($rows) - 1;
			$k = $i - $panjang;
			$fore[$i] = round(($level[$j] + $m * $trend[$j]) * $seasonal[$k]);
		}

		?>


		<!--row isi-->
		<div class="col-md-10 p-4" style="background-color: #F2F3F4">
			<div class="card border-0">
				<h2 class="text-center">Hasil Prediksi Stok Darah Triple Exponential</h4>
				<div class="card-body">

					<div class="geser">
						<table class="table table-hover table-bordered table-sm mt-3">
							<thead class="thead-light">
								<tr>
									<th>No</th>
									<th>Date</th>
									<th>Unit</th>
									<th>Level</th>
									<th>Trend</th>
									<th>Seasonal</th>
									<th>Forecast</th>
									<th>MAPE</th>
								</tr>
							</thead>

							<?php
							for ($i = 0; $i < count($rows); $i++) {

							?>
								<tr>
									<td><?php echo $nourut++; ?></td>
									<td><?php echo $waktu[$i]; ?></td>
									<td><?php echo $saja[0][$i]; ?></td>
									<td><?php echo round($level[$i], 2); ?></td>
									<td><?php echo round($trend[$i], 2); ?></td>
									<td><?php echo round($seasonal[$i], 2); ?></td>
									<td><?php echo $fore[$i]; ?></td>
									<td><?php echo $mape[$i]; ?></td>
								</tr>
							<?php } ?>

						</table>
					</div>
					<table class="table table-hover table-bordered table-sm mt-3">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Seasonal</th>
								<th>Forecast</th>
							</tr>
						</thead>

						<?php
						for ($i = count($rows); $i < $prediksi; $i++) { ?>
							<tr>
								<td><?php echo $nourut++ ?></td>
								<td><?php echo $seasonal[$i]; ?></td>
								<td><?php echo $fore[$i] ?></td>
							</tr>
						<?php } ?>

					</table>

					<div class="card border">
						<div class="card-body">
							<?php echo "<b>Hasil Prediksi Triple Exponential Smoothing dari stok darah untuk <span style='color:red'>" . $periode . "</span> bulan kedepan adalah <span style='color:red'>" . $fore[$prediksi - 1] . "</span></b>" ?>
						</div>
						<div class="card-footer">
							<a href="simpan.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"></i>simpan</a>
						</div>
					</div>


					<?php
					$sql = "INSERT into tb_grafik(waktu,aktual,prediksi,mape)";
					$sql .= "VALUES ('" . json_encode($waktu) . "','" . json_encode($saja[0]) . "','" . json_encode($fore) . "','" . json_encode($mape) . "')";
					$simpandata = mysqli_query($koneksi, $sql) or exit("error query : <b>" . $sql . "</b>.");
					?>

				</div>
			</div>
		</div>


</body>

</html>