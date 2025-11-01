<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/styles.css">
        <title>Restore Data</title>
        <script>
            function toggleAll(source) {
                const checkboxes = document.querySelectorAll('input[name="ids[]"]');
                checkboxes.forEach(cb => cb.checked = source.checked);
            }
        </script>
    </head>
    <body>
    <?php require_once 'header.html'; ?>

    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="flash-message <?= $_SESSION['flash_type'] ?? 'success' ?>">
            <?= $_SESSION['flash_message'] ?>
        </div>
        <?php unset($_SESSION['flash_message'], $_SESSION['flash_type']); ?>
    <?php endif; ?>

    <!-- Generic restore table layout repeated for each entity. Controller should provide $data, $page, $total_pages, $total_records, $records_per_page, $sort_col, $sort_dir -->

    <?php
    // small helper to render pagination links (keeps sort params)
    function page_link($view, $pageNum) {
        $qs = '?view=' . urlencode($view) . '&page=' . $pageNum;
        if (isset($_GET['sort_col'])) $qs .= '&sort_col=' . urlencode($_GET['sort_col']);
        if (isset($_GET['sort_dir'])) $qs .= '&sort_dir=' . urlencode($_GET['sort_dir']);
        return $qs;
    }
    ?>

    <!-- Mesin Restore -->
    <div id="mesin" class="page <?= ($_GET['view'] ?? '')=='mesin_restore' ? 'active' : '' ?>">
        <h2><i class="fas fa-gear"></i> Mesin (Restore)</h2>
        <div class="search-container">
            <form method="POST" action="">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <input type="text" name="search" class="search-input" placeholder="Cari Nama Mesin" value="<?= $_POST['search'] ?? '' ?>">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>

        <div class="table-container">
            <form method="POST" action="index.php?view=bulk_action">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <div class="mb-2">
                    <label>
                        <input type="checkbox" name="select_all" value="1" onchange="toggleAll(this)"> Select/Deselect All
                    </label>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>NO</th>
                            <th>Nama Mesin
                                <a href="?view=mesin_restore&sort_col=nama_mesin&sort_dir=<?= ($sort_col == 'nama_mesin' && $sort_dir == 'ASC') ? 'DESC' : 'ASC' ?>" style="color:white;"><i class="fa fa-arrows-v"></i></a>
                            </th>
                            <th>Kapasitas Per Jam</th>
                            <th>Tahun Pembuatan</th>
                            <th>Sisa Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): $no = 1; foreach ($data as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_mesin'] ?? '' ?></td>
                                <td><?= $row['kapasitas_per_jam'] ?? '' ?></td>
                                <td><?= $row['tahun_pembuatan'] ?? '' ?></td>
                                <td><?php $sisa = isset($row['deleted_at']) ? max(0, ceil((strtotime($row['deleted_at']) - time()) / 86400)) : 0; echo "<span style='color:".($sisa<=5?"red":"black")."'>".$sisa." hari</span>"; ?></td>
                                <td><a class="btn btn-warning btn-sm" href="index.php?view=mesin_restore_data&id=<?= $row['id'] ?>"><i class="fas fa-share"></i></a></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="7">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="<?= page_link('mesin_restore', 1) ?>">&laquo;</a>
                            <a href="<?= page_link('mesin_restore', $page-1) ?>">&lsaquo;</a>
                        <?php endif; ?>
                        <?php for($i = max(1, $page-2); $i <= min($page+2, $total_pages); $i++): ?>
                            <?php if ($i == $page): ?><span class="active"><?= $i ?></span>
                            <?php else: ?><a href="<?= page_link('mesin_restore', $i) ?>"><?= $i ?></a><?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <a href="<?= page_link('mesin_restore', $page+1) ?>">&rsaquo;</a>
                            <a href="<?= page_link('mesin_restore', $total_pages) ?>">&raquo;</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="actions">
                    <button type="submit" name="action" value="restore" class="btn btn-warning"><i class="fas fa-share"></i> Restore Selected</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete the selected items?');"><i class="fas fa-trash"></i> Delete Selected</button>
                    <a href="index.php?view=mesin" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bahan Baku Restore -->
    <div id="barang" class="page <?= ($_GET['view'] ?? '')=='bahan_baku_restore' ? 'active' : '' ?>">
        <h2><i class="fa-solid fa-boxes-stacked"></i> Bahan Baku (Restore)</h2>
        <div class="search-container">
            <form method="POST" action="">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <input type="text" name="search" class="search-input" placeholder="Cari Bahan Baku" value="<?= $_POST['search'] ?? '' ?>">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
        <div class="table-container">
            <form method="POST" action="index.php?view=bulk_action">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <div class="mb-2">
                    <label><input type="checkbox" onchange="toggleAll(this)"> Select/Deselect All</label>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>NO</th>
                            <th>Nama Bahan</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Sisa Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): $no=1; foreach($data as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_bahan'] ?? '' ?></td>
                                <td><?= $row['jenis'] ?? '' ?></td>
                                <td><?= $row['stok'] ?? '' ?></td>
                                <td><?php $sisa = isset($row['deleted_at']) ? max(0, ceil((strtotime($row['deleted_at']) - time()) / 86400)) : 0; echo "<span style='color:".($sisa<=5?"red":"black")."'>".$sisa." hari</span>"; ?></td>
                                <td><a class="btn btn-warning btn-sm" href="index.php?view=bahan_baku_restore_data&id=<?= $row['id'] ?>">Restore</a></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="7">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="<?= page_link('bahan_baku_restore', 1) ?>">&laquo;</a>
                            <a href="<?= page_link('bahan_baku_restore', $page-1) ?>">&lsaquo;</a>
                        <?php endif; ?>
                        <?php for($i = max(1,$page-2); $i <= min($page+2,$total_pages); $i++): ?>
                            <?php if ($i==$page): ?><span class="active"><?= $i ?></span>
                            <?php else: ?><a href="<?= page_link('bahan_baku_restore',$i) ?>"><?= $i ?></a><?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <a href="<?= page_link('bahan_baku_restore',$page+1) ?>">&rsaquo;</a>
                            <a href="<?= page_link('bahan_baku_restore',$total_pages) ?>">&raquo;</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="actions">
                    <button type="submit" name="action" value="restore" class="btn btn-warning">Restore Selected</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Hapus permanen?')">Delete Selected</button>
                    <a href="index.php?view=bahan_baku" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Operator Restore -->
    <div id="kategori" class="page <?= ($_GET['view'] ?? '')=='operator_restore' ? 'active' : '' ?>">
        <h2><i class="fa-solid fa-users"></i> Operator (Restore)</h2>
        <div class="search-container">
            <form method="POST" action="">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <input type="text" name="search" class="search-input" placeholder="Cari Nama" value="<?= $_POST['search'] ?? '' ?>">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
        <div class="table-container">
            <form method="POST" action="index.php?view=bulk_action">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <div class="mb-2"><label><input type="checkbox" onchange="toggleAll(this)"> Select/Deselect All</label></div>
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Nomor</th>
                            <th>Shift</th>
                            <th>Sisa Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): $no=1; foreach($data as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?? '' ?></td>
                                <td><?= $row['nomor'] ?? '' ?></td>
                                <td><?= $row['shift'] ?? '' ?></td>
                                <td><?php $sisa = isset($row['deleted_at']) ? max(0, ceil((strtotime($row['deleted_at']) - time()) / 86400)) : 0; echo "<span style='color:".($sisa<=5?"red":"black")."'>".$sisa." hari</span>"; ?></td>
                                <td><a class="btn btn-warning btn-sm" href="index.php?view=operator_restore_data&id=<?= $row['id'] ?>">Restore</a></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="7">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if ($page>1): ?><a href="<?= page_link('operator_restore',1) ?>">&laquo;</a><a href="<?= page_link('operator_restore',$page-1) ?>">&lsaquo;</a><?php endif; ?>
                        <?php for($i=max(1,$page-2); $i<=min($page+2,$total_pages); $i++): ?>
                            <?php if ($i==$page): ?><span class="active"><?= $i ?></span><?php else: ?><a href="<?= page_link('operator_restore',$i) ?>"><?= $i ?></a><?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($page<$total_pages): ?><a href="<?= page_link('operator_restore',$page+1) ?>">&rsaquo;</a><a href="<?= page_link('operator_restore',$total_pages) ?>">&raquo;</a><?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="actions">
                    <button type="submit" name="action" value="restore" class="btn btn-warning">Restore Selected</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Hapus permanen?')">Delete Selected</button>
                    <a href="index.php?view=operator" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Produksi Restore -->
    <div id="produksi" class="page <?= ($_GET['view'] ?? '')=='produksi_restore' ? 'active' : '' ?>">
        <h2><i class="fa-solid fa-cogs"></i> Produksi (Restore)</h2>
        <div class="search-container">
            <form method="POST" action="">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <input type="text" name="search" class="search-input" placeholder="Cari Jumlah Lembar" value="<?= $_POST['search'] ?? '' ?>">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
        <div class="table-container">
            <form method="POST" action="index.php?view=bulk_action">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <div class="mb-2"><label><input type="checkbox" onchange="toggleAll(this)"> Select/Deselect All</label></div>
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Jumlah Lembar</th>
                            <th>Mesin ID</th>
                            <th>Bahan ID</th>
                            <th>Operator ID</th>
                            <th>Sisa Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): $no=1; foreach($data as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $no++ ?></td>
                                <td><?= $row['tanggal'] ?? '' ?></td>
                                <td><?= $row['jumlah_lembar'] ?? '' ?></td>
                                <td><?= $row['mesin_id'] ?? '' ?></td>
                                <td><?= $row['bahan_id'] ?? '' ?></td>
                                <td><?= $row['operator_id'] ?? '' ?></td>
                                <td><?php $sisa = isset($row['deleted_at']) ? max(0, ceil((strtotime($row['deleted_at']) - time()) / 86400)) : 0; echo "<span style='color:".($sisa<=5?"red":"black")."'>".$sisa." hari</span>"; ?></td>
                                <td><a class="btn btn-warning btn-sm" href="index.php?view=produksi_restore_data&id=<?= $row['id'] ?>">Restore</a></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="9">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if ($page>1): ?><a href="<?= page_link('produksi_restore',1) ?>">&laquo;</a><a href="<?= page_link('produksi_restore',$page-1) ?>">&lsaquo;</a><?php endif; ?>
                        <?php for($i=max(1,$page-2); $i<=min($page+2,$total_pages); $i++): ?>
                            <?php if ($i==$page): ?><span class="active"><?= $i ?></span><?php else: ?><a href="<?= page_link('produksi_restore',$i) ?>"><?= $i ?></a><?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($page<$total_pages): ?><a href="<?= page_link('produksi_restore',$page+1) ?>">&rsaquo;</a><a href="<?= page_link('produksi_restore',$total_pages) ?>">&raquo;</a><?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="actions">
                    <button type="submit" name="action" value="restore" class="btn btn-warning">Restore Selected</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Hapus permanen?')">Delete Selected</button>
                    <a href="index.php?view=produksi" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Quality Check Restore -->
    <div id="quality_check" class="page <?= ($_GET['view'] ?? '')=='quality_check_restore' ? 'active' : '' ?>">
        <h2><i class="fa-solid fa-circle-check"></i> Quality Check (Restore)</h2>
        <div class="search-container">
            <form method="POST" action="">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <input type="text" name="search" class="search-input" placeholder="Cari Catatan" value="<?= $_POST['search'] ?? '' ?>">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
        <div class="table-container">
            <form method="POST" action="index.php?view=bulk_action">
                <input type="hidden" name="view" value="<?= $_GET['view'] ?? '' ?>">
                <div class="mb-2"><label><input type="checkbox" onchange="toggleAll(this)"> Select/Deselect All</label></div>
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>NO</th>
                            <th>Produksi ID</th>
                            <th>Tingkat Cacat</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Sisa Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): $no=1; foreach($data as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $row['id'] ?>"></td>
                                <td><?= $no++ ?></td>
                                <td><?= $row['produksi_id'] ?? '' ?></td>
                                <td><?= $row['tingkat_cacat'] ?? '' ?>%</td>
                                <td><?= $row['jumlah'] ?? '' ?></td>
                                <td><?= $row['status'] ?? '' ?></td>
                                <td><?= $row['catatan'] ?? '' ?></td>
                                <td><?php $sisa = isset($row['deleted_at']) ? max(0, ceil((strtotime($row['deleted_at']) - time()) / 86400)) : 0; echo "<span style='color:".($sisa<=5?"red":"black")."'>".$sisa." hari</span>"; ?></td>
                                <td><a class="btn btn-warning btn-sm" href="index.php?view=quality_check_restore_data&id=<?= $row['id'] ?>">Restore</a></td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="9">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if ($page>1): ?><a href="<?= page_link('quality_check_restore',1) ?>">&laquo;</a><a href="<?= page_link('quality_check_restore',$page-1) ?>">&lsaquo;</a><?php endif; ?>
                        <?php for($i=max(1,$page-2); $i<=min($page+2,$total_pages); $i++): ?>
                            <?php if ($i==$page): ?><span class="active"><?= $i ?></span><?php else: ?><a href="<?= page_link('quality_check_restore',$i) ?>"><?= $i ?></a><?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($page<$total_pages): ?><a href="<?= page_link('quality_check_restore',$page+1) ?>">&rsaquo;</a><a href="<?= page_link('quality_check_restore',$total_pages) ?>">&raquo;</a><?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="actions">
                    <button type="submit" name="action" value="restore" class="btn btn-warning">Restore Selected</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Hapus permanen?')">Delete Selected</button>
                    <a href="index.php?view=quality_check" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <?php require_once 'footer.html'; ?>
    </body>
    </html>
            </div>
        </div>        
<?php require_once 'footer.html'; ?>
</body>
</html>