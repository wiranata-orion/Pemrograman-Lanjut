<?php
require_once __DIR__ . '/../../config/database.php';

class Binatang extends Database {


    public function getAll() {
        $sql = "SELECT * FROM kebun_binatang";
        $result = $this->conn->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

 
    public function getById($kode_hewan) {
        $stmt = $this->conn->prepare("SELECT * FROM kebun_binatang WHERE kode_hewan = ?");
        $stmt->bind_param("s", $kode_hewan);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getName($nama_hewan){
        $stmt = $this->conn->prepare("SELECT * FROM kebun_binatang WHERE nama = ?");
        $stmt->bind_param("s", $nama_hewan);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();        
    }


    public function addHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan) {
        $stmt = $this->conn->prepare("INSERT INTO kebun_binatang (kode_hewan, nama, spesies, jumlah, status, umur) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisi", $kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan);
        return $stmt->execute();
    }
    public function updateHewan($kode_hewan, $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan) {
        $stmt = $this->conn->prepare("UPDATE kebun_binatang SET nama = ?, spesies = ?, jumlah = ?, status = ?, umur = ? WHERE kode_hewan = ?");
        $stmt->bind_param("ssisss", $nama_hewan, $spesies_hewan, $jumlah_hewan, $status_hewan, $umur_hewan, $kode_hewan);
        return $stmt->execute();
    }


    public function deleteBinatang($kode_hewan) {
        $stmt = $this->conn->prepare("DELETE FROM kebun_binatang WHERE kode_hewan = ?");
    
        $stmt->bind_param("s", $kode_hewan);
        return $stmt->execute();
    }
}