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

    <?php if ($view === 'edit_exchange'): ?>
    <div>
        <a href="index.php?view=exchange" class="back-link">Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=edit_exchange" method="POST"> <!-- Ganti action dengan backend jika perlu -->
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <h2>Edit Data Baru</h2>
                
                <div class="form-group">
                    <label for="nama_exchange">Nama Exchange</label>
                    <input type="text" id="nama_exchange" name="nama_exchange" value="<?= $ExchangeDetail['nama_exchange']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="jenis_platform">Jenis Platform</label>
                    <input type="text" name="jenis_platform" id="jenis_platform" value="<?= $ExchangeDetail['jenis_platform']; ?>" required>
                </div>    
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>

    <?php elseif ($view === 'edit_portofolios'): ?>
    <div>
        <a href="index.php?view=portofolios" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=edit_portofolios" method="POST"> <!-- Ganti action dengan backend jika perlu -->
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                <h2>Edit Portofolios</h2>
                
                <div class="form-group">
                    <label for="nama_portofolio">Nama Portofolio</label>
                    <input type="text" id="nama" name="nama_portofolio" value="<?= $PortofoliosDetail['nama_portofolio']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="mata_uang">Mata Uang</label>
                    <input type="text" id="mata_uang" name="mata_uang" value="<?= $PortofoliosDetail['mata_uang_dasar']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="<?= $PortofoliosDetail['deskripsi']; ?>" required>
                </div>
                
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>

    <?php elseif ($view === 'edit_crypto_assets'): ?>
    <div>
        <a href="index.php?view=crypto_assets" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=edit_crypto_assets" method="POST"> <!-- Ganti action dengan backend jika perlu -->
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <h2>Edit Crypto Assets</h2>
                
                <div class="form-group">
                    <label for="simbol_aset">Simbol Aset</label>
                    <input type="text" id="simbo_aset" name="simbol_aset" value="<?= $CryptoAssetsDetail['simbol']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nama_aset">Nama Aset</label>
                    <input type="text" id="jumlah" name="nama_aset" value="<?= $CryptoAssetsDetail['nama_lengkap']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="kategori_id">Kategori ID</label>
                    <input type="number" id="kategori_id" name="kategori_id" value="<?= $CryptoAssetsDetail['kategori_id']; ?>" required>
                </div>
                
                <button type="submit">Submit Data</button>
            </form>
        </div>

    <?php elseif ($view === 'edit_asset_categories'): ?>
    <div>
        <a href="index.php?view=asset_categories" class="back-link">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <form action="index.php?view=edit_asset_categories" method="post"> <!-- Ganti action dengan backend jika perlu -->
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                <h2>Edit Asset Categories</h2>
                
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" value="<?= $AssetCategoriesDetail['nama_kategori'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="kelas_aset">Kelas aset</label>
                    <input type="text" id="kelas_aset" name="kelas_aset" value="<?= $AssetCategoriesDetail['kelas_aset'] ?>" required>
                </div>
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
    

    <?php include 'footer.html'; ?>
</body>
</html>