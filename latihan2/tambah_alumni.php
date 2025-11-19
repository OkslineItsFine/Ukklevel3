<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container-form">
        <h2>Tambah Data Alumni Baru</h2>
        
        <form action="proses_tambah.php" method="POST" id="formAlumni">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="tahun">Tahun Lulus (Contoh: 2024):</label>
            <input type="number" id="tahun" name="tahun" min="1900" max="2099" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>

            <label for="pekerjaan">Pekerjaan Saat Ini:</label>
            <input type="text" id="pekerjaan" name="pekerjaan" required>

            <label for="telepon">Nomor Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>
            
            <label for="email">Email (Harus Unik):</label>
            <input type="email" id="email" name="email" required>
            
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>
            
            <button type="submit" class="btn btn-simpan">Simpan Data</button>
            <a href="index.php" class="btn btn-kembali">Kembali</a>
        </form>
    </div>

    <script src="validasi.js"></script>
</body>
</html>