<?php 
$koneksi=mysqli_connect("localhost", "root", "") or exit ("gagal koneksi DB");
mysqli_select_db($koneksi, "dbprediksi") or exit("gagal memilih DB");

 ?>