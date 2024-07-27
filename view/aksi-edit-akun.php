<?php 
	include '../koneksi.php';
	if (isset($_POST['submit'])) { 
		$id_users = $_POST['id_users'];
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$imglama = $_POST['imglama'];

		//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['img_profil']['error'] === 4 ) {
		$img_profil = $imglama;
	}else{
		$img_profil = upload();

	}
		$sql = mysqli_query($conn,"UPDATE users SET username='$username', img_profil='$img_profil', nama='$nama' WHERE id_users ='$id_users'");
		if (!$sql) {
			echo "<script>alert('Data Gagal Ditambahkan');document.location.href = edit-profil.php?id_users={$id_users}';</script>";
		}else{
		echo "<script>alert('Edit Data Berhasil Ditambahkan');document.location.href = 'profil.php';</script>";
		}
	}
	function upload(){

	$namaFile = $_FILES['img_profil']['name'];
	$ukuranFile = $_FILES['img_profil']['size'];
	$error = $_FILES['img_profil']['error'];
	$tmpName = $_FILES['img_profil']['tmp_name'];

//cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
				alert('Pilih Gambar Terlebih Dahulu!');
				window.location='edit-profil.php';
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
				window.location='edit-profil.php';
			</script>";

			return false;
	}
//cek jika ukurannya terlalu besar 
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
				window.location='edit-profil.php';
			</script>";

			return false;
	}
//lolos pengecekan gambar siap di upload
		$namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;
 
			move_uploaded_file($tmpName, '../img-profil/'. $namaFileBaru);
        return $namaFileBaru;
        } 

 ?>	