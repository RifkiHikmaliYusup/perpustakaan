<?php
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// mengaktifkan session pada php
session_start();

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM users where username='$username' and password='$password'") or die(mysqli_error($conn));

if (mysqli_num_rows($login) == 1) {
    //kalau username dan password sudah terdaftar di database
    //buat session dengan username dan role dengan isi nama user yang login
    $row = mysqli_fetch_array($login);
    $_SESSION['id_users'] = $row['id_users'];
    $_SESSION['kd_users'] = $row['kd_users'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['img_profil'] = $row['img_profil'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['status'] = 'login';

    if ($row['role'] == "anggota") {
        //redirect ke halaman anggota
        header('location:view/hal-anggota.php?login=berhasil');
    } else if ($row['role'] == "petugas") {
        //redirect kehalaman petugas
        header('location:view/hal-petugas.php?login=berhasil');
    } else if ($row['role'] == "kepala perpus") {
        //redirect kehalaman pemimpin
        header('location:view/hal-kepala.php?login=berhasil');
    }
} else {
    //kalau username ataupun password tidak terdaftar di database
    echo "<script>
    alert('Login gagal!  Masukkan username & password kembali');
    document.location.href = 'login.php';
    </script>";
}
