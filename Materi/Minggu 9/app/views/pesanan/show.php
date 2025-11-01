<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>
</head>
<body>
    <h2>Detail Pesanan Klien</h2>
    <p><b>Nama Klien:</b> <?= htmlspecialchars($pesanan['nama_klien']) ?></p>
    <p><b>Email:</b> <?= htmlspecialchars($pesanan['email']) ?></p>
    <p><b>Jenis Jasa:</b> <?= htmlspecialchars($pesanan['jenis_jasa']) ?></p>
    <p><b>Deskripsi:</b><br><?= nl2br(htmlspecialchars($pesanan['deskripsi'])) ?></p>
    <p><b>Tanggal Pesan:</b> <?= $pesanan['tanggal_pesan'] ?></p>
    <a href="index.php">Kembali ke Daftar</a>
</body>
</html>
