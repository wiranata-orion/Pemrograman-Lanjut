<?php
require_once __DIR__ . '/../app/controllers/Controller.php';

$controller = new Controller();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add_form':
        $controller->formAdd();
        break;

    case 'edit_form':
        $controller->formEdit($_GET['kode_hewan']);
        break;

    case 'add_hewan':
            $controller->addHewan($_POST['kode_hewan'], $_POST['nama_hewan'], $_POST['spesies_hewan'], $_POST['jumlah_hewan'], $_POST['status_hewan'], $_POST['umur_hewan']);
        break;

    case 'update_hewan':
            $controller->updateHewan($_POST['kode_hewan'], $_POST['nama_hewan'], $_POST['spesies_hewan'], $_POST['jumlah_hewan'], $_POST['status_hewan'], $_POST['umur_hewan']);
        break;

    case 'delete':
            $controller->deleteHewan($_GET['kode_hewan'] ?? null);
        break;

    default:
        $controller->index();
        break;
}