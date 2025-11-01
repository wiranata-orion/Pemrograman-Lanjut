<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anime</title>
    <style>
        * {margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",sans-serif;}
        body {
            background:#FAF8F1;
            color:#334443;
            display:flex;
            justify-content:center;
            align-items:flex-start;
            padding:30px;
            min-height:100vh;
        }
        .container {
            width:90%;
            max-width:600px;
            background:#FAEAB1;
            padding:25px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
        }
        h2 {margin-bottom:20px;text-align:center;color:#334443;}
        form {display:flex;flex-direction:column;gap:14px;}
        input {
            padding:10px;
            border:1px solid #34656D;
            border-radius:6px;
            background:#fff;
            color:#334443;
        }
        input:focus {border-color:#334443;outline:none;}
        button,a {
            padding:10px 15px;
            border:none;
            border-radius:6px;
            cursor:pointer;
            text-decoration:none;
            color:#fff;
            text-align:center;
            transition:0.3s;
        }
        button {background:#34656D;}
        button:hover {background:#334443;}
        a {
            background:#95a5a6;
            display:inline-block;
            margin-top:10px;
        }
        a:hover {background:#7f8c8d;}
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Anime</h2>
    <form method="POST">
        <input type="text" name="judul" placeholder="Judul Anime" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="number" name="tahun_rilis" placeholder="Tahun Rilis" required>
        <input type="number" step="0.1" name="rating" placeholder="Rating" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</div>
</body>
</html>
