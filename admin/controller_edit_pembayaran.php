<?php
include '../connection.php';

$id_pembayaran      = $_POST['id_pembayaran'];
$id_petugas      = $_POST['id_petugas'];
$id              = $_POST['nisn'];
$tgl_bayar       = $_POST['tgl_bayar'];
$bulan_dibayar   = $_POST['bulan_dibayar'];
$tahun_dibayar   = $_POST['tahun_dibayar'];
$id_spp          = $_POST['id_spp'];
$jumlah_bayar    = $_POST['spp_masuk']+$_POST['jumlah_bayar'];

$query  = "UPDATE `pembayaran` SET `id_petugas`='$id_petugas',`nisn`='$id',`tgl_bayar`='$tgl_bayar',`bulan_dibayar`='$bulan_dibayar',`tahun_dibayar`='$tahun_dibayar',`id_spp`='$id_spp',`jumlah_bayar`='$jumlah_bayar'
           WHERE id_pembayaran ='$id_pembayaran'";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
   echo "<script>alert('Data berhasil diubah.');window.location='transaksi_pembayaran.php';</script>";
}

?>