<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <br>
    <br>
    <table border="1" cellpadding="50" cellspacing="1">
        <tr>
            <th>Kode Hewan</th>
            <th>Nama</th>
            <th>Spesies</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Umur</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($binatang)): ?>
            <?php foreach ($binatang as $hewan): ?>
                <tr>
                    <td><?= htmlspecialchars($hewan['kode_hewan']) ?></td>
                    <td><?= htmlspecialchars($hewan['nama']) ?></td>
                    <td><?= htmlspecialchars($hewan['spesies']) ?></td>
                    <td><?= htmlspecialchars($hewan['jumlah']) ?></td>
                    <td><?= htmlspecialchars($hewan['status']) ?></td>
                    <td><?= htmlspecialchars($hewan['umur']) ?></td>
                    <td>
                        <?php if ($hewan['spesies'] == "Mamalia"): ?>
                            <a>Koleksi Darat</a>
                        <?php elseif ($hewan['spesies'] == "Burung"): ?>
                            <a>Koleksi Udara</a>
                        <?php elseif ($hewan['spesies'] == "Ikan"): ?>
                            <a>Koleksi Air</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?action=edit_form&kode_hewan=<?= urlencode($hewan['kode_hewan']) ?>">Edit</a> | 
                        <a href="index.php?action=delete&kode_hewan=<?= urlencode($hewan['kode_hewan']) ?>" onclick="return confirm('Hapus Binatang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8">Belum ada data.</td></tr>
        <?php endif; ?>
    </table>
    <br>
    <br>
    <a href="index.php?action=add_form">Tambah Binatang</a>
</body>
</html>
