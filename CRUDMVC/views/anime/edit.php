<!DOCTYPE html>
<html>
<head>
    <title>Edit Anime</title>
    <style>
        * {margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",sans-serif;}
        body {
            background:#FAF8F1;          /* krem muda */
            color:#334443;               /* hijau keabu */
            display:flex;
            justify-content:center;
            align-items:flex-start;
            padding:30px;
            min-height:100vh;
        }
        .container {
            width:100%;                  /* fleksibel */
            max-width:500px;             /* batas maksimal biar nggak melebar */
            background:#FAEAB1;          /* kuning pastel */
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
            overflow:hidden;
        }
        .header {
            background:#34656D;          /* biru kehijauan */
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
            background:#95a5a6;          /* abu tombol kembali */
            color:#fff;
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            transition:0.3s;
        }
        .header a:hover {background:#7f8c8d;}
        form {
            display:flex;
            flex-direction:column;
            gap:14px;
            padding:20px;
        }
        input {
            padding:10px;
            border:1px solid #34656D;
            border-radius:6px;
            background:#fff;
            color:#334443;
        }
        input:focus {border-color:#334443;outline:none;}
        button {
            padding:10px 15px;
            border:none;
            border-radius:6px;
            cursor:pointer;
            background:#3498db;          /* biru update */
            color:#fff;
            text-align:center;
            transition:0.3s;
        }
        button:hover {background:#2980b9;}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Edit Anime</h2>
        <a href="index.php">Kembali</a>
    </div>
    <form method="POST" action="index.php?action=edit&id=<?= $anime['id'] ?>">
        <input type="text" name="judul" value="<?= htmlspecialchars($anime['judul']) ?>" required>
        <input type="text" name="genre" value="<?= htmlspecialchars($anime['genre']) ?>" required>
        <input type="number" name="tahun_rilis" value="<?= htmlspecialchars($anime['tahun_rilis']) ?>" required>
        <input type="number" step="0.1" name="rating" value="<?= htmlspecialchars($anime['rating']) ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
