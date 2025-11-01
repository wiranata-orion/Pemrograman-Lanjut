<?php
require_once '../app/core/Database.php';

class Pesanan {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->pdo->query("SELECT * FROM pesanan");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->pdo->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->pdo->prepare("INSERT INTO pesanan (nama_klien, email, jenis_jasa, deskripsi) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nama_klien'],
            $data['email'],
            $data['jenis_jasa'],
            $data['deskripsi']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->pdo->prepare("UPDATE pesanan SET nama_klien=?, email=?, jenis_jasa=?, deskripsi=? WHERE id=?");
        return $stmt->execute([
            $data['nama_klien'],
            $data['email'],
            $data['jenis_jasa'],
            $data['deskripsi'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->pdo->prepare("DELETE FROM pesanan WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
