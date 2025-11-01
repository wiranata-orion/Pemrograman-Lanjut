<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
      <form method="POST" action="index.php?action=update_hewan">
          <input type="hidden" name="kode_hewan" value="<?= htmlspecialchars($hewan['kode_hewan']) ?>">
        <label>Nama Hewan</label><br>
        <input type="text" name="nama_hewan" value="<?= $hewan['nama'] ?>" required><br><br>

        <label>Spesies:</label><br>
        <select name="spesies_hewan" required>
            <option value="Mamalia" <?= ($hewan['spesies'] === 'Mamalia') ? 'selected' : '' ?>>Mamalia</option>
            <option value="Burung" <?= ($hewan['spesies'] === 'Burung') ? 'selected' : '' ?>>Burung</option>
            <option value="Ikan" <?= ($hewan['spesies'] === 'Ikan') ? 'selected' : '' ?>>Ikan</option>
        </select><br><br>

        <label>Jumlah Hewan</label><br>
        <input type="number" name="jumlah_hewan" value="<?= $hewan['jumlah'] ?>" required><br><br>

        <label>Status konservasi</label><br>
        <select name="status_hewan" required>
            <option value="Dilindungi" <?= ($hewan['status'] === 'Dilindungi') ? 'selected' : '' ?>>Dilindungi</option>
            <option value="Umum" <?= ($hewan['status'] === 'Umum') ? 'selected' : '' ?>>Umum</option>
        </select><br><br>

        <label>Umur Hewan</label><br>
        <input type="number" name="umur_hewan" value="<?= $hewan['umur'] ?>" required><br><br>


        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>