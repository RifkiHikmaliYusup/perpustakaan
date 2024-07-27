<?php require 'nav-anggota.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title></title>
</head>
<script>
	// Fungsi untuk menampilkan notifikasi
	function showConfirmationMessage(message) {
		var confirmationBox = document.querySelector(".confirmation-box");
		var confirmationMessage = document.querySelector(".confirmation-message");

		// Ubah teks notifikasi dengan pesan yang diterima
		confirmationMessage.textContent = message;

		// Tampilkan kotak notifikasi
		confirmationBox.style.display = "block";

		// Setelah 5 detik, sembunyikan kotak notifikasi
		setTimeout(function() {
			confirmationBox.style.display = "none";
		}, 5000);
	}

	// Tampilkan notifikasi konfirmasi
	showConfirmationMessage("<?php echo $confirmation_message; ?>");
</script>

<body>
	<?php
	function terlambat($tgl_dateline, $tgl_kembali)
	{
		$tgl_dateline_pecah = explode('-', $tgl_dateline);
		$tgl_dateline_pecah = $tgl_dateline_pecah[2] . '-' . $tgl_dateline_pecah[1] . '-' . $tgl_dateline_pecah[0];

		$tgl_kembali_pecah = explode('-', $tgl_kembali);
		$tgl_kembali_pecah = $tgl_kembali_pecah[2] . '-' . $tgl_kembali_pecah[1] . '-' . $tgl_kembali_pecah[0];

		$selisih = strtotime($tgl_kembali_pecah) - strtotime($tgl_dateline_pecah);

		$selisih = $selisih / 86400;
		if ($selisih >= 1) {
			$hasil_tgl = floor($selisih);
		} else {
			$hasil_tgl = 0;
		}
		return $hasil_tgl;
	}

	?>

	<?php
	if (@$_GET['pesan'] == "BukuBerhasilDitambahkan") {
		echo '<script type="text/javascript">alert("Data Buku Berhasil Disimpan!");</script>';
	}
	?>

	<?php
	if (!isset($_SESSION['id_users'])) {
		header("Location: login.php");
		exit();
	}

	$id_users = $_SESSION['id_users'];
	?>

	<section id="content">
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Pinjam Buku</h1>
					<ul class="breadcrumb">
						<li>
							<h4><?php echo $_SESSION['role']; ?></h4>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li><?php echo $_SESSION['nama']; ?></li>
					</ul>
					<div class="confirmation-box" style="display: none;">
						<span class="confirmation-message"></span>
					</div>
				</div>

				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Data Terbaru</h3>

						</div>
						<table class='table table-striped table-bordered' id="datatable">
							<thead style="text-align: center;">
								<tr>
									<th>No</th>
									<th>Nama Peminjam</th>
									<th>Nama Buku</th>
									<th>Gambar Buku</th>
									<th>Jumlah Pinjam</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal kembali</th>
									<th>Terlambat</th>
									<th>Status</th>
									<th style="padding: 10px 10px;">Aksi</th>
								</tr>
							</thead>
							<tbody style="text-align: center;">
								<?php
								include "../koneksi.php";
								$no = 1;
								$data = mysqli_query($conn, "SELECT * FROM pinjam INNER JOIN buku ON pinjam.id_buku = buku.id_buku WHERE pinjam.id_users = $id_users AND pinjam.status = 'Dipinjam'");

								while ($d = mysqli_fetch_array($data)) {
									// Lewati buku dengan status "Menunggu Konfirmasi"
									if ($d['status'] === 'Menunggu Konfirmasi') {
										continue;
									}
								?>
									<tr class="table table-default">
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['nama_peminjam']; ?></td>
										<td><?php echo $d['title']; ?></td>
										<td>
											<img src="../img-buku/<?php echo $d['img_buku']; ?>">
										</td>
										<td><?php echo $d['jmlh_pinjam']; ?></td>
										<td><?php echo $d['tgl_pinjam']; ?></td>
										<td><?php echo $d['tgl_kembali']; ?></td>
										<td>
											<?php
											$denda = 1000;
											$tgl_dateline = $d['tgl_kembali'];
											$tgl_kembali = date('Y-m-d');

											$lambat = terlambat($tgl_dateline, $tgl_kembali);
											$denda1 = $lambat * $denda;

											if ($lambat > 0) { ?>
												<div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div>
											<?php } else {
												echo $lambat . " Hari";
											}
											?>
										</td>
										<td><?php echo ($d['status'] === 'Menunggu Konfirmasi') ? 'Menunggu Konfirmasi' : $d['status']; ?></td>
										<td style="text-align: center; padding: 10px 10px;">
											<a class="btn edit" href="data-pinjam.php?kembali&id_buku=<?php echo $d['id_buku']; ?>&judul=<?php echo $d['title']; ?>&jmlh_pinjam=<?php echo $d['jmlh_pinjam']; ?>">Kembalikan</a>
											<br>
											<br>
											<a class="btn hapus" href="data-pinjam.php?perpanjang&id_buku=<?php echo $d['id_buku']; ?>&judul=<?php echo $d['title']; ?>&lambat=<?php echo $lambat; ?>&tgl_kembali=<?php echo $d['tgl_kembali']; ?>">Perpanjang</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<!-- aksi untuk mengembalikan buku -->

				<?php
				if (isset($_GET['kembali']) && isset($_GET['id_buku']) && isset($_GET['judul']) && isset($_GET['jmlh_pinjam'])) {
					$id_buku = $_GET['id_buku'];
					$judul = $_GET['judul'];
					$jmlh_pinjam = $_GET['jmlh_pinjam'];

					// Periksa status buku
					$query_cek_status = "SELECT status FROM pinjam WHERE id_buku = $id_buku AND status = 'Dipinjam'";
					$result_cek_status = mysqli_query($conn, $query_cek_status);

					if (mysqli_num_rows($result_cek_status) > 0) {
						// Update status buku menjadi "Menunggu Konfirmasi"
						mysqli_query($conn, "UPDATE pinjam SET status = 'Menunggu Konfirmasi' WHERE id_buku = $id_buku AND status = 'Dipinjam'");

						// Tampilkan pesan keberhasilan kepada pengguna
						echo "<script>
            alert('Permintaan pengembalian buku {$judul} telah disubmit dan sedang menunggu konfirmasi dari petugas.');
            window.location='data-pinjam.php';
          </script>";
					}
				}
				?>


				<!-- aksi untuk memperpanjang peminjaman -->
				<?php
				if (isset($_GET['perpanjang']) && isset($_GET['id_buku']) && isset($_GET['judul']) && isset($_GET['lambat']) && isset($_GET['tgl_kembali'])) {
					$id_buku = $_GET['id_buku'];
					$judul = $_GET['judul'];
					$lambat = $_GET['lambat'];
					$tgl_kembali = $_GET['tgl_kembali'];

					// Cek apakah peminjaman sudah terlambat
					if ($lambat > 0) {
						// Jika sudah terlambat, tampilkan pesan bahwa peminjaman tidak bisa diperpanjang
						echo "<script>
                	alert('Peminjaman buku {$judul} sudah terlambat dikembalikan dan tidak dapat diperpanjang.');
                	window.location='data-pinjam.php';
              		</script>";
					} else {
						// Jika belum terlambat, lakukan proses perpanjangan peminjaman
						// Hitung tanggal kembali baru dengan menambahkan 7 hari dari tanggal kembali saat ini
						$new_tgl_kembali = date('Y-m-d', strtotime($tgl_kembali . ' + 7 days'));

						// Update tanggal kembali di tabel 'pinjam'
						mysqli_query($conn, "UPDATE pinjam SET tgl_kembali = '$new_tgl_kembali' WHERE id_buku = $id_buku AND status = 'Dipinjam'");

						echo "<script>
                alert('Perpanjang peminjaman selama 7 hari untuk buku {$judul} berhasil.');
                window.location='data-pinjam.php';
              </script>";
					}
				}
				?>

				<script>
					$(document).ready(function() {
						$('#datatable').DataTable();
					});
				</script>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</body>

</html>