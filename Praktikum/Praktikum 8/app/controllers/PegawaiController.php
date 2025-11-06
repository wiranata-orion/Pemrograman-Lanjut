<?php
require_once '../app/models/PegawaiModel.php';

class PegawaiController {
    private $Pegawai;

    public function __construct() {
        $this->Pegawai = new Pegawai();
    }
    public function index() {
        $username = $_SESSION['username'];
        $row = $this->Pegawai->GetUserData($username);

        require_once '../app/views/pegawai/home.php';
    }
}
?>