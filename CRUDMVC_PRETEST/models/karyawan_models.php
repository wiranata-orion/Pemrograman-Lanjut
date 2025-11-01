<?php 

class karyawan_model {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'pl_preuts');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllKaryawan() {
        $result = $this->conn->query("SELECT * FROM karyawan");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function addKaryawan($nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji){
        $stmt = $this->conn->prepare("INSERT INTO karyawan (nik, nama, jabatan, jenis_kelamin, level, divisi, masa_kerja, status, npwp, saldo_cuti, gaji) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssissii", $nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji);
        return $stmt->execute();
    }

    public function updateKaryawan($id, $nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji) {
        $stmt = $this->conn->prepare("UPDATE karyawan SET nik= ?, nama = ?, jabatan = ?, jenis_kelamin = ? , level = ?, divisi = ?, masa_kerja = ?, status = ?, npwp = ?, saldo_cuti = ?, gaji = ? WHERE id = ?");
        $stmt->bind_param("ssssssissiii", $nik, $nama, $jabatan, $jenis_kelamin, $level, $divisi, $masa_kerja, $status, $npwp, $saldo_cuti, $gaji, $id);
        return $stmt->execute();
    }



    public function deleteKaryawan($id){
        $stmt = $this->conn->prepare("DELETE FROM karyawan WHERE id = ?");
        $stmt->bind_param("i", $id); 
        return $stmt->execute();
    }


}
?>