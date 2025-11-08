<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Kembali</a>
    <br><br><br><br>
    <center>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>Nomor</td>
                <td>Username</td>
                <td>Role</td>
                <td>Aksi</td>
            </tr>
            <?php if (!empty($users)): ?>
                <?php $no = 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td>
                            <?php if ($user['kategori'] == 0): ?>
                                <a>Super Admin</a>
                            <?php elseif ($user['kategori'] == 1): ?>
                                <a>Operator</a>
                            <?php elseif ($user['kategori'] == 2): ?>
                                <a>Pegawai</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?action=edit&username=<?= urlencode($user['username'])?>">Edit</a> |
                            <a href="index.php?action=hapus&username=<?= urlencode($user['username'])?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Belum ada data.</td></tr>
            <?php endif; ?>
        </table>
        <br><br>
        <a href="index.php?action=tambah">Tambah Akun</a>
    </center>
</body>
</html>