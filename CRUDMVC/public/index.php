<?php
require_once __DIR__ . '/../controllers/Anime.php';

$controller = new Anime();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if (method_exists($controller, $action)) {
    if ($id) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    echo "Halaman tidak ditemukan!";
}
?>
