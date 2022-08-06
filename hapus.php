<?php
include "koneksi.php";

$kd_sewa = $_GET['kd_sewa'];
$sql = "DELETE FROM sewa WHERE kd_sewa = '$kd_sewa'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Data Berhasil Di Hapus!'); location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Data Gagal Di Hapus!'); location.href = 'index.php';</script>";
}
