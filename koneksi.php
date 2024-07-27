<?php
$conn = mysqli_connect("localhost","root","","perpustakaan");
if (mysqli_connect_error()) {
 	echo "koneksi database gagal : ". mysqli_connect_error();  
 }
?>