<?php
require_once '../app/models/Pesanan.php';

class PesananController {
    private $model;

    public function __construct() {
        $this->model = new Pesanan();
    }

    public function index() {
        $pesanan = $this->model->getAll();
        include '../app/views/pesanan/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header('Location: index.php');
        } else {
            include '../app/views/pesanan/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: index.php');
        } else {
            $pesanan = $this->model->getById($id);
            include '../app/views/pesanan/edit.php';
        }
    }

    public function show($id) {
        $pesanan = $this->model->getById($id);
        include '../app/views/pesanan/show.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
    }
}
?>
