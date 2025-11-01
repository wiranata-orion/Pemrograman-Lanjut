<?php
require_once '../models/karyawan_models.php';

class karyawan {
    private $model;
    public function __construct(){
        $this->model = new karyawan_model();

    }

    public function index(){
        $view = $_GET['view'] ?? null;
        $data = [];

        switch($view){

            case 'tambah':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nik = $_POST['nik'];
                    $nama = $_POST['nama'];
                    $jabatan = $_POST['jabatan'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $level = $_POST['level'];
                    $divisi = $_POST['divisi'];
                    $masa_kerja = $_POST['masa_kerja'];
                    $status = $_POST['status'];
                    $npwp = $_POST['npwp'];
                    $saldo_cuti = $_POST['saldo_cuti'];
                    $gaji = $_POST['gaji'];
                    $this->model->addKaryawan($nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji);
                    header("Location: index.php");
                    exit;
                }
                require_once "../views/karyawan/tambah.php";
                break;

            case 'edit':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $detailKaryawan = $this->model->getAllKaryawan($id);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $nik = $_POST['nik'];
                    $nama = $_POST['nama'];
                    $jabatan = $_POST['jabatan'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $level = $_POST['level'];
                    $divisi = $_POST['divisi'];
                    $masa_kerja = $_POST['masa_kerja'];
                    $status = $_POST['status'];
                    $npwp = $_POST['npwp'];
                    $saldo_cuti = $_POST['saldo_cuti'];
                    $gaji = $_POST['gaji'];
                    $this->model->updateKaryawan($id, $nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji);
                    header("Location: index.php");
                    exit;
                }
                require_once "../views/karyawan/edit.php";
                break;

            case 'hapus':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $this->model->deleteKaryawan($id);
                }
                header("Location: index.php?view=quality_check");
                exit;
                break;
                break;

            default:
                $data = $this->model->getAllKaryawan();
                require "../views/karyawan/index.php";   
                break;
            

        }
             
    }
}
?>