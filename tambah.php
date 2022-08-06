<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['login'])) {
    // header("location:login.php?Pesan= Silahkan Login Dulu");
    echo "<script>alert('Login Dulu Yuk!'); location.href = 'login.php'; </script>";
    exit;
}

$sql1 = "SELECT * FROM mobil WHERE NOT stok = '0'";
$query1 = mysqli_query($koneksi, $sql1);
$sql2 = "SELECT * FROM customer";
$query2 = mysqli_query($koneksi, $sql2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Tambah | Sewa</title>
</head>

<body>
    <div class="container">
        <form action="proses_tambah.php" method="post">
            <label class="label-control" for="kd_mobil">KD Mobil</label>
            <br><select class="form-control" name="kd_mobil" id="kd_mobil">
                <option value=""> -- Pilih Jenis Mobil -- </option>
                <?php
                while ($mobil = mysqli_fetch_assoc($query1)) { ?>
                    <option value=""><?= $mobil['kd_mobil'] ?><?= strtoupper($mobil['jenis_mobil']) ?></option>
                <?php
                }
                ?>
            </select><br>
            <!-- <br><input type="number" name="kd_mobil"><br> -->
            <label class="label-control" for="kd_customer">KD Customer</label>
            <br><select class="form-control" name="kd_customer" id="kd_customer">
                <option value=""> -- Pilih Nama Customer -- </option>
                <?php
                while ($customer = mysqli_fetch_assoc($query2)) { ?>
                    <option value=""><?= $customer['kd_customer'] ?><?= strtoupper($customer['nama']) ?></option>
                <?php
                }
                ?>
            </select><br>
            <!-- <br><input type="number" name="kd_customer"><br> -->
            <label class="label-control" for="tgl_pinjam">Tgl Pinjam</label>
            <br><input class="form-control" type="date" name="tgl_pinjam"><br>
            <label class="label-control" for="tgl_kembali">Tgl Kembali</label>
            <br><input class="form-control" type="date" name="tgl_kembali"><br>
            <button class="btn btn-outline-primary" style="float: left;" type="submit">Kirim</button>
        </form>
        <a href="index.php"><button class="btn btn-outline-warning" style="float: right;">Kembali</button></a>
    </div>


</body>

</html>