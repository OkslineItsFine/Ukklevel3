<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan sanitasi
    $nama       = $koneksi->real_escape_string($_POST['nama']);
    $tahun      = $koneksi->real_escape_string($_POST['tahun']);
    $jurusan    = $koneksi->real_escape_string($_POST['jurusan']);
    $pekerjaan  = $koneksi->real_escape_string($_POST['pekerjaan']);
    $telepon    = $koneksi->real_escape_string($_POST['telepon']);
    $email      = $koneksi->real_escape_string($_POST['email']);
    $alamat     = $koneksi->real_escape_string($_POST['alamat']);

    // Query INSERT data
    $sql = "INSERT INTO alumni (Nama_Lengkap, Tahun_Lulus, Jurusan, Pekerjaan_Saat_Ini, Nomor_Telepon, Email, Alamat) 
            VALUES ('$nama', '$tahun', '$jurusan', '$pekerjaan', '$telepon', '$email', '$alamat')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data alumni berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        // Handle error, misalnya karena Email tidak unik
        $error_message = "Error: " . $sql . "<br>" . $koneksi->error;
        if (strpos($koneksi->error, 'Duplicate entry') !== false && strpos($koneksi->error, 'Email') !== false) {
             echo "<script>alert('Gagal: Email sudah terdaftar. Gunakan email lain.'); window.location.href='tambah_alumni.php';</script>";
        } else {
             echo "<script>alert('Gagal menambahkan data: " . $error_message . "'); window.location.href='tambah_alumni.php';</script>";
        }
    }
}
$koneksi->close();
?>