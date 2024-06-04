<?php 
require_once("koneksi.php");
$nama=$_POST['txtnama'];
$username=$_POST['txtusername'];
$password=md5($_POST['txtpassword']);
$sql="SELECT * FROM tb_user WHERE username='$username'";
$hasil=mysqli_query($koneksi, $sql) or exit("error query :<b>".$sql."</b>");
if (mysqli_num_rows($hasil)>0) {
  echo "<div align='center'>username sudah terdaftar <a href='register.php'>back</div>";
} else {
  if (!$username || !$password) {
    echo "<div align='center'>masih ada data yang kosong <a href='register.php'>back</div>";
  } else {
    $data="INSERT INTO tb_user (nama,username,password) VALUES ('$nama','$username','$password')";
    $simpan=mysqli_query($koneksi, $data);
    if ($simpan) {
      echo "<div align='center'>pendaftaran suksek <a href='login.php'>login</div>";
    } else {
      echo "<div align='center'>proses gagal</div>";
    }
  }
}
 ?>

