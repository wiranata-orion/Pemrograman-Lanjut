<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/kontak/styles.css">
</head>
<body>
    <!-- Include Header (copy from header.html) -->
<?php include 'header.html'; ?>

    <main class="main-content">
        <div class="container">
            <a href="index.php" class="back-btn">Kembali ke Dashboard</a>
            <div class="table-container">
                <h2 class="table-title">Tabel Log Aktivitas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kontak ID</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php if (!empty($data)) : ?>
                        <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['kontak_id']; ?></td>
                                    <td><?= $row['jenis']; ?></td>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td><?= $row['catatan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Belum ada Aktivitas</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php include 'footer.html'; ?>
</body>
</html>