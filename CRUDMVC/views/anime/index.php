<!DOCTYPE html>
<html>
<head>
    <title>Daftar Anime</title>
    <style>
        * {margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",sans-serif;}
        body {
            background:#FAF8F1;
            color:#334443;
            display:flex;
            justify-content:center;
            padding:30px;
        }
        .container {
            width:95%;
            max-width:900px;
            background:#FAEAB1;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
            overflow:hidden;
        }
        .header {
            background:#34656D;
            color:#fff;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 20px;
        }
        .header h2 {
            margin:0;
        }
        .header a {
            background:#2ecc71;
            color:#fff;
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            transition:0.3s;
        }
        .header a:hover {background:#27ae60;}
        table {
            width:100%;
            border-collapse:collapse;
        }
        th, td {
            padding:14px 12px;
            text-align:center;
            border-bottom:1px solid #ccc;
        }
        th {
            background:#34656D;
            color:#fff;
        }
        tr:nth-child(even) {background:#fff;}
        tr:nth-child(odd) {background:#FAF8F1;}
        tr:hover {background:#FAEAB1;}
        a.action {
            display:inline-block;
            padding:6px 12px;
            border-radius:6px;
            text-decoration:none;
            color:#fff;
            font-size:13px;
            margin:2px;
            transition:0.3s;
        }
        a.edit {background:#3498db;}
        a.edit:hover {background:#2980b9;}
        a.danger {background:#e74c3c;}
        a.danger:hover {background:#c0392b;}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Daftar Anime</h2>
        <a href="index.php?action=tambah">+ Tambah Anime</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($data)): ?>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['tahun_rilis'] ?></td>
                <td><?= $row['rating'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $row['id'] ?>" class="action edit">Edit</a>
                    <a href="index.php?action=hapus&id=<?= $row['id'] ?>" class="action danger" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Belum ada data anime.</td></tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>
