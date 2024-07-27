<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href="../fontawesome/css/all.min.css" rel="stylesheet" />
    <!-- My CSS -->

    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../bootstrap-4.5.3-dist/js/dataTables.bootstrap4.min.js"></script>

    <title>Anggota | Perpustakaan</title>
    <script>
        $(document).ready(function() {
            $(".notification").click(function() {
                $(".notification-content").toggle();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".messages").click(function() {
                $(".messages-content").toggle();
            });
        });
    </script>
</head>
<?php
// Koneksi ke database (ganti sesuai dengan koneksi Anda)
include "../koneksi.php";

session_start();
$user_id = $_SESSION['id_users'];

// Query untuk mengambil data peminjaman dengan status "Menunggu Konfirmasi" untuk user yang login
$query = "SELECT COUNT(*) AS notif_count FROM pinjam WHERE status = 'Menunggu Konfirmasi' AND id_users = $user_id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$notif_count = $data['notif_count'];

// Query untuk mengambil data peminjaman dengan status "Menunggu Konfirmasi" untuk user yang login
$query_notif = "SELECT * FROM pinjam WHERE status = 'Menunggu Konfirmasi' AND id_users = $user_id";
$result_notif = mysqli_query($conn, $query_notif);
$notif_messages = array();
while ($row = mysqli_fetch_assoc($result_notif)) {
    $notif_messages[] = "Buku " . $row['title'] . " sedang menunggu konfirmasi";
}
$user_id = $_SESSION['id_users'];
if (isset($_SESSION['notifications'][$user_id])) {
    $notifications = $_SESSION['notifications'][$user_id];
    unset($_SESSION['notifications'][$user_id]); // Hapus notifikasi setelah ditampilkan
}


?>

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
                <a href="hal-anggota.php">
                    <i class='fa fa-clipboard' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 19px">Daftar Buku</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="data-pinjam.php">
                    <i class='fa fa-folder' style="margin-left: 10px"></i>
                    <span class="text" style="margin-left: 15px">Data Pinjam Buku</span>
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
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='fa fa-list' style="cursor: pointer;"></i>
            <a href="#" class="messages">
                <i class="fa fa-message"></i>
                <?php if ($notif_count > 0) : ?>
                    <span class="num"><?php echo $notif_count; ?></span>
                <?php endif; ?>
                <div class="messages-content">
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
                        <p>Tidak ada Pesan</p>
                    <?php endif; ?>
                </div>
            </a>

            <a href="profil.php?Data=<?php echo $_SESSION['id_users']; ?>" class="profile">
                <?php if ($_SESSION['img_profil'] != '') : ?>
                    <img src="../img-profil/<?php echo $_SESSION['img_profil']; ?>">
                <?php else : ?>
                    <img src="../img-profil/user.png">
                <?php endif; ?>
            </a>
        </nav>
    </section>




    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../js/script.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const menuItems = document.querySelectorAll(".menu-item");
            menuItems.forEach(item => {
                item.addEventListener("click", function() {
                    menuItems.forEach(item => item.classList.remove("active"));
                    this.classList.add("active");
                });
            });
        });
    </script>
    <script>
        // Fungsi untuk menampilkan notifikasi
        function showNotification(message) {
            var notificationBox = document.querySelector(".notification-box");
            var notificationMessage = document.querySelector(".notification-message");

            // Ubah teks notifikasi dengan pesan yang diterima
            notificationMessage.textContent = message;

            // Tampilkan kotak notifikasi
            notificationBox.style.display = "block";

            // Setelah 5 detik, sembunyikan kotak notifikasi
            setTimeout(function() {
                notificationBox.style.display = "none";
            }, 5000);
        }
    </script>
</body>

</html>