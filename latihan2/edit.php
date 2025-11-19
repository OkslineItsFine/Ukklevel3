<?php
require 'koneksi.php';

$id = isset($_GET['id']) ? $koneksi->real_escape_string($_GET['id']) : 0;
$data = null;

// 1. Ambil data lama jika ada ID
if ($id) {
    $sql_select = "SELECT * FROM alumni WHERE Id_Alumni = '$id'";
    $result_select = $koneksi->query($sql_select);
    if ($result_select->num_rows > 0) {
        $data = $result_select->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php';</script>";
        exit;
    }
}

// 2. Proses UPDATE jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_alumni'])) {
    $id_update  = $koneksi->real_escape_string($_POST['id_alumni']);
    $nama       = $koneksi->real_escape_string($_POST['nama']);
    $tahun      = $koneksi->real_escape_string($_POST['tahun']);
    $jurusan    = $koneksi->real_escape_string($_POST['jurusan']);
    $pekerjaan  = $koneksi->real_escape_string($_POST['pekerjaan']);
    $telepon    = $koneksi->real_escape_string($_POST['telepon']);
    $email      = $koneksi->real_escape_string($_POST['email']);
    $alamat     = $koneksi->real_escape_string($_POST['alamat']);

    $sql_update = "UPDATE alumni SET 
                    Nama_Lengkap = '$nama', 
                    Tahun_Lulus = '$tahun', 
                    Jurusan = '$jurusan', 
                    Pekerjaan_Saat_Ini = '$pekerjaan', 
                    Nomor_Telepon = '$telepon', 
                    Email = '$email', 
                    Alamat = '$alamat' 
                   WHERE Id_Alumni = '$id_update'";

    if ($koneksi->query($sql_update) === TRUE) {
        echo "<script>alert('Data alumni berhasil diubah!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: Email mungkin sudah digunakan.'); window.location.href='edit.php?id=$id_update';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Alumni</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container-form">
        <h2>Edit Data Alumni</h2>
        
        <form method="POST" id="formAlumni">
            <input type="hidden" name="id_alumni" value="<?= htmlspecialchars($data['Id_Alumni']) ?>">
            
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['Nama_Lengkap']) ?>" required>
            
            <label for="tahun">Tahun Lulus:</label>
            <input type="number" id="tahun" name="tahun" value="<?= htmlspecialchars($data['Tahun_Lulus']) ?>" min="1900" max="2099" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="<?= htmlspecialchars($data['Jurusan']) ?>" required>

            <label for="pekerjaan">Pekerjaan Saat Ini:</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="<?= htmlspecialchars($data['Pekerjaan_Saat_Ini']) ?>" required>

            <label for="telepon">Nomor Telepon:</label>
            <input type="text" id="telepon" name="telepon" value="<?= htmlspecialchars($data['Nomor_Telepon']) ?>" required>
            
            <label for="email">Email (Harus Unik):</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['Email']) ?>" required>
            
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['Alamat']) ?></textarea>
            
            <button type="submit" class="btn btn-simpan">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-kembali">Batal</a>
        </form>
    </div>
    <script src="validasi.js"></script>
</body>
</html>
<?php $koneksi->close(); ?>