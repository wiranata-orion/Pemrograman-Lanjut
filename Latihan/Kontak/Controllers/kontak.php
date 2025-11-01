<?php
require_once '../Models/kontak_model.php';

class kontak {
    private $model;

    public function __construct() {
        $this->model = new kontak_model();
    }

    public function index() {
        $view = $_GET['view'] ?? null;
        $data = [];
        
        switch ($_GET['view'] ?? null) {
            case 'kontak':
                $data = $this->model->getAllKontak();
                require '../Views/kontak/kontak.php';
                break;

            case 'log_aktivitas':
                $data = $this->model->getAlllogAktivitas();
                require '../Views/kontak/log_aktivitas.php';
                break;

            case 'form_edit_kontak':
                $detailKontak = $this->model->getKontakById($_GET['id'] ?? 1);
                require '../Views/kontak/edit_kontak.php';
                break;

            case 'form_tambah_kontak':
                require '../Views/kontak/tambah_kontak.php';
                break;

            case 'tambah_kontak':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $telepon = $_POST['telepon'];
                    $catatan = $_POST['catatan'];

                    $this->model->tambahKontak($nama, $email, $telepon, $catatan);

                    header("Location: index.php?view=kontak");
                    exit;
                }
                break;

            case 'edit_kontak':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $telepon = $_POST['telepon'];
                    $catatan = $_POST['catatan'];
                    $this->model->editKontak($id, $nama, $email, $telepon, $catatan);
                    header("Location: index.php?view=kontak");
                    exit;
                }
                break;

            case 'hapus_kontak':
                $hapusKontak = $this->model->hapusKontak($_GET['id'] ?? 1);
                if ($hapusKontak) {
                    header("Location: index.php?view=kontak");
                    exit;
                }
                break;

            default:
                require '../Views/kontak/index.php';
        }
    }
}
?>
