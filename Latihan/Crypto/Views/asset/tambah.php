<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data - Crypto Portfolio Dashboard</title>
    <link rel="stylesheet" href="../Views/asset/styles.css">
    <?php
        $view = isset($_GET['view']) ? $_GET['view'] : '';
    ?>
</head>
<body>
    <?php include 'header.html'; ?>

    <?php if ($view === 'tambah_exchange'): ?>
    <div>
        <a href="index.php?view=exchange" class="back-link">Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=tambah_exchange" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <h2>Tambah Data Baru</h2>
                
                <div class="form-group">
                    <label for="nama_exchange">Nama Exchange</label>
                    <input type="text" id="nama_exchange" name="nama_exchange" placeholder="Masukkan nama aset, e.g., Bitcoin" required>
                </div>
                
                <div class="form-group">
                    <label for="jenis_platform">Jenis Platform</label>
                    <input type="text" name="jenis_platform" id="jenis_platform" placeholder="Masukkan jenis platform, e.g., Centralized" required>
                </div>    
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>

    <?php elseif ($view === 'tambah_portofolios'): ?>
    <div>
        <a href="index.php?view=portofolios" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=tambah_portofolios" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <h2>Tambah Portofolios</h2>
                
                <div class="form-group">
                    <label for="nama_portofolio">Nama Portofolio</label>
                    <input type="text" id="nama" name="nama_portofolio" placeholder="Masukkan Nama Portofolio" required>
                </div>
                
                <div class="form-group">
                    <label for="mata_uang">Mata Uang</label>
                    <input type="text" id="mata_uang" name="mata_uang" placeholder="Masukkan Mata Uang" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required>
                </div>
                
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>

    <?php elseif ($view === 'tambah_crypto_assets'): ?>
    <div>
        <a href="index.php?view=crypto_assets" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=tambah_crypto_assets" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <h2>Tambah Crypto Assets</h2>
                
                <div class="form-group">
                    <label for="simbol_aset">Simbol Aset</label>
                    <input type="text" id="simbo_aset" name="simbol_aset" placeholder="Masukkan Simbol Aset" required>
                </div>
                
                <div class="form-group">
                    <label for="nama_aset">Nama Aset</label>
                    <input type="text" id="jumlah" name="nama_aset" placeholder="Masukkan Nama Aset" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="kategori_id">Kategori ID</label>
                    <input type="number" id="kategori_id" name="kategori_id" required>
                </div>
                
                <button type="submit">Submit Data</button>
            </form>
        </div>

    <?php elseif ($view === 'tambah_asset_categories'): ?>
    <div>
        <a href="index.php?view=asset_categories" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=tambah_asset_categories" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <h2>Tambah Asset Categories</h2>
                
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" required>
                </div>
                
                <div class="form-group">
                    <label for="kelas_aset">Kelas aset</label>
                    <input type="text" id="kelas_aset" name="kelas_aset" placeholder="Masukkan Kelas Aset" required>
                </div>
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>

    <?php elseif ($view === 'tambah_transactions'): ?>
    <div>
        <a href="index.php?view=transactions" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=tambah_transactions" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <h2>Tambah Transactions</h2>
                
                <div class="form-group">
                    <label for="portofolio_id">Portofolio ID</label>
                    <input type="number" id="portofolio_id" name="portofolio_id" placeholder="Portofolio ID" required>
                </div>
                
                <div class="form-group">
                    <label for="aset_id">Aset ID</label>
                    <input type="number" id="aset_id" name="aset_id" placeholder="Masukkan Aset ID" required>
                </div>

                <div class="form-group">
                    <label for="exchange_id">Exchange ID</label>
                    <input type="number" id="exchange_id" name="exchange_id" placeholder="Masukkan Exchange ID" required>
                </div>

                <div class="form-group">
                    <label for="tipe_transaksi">Tipe Transaksi</label>
                    <input type="text" id="tipe_transaksi" name="tipe_transaksi" placeholder="Masukkan Tipe Transaksi" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_aset">Jumlah Aset</label>
                    <input type="number" id="jumlah_aset" name="jumlah_aset" placeholder="Masukkan Jumlah Aset" required>
                </div>

                <div class="form-group">
                    <label for="harga_per_token">harga Per Token</label>
                    <input type="number" id="harga_per_token" name="harga_per_token" placeholder="Masukkan Harga per Token" required>
                </div>

                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="number" id="biaya" name="biaya" placeholder="Masukkan Biaya" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" required>
                </div>
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
    

    <?php include 'footer.html'; ?>
</body>
</html>