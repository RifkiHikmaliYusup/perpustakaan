<?php 
include "../koneksi.php";
$id_buku = $_GET['id_buku'];
$conn = mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$id_buku'")or die(mysqli_error());
 
echo "<script>
    alert('Data Buku Berhasil Dihapus');
    document.location.href = 'hal-petugas.php';
    </script>"
 ?>