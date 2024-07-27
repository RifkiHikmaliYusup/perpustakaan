<?php 
	include '../koneksi.php';
	if (isset($_POST['submit'])) { 
		$id_buku = $_POST['id_buku'];
		$kategori = $_POST['kategori'];
		$title = $_POST['title'];
		$penerbit = $_POST['penerbit'];
		$pengarang = $_POST['pengarang'];
		$thn_buku = $_POST['thn_buku'];
		$isi = $_POST['isi'];
		$stok_buku = $_POST['stok_buku'];
		$jml_halaman = $_POST['jml_halaman'];
		$imglama = $_POST['imglama'];

		//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['img_buku']['error'] === 4 ) {
		$img_buku = $imglama;
	}else{
		$img_buku = upload();

	}
		$sql = mysqli_query($conn,"UPDATE buku SET kategori='$kategori', title='$title', img_buku='$img_buku', penerbit='$penerbit', pengarang='$pengarang', thn_buku='$thn_buku', isi='$isi', stok_buku='$stok_buku', jml_halaman='$jml_halaman' WHERE id_buku ='$id_buku'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = edit-buku.php?id_buku={$id_buku}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'hal-petugas.php';</script>";
		}
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
				window.location='edit-buku.php';
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
				window.location='edit-buku.php';
			</script>";

			return false;
	}
//cek jika ukurannya terlalu besar 
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
				window.location='edit-buku.php';
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