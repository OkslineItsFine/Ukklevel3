<?php
// koneksi.php

$host = 'localhost';
$user = 'root'; // Ganti sesuai username DB Anda
$pass = '';     // Ganti sesuai password DB Anda
$db = 'DB_Alumni_Stella'; // Nama database yang dispesifikasi

// Membuat koneksi MySQLi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>  