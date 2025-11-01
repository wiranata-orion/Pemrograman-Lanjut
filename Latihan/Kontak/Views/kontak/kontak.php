<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/kontak/styles.css">
</head>
<body>
    <?php include 'header.html'; ?>

    <main class="main-content">
        <div class="container">
            <a href="index.php" class="back-btn">Kembali ke Dashboard</a>
            
            <div class="table-container">
                <h2 class="table-title">Tabel Kontak</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Catatan</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                        <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['telepon']; ?></td>
                                    <td><?= $row['catatan']; ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="index.php?view=form_edit_kontak&id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                                            <a href="index.php?view=hapus_kontak&id=<?= $row['id']; ?>" class="btn-delete">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">Belum Ada kontak</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="index.php?view=form_tambah_kontak" class="add-btn">Tambah Data Baru</a>
            </div>
        </div>
    </main>
    <?php include 'footer.html'; ?>
</body>
</html>