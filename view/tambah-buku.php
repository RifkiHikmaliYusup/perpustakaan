<?php require 'nav-petugas.php' ?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style-index.css">
	<title></title>
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
				<h3>Masukan Data Buku Terbaru</h3>
				<a href="hal-petugas.php" class="btn btn-danger">Kembali</a>
			</div>

	<?php 
	include "../koneksi.php";
	$query = mysqli_query($conn, "SELECT max(kd_buku) as kodeTerbesar FROM buku");
    $data = mysqli_fetch_array($query);
    $kodeBuku = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeBuku, 3, 3);
    $urutan++;
    $huruf = "BK";
    $kodeBuku = $huruf . sprintf("%03s", $urutan);
    ?>
	<form action="aksi-tambah-buku.php" method="POST" enctype="multipart/form-data"> 
			<table>
						<input type="hidden" name="id_buku">
					<tr>
						<td>
							<input type="text" class="input-control" name="kd_buku" value="<?php echo $kodeBuku ?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="kategori" class="input-control" placeholder="Kategori Buku" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td >
							<h4 style="margin-left: 54px; ">Masukan Gambar Buku :</h4>
							<input type="file" class="input-control" name="img_buku" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="title" class="input-control" placeholder="Title Buku" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="penerbit" class="input-control" placeholder="Penerbit" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="pengarang" class="input-control" placeholder="Nama Pengarang" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="thn_buku" class="input-control" placeholder="Tahun Buku" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<textarea type="text" name="isi" class="input-control" placeholder="Sinopsis" required></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="stok_buku" class="input-control" placeholder="Stok" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="jml_halaman" class="input-control" placeholder="Jumlah Halaman" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="date" name="tgl_masuk" class="input-control" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" class="submit" value="Tambah Buku">
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



<script src="script.js"></script>
</body>

</html>