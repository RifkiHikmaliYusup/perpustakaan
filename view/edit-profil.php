
<?php require 'nav-anggota.php'; ?>

<!-- MAIN -->
<section id="content">
        
<main>
    <div class="head-title">
        <div class="left">
            <h1>Profil</h1>
        </div>
    </div>

        <div class="table-data">
          <div class="order">
            <div class="head">
                <h3>Edit Profil</h3>
                <a href="profil.php"class="btn btn-danger">Kembali</a>
            </div>
    <?php 
        include "../koneksi.php";
      
        $data = mysqli_query($conn,"SELECT * FROM users WHERE kd_users = '".$_SESSION['kd_users']."' ");
        while($d = mysqli_fetch_object($data)){
        ?>
        <form action="aksi-edit-akun.php" method="POST" enctype="multipart/form-data"> 
                <div class="box3">
                    <input type="hidden" name="id_users" value="<?php echo $d->id_users ?>">

                    <input type="hidden" name="imglama" value="<?php echo $d->img_profil ?>">

                    <img src="../img-profil/<?php echo $d->img_profil ?>" style="width:220px;  height: 205px; border-radius: 105px; display: block; margin-left: auto; margin-right: auto;">
                    <br>
                    <h5 style="text-align: center;">Masukan foto profil yang baru :</h5>
                    <input type="file" style="display: block; margin-left: auto; margin-right: auto;" name="img_profil"   autocomplete="off">
                    <br>
                </div>
                <table>
                    <tr>
                        <td>
                            <h5 style="margin-left: 55px ;">Nama : </h5>
                           <input type="text" name="nama" class="input-control" <?php echo $d->nama ?>required autocomplete="off"  value="<?php echo $d->nama ?>">
                       </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 style="margin-left: 55px ;">Username : </h5>
                           <input type="text" name="username" class="input-control" required autocomplete="off"  value="<?php echo $d->username ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" class="submit" value="Simpan">
                        </td>
                    </tr>
                </table>
            </form>
            </div>
                
        </div>
    </div>
        <?php } ?>

    </main>
</section>
<script src="script.js"></script>
</body>

</html>