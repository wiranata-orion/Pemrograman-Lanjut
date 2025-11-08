<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Login</title>
</head>
<body>
<a href="index.php?action=data">Kembali</a>
  <br><br><br><br><br><br>
  <center>
    <table border="1" cellpadding="20" cellspacing="0">
      <tr>
        <td>
          <center>
            <h2>Tambah Akun</h2>
            <form method="POST" action="index.php?action=tambah">
              <table cellpadding="10">
                <tr>
                  <td>Username:</td>
                  <td><input type="text" name="username" size="30" required></td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td><input type="password" name="password" size="30" required></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option disabled selected>Pilih</option>
                            <option value="0">Super Admin</option>
                            <option value="1">Operator</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="color:red;">
                        <?php if (!empty($ErrorMessage)) : ?>
                            <?= htmlspecialchars($ErrorMessage['message']); ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <input type="submit" value="Tambah">
                  </td>
                </tr>
              </table>
            </form>
          </center>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>