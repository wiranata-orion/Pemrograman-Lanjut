<?php
require_once '../controllers/karyawan.php';

$app = new karyawan();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($app, $action)) {
    $app->$action($id);
} else {
    echo "Halaman Tidak Ditemukan!";
}
?>