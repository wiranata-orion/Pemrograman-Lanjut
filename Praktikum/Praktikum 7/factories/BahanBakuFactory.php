<?php
require_once '/../core/database.php';

class BahanBakuFactory extends Database
{
    public function create($nama, $jenis, $stok)
    {
        $sql = "INSERT INTO bahan_baku (nama_bahan, jenis, stok) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $nama, $jenis, $stok);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    public function createMany($jumlah)
    {
        $jenisList = ['Kertas', 'Tinta', 'Polimer'];
        for ($i = 0; $i < $jumlah; $i++) {
            $nama = "Bahan " . chr(65 + $i);
            $jenis = $jenisList[array_rand($jenisList)];
            $stok = rand(100, 1000);
            $this->create($nama, $jenis, $stok);
        }
    }
}
?>
