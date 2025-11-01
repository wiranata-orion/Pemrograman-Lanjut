<?php
class kontak_model {
    private $conn;

    public function __construct() {

        $this->conn = new mysqli('localhost', 'root', '', 'kontak');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllKontak() {
        $result = $this->conn->query("SELECT * FROM kontak");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAlllogAktivitas() {
        $result = $this->conn->query("SELECT * FROM log_aktivitas");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getKontakById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM kontak WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function tambahKontak($nama, $email, $telepon, $catatan) {
        $stmt = $this->conn->prepare("INSERT INTO kontak (nama, email, telepon, catatan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $telepon, $catatan);
        return $stmt->execute();
    }

    public function editKontak($id, $nama, $email, $telepon, $catatan) {
        $stmt = $this->conn->prepare("UPDATE kontak SET nama = ?, email = ?, telepon = ?, catatan = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nama, $email, $telepon, $catatan, $id);
        return $stmt->execute();
    }

    public function hapusKontak($id) {
        $stmt = $this->conn->prepare("DELETE FROM kontak WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
