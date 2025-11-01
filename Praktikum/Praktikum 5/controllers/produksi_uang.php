<?php
require_once '../models/produksi_uang_model.php';

class Produksi_Uang {
    private $model;

    public function __construct() {
        $this->model = new Produksi_Uang_Model();
    }

    public function index() {
            $view = $_GET['view'] ?? null;
            $data = [];

        switch ($view) {
            case 'mesin':
                $data = $this->model->getMesin();
                require_once "../views/produksi/tabel.php"; 
                break;
            case 'bahan_baku':
                $data = $this->model->getBahanBaku(); 
                require_once "../views/produksi/tabel.php";
                break;
            case 'operator':
                $data = $this->model->getOperator(); 
                require_once "../views/produksi/tabel.php";
                break;
            case 'produksi':
                $data = $this->model->getProduksi(); 
                require_once "../views/produksi/tabel.php";
                break;
            case 'quality_check':
                $data = $this->model->getQualityCheck(); 
                require_once "../views/produksi/tabel.php";
                break;

            case 'tambah_mesin':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_mesin = $_POST['nama_mesin'];
                    $kapasitas_per_jam = $_POST['kapasitas_per_jam'];
                    $tahun_pembuatan = $_POST['tahun_pembuatan'];
                    $this->model->addMesin($nama_mesin, $kapasitas_per_jam, $tahun_pembuatan);
                    header("Location: index.php?view=mesin");
                    exit;
                }
                require_once "../views/produksi/tambah.php";
                break;
            case 'tambah_bahan_baku':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_bahan = $_POST['nama_bahan'];
                    $jenis = $_POST['jenis'];
                    $stok = $_POST['stok'];
                    $this->model->addBahanBaku($nama_bahan, $jenis, $stok);
                    header("Location: index.php?view=bahan_baku");
                    exit;
                }
                require_once "../views/produksi/tambah.php";
                break;
            case 'tambah_operator':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama = $_POST['nama'];
                    $shift = $_POST['shift'];
                    $this->model->addOperator($nama, $shift);
                    header("Location: index.php?view=operator");
                    exit;
                }
                require_once "../views/produksi/tambah.php";
                break;
            case 'tambah_produksi':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $tanggal = $_POST['tanggal'];
                    $jumlah_lembar = $_POST['jumlah_lembar'];
                    $mesin_id = $_POST['mesin_id'];
                    $bahan_id = $_POST['bahan_id'];
                    $operator_id = $_POST['operator_id'];
                    $this->model->addProduksi($tanggal, $jumlah_lembar, $mesin_id, $bahan_id, $operator_id);
                    header("Location: index.php?view=produksi");
                    exit;
                }
                require_once "../views/produksi/tambah.php";
                break;
            case 'tambah_quality_check':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $produksi_id = $_POST['produksi_id'];
                    $kondisi = $_POST['tingkat_cacat'];
                    $jumlah = $_POST['jumlah'];
                    $status = $_POST['status'];
                    $catatan = $_POST['catatan'];
                    $this->model->addQualityCheck($produksi_id, $kondisi, $jumlah, $status, $catatan);
                    header("Location: index.php?view=quality_check");
                    exit;
                }
                require_once "../views/produksi/tambah.php";
                break;

            case 'edit_mesin':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $detailMesin = $this->model->getMesinById($id);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_mesin = $_POST['nama_mesin'];
                    $kapasitas_per_jam = $_POST['kapasitas_per_jam'];
                    $tahun_pembuatan = $_POST['tahun_pembuatan'];
                    $this->model->updateMesin($id, $nama_mesin, $kapasitas_per_jam, $tahun_pembuatan);
                    header("Location: index.php?view=mesin");
                    exit;
                }
                require_once "../views/produksi/edit.php";
                break;
 

            case 'edit_bahan_baku':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $detailBahanBaku = $this->model->getBahanBakuById($id);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_bahan = $_POST['nama_bahan'];
                    $jenis = $_POST['jenis'];
                    $stok = $_POST['stok'];
                    $this->model->updateBahanBaku($id, $nama_bahan, $jenis, $stok);
                    header("Location: index.php?view=bahan_baku");
                    exit;
                }
                require_once "../views/produksi/edit.php";
                break;
            case 'edit_operator':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $detailOperator = $this->model->getOperatorById($id);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama = $_POST['nama'];
                    $shift = $_POST['shift'];
                    $this->model->updateOperator($id, $nama, $shift);
                    header("Location: index.php?view=operator");
                    exit;
                }
                require_once "../views/produksi/edit.php";
                break;
            case 'edit_quality_check':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $detailQualityCheck = $this->model->getQualityControlById($id);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $produksi_id = $_POST['produksi_id'];
                    $tingkat_cacat = $_POST['tingkat_cacat'];
                    $status = $_POST['status'];
                    $catatan = $_POST['catatan'];
                    $this->model->updateQualityCheck($id ,$produksi_id, $tingkat_cacat, $status, $catatan);
                    header("Location: index.php?view=quality_check");
                    exit;
                }
                require_once "../views/produksi/edit.php";
                break;

            case 'hapus_mesin':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->deleteMesin($id);
                }
                header("Location: index.php?view=mesin");
                exit;
                break;
            case 'hapus_bahan_baku':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->deleteBahanBaku($id);
                }
                header("Location: index.php?view=bahan_baku");
                exit;
                break;
            case 'hapus_operator':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->deleteOperator($id);
                }
                header("Location: index.php?view=operator");
                exit;
                break;

            case 'hapus_quality_check':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->deleteQualityCheck($id);
                }
                header("Location: index.php?view=quality_check");
                exit;
                break;
            default:
                $view = 'dashboard';
        }


        require '../views/produksi/index.php';
    }
}
?>
