<?php require 'nav-kepala.php'; ?>
<!DOCTYPE html>
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
    function terlambat($tgl_dateline, $tgl_kembali) {
    $tgl_dateline_pecah = explode('-', $tgl_dateline);
    $tgl_dateline_pecah = $tgl_dateline_pecah[2].'-'.$tgl_dateline_pecah[1].'-'.$tgl_dateline_pecah[0];

    $tgl_kembali_pecah = explode('-', $tgl_kembali);
    $tgl_kembali_pecah = $tgl_kembali_pecah[2].'-'.$tgl_kembali_pecah[1].'-'.$tgl_kembali_pecah[0];

    $selisih = strtotime($tgl_kembali_pecah) - strtotime($tgl_dateline_pecah);

    $selisih = $selisih/86400;
    if ($selisih >= 1) {
        $hasil_tgl = floor($selisih);
    }else{
        $hasil_tgl = 0;
    }
    return $hasil_tgl;
    }

    ?>

    <?php
    if (@$_GET['pesan'] == "BukuBerhasilDitambahkan"){
        echo '<script type="text/javascript">alert("Data Buku Berhasil Disimpan!");</script>';
    }
    ?>
    <section id="content">
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Data Pinjam Buku</h1>

                    <ul class="breadcrumb">
                        <li>
                            <h4><?php echo $_SESSION['role']; ?></h4>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li><?php echo $_SESSION['nama']; ?></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Data Terbaru</h3>
                    </div>
                    <table class='table table-striped table-bordered' id="datatable">
                        <thead style="text-align: center;">
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Buku</th>
                                <th>Gambar Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $data = mysqli_query($conn, "SELECT * FROM pinjam INNER JOIN buku ON pinjam.id_buku = buku.id_buku ");

                            while($d = mysqli_fetch_array($data)){
                            ?>
                                <tr class="table table-default">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama_peminjam']; ?></td>
                                    <td><?php echo $d['title']; ?></td>
                                    <td>
                                        <img src="../img-buku/<?php echo $d['img_buku']; ?>" >
                                    </td>
                                    <td><?php echo $d['jmlh_pinjam']; ?></td>
                                    <td><?php echo $d['tgl_pinjam']; ?></td>
                                    <td><?php echo $d['tgl_kembali']; ?></td>
                                    <td>
                                    <?php
                                    $denda = 1000;
                                    $tgl_dateline = $d['tgl_kembali'];
                                    $tgl_kembali = date('d-m-Y');

                                    $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                    $denda1 = $lambat * $denda;

                                    if ($lambat > 0) { ?>
                                        <div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div>
                                    <?php } else {
                                        echo $lambat . " Hari";
                                    }
                                     ?>
                                    </td>

                                    <td><?php echo $d['status']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            

            <script>
                $(document).ready(function() {
                    $('#datatable').DataTable();
                });
            </script>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
</body>
</html>
