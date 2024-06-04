<?php 
	session_start();
	require_once("koneksi.php");
	$username=$_POST['txtusername'];
	$password= md5($_POST['txtpassword']);
	$sql="SELECT * FROM tb_user WHERE username='$username'";
	$hasil=mysqli_query($koneksi, $sql) or exit("error query :<b>".$sql."</b>");
	$query=mysqli_fetch_array($hasil);

	if (mysqli_num_rows($hasil) == 0 ) {
	echo "<div align='center'>username belum terdaftar <a href='login.php'>back</div>";
	} else {
	if ($password <> $query['password']) {
		echo "<div align='center'>password salah <a href='login.php'>back</div>";
	} else {
		$_SESSION['username']=$query['username'];
		header('location:index.php');
	}
}
 ?>