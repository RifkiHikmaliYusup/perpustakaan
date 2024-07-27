<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Registrasi | Perpustakaan</title>
</head>

	  	   <?php
    include 'koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(kd_users) as kodeTerbesar FROM users");
    $data = mysqli_fetch_array($query);
    $kodeUser = $data['kodeTerbesar'];
 
    $urutan = (int) substr($kodeUser, 3, 3);
 
    $urutan++;
  
    $huruf = "USR";
    $kodeUser = $huruf . sprintf("%03s", $urutan);
    ?>
   <div style="margin-left: 20px; margin-top: 30px;">
        		
   </div>
<body style="background-image: url('img/bg-perpus.jpg');">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form method="POST" class="login100-form validate-form" enctype="multipart/form-data">
          <span class="login100-form-title">

            <h4 style="font-weight: bold;">Daftar Akun</h4>
            <img src="img/logo.jpg" class="logo-img" alt="Logo">
          </span>
          		<div class="user-details">
			 		<div class="input-box">
			 			<span class="details">Kode Pengguna</span>
			 			<input type="text" name="kd_users" value="<?php echo $kodeUser ?>" required readonly>
			 		</div>
			 		<div class="input-box">
			 			<span class="details">Nama Lengkap Pengguna</span>
			 			<input type="text" name="nama" placeholder="Nama User" required>
			 		</div>
			 		<div class="input-box">
			 			<span class="details">Username</span>
			 			<input type="text" name="username" placeholder="Username" required>
			 		</div>
			 		<div class="input-box">
			 			<span class="details">Foto Profil</span>
			 			<input type="file" name="img_profil" autocomplete="off">
			 		</div>
			 		<div class="input-box">
			 			<span class="details">Password</span>
			 			 <input type="password" name="password" placeholder="Password" required>
			 		</div>
			 		<div class="input-box">
			 			<span class="details">Sebagai</span>
			 			<input style="font-weight: bold;" type="text" name="role" value="anggota" required readonly />
			 		</div>
				</div>
          <input type="submit" name="submit" class="btn btn-primary" style="font-weight: bold;" value="Daftar">
          <a href="login.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold; margin-top: 10px;">Kembali</a>
        </form>
      </div>
    </div>
  </div>
<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$id_users = $_POST['id_users'];
	$kd_users = $_POST['kd_users'];
	$username = $_POST['username'];
	$password = $_POST['password'];     
	$nama = $_POST['nama'];
	$role = $_POST['role'];
	$password = md5($password);
	$img_profil = upload();
		if (!$img_profil) {
			return false;
		}

 	mysqli_query($conn,"insert into users values ('$id_users','$kd_users','$username','$password','$img_profil','$nama','$role')");
	header("location: login.php?pesan=berhasil");
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
				window.location='registrasi.php';
			</script>";

			return false;
	}
//cek apakah yang di upload adalah gamba
	$ekstensiImageValid = ['jpg','jpeg','png'];
	$ekstensiImage = explode('.', $namaFile);
	$ekstensiImage = strtolower(end($ekstensiImage));
	if (!in_array($ekstensiImage, $ekstensiImageValid)) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
				window.location='registrasi.php';
			</script>";

			return false;
	}
//cek jika ukurannya terlalu besar 
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar!');
				window.location='registrasi.php';
			</script>";

			return false;
	}
//lolos pengecekan gambar siap di upload
		  $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;
 
			move_uploaded_file($tmpName, 'img-profil/'. $namaFileBaru);
        return $namaFileBaru;
        } 

	

 ?>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get the form element
    const registrationForm = document.querySelector(".wrap-login100");

    // Apply the fade-in animation to the form
    function fadeInForm() {
      registrationForm.style.opacity = "0";
      registrationForm.style.transform = "translateY(20px)";
      registrationForm.style.transition = "opacity 1s ease, transform 1s ease";

      setTimeout(function () {
        registrationForm.style.opacity = "1";
        registrationForm.style.transform = "translateY(0)";
      }, 100);
    }

    fadeInLoginForm();
  });
  document.addEventListener("DOMContentLoaded", function () {
    // Get the logo image element
    const logoImg = document.querySelector(".logo-img");

    // Apply the fade-in animation to the logo image
    function fadeInLogoImage() {
      let opacity = 0;
      const intervalId = setInterval(function () {
        opacity += 0.05;
        logoImg.style.opacity = opacity;
        if (opacity >= 1) {
          clearInterval(intervalId);
        }
      }, 50);
    }

    // Call the fadeInLogoImage function when the DOM is fully loaded
    fadeInLogoImage();
   });


</script>
</html>