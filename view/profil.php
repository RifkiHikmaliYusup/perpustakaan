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
                <h3>Profil</h3>
                <a href="hal-anggota.php" class="btn btn-danger">Kembali</a>
            </div>
    <?php 
        include "../koneksi.php";
      
        $data = mysqli_query($conn,"SELECT * FROM users WHERE kd_users = '".$_SESSION['kd_users']."' ");
        while($d = mysqli_fetch_object($data)){
        ?>

                <div class="box3">
                    <img src="../img-profil/<?php echo $d->img_profil ?>" style="width:220px;  height: 205px; border-radius: 105px; display: block; margin-left: auto; margin-right: auto;">
                </div>
                <table>
                    <br>
                       <h3 style="text-align: center;"><?php echo $d->nama ?></h3>
                    <tr>
                        <td>
                            <h5 style="margin-left: 55px ;">Username : </h5>
                           <input type="text" class="input-control" required autocomplete="off" readonly value="<?php echo $d->username ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 style="margin-left: 55px ;">Role : </h5>
                            <input type="text" class="input-control" required autocomplete="off" readonly value="<?php echo $d->role ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="edit-profil.php?id_users=<?php echo $d->id_users ?>" class="submit" style="text-decoration: none;">Edit Profil</a>
                        </td>
                    </tr>
                </table>
            </div>
                
        </div>
    </div>
        <?php } ?>

    </main>
</section>
<script src="script.js"></script>
</body>

</html>