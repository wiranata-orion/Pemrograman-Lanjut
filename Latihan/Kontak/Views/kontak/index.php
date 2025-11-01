<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="stylesheet" href="../Views/kontak/styles.css">
</head>
<body>

<?php include 'header.html'; ?>
    <main class="main-content">
        <div class="container">
            <div class="dashboard-grid">
                <div class="card">
                    <h2>Tabel Kontak</h2>
                    <p>Kelola data kontak individu termasuk nama, email, telepon, alamat, tanggal lahir, dan catatan.</p>
                    <a href="index.php?view=kontak" class="card-link">Lihat Tabel Kontak</a>
                </div>
                <div class="card">
                    <h2>Tabel Log Aktivitas</h2>
                    <p>Lihat riwayat aktivitas seperti telepon, email, atau tatap muka untuk setiap kontak.</p>
                    <a href="index.php?view=log_aktivitas" class="card-link">Lihat Tabel Log</a>
                </div>
            </div>
        </div>
    </main>
<?php include 'footer.html'; ?>
</body>
</html>