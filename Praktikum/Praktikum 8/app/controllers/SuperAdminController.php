<?php
require_once  '../app/models/SuperAdminModel.php';

class SuperAdminController {
    private $SuperAdmin;

    public function __construct() {
        $this->SuperAdmin = new SuperAdmin();
    }

    public function index() {
        $username = $_SESSION['username'];
        $row = $this->SuperAdmin->GetUserData($username);

        require_once '../app/views/superadmin/home.php';
    }
}
?>