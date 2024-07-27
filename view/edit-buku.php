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
		include '../koneksi.php';
		$id_buku = $_GET['id_buku'];
	 	$edit = mysqli_query($conn,"SELECT * FROM buku WHERE id_buku = '$id_buku'");
	 	$result = mysqli_fetch_array($edit);
	?>
	<form action="aksi-edit-buku.php" method="POST" enctype="multipart/form-data"> 
			<table>
						<input type="hidden" name="id_buku" value="<?php echo $result['id_buku']; ?>">
					<tr>
						<td>
							<input type="text" name="kategori" class="input-control" placeholder="Kategori Buku" required autocomplete="off" value="<?php echo $result['kategori'] ?>">
						</td>
					</tr>
							<input type="hidden" name="imglama" value="<?php echo $result['img_buku'] ?>">
					<tr>
						<td>
							<h4 style="margin-left: 54px; ">Masukan Gambar Buku :</h4>
							<img src="../img-buku/<?php echo $result['img_buku'] ?>" style="width: 80px; height: 90px;" class="input-control" >
							<input type="file" name="img_buku" class="input-control"  autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="title" class="input-control" placeholder="Title Buku" value="<?php echo $result['title'] ?>" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="penerbit" class="input-control" placeholder="Penerbit" value="<?php echo $result['penerbit'] ?>"  required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="pengarang" class="input-control" placeholder="Nama Pengarang" value="<?php echo $result['pengarang'] ?>" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="thn_buku" class="input-control" placeholder="Tahun Buku" value="<?php echo $result['thn_buku'] ?>"  required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="isi" class="input-control" placeholder="Sinopsis" value="<?php echo $result['isi'] ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="stok_buku" class="input-control" placeholder="Sinopsis" value="<?php echo $result['stok_buku'] ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" name="jml_halaman" class="input-control" placeholder="Jumlah Halaman" value="<?php echo $result['jml_halaman'] ?>" required autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" class="submit" value="Edit Buku">
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