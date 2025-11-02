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
            $clientModel = new pesanan();
            $clientModel->create([
                'nama_klien' => $_POST['nama_klien'],
                'email' => $_POST['email'],
                'jenis_jasa' => $_POST['jenis_jasa'],
                'deskripsi' => $_POST['deskripsi']
            ]);
            header('Location: index.php');
        } else {
            include '../app/views/pesanan/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: index.php');
            exit; 
        } else {
            $result = $this->model->getById($id);
            $pesanan = !empty($result) ? $result[0] : [$_POST];
            include '../app/views/pesanan/edit.php';
        }
    }

    public function show($id) {
        $result = $this->model->getById($id);
        $pesanan = $result[0] ?? null;
        include '../app/views/pesanan/show.php';
    }

    public function delete($id) {
        $clientModel = new Pesanan();
        $clientModel->delete($id);
        header('Location: index.php');
    }
}
?>