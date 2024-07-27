<?php require 'nav-anggota.php' ?>
<!-- MAIN -->
<section id="content">
    <?php
    if (@$_GET['pesan'] == "BukuBerhasilDipinjam") {
        echo '<script type="text/javascript">alert("Data Buku Berhasil Dipinjam!");</script>';
    }
    ?>

    <main>
        <div class="head-title">
            <div class="left">
                <ul class="breadcrumb">
                    <h1>Daftar Buku</h1>
                </ul>
            </div>
        </div>

        <!-- Display notification area -->
        <?php
        if (isset($_SESSION['notifications']) && !empty($_SESSION['notifications'])) {
            // Check if there are notifications for the current member
            $user_id = $_SESSION['user_id'];
            if (isset($_SESSION['notifications'][$user_id]) && !empty($_SESSION['notifications'][$user_id])) {
                echo '<div class="notification-area">';
                foreach ($_SESSION['notifications'][$user_id] as $notification) {
                    echo '<div class="notification">' . $notification . '</div>';
                }
                echo '</div>';

                // Clear notifications for the current member
                unset($_SESSION['notifications'][$user_id]);
            }
        }
        ?>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Data Terbaru</h3>
                </div>
            </div>
        </div>
        <?php
        include "../koneksi.php";
        $data = mysqli_query($conn, "SELECT * FROM buku ");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <ul class="box-info">
                <div class="box">
                    <li>
                        <a href="hal-detail-buku.php?kd_buku=<?php echo $d['kd_buku']; ?>">
                            <img src="../img-buku/<?php echo $d['img_buku']; ?>" width="190px" height="240px">
                        </a>
                        <h5 align="center" style="margin-top: 20px;"><?php echo $d['title']; ?></h5>
                        <a href="pinjam-buku.php?id_buku=<?php echo $d['id_buku'] ?>" class="btn btn-primary">Pinjam Buku</a>
                    </li>
                </div>
            </ul>
        <?php } ?>

    </main>
</section>
</body>
</html>
