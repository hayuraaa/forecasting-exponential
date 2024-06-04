<?php 
	include ("koneksi.php"); 
	if (isset($_POST['kota'])) {
		$provinsi=trim($_POST['kota']);
		$sql = "INSERT INTO tb_data (id_kategori) VALUES ('$provinsi')";
		$tambahdata=mysqli_query($koneksi,$sql) or exit("error query : <b>".$sql."</b>.");
			if($tambahdata){
				header('Location:tambah.php');
			}
	}


 ?>