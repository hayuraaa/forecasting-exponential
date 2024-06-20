<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
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

				<a href="prediksi.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-table fa-fw mr-3"></i>
						<span class="menu-collapse">Prediksi</span>
					</div>
				</a>

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

		<!--row isi-->
			<div class="col-md-10 p-4" style="background-color: #F2F3F4">
				<div class="card border-0">
					<h4 class="card-header bg-transparent">Tambah Data</h4>
					<div class="card-body">

				<?php
				include ("koneksi.php");

				if (isset($_POST['tambah'])) {
					$waktu=$_POST['txtwaktu'];
					$unit=$_POST['txtunit'];
					$sql = "UPDATE tb_data SET waktu='$waktu', unit='$unit' ORDER BY id DESC LIMIT 1";
					$tambahdata=mysqli_query($koneksi,$sql) or exit("error query : <b>".$sql."</b>.");
					if (!$tambahdata) {
						echo "<script>alert('gagal ditambahkan');window.location='data.php';</script>";
						}else{
						echo "<script>alert('data berhasil ditambahkan');window.location='data.php';</script>";
					}
				}
				 ?>

				<form action="tambah.php" method="post">

					<div class="form-group">
						<label for="isiwaktu">Waktu</label>
						<input type="month" class="form-control" id="isiwaktu" name="txtwaktu" placeholder="Waktu" required="required"></input>
					</div>

					<div class="form-group">
						<label for="isiunit">Unit</label>
						<input type="number" class="form-control" id="isiunit" name="txtunit" placeholder="Unit" required="required"></input>
					</div>

					<button type="submit" class="btn btn-primary" name="tambah" value="Tambah">Tambah</button>
				</form>


				 </div>
					
				</div>
 			</div>
 		</div>
 	</div>

</body>
</html>