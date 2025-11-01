<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Jasa Hukum</title>
</head>
<body>
    <h2>Pesan Jasa Hukum</h2>
    <?php if (empty($pesanan)): ?>
        <a href="?action=create">+ Tambah Pesanan Baru</a><br><br>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Klien</th>
            <th>Email</th>
            <th>Jenis Jasa</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pesanan as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nama_klien']) ?></td>
            <td><?= htmlspecialchars($p['email']) ?></td>
            <td><?= htmlspecialchars($p['jenis_jasa']) ?></td>
            <td><?= $p['tanggal_pesan'] ?></td>
            <td>
                <a href="?action=show&id=<?= $p['id'] ?>">Lihat</a> |
                <a href="?action=edit&id=<?= $p['id'] ?>">Edit</a> |
                <a href="?action=delete&id=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
