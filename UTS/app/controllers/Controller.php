<?php
require_once __DIR__ . '/../models/Model.php';

class Controller {
    private $binatangModel;

    public function __construct() {
        $this->binatangModel = new Binatang();
    }

    public function index() {
        $binatang = $this->binatangModel->getAll();
        require __DIR__ . '/../views/home.php';
    }

    public function formAdd() {
        require __DIR__ . '/../views/add.php';
    }

    public function formEdit($kode_hewan) {
        if (!$kode_hewan) {
            header("Location: index.php");
            return;
        }
        $hewan = $this->binatangModel->getById($kode_hewan);
        require __DIR__ . '/../views/edit.php';
    }

    public function addHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan) {
        $NamaSama = $this->binatangModel->getName($nama_hewan);
        if($NamaSama){
            echo "Nama Tidak Boleh Sama";
            exit;

        }
        if($umur_hewan < 0){ 
            echo "Umur Tidak Boleh di bawah 0";
            exit;
        }
        $this->binatangModel->addHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan);
        header("Location: index.php");
    }

    public function updateHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan) {
        $NamaSama = $this->binatangModel->getName($nama_hewan);
        if($NamaSama){
            echo "Nama Tidak Boleh Sama";
            exit;

        }
        if($umur_hewan < 0){ 
            echo "Umur Tidak Boleh di bawah 0";
            exit;
        }
        if (!$kode_hewan) {
            header("Location: index.php");
            return;
        }
        $this->binatangModel->updateHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan);
        header("Location: index.php");
    }

    public function deleteHewan($kode_hewan) {
        if (!$kode_hewan) {
            header("Location: index.php");
            return;
        }
        $this->binatangModel->deleteBinatang($kode_hewan);
        header("Location: index.php");
    }
}
