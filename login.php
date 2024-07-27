<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<title>Login | Perpustakaan</title>
</head>
<body style="background-image: url('img/bg-perpus.jpg');">
	 
	  <?php 	

	  	if(@$_GET['pesan']=="berhasil-logout"){
            echo 
            '<script type="text/javascript">
                alert("Anda Berhasil Keluar!");
            </script>';
      }

	  ?>
	 <?php 	

	  	if(@$_GET['pesan']=="berhasil"){
            echo 
            '<script type="text/javascript">
                alert("Data User Berhasil di Buat!");
            </script>';
      }

	  ?>
<div class="limiter">
	<div class="container-login100">
		<div class="logo-form-container">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="proseslogin.php">
					<span class="login100-form-title">
						<h1 style="font-weight: bold;">Perpustakaan</h1>
							<img src="img/logo.jpg" class="logo-img" alt="Logo">
					</span>

					<div class="wrap-input100 validate-input">
							<span class="details">Username</span>
							<input style="font-weight: bold;" class="input100" type="text" name="username" placeholder=" Username" required />
					</div>

					<div class="wrap-input100 validate-input">
							<span class="details">Password</span>
							<input style="font-weight: bold;" class="input100" type="password" name="password" placeholder="Password" required />
					</div>

					<div class="form-toggle-area">
          				 <p>
              				Belum mempunyai akun?
              				<a href="registrasi.php">Daftar sekarang!</a>
            			</p>
          			</div>

					<input type="submit" style="font-weight: bold;" name="submit"  class="btn btn-primary" value="Masuk">
					<a href="hu-dashboard.php" class="btn btn-danger "  style="text-decoration:none; font-weight: bold; margin-top: 10px;">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get the login form element
    const loginForm = document.querySelector(".wrap-login100");

    // Apply the fade-in animation to the login form
    function fadeInLoginForm() {
      loginForm.style.opacity = "0";
      loginForm.style.transform = "translateY(20px)";
      loginForm.style.transition = "opacity 1s ease, transform 1s ease";

      setTimeout(function () {
        loginForm.style.opacity = "1";
        loginForm.style.transform = "translateY(0)";
      }, 100);
    }

    // Call the fadeInLoginForm function when the DOM is fully loaded
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
