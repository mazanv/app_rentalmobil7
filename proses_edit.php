<?php
include "koneksi.php";

$kd_sewa = $_POST['kd_sewa'];
$kd_mobil = $_POST['kd_mobil'];
$kd_customer = $_POST['kd_customer'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

// 
$querymobil = mysqli_query($koneksi, "SELECT * FROM mobil WHERE kd_mobil = '$kd_mobil'");
while ($mobil = mysqli_fetch_assoc($querymobil)) {
    $stok = $mobil['stok'];
}

if ($stok == 0) {
    echo "<script>alert('Stok Kosong, Silahkan Input Terlebih Dahulu Atau Pilih Mobil Lain!');</script>";
} else if ($tgl_pinjam > $tgl_kembali) {
    echo "<script>alert('Format Tanggal Salah Nih, Periksa Lagi Ya!');</script>";
} else {
    // 
    $diff = date_diff(date_create($tgl_pinjam), date_create($tgl_kembali));
    $hari = $diff->format("%a") + 1;

    $sql = "SELECT * FROM mobil WHERE kd_mobil = '$kd_mobil'";
    $query = mysqli_query($koneksi, $sql);

    while ($mobil = mysqli_fetch_assoc($query)) {
        $tarif_sewa = $mobil['tarif_sewa'];
    }

    $total_sewa = $tarif_sewa * $hari;

    $sql2 = "UPDATE sewa SET kd_mobil = '$kd_mobil', kd_customer = '$kd_customer', tgl_pinjam = '$tgl_pinjam', tgl_kembali = '$tgl_kembali', total_sewa = '$total_sewa' WHERE kd_sewa = '$kd_sewa'";
    $query2 = mysqli_query($koneksi, $sql2);

    if ($query2) {
        echo "<script>alert('Data Berhasil Di Ubah!'); location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah!'); location.href = 'edit.php';</script>";
    }
}
