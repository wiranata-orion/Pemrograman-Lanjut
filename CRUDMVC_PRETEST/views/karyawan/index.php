<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/karyawan/styles.css">
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : '';
    ?>
</head>
<body>  
    <div>
        <br>
        <br>
        <h2><i class="fas fa-gear"></i> Daftar Karyawan</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Saldo Cuti</th>
                            <th>Status Cuti</th>
                            <th>Aksi</th>
                    </tr>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td><?= $row['divisi']; ?></td>
                                    <td><?= $row['saldo_cuti']; ?></td>
                                    <td><?= $row['saldo_cuti']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="window.location.href='index.php?view=edit&id=<?= $row['id']; ?>'"><i>Edit</i></button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='index.php?view=hapus&id=<?= $row['id']; ?>'"><i>Hapus</i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">Belum ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
            </table>
        </div>
        <div class="actions">
            <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah'"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
</body>
</html>