<?php
require_once '../Controllers/kontak.php';

$app = new kontak();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($app, $action)) {
    $app->$action($id);
} else {
    echo "Halaman Tidak Ditemukan!";
}
?>