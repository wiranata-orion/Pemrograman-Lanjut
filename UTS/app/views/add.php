<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h2>Tambah User</h2>
    <form method="POST" action="index.php?action=add_hewan">
        <label>Kode Hewan</label><br>
        <input type="text" name="kode_hewan" required><br><br>

        <label>Nama Hewan</label><br>
        <input type="text" name="nama_hewan" required><br><br>

        <label>Spesies:</label><br>
        <select name="spesies_hewan" required>
            <option value="Mamalia">Mamalia</option>
            <option value="Burung">Burung</option>
            <option value="Ikan">Ikan</option>
        </select><br><br>

        <label>Jumlah Hewan</label><br>
        <input type="number" name="jumlah_hewan" required><br><br>

        <label>Status konservasi</label><br>
        <select name="status_hewan" required>
            <option value="Dilindungi">Dilindungi</option>
            <option value="Umum">Umum</option>
        </select><br><br>

        <label>Umur Hewan</label><br>
        <input type="number" name="umur_hewan" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>