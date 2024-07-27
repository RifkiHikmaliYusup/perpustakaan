<?php 
include '../koneksi.php';
if (isset($_POST['submit'])) {
	$id_users = $_POST['id_users'];
	$kd_users = $_POST['kd_users'];
	$username = $_POST['username'];
	$password = $_POST['password'];     
	$nama = $_POST['nama'];
	$role = $_POST['role'];
	$img_profil = $_POST['img_profil'];
	$password = md5($password);

 	mysqli_query($conn,"insert into users values ('$id_users','$kd_users','$username','$password','$img_profil','$nama','$role')");
	header("location: hal-kepala.php?pesan=berhasil");
	}	

 ?>