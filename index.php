<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['login'])) {
    // header("location:login.php?Pesan= Silahkan Login Dulu");
    echo "<script>alert('Login Dulu Yuk!'); location.href = 'login.php'; </script>";
    exit;
} else {



    // $sql = "SELECT * FROM sewa";
    $sql = "SELECT*, customer.nama, mobil.jenis_mobil FROM sewa JOIN customer ON customer.kd_customer = sewa.kd_customer 
JOIN mobil ON mobil.kd_mobil = sewa.kd_mobil";
    $query = mysqli_query($koneksi, $sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.bundle.js"></script>
        <title>Home | Sewa</title>
    </head>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Halo, Selamat Datang!</a>
            <a href="logout.php"><button class="btn btn-outline-danger">Logout</button></a>

        </div>
    </nav>

    <body>
        <div class="container">
            <h1>Data Sewa</h1>

            <a href="tambah.php"><button class="btn btn-success" style="float:left ;">Tambah</button></a>
            <a href="cetak.php"><button class="btn btn-outline-warning" style="float:right ;">Cetak</button></a>
            <br><br>
            <table class="table table-bordered border-secondary">
                <tr class="table table-dark text-center">
                    <th>KD</th>
                    <th>KD Mobil</th>
                    <th>KD Customer</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Total Sewa</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $kd_sewa = 0;
                while ($sewa = mysqli_fetch_assoc($query)) {
                    $kd_sewa++;
                    echo "<tr class = 'text-center'>";
                    echo "<td>" . $kd_sewa . "</td>";
                    echo "<td>" . strtoupper($sewa['jenis_mobil']) . "</td>";
                    echo "<td>" . strtoupper($sewa['nama']) . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($sewa['tgl_pinjam'])) . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($sewa['tgl_kembali'])) . "</td>";
                    echo "<td>" . number_format($sewa['total_sewa']) . "</td>";
                    echo "<td><a href = 'hapus.php?kd_sewa=" . $sewa['kd_sewa'] . "'><button  class='btn btn-danger'>Hapus</button></a> | ";
                    echo "<a href = 'edit.php?kd_sewa=" . $sewa['kd_sewa'] . "'><button  class='btn btn-warning'>Edit</button></a></td>";
                    echo "</tr>";
                }

                ?>
            </table>

        </div>

    </body>

    </html>

<?php

} ?>