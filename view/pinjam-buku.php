<?php require 'nav-anggota.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style-index.css">
	<title>Daftar Buku</title>
</head>
<body>
	<section id="content">
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Daftar Buku</h1>
				</div>
			</div>

			<div class="table-data2">
				<div class="order2">
					<div class="head2">
						<h3>Masukkan Data Untuk Meminjam Buku</h3>
						<a href="hal-anggota.php" class="btn btn-danger">Kembali</a>
					</div>
					<?php
						include "../koneksi.php";
						$query = mysqli_query($conn, "SELECT max(kd_pinjam) as kodeTerbesar FROM pinjam");
						$data = mysqli_fetch_array($query);
						$kodePinjam = $data['kodeTerbesar'];
						$urutan = (int) substr($kodePinjam, 3, 3);
						$urutan++;
						$huruf = "BP";
						$kodePinjam = $huruf . sprintf("%03s", $urutan);
					?>

					<?php
					include "../koneksi.php";

					if (isset($_GET['id_buku'])) {
						$id_buku = $_GET['id_buku'];
						$buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
						$d = mysqli_fetch_object($buku);
					}

					if (isset($_POST['submit'])) {
						$stok_before = (int)$_POST['stok_before'];
						$kd_pinjam = $_POST['kd_pinjam'];
						$id_users = $_POST['id_users'];
						$id_buku = $_POST['id_buku'];
						$nama_peminjam = $_POST['nama_peminjam'];
						$title = $_POST['title'];
						$jmlh_pinjam = (int)$_POST['jmlh_pinjam'];
						$tgl_pinjam = $_POST['tgl_pinjam'];
						$tgl_kembali = $_POST['tgl_kembali'];

						$stok_after = $stok_before - $jmlh_pinjam;

						if ($stok_after >= 0) {
							mysqli_query($conn, "INSERT INTO pinjam (kd_pinjam, id_users, id_buku, nama_peminjam, title, jmlh_pinjam, tgl_pinjam, tgl_kembali, status) VALUES ('$kd_pinjam','$id_users','$id_buku','$nama_peminjam','$title','$jmlh_pinjam','$tgl_pinjam','$tgl_kembali','Dipinjam')");
							mysqli_query($conn, "UPDATE buku SET stok_buku = '$stok_after' WHERE id_buku = '$id_buku'");

							echo "<script>
								alert('Peminjaman Berhasil.');
								window.location='hal-anggota.php';
							</script>";
						} else {
							echo "<script>alert('Stok buku tidak mencukupi.');</script>";
						}
					}
					?>

					<form method="POST" action="">
						<table>
							<tr>
								<td>
									<input type="text" class="input-control" name="kd_pinjam" value="<?php echo $kodePinjam ?>" readonly>
								</td>
							</tr>
							<input type="hidden" value="<?php echo $_SESSION['id_users']; ?>" name="id_users">

							<input type="hidden" value="<?php echo $d->id_buku ?>" name="id_buku">
							<tr>
								<td>
									<input type="text" name="nama_peminjam" class="input-control" placeholder="Masukan Nama Peminjam" required autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="title" class="input-control" value="<?php echo $d->title ?>" required readonly autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>
									<input type="hidden" value="<?php echo $d->stok_buku ?>" name="stok_before">
									<input type="number" name="jmlh_pinjam" class="input-control" placeholder="Jumlah Pinjam" max="<?php echo $d->stok_buku ?>" required autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>
									<p class="display-6 ml-5">Tanggal Pinjam :</p>
									<input type="date" name="tgl_pinjam" class="input-control" required autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>
									<p class="display-6 ml-5">Tanggal Kembali :</p>
									<input type="date" name="tgl_kembali" class="input-control" required autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="submit" class="submit" value="Pinjam Buku">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</body>
</html>