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
    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>
    <?php session_start(); ?>

    <title>Pemimpin | Perpustakaan</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='fa fa-book' style="margin-left: 10px"></i>
            <span class="text" style="margin-left: 10px">Perpustakaan</span>
            <img src="../img/logo.jpg" class="logo-img" style="width: 50px; height: 50px; margin-left: 10px; border-radius: 50%; ">
        </a>
        <ul class="side-menu top">
            <li class="menu-item">
                <a href="hal-kepala.php">
                    <i class='fa fa-user' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Daftar Akun</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="laporan-buku.php">
                    <i class='fa fa-clipboard' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Laporan Buku Masuk</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="laporan-pinjam-buku.php">
                    <i class='fa fa-clipboard' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Laporan Pinjam Buku</span>
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
        </nav>
        <!-- NAVBAR -->

    </section>
    <script src="../js/script.js"></script>
</body>

</html>