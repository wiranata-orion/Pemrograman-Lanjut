<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data - Crypto Portfolio Dashboard</title>
    <link rel="stylesheet" href="../Views/asset/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome untuk ikon -->
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : '';
    ?>
</head>
<body>
    <?php include 'header.html'; ?>

    <?php if ($view === 'exchange'): ?>
    <main>
        <!-- Tombol Kembali di Atas Kiri Setelah Header -->
        <a href="index.php" class="back-link">Kembali ke Dashboard</a>
        
        <div class="table-container">
            <h2 class="table-title">Exchange</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Exchange</th>
                        <th>Jenis Platform</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['exchange_id']; ?></td>
                        <td><?= $row['nama_exchange']; ?></td>
                        <td><?= $row['jenis_platform']; ?></td>
                        <td class="action-cell">
                            <a href="index.php?view=edit_exchange&id=<?= $row['exchange_id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="index.php?view=hapus_exchange&id=<?= $row['exchange_id']; ?>" class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="3">Tidak ada data tersedia</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="index.php?view=tambah_exchange" class="add-btn">Tambah Data</a>
        </div>

    </main>
    <?php elseif ($view === 'portofolios'): ?>
    <main>
        <!-- Tombol Kembali di Atas Kiri Setelah Header -->
        <a href="index.php" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="table-container">
            <h2 class="table-title">Tabel Crypto Assets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Portofolio ID</th>
                        <th>Nama Protofolio</th>
                        <th>Mata Uang Dasar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th> <!-- Kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['portofolio_id']; ?></td>
                        <td><?= $row['nama_portofolio']; ?></td>
                        <td><?= $row['mata_uang_dasar']; ?></td>
                        <td><?= $row['deskripsi']; ?></td>
                        <td class="action-cell">
                            <a href="index.php?view=edit_portofolios&id=<?= $row['portofolio_id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="index.php?view=hapus_portofolios&id=<?= $row['portofolio_id']?>" class="action-btn delete-btn"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data tersedia</td>
                    </tr>
                    <?php endif; ?>  
                </tbody>
            </table>
            
            <!-- Tombol Tambah di Bawah Tabel -->
            <a href="index.php?view=tambah_portofolios" class="add-btn">Tambah Data</a>
        </div>
    </main>
    <?php elseif ($view === 'crypto_assets'): ?>
    <main>
        <!-- Tombol Kembali di Atas Kiri Setelah Header -->
        <a href="index.php" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="table-container">
            <h2 class="table-title">Tabel Crypto Assets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Aset ID</th>
                        <th>Simbol Aset</th>
                        <th>Nama Aset</th>
                        <th>Kategori ID</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['aset_id']; ?></td>
                        <td><?= $row['simbol']; ?></td>
                        <td><?= $row['nama_lengkap']; ?></td>
                        <td><?= $row['kategori_id']; ?></td>
                        <td class="action-cell">
                            <a href="index.php?view=edit_crypto_assets&id=<?= $row['aset_id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="index.php?view=hapus_crypto_assets&id=<?= $row['aset_id']?>" class="action-btn delete-btn"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data tersedia</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Tombol Tambah di Bawah Tabel -->
            <a href="index.php?view=tambah_crypto_assets" class="add-btn">Tambah Data</a>
        </div>
    </main>
    <?php elseif ($view === 'asset_categories'): ?>
    <main>
        <!-- Tombol Kembali di Atas Kiri Setelah Header -->
        <a href="index.php" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="table-container">
            <h2 class="table-title">Tabel Crypto Assets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Kategori ID</th>
                        <th>Nama Kategori</th>
                        <th>Kelas Aset</th>
                        <th>Aksi</th> <!-- Kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['kategori_id']; ?></td>
                        <td><?= $row['nama_kategori']; ?></td>
                        <td><?= $row['kelas_aset']; ?></td>
                        <td class="action-cell">
                            <a href="index.php?view=edit_asset_categories&id=<?= $row['kategori_id']; ?>" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <a href="index.php?view=hapus_asset_categories&id=<?= $row['kategori_id']?>" class="action-btn delete-btn"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data tersedia</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Tombol Tambah di Bawah Tabel -->
            <a href="index.php?view=tambah_asset_categories" class="add-btn">Tambah Data</a>
        </div>
    </main>
    <?php elseif ($view === 'transactions'): ?>
    <main>
        <!-- Tombol Kembali di Atas Kiri Setelah Header -->
        <a href="index.php" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="table-container">
            <h2 class="table-title">Tabel Crypto Assets</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Portofolio ID</th>
                        <th>Aset ID</th>
                        <th>Exchange ID</th>
                        <th>Tipe Transaksi</th>
                        <th>Jumlah Aset</th>
                        <th>Harga Per Token</th>
                        <th>biaya</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['transaksi_id'] ?></td>
                        <td><?= $row['portofolio_id'] ?></td>
                        <td><?= $row['aset_id'] ?></td>
                        <td><?= $row['exchange_id'] ?></td>
                        <td><?= $row['tipe_transaksi'] ?></td>
                        <td><?= $row['jumlah_aset'] ?></td>
                        <td><?= $row['harga_per_unit'] ?></td>
                        <td><?= $row['biaya'] ?></td>
                        <td><?= $row['tanggal_waktu'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="8">Tidak ada data tersedia</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Tombol Tambah di Bawah Tabel -->
            <a href="index.php?view=tambah_transactions" class="add-btn">Tambah Data</a>
        </div>
    </main>
    <?php endif; ?>
    <?php include 'footer.html'; ?>

</body>
</html>