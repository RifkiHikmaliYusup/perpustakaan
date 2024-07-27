<?php require 'nav-anggota.php' ?>
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

	<section id="content">
<main>
	<div class="head-title">
		<div class="left">
			<h1>Daftar Buku</h1>
		</div>
	</div>
<?php 
		include "../koneksi.php";

		$buku = mysqli_query($conn,"SELECT * FROM buku WHERE kd_buku = '".$_GET['kd_buku']."'");
		$d = mysqli_fetch_object($buku);
	 ?>

	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Detail Buku</h3>
				<a href="hal-anggota.php" class="btn btn-danger">Kembali</a>
			</div>

				<div class="box1">
					<img src="../img-buku/<?php echo $d->img_buku ?>" style="width:325px;  height: 370px;">
				</div>
				<div class="box2">
					<h4><?php echo $d->title?></h4>
					<p class="input-control">Kategori :
						<?php echo $d->kategori ?></p>
					<p class="input-control">Penerbit :
						<?php echo $d->penerbit ?></p>
					<p class="input-control">Pengarang :
						<?php echo $d->pengarang ?></p>
					<p class="input-control">Tahun Buku :
						<?php echo $d->thn_buku ?></p>
					<p class="input-control">Jumlah Halaman :
						<?php echo $d->jml_halaman ?></p>
					<p class="input-control">Stok Buku :
						<?php echo $d->stok_buku ?></p>
					<p class="input-control"> Sinopsis :
						<?php echo $d->isi ?></p>
				</div>
		</div>
	</div>
	
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
	</section>
	<script src="js/script.js"></script>
</body>
</html>