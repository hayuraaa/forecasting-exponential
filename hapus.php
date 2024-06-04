<?php 
include "menu.php";

include ("koneksi.php");
$id  = $_GET['id'];
$sql = "DELETE from tb_data WHERE id='$id'";
mysqli_query($koneksi, $sql) or exit("error query : <b>".$sql."</b>.");
if ($sql) {
	echo "<script>alert('berhasil menghapus data');window.location='data.php';</script>";
	}else{
	echo "<script>alert('gagal mengapus data');window.location='data.php';</script>";
	}

 ?>