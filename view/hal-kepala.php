<?php require 'nav-kepala.php' ?>
<!-- MAIN -->
<section id="content">
<main>
	<div class="head-title">
		<div class="left">
			<h1>Daftar Akun</h1>
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
	 <?php 	

	  	if(@$_GET['pesan']=="berhasil"){
            echo 
            '<script type="text/javascript">
                alert("Data User Berhasil di Buat!");
            </script>';
      }

	  ?>
<?php
    include '../koneksi.php';
 
    $query = mysqli_query($conn, "SELECT max(kd_users) as kodeTerbesar FROM users");
    $data = mysqli_fetch_array($query);
    $kodeUser = $data['kodeTerbesar'];
 
    $urutan = (int) substr($kodeUser, 3, 3);
 
    $urutan++;
  
    $huruf = "USR";
    $kodeUser = $huruf . sprintf("%03s", $urutan);
    ?>

	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Daftar</h3>
			</div>
			<form action="aksi-daftar-akun.php" method="POST" enctype="multipart/form-data"> 
			<table>
						<input type="hidden" name="id_users">
					<tr>
						<td>
							<input class="input-control" type="text" name="kd_users" value="<?php echo $kodeUser ?>" required readonly>
						</td>
					</tr>
					<tr>
						<td>
							<input class="input-control" type="text" name="username" placeholder="Username" required>
						</td>
					</tr>
					<tr>
						<td >
							<input class="input-control" type="password" name="password" placeholder="Password" required>
						</td>
					</tr>
					<tr>
						<td>
							<input class="input-control" type="text" name="nama" placeholder="Nama User" required>
						</td>
					</tr>
					<tr>
						<td>
							<select name="role" type="text" class="input-control" required autocomplete="off" >
								<option>--Pilih--</option>
								<option value="Petugas">Petugas</option>
								<option value="Kepala Perpus">Kepala Perpus</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" class="submit" value="Daftar">
						</td>
					</tr>
					
			</table>
		</div>
	</div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>