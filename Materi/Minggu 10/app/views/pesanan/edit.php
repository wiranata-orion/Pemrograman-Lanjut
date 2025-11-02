<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
</head>
<body>
    <h2>Edit Pesanan Klien</h2>
    <form method="POST">
        <label>Nama Klien:</label><br>
        <input type="text" name="nama_klien" value="<?= $pesanan['nama_klien'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $pesanan['email'] ?>" required><br><br>

        <label>Jenis Jasa Hukum:</label><br>
        <select name="jenis_jasa" required>
            <option value="Konsultasi Hukum" <?= $pesanan['jenis_jasa'] === 'Konsultasi Hukum' ? 'selected' : '' ?>>Konsultasi Hukum</option>
            <option value="Pembuatan Kontrak" <?= $pesanan['jenis_jasa'] === 'Pembuatan Kontrak' ? 'selected' : '' ?>>Pembuatan Kontrak</option>
            <option value="Pendampingan Hukum" <?= $pesanan['jenis_jasa'] === 'Pendampingan Hukum' ? 'selected' : '' ?>>Pendampingan Hukum</option>
        </select><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="5" cols="40"><?= $pesanan['deskripsi'] ?></textarea><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>