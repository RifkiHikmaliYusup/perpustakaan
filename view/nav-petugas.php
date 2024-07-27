<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->

    <!-- Boxicons -->
    <link href="../fontawesome/css/all.min.css" rel="stylesheet" />
    <!-- My CSS -->

    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.3-dist/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>


    <title>Petugas | Perpustakaan</title>


    <script>
        $(document).ready(function() {
            $(".notification").click(function() {
                $(".notification-content").toggle();
            });
        });
    </script>
</head>
<?php session_start(); ?>

<body>
    <?php
    // Koneksi ke database (ganti sesuai dengan koneksi Anda)
    include "../koneksi.php";


    $query = "SELECT COUNT(*) AS notif_count FROM pinjam WHERE status = 'Dipinjam'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $notif_count = $data['notif_count'];

    // Query untuk mengambil data peminjaman dengan status "Menunggu Konfirmasi" untuk user yang login
    $query_notif = "SELECT * FROM pinjam WHERE status = 'Dipinjam'";
    $result_notif = mysqli_query($conn, $query_notif);
    $notif_messages = array();
    while ($row = mysqli_fetch_assoc($result_notif)) {
        $notif_messages[] = "Buku " . $row['title'] . " sedang menunggu Dikembalikan";
    }



    ?>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='fa fa-book' style="margin-left: 10px"></i>
            <span class="text" style="margin-left: 10px;">Perpustakaan</span>
            <img src="../img/logo.jpg" class="logo-img" style="width: 50px; height: 50px; margin-left: 10px; border-radius: 50%; ">
        </a>
        <ul class="side-menu top">
            <li class="menu-item">
                <a href="hal-petugas.php">
                    <i class='fa fa-clipboard' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px; ">Daftar Buku</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="data-pinjam-keseluruhan.php">
                    <i class='fa fa-folder' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Data Pinjam Keseluruhan</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li class="menu-item">
                <a href="../logout.php" class="logout">
                    <i class='fa-solid fa-sign-out' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='fa fa-list' style="cursor: pointer;"></i>
            <a href="#" class="notification">
                <i class='fa fa-bell'></i>
                <?php if ($notif_count > 0) : ?>
                    <span class="num"><?php echo $notif_count; ?></span>
                <?php endif; ?>
                <div class="notification-content">
                    <?php if ($notif_count > 0) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Notifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notif_messages as $index => $message) : ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $message; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Tidak ada notifikasi</p>
                    <?php endif; ?>
                </div>
            </a>
        </nav>
        <!-- NAVBAR -->

    </section>
    <script src="../js/script.js"></script>
</body>

</html>