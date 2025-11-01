<?php
require_once '../Models/asset_crypto_model.php';

class asset_crypto{
    private $model;

    public function __construct() {
        $this->model = new asset_crypto_model();
    }

    public function index() {
        $view = $_GET['view'] ?? null;
        $data = [];

        switch ($_GET['view'] ?? null) {
            case 'exchange':
                $data = $this->model->getAllExchange();
                require '../Views/asset/table.php';
                break;
            case 'portofolios':
                $data = $this->model->getAllPortofolios();
                require '../Views/asset/table.php';
                break;
            case 'crypto_assets':
                $data = $this->model->getAllCryptoAssets();
                require '../Views/asset/table.php';
                break;
            case 'asset_categories':
                $data = $this->model->getAllAssetCategories();
                require '../Views/asset/table.php';
                break;
            case 'transactions':
                $data = $this->model->getAllTransactions();
                require '../Views/asset/table.php';
                break;

            case 'tambah_exchange':
                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_exchange = $_POST['nama_exchange'];
                    $jenis_platform = $_POST['jenis_platform'];
                    $this->model->addExchange($nama_exchange, $jenis_platform);
                    header("Location: index.php?view=exchange");
                    exit;
                }
                require '../Views/asset/tambah.php';
                break;

            case 'tambah_portofolios':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_portofolio = $_POST['nama_portofolio'];
                    $mata_uang = $_POST['mata_uang'];
                    $deskripsi = $_POST['deskripsi'];
                    $this->model->addPortofolios($nama_portofolio, $mata_uang, $deskripsi);
                    header("Location: index.php?view=portofolios");
                    exit;
                }
                require '../Views/asset/tambah.php';
                break;
            case 'tambah_crypto_assets':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $simbol_aset = $_POST['simbol_aset'];
                    $nama_aset = $_POST['nama_aset'];
                    $kategori_id = $_POST['kategori_id'];
                    $this->model->addCryptoAssets($simbol_aset, $nama_aset, $kategori_id);
                    header("Location: index.php?view=crypto_assets");
                    exit;
                }
                require '../Views/asset/tambah.php';
                break;
            case 'tambah_asset_categories':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_kategori = $_POST['nama_kategori'];
                    $kelas_aset = $_POST['kelas_aset'];
                    $this->model->addAssetCategories($nama_kategori, $kelas_aset);
                    header("Location: index.php?view=asset_categories");
                    exit;
                }
                require '../Views/asset/tambah.php';
                break;

            case 'tambah_transactions': 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $portofolio_id = $_POST['portofolio_id'];
                    $aset_id = $_POST['aset_id'];
                    $exchange_id = $_POST['exchange_id'];
                    $tipe_transaksi = $_POST['tipe_transaksi'];
                    $jumlah_aset = $_POST['jumlah_aset'];        
                    $harga_per_unit = $_POST['harga_per_token'];
                    $biaya = $_POST['biaya'];
                    $tanggal_transaksi = $_POST['tanggal_transaksi'];
                    $this->model->addTransactions($portofolio_id, $aset_id, $exchange_id, $tipe_transaksi, $jumlah_aset, $harga_per_unit, $biaya , $tanggal_transaksi);
                    header("Location: index.php?view=transactions");
                    exit;
                }
                require '../Views/asset/tambah.php';
                break;

            case 'edit_exchange':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id']; // Ambil dari POST
                    $nama_exchange = $_POST['nama_exchange'];
                    $jenis_platform = $_POST['jenis_platform'];

                    $this->model->updateExchange($id, $nama_exchange, $jenis_platform);
                    header("Location: index.php?view=exchange");
                    exit;
                } else {
                    $id = $_GET['id'] ?? null;
                    if ($id) {
                        $ExchangeDetail = $this->model->getExchange($id);
                    }
                    require '../Views/asset/edit.php';
                }
                require_once '../Views/asset/edit.php';
                break;

            case 'edit_portofolios':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id']; // Ambil dari POST
                    $nama_portofolio = $_POST['nama_portofolio'];
                    $mata_uang = $_POST['mata_uang'];
                    $deskripsi = $_POST['deskripsi'];

                    $this->model->updatePortofolios($id, $nama_portofolio, $mata_uang, $deskripsi);
                    header("Location: index.php?view=portofolios");
                    exit;
                } else {
                    $id = $_GET['id'] ?? null;
                    if ($id) {
                        $PortofoliosDetail = $this->model->getPortofolios($id);
                    }
                    require '../Views/asset/edit.php';
                }
                require_once '../Views/asset/edit.php';
                break;

            case 'edit_crypto_assets':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id']; // Ambil dari POST
                    $simbol_aset = $_POST['simbol_aset'];
                    $nama_aset = $_POST['nama_aset'];
                    $kategori_id = $_POST['kategori_id'];

                    $this->model->updateCryptoAssets($id, $simbol_aset, $nama_aset, $kategori_id);
                    header("Location: index.php?view=crypto_assets");
                    exit;
                } else {
                    $id = $_GET['id'] ?? null;
                    if ($id) {
                        $CryptoAssetsDetail = $this->model->getCryptoAssets($id);
                    }
                    require '../Views/asset/edit.php';
                }

                require_once '../Views/asset/edit.php';
                break;

            case 'edit_asset_categories': 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id']; // Ambil dari POST
                    $nama_kategori = $_POST['nama_kategori'];
                    $kelas_aset = $_POST['kelas_aset'];

                    $this->model->updateAssetCategories($id, $nama_kategori, $kelas_aset);
                    header("Location: index.php?view=asset_categories");
                    exit;
                } else {
                    $id = $_GET['id'] ?? null;
                    if ($id) {
                        $AssetCategoriesDetail = $this->model->getAssetCategories($id);
                    }
                    require '../Views/asset/edit.php';
                }

                require_once '../Views/asset/edit.php';
                break;

            case 'hapus_exchange':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->hapusExchange($id);
                }
                header("Location: index.php?view=exchange");
                exit;
                break;


            case 'hapus_portofolios':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->hapusPortofolios($id);
                    
                }
                header("Location: index.php?view=portofolios");
                exit;


            case 'hapus_crypto_assets':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->hapusCryptoAssets($id);
                }
                header("Location: index.php?view=crypto_assets");
                exit;
                break;

            case 'hapus_asset_categories':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->hapusAssetCategories($id);
                }
                header("Location: index.php?view=asset_categories");
                exit;
                break;

            default:
                require'../Views/asset/index.php';
                break;
        }
            
    }
}
?>
