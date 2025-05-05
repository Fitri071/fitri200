<?php
include 'koneksi.php';
$npm = $_GET['npm'];

$query = mysqli_query($koneksi, "DELETE FROM tb_mahasiswa WHERE npm='$npm'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='tampildata.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location='tampildata.php';</script>";
}
?>
