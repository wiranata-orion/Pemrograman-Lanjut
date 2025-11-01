<?php
require_once '../Controllers/asset_crypto.php';

$app = new asset_crypto();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($app, $action)) {
    $app->$action($id);
} else {
    echo "Halaman Tidak Ditemukan!";
}
?>