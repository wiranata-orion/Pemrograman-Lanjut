<?php
class Produksi_Uang_Model {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'pl5_produksi_uang_kertas');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getMesin() {
        $result = $this->conn->query("SELECT * FROM mesin");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getBahanBaku() {
        $result = $this->conn->query("SELECT * FROM bahan_baku");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getOperator() {
        $result = $this->conn->query("SELECT * FROM operator");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getProduksi() {
        $result = $this->conn->query("SELECT * FROM produksi");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getQualityCheck() {
        $result = $this->conn->query("SELECT * FROM quality_check");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getMesinById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM mesin WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getBahanBakuById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM bahan_baku WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getOperatorById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM operator WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getQualityControlById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM quality_check WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addMesin($nama_mesin, $kapasitas_per_jam, $tahun_pembuatan) {
        $stmt = $this->conn->prepare("INSERT INTO mesin (nama_mesin, kapasitas_per_jam, tahun_pembuatan) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $nama_mesin, $kapasitas_per_jam, $tahun_pembuatan);
        return $stmt->execute();
    }
    public function addBahanBaku($nama_bahan, $jenis, $stok) {
        $stmt = $this->conn->prepare("INSERT INTO bahan_baku (nama_bahan, jenis, stok) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nama_bahan, $jenis, $stok);
        return $stmt->execute();
    }
    public function addOperator($nama, $shift) {
        $stmt = $this->conn->prepare("INSERT INTO operator (nama, shift) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $shift);
        return $stmt->execute();
    }
    public function addProduksi($tanggal, $jumlah_lembar, $mesin_id, $bahan_id, $operator_id) {
        $stmt = $this->conn->prepare("INSERT INTO produksi (tanggal, jumlah_lembar, mesin_id, bahan_id, operator_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiii", $tanggal, $jumlah_lembar, $mesin_id, $bahan_id, $operator_id);
        return $stmt->execute();
    }
    public function addQualityCheck($produksi_id, $tingkat_cacat, $jumlah, $status, $catatan) {
        $stmt = $this->conn->prepare("INSERT INTO quality_check (produksi_id, tingkat_cacat, jumlah, status, catatan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $produksi_id, $tingkat_cacat, $jumlah, $status, $catatan);
        return $stmt->execute();
    }

    public function updateMesin($id, $nama_mesin, $kapasitas_per_jam, $tahun_pembuatan) {
        $stmt = $this->conn->prepare("UPDATE mesin SET nama_mesin = ?, kapasitas_per_jam = ?, tahun_pembuatan = ? WHERE id = ?");
        $stmt->bind_param("siii", $nama_mesin, $kapasitas_per_jam, $tahun_pembuatan, $id);
        return $stmt->execute();
    }

    public function updateBahanBaku($id, $nama_bahan, $jenis, $stok) {
        $stmt = $this->conn->prepare("UPDATE bahan_baku SET nama_bahan = ?, jenis = ?, stok = ? WHERE id = ?");
        $stmt->bind_param("ssii", $nama_bahan, $jenis, $stok, $id);
        return $stmt->execute();
    }

    public function updateOperator($id, $nama, $shift) {
        $stmt = $this->conn->prepare("UPDATE operator SET nama = ?, shift = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nama, $shift, $id);
        return $stmt->execute();
    }
    
    public function updateQualityCheck($id, $produksi_id, $tingkat_cacat, $status, $catatan) {
        $stmt = $this->conn->prepare("UPDATE quality_check SET produksi_id = ?, tingkat_cacat = ?, status = ?, catatan = ? WHERE id = ?");
        $stmt->bind_param("iissi", $produksi_id, $tingkat_cacat, $status, $catatan , $id);
        return $stmt->execute();
    }
    public function deleteMesin($id) {
        $stmt = $this->conn->prepare("DELETE FROM mesin WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function deleteBahanBaku($id) {
        $stmt = $this->conn->prepare("DELETE FROM bahan_baku WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function deleteOperator($id) {
        $stmt = $this->conn->prepare("DELETE FROM operator WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function deleteQualityCheck($id) {
        $stmt = $this->conn->prepare("DELETE FROM quality_check WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
