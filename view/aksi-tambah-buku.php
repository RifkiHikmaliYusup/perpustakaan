<?php 
	include "../koneksi.php";

	if (isset($_POST['submit'])) {
		$id_buku = $_POST['id_buku'];
		$kd_buku = $_POST['kd_buku'];
		$kategori = $_POST['kategori'];
		$title = $_POST['title'];
		$penerbit = $_POST['penerbit'];
		$pengarang = $_POST['pengarang'];
		$thn_buku = $_POST['thn_buku'];
		$isi = $_POST['isi'];
		$stok_buku = $_POST['stok_buku'];
		$jml_halaman = $_POST['jml_halaman'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$img_buku = upload();
		if (!$img_buku) {
			return false;
		}

		mysqli_query($conn,"insert into buku values ('$id_buku','$kd_buku','$kategori','$img_buku','$title','$penerbit','$pengarang','$thn_buku','$isi','$stok_buku','$jml_halaman','$tgl_masuk')");
		header("location: hal-petugas.php?pesan=BukuBerhasilDitambahkan");
	}
	function upload(){

	$namaFile = $_FILES['img_buku']['name'];
	$ukuranFile = $_FILES['img_buku']['size'];
	$error = $_FILES['img_buku']['error'];
	$tmpName = $_FILES['img_buku']['tmp_name'];

//cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
				alert('Pilih Gambar Terlebih Dahulu!');
				window.location='tambah-buku.php';
			</script>";

			return false;
	}
//cek apakah yang di upload adalah gambar
	$ekstensiImageValid = ['jpg','jpeg','png'];
	$ekstensiImage = explode('.', $namaFile);
	$ekstensiImage = strtolower(end($ekstensiImage));
	if (!in_array($ekstensiImage, $ekstensiImageValid)) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
				window.location='tambah-buku.php';
			</script>";

			return false;
	}
//cek jika ukurannya terlalu besar 
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
				window.location='tambah-buku.php';
			</script>";

			return false;
	}
//lolos pengecekan gambar siap di upload
		  $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;
 
			move_uploaded_file($tmpName, '../img-buku/'. $namaFileBaru);
        return $namaFileBaru;
        } 

	

 ?>