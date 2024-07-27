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
			</form>
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
					<h1>dashboards</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">dashboards</a>
						</li>
					</ul>
				</div>
			</div>
			<ul class="info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3><?php
							include 'koneksi.php';
							$sql = $conn->query("SELECT COUNT(id_buku) as total_buku FROM buku ");
							$data =  $sql->fetch_assoc();
							echo $data['total_buku'];
							?></h3>
						<p>Total Buku</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3><?php
							include 'koneksi.php';
							$sql = $conn->query("SELECT COUNT(id_users) as total_users FROM users ");
							$data =  $sql->fetch_assoc();
							echo $data['total_users'];
							?></h3>
						<p>Total Anggota</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">
						<h3><?php
							include 'koneksi.php';
							$sql = $conn->query("SELECT COUNT(id_pinjam) as total_pinjam FROM pinjam ");
							$data =  $sql->fetch_assoc();
							echo $data['total_pinjam'];
							?></h3>
						<p>Total Pinjaman</p>
					</span>
				</li>
			</ul>
		</main>
	</section>
	<script src="js/script.js"></script>
</body>

</html>