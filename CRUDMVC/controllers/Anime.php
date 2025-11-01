<?php
require_once __DIR__ . '/../models/Anime_model.php';

class Anime {
    private $model;

    public function __construct() {
        $this->model = new Anime_model();
    }

    public function index() {
        $data = $this->model->getAll();
        include __DIR__ . '/../views/anime/index.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->tambah($_POST['judul'], $_POST['genre'], $_POST['tahun_rilis'], $_POST['rating']);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/anime/tambah.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, $_POST['judul'], $_POST['genre'], $_POST['tahun_rilis'], $_POST['rating']);
            header("Location: index.php");
        } else {
            $anime = $this->model->getById($id);
            include __DIR__ . '/../views/anime/edit.php';
        }
    }

    public function hapus($id) {
        $this->model->hapus($id);
        header("Location: index.php");
    }
}
?>
