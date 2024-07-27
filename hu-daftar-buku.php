<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href="fontawesome/css/all.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style-index.css">

	<title>Dashboard | Perpustakaan</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='fa fa-book' style="margin-left: 10px"></i>
			<span class="text" style="margin-left: 10px">Perpustakaan</span>
		</a>
		<ul class="side-menu top">
			<li class="menu-item">
				<a href="hu-dashboard.php">
					<i class='fa fa-list' style="margin-left: 10px"></i>
					<span class="text" style="margin-left: 15px">Dashboard</span>
				</a>
			</li>
			<li class="menu-item">
				<a href="hu-daftar-buku.php">
					<i class='fa fa-book' style="margin-left: 10px"></i>
					<span class="text" style="margin-left: 15px">Daftar Buku</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">
			<li class="menu-item">
				<a href="login.php" class="login">
					<i class='fa-solid fa-arrow-up-right-from-square' style="margin-left: 10px"></i>
					<span class="text" style="margin-left: 15px">Log in</span>
				</a>
			</li>
		</ul>
	</section>
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='fa fa-list' style="cursor: pointer;"></i>
			<a href="#" class="notification">
				<i class='fa fa-bell'></i>
			</a>
			<a href="#" class="profile">
				<img src="img-profil/user.png">
			</a>
		</nav>
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Daftar Buku</h1>
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Data Terbaru</h3>
					</div>
				</div>
			</div>
			<?php
			include "koneksi.php";
			$data = mysqli_query($conn, "SELECT * FROM buku ");
			while ($d = mysqli_fetch_array($data)) {
			?>
				<ul class="box-info">
					<div class="box">
						<li>
							<a href="detail-buku.php?kd_buku=<?php echo $d['kd_buku']; ?>">
								<img src="img-buku/<?php echo $d['img_buku']; ?>" width="190px" height="240px">
							</a>
							<h3 align="center" style="margin-top: 20px;"><?php echo $d['title']; ?></h3>
						</li>
					</div>
				</ul>
			<?php } ?>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
	</section>
	<script src="js/script.js"></script>
</body>

</html>