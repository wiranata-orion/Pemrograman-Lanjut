<?php
require_once '/../core/database.php';

class MesinFactory extends Database
{
    public function create($nama_mesin, $kapasitas, $tahun)
    {
        $sql = "INSERT INTO mesin (nama_mesin, kapasitas_per_jam, tahun_pembuatan) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sii', $nama_mesin, $kapasitas, $tahun);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    public function createMany($jumlah)
    {
        for ($i = 0; $i < $jumlah; $i++) {
            $this->create("Mesin " . chr(65 + $i), rand(1000, 5000), rand(2000, 2023));
        }
    }
}
?>
