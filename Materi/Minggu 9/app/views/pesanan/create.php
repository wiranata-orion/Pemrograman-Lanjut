<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Pesan Jasa Hukum</h2>
    <form method="POST">
        <label>Nama Klien:</label><br>
        <input type="text" name="nama_klien" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Jenis Jasa:</label><br>
        <select name="jenis_jasa" required>
            <option value="Konsultasi Hukum">Konsultasi Hukum</option>
            <option value="Pembuatan Kontrak">Pembuatan Kontrak</option>
            <option value="Pendampingan Hukum">Pendampingan Hukum</option>
        </select><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br>

        <button type="submit">Kirim</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>