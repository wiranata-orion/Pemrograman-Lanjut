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
            <a href="index.php?view=kontak" class="back-btn">Kembali ke Tabel Kontak</a>
            <div class="form-container">
                <h2 class="form-title">Tambah Kontak Baru</h2>
                <form action="index.php?view=tambah_kontak" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="tel" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea id="catatan" name="catatan" placeholder="Masukkan catatan tambahan"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Simpan Data Baru</button>
                </form>
            </div>
        </div>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>