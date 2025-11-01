<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/produksi/styles.css">
</head>
<body>  
    <?php require_once 'header.html'; ?>

  
        <div id="mesin" class="page <?= ($_GET['view'] ?? '')=='mesin' ? 'active' : '' ?>">
            <h2><i class="fas fa-gear"></i> Mesin</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Mesin</th>
                            <th>Kapasitas Per Jam</th>
                            <th>Tahun Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            <?php if (!empty($data)) : ?>
                                <?php foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['nama_mesin']; ?></td>
                                        <td><?= $row['kapasitas_per_jam']; ?></td>
                                        <td><?= $row['tahun_pembuatan']; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="window.location.href='index.php?view=edit_mesin&id=<?= $row['id']; ?>'"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="window.location.href='index.php?view=hapus_mesin&id=<?= $row['id']; ?>'"><i class="fas fa-trash"></i></button>
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
                <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah_mesin'"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>

        <div id="barang" class="page <?= ($_GET['view'] ?? '')=='bahan_baku' ? 'active' : '' ?>">
            <h2><i class="fa-solid fa-boxes-stacked"></i> Bahan Baku</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Bahan</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nama_bahan']; ?></td>
                                    <td><?= $row['jenis']; ?></td>
                                    <td><?= $row['stok']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="window.location.href='index.php?view=edit_bahan_baku&id=<?= $row['id']; ?>'"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='index.php?view=hapus_bahan_baku&id=<?= $row['id']; ?>'"><i class="fas fa-trash"></i></button>
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
                <a href="index.php" class="btn btn-secondary" ></i> Kembali</a>
                <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah_bahan_baku'"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>

         <div id="kategori" class="page <?= ($_GET['view'] ?? '')=='operator' ? 'active' : '' ?>">
            <h2><i class="fa-solid fa-users"></i> Operator</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Shift</th>
                            <th>Aksi</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['shift']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="window.location.href='index.php?view=edit_operator&id=<?= $row['id'] ?>'"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='index.php?view=hapus_operator&id=<?= $row['id']; ?>'"><i class="fas fa-trash"></i></button>
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
                <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah_operator'"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
    
        <div id="produksi" class="page <?= ($_GET['view'] ?? '')=='produksi' ? 'active' : '' ?>">
            <h2><i class="fa-solid fa-cogs"></i> Produksi</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Jumlah Lembar</th>
                            <th>Mesin ID</th>
                            <th>Bahan ID</th>
                            <th>Operator ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td><?= $row['jumlah_lembar']; ?></td>
                                    <td><?= $row['mesin_id']; ?></td>
                                    <td><?= $row['bahan_id']; ?></td>
                                    <td><?= $row['operator_id']; ?></td>
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
                <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah_produksi'"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>

       <div id="quality_check" class="page <?= ($_GET['view'] ?? '')=='quality_check' ? 'active' : '' ?>">
            <h2><i class="fa-solid fa-circle-check"></i> Quality Check</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produksi ID</th>
                            <th>Tingkat Cacat</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['produksi_id']; ?></td>
                                    <td><?= $row['tingkat_cacat']; ?>%</td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['catatan']; ?></td>    
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="window.location.href='index.php?view=edit_quality_check&id=<?= $row['id']; ?>'"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="window.location.href='index.php?view=hapus_quality_check&id=<?= $row['id']; ?>'"><i class="fas fa-trash"></i></button>
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
                <a class="btn btn-primary" onclick="window.location.href='index.php?view=tambah_quality_check'"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>        
<?php require_once 'footer.html'; ?>
</body>
</html>