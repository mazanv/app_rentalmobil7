<?php
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    // header("location:login.php?Pesan= Silahkan Login Dulu");
    echo "<script>alert('Login Dulu Yuk!'); location.href = 'login.php'; </script>";
    exit;
} else {



    $sql1 = "SELECT * FROM mobil WHERE NOT stok = '0'";
    $query1 = mysqli_query($koneksi, $sql1);
    $sql2 = "SELECT * FROM customer";
    $query2 = mysqli_query($koneksi, $sql2);

    $kd_sewa = $_GET['kd_sewa'];
    $sql = "SELECT * FROM sewa WHERE kd_sewa = '$kd_sewa'";
    $query = mysqli_query($koneksi, $sql);
    while ($sewa = mysqli_fetch_assoc($query)) { ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/bootstrap.bundle.js"></script>
            <title>Edit | Sewa</title>
        </head>

        <body>
            <div class="container">
                <form action="proses_edit.php" method="post">
                    <input class="form-control" type="hidden" name="kd_sewa" value="<?= $sewa['kd_sewa'] ?>">
                    <label class="label-control" for="kd_mobil">KD Mobil</label>
                    <br><select class="form-control" name="kd_mobil" id="kd_mobil">
                        <?php
                        while ($mobil = mysqli_fetch_assoc($query1)) { ?>
                            <option value="<?= $mobil['kd_mobil']; ?>" <?php
                                                                        if ($mobil['kd_mobil'] == $sewa['kd_mobil']) {
                                                                            echo "Selected!";
                                                                        } ?>><?= strtoupper($mobil['jenis_mobil']) ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <!-- <br><input type="number" name="kd_mobil" value="<?= $sewa['kd_mobil'] ?>"><br> -->
                    <label class="label-control" for="kd_customer">KD Customer</label>
                    <br><select class="form-control" name="kd_customer" id="kd_customer">
                        <?php
                        while ($customer = mysqli_fetch_assoc($query2)) { ?>
                            <option value="<?= $customer['kd_customer']; ?>" <?php
                                                                                if ($customer['kd_customer'] == $customer['kd_customer']) {
                                                                                    echo "Selected!";
                                                                                } ?>><?= strtoupper($customer['nama']) ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <!-- <br><input type="number" name="kd_customer" value="<?= $sewa['kd_customer'] ?>"><br> -->
                    <label class="label-control" for="tgl_pinjam">Tgl Pinjam</label>
                    <br><input class="form-control" type="date" name="tgl_pinjam" value="<?= $sewa['tgl_pinjam'] ?>"><br>
                    <label class="label-control" for="tgl_kembali">Tgl Kembali</label>
                    <br><input class="form-control" type="date" name="tgl_kembali" value="<?= $sewa['tgl_kembali'] ?>"><br>

                    <button class="btn btn-outline-primary" type="submit" style="float:left ;">Ubah</button>

                </form>
                <a href="index.php"><button class="btn btn-outline-warning" style="float:right ;">Kembali</button></a>
        </body>
        </div>


        </html>
<?php
    }
}
?>