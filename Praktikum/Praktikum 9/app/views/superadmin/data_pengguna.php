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
                            <?php if ($user['kategori'] == 1): ?>
                                <a>Operator</a>
                            <?php elseif ($user['kategori'] == 2): ?>
                                <a>Pegawai</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="">Edit</a>
                            <a href="">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Belum ada data.</td></tr>
            <?php endif; ?>
        </table>
        <a href="index.php?action=add_form">Tambah Akun</a>
    </center>
</body>
</html>