<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../views/karyawan/styles.ss" />
    <link rel="stylesheet" href="../views/karyawan/styles_input.css" />
</head>
<body>
    <div class="page-wrapper active">
        <a href="index.php" class="btn btn-secondary" style="position: absolute; top: 115px; left: 10px; z-index: 1000;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <br>
        <br>
        <br>
        <br>
        <div class="form-container">
            <h2><i class="fas fa-gear"></i> Tambah Karyawan</h2>
            <form method="POST" action="index.php?view=edit">
                 <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="text" id="nik" name="nik" value="<?= $detailKaryawan['nik'] ?>" required />
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required />
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan"  required />
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis_Kelamin</label>
                    <select name="jenis_kelamin" id="">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" id="level" name="level"  required />
                </div>

                <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <input type="text" id="divisi" name="divisi"  required />
                </div>

                <div class="form-group">
                    <label for="masa_kerja">Masa Kerja</label>
                    <input type="number" id="masa_kerja" name="masa_kerja"  required />
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="tetap">tetap</option>
                        <option value="pkwt">pkwt</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="npwp">npwp</label>
                    <select name="npwp" id="">
                        <option value="ya">ya</option>
                        <option value="tidak">tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="saldo_cuti">Saldo cuti</label>
                    <input type="number" id="saldo_cuti" name="saldo_cuti"  required />
                </div>

                <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input type="number" id="gaji" name="gaji"  required />
                </div>


                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
    