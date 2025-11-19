<?php 
require 'koneksi.php';

// Logika Pencarian
$cari = isset($_GET['cari']) ? $koneksi->real_escape_string($_GET['cari']) : '';
$where_clause = '';

if (!empty($cari)) {
    // Membuat klausa WHERE untuk mencari di beberapa kolom
    $where_clause = " WHERE Nama_Lengkap LIKE '%$cari%' 
                      OR Jurusan LIKE '%$cari%' 
                      OR Pekerjaan_Saat_Ini LIKE '%$cari%'";
}

// Query untuk READ data
$sql = "SELECT * FROM alumni" . $where_clause . " ORDER BY Id_Alumni DESC";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Alumni SMK Telkom Lampung</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>DATA ALUMNI SMK TELKOM LAMPUNG</h1>

        <a href="tambah_alumni.php" class="btn btn-tambah">+ Tambah Data</a>
        
        <form method="GET" class="search-form">
            <input type="text" name="cari" placeholder="Cari nama / jurusan / pekerjaan..." 
                   value="<?= htmlspecialchars($cari) ?>">
            <button type="submit" class="btn btn-cari">Cari</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Jurusan</th>
                    <th>Pekerjaan Saat Ini</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Perubahan</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id_Alumni']) ?></td>
                        <td><?= htmlspecialchars($row['Nama_Lengkap']) ?></td>
                        <td><?= htmlspecialchars($row['Tahun_Lulus']) ?></td>
                        <td><?= htmlspecialchars($row['Jurusan']) ?></td>
                        <td><?= htmlspecialchars($row['Pekerjaan_Saat_Ini']) ?></td>
                        <td><?= htmlspecialchars($row['Nomor_Telepon']) ?></td>
                        <td><?= htmlspecialchars($row['Email']) ?></td>
                        <td><?= htmlspecialchars($row['Alamat']) ?></td>
                        <td class="action-links">
                            <a href="edit.php?id=<?= $row['Id_Alumni'] ?>">✏️ Edit</a>
                            <a href="hapus.php?id=<?= $row['Id_Alumni'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">❌ Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">Tidak ada data alumni yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
<?php $koneksi->close(); ?>