<?php 	require 'nav-kepala.php'; ?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
	<title></title>
</head>
<body>
	<?php 	

	  	if(@$_GET['pesan']=="BukuBerhasilDitambahkan"){
            echo 
            '<script type="text/javascript">
                alert("Data Buku Berhasil Disimpan!");
            </script>';
      }

	  ?>
<section id="content">
<main>
	<div class="head-title">
		<div class="left">
			<h1>Daftar Buku</h1>
		<ul class="breadcrumb">
						<li>
							<h4>
								 <?php echo $_SESSION['role']; ?>
							</h4>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<?php echo $_SESSION['nama']; ?>
						</li>
					</ul>
		</div>
	</div>


	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Data Terbaru</h3>
			</div>
					<table class='table table-striped table-bordered' id="datatable">
		 	<thead>
	 						<tr>
								<th>No</th>
								<th>Kode Buku</th>
								<th>Kategori</th>
								<th>Buku</th>
								<th>Judul Buku</th>
								<th>Penerbit</th>
								<th>Pengarang</th>
								<th>Tahun Buku</th>
								<th>Sinopsis</th>
								<th>Stok Buku</th>
								<th>Jumlah Halaman</th>
								<th>Tanngal Masuk</th>
							</tr>
	 </thead>
	 <tbody style="text-align: center;">
	 		<?php 
					include "../koneksi.php";
					$no = 1;
				 	$data = mysqli_query($conn,"SELECT * FROM buku ");
				 	while($d = mysqli_fetch_array($data)){
				 ?>
	 						<tr class="table table-default">
								<td ><?php echo $no++; ?></td>
								<td><?php echo $d['kd_buku']; ?></td>
								<td><?php echo $d['kategori']; ?></td>
								<td>
									<img src="../img-buku/<?php echo $d['img_buku']; ?>" >
								</td>
								<td><?php echo $d['title']; ?></td>
								<td><?php echo $d['penerbit']; ?></td>
								<td><?php echo $d['pengarang']; ?></td>
								<td><?php echo $d['thn_buku']; ?></td>
								<td><?php echo $d['isi']; ?></td>
								<td><?php echo $d['stok_buku']; ?></td>
								<td><?php echo $d['jml_halaman']; ?></td>
								<td><?php echo $d['tgl_masuk']; ?></td>
							</tr>
	 <?php } ?>
	  </tbody>
	 </table>
				</div>
			</div>
	<script >$(document).ready(function(){
			$('#datatable').DataTable();
		});
		</script>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>