<?php
require 'koneksi.php';

$id = isset($_GET['id']) ? $koneksi->real_escape_string($_GET['id']) : 0;

if ($id) {
    $sql = "DELETE FROM alumni WHERE Id_Alumni = '$id'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data alumni berhasil dihapus!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $koneksi->error . "'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='index.php';</script>";
}

$koneksi->close();
?>