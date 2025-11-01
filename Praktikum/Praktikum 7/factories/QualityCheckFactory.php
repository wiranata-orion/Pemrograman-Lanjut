<?php
require_once '/../core/database.php';

class QualityCheckFactory extends Database
{
    public function create($produksi_id, $tingkat_cacat, $jumlah, $status, $catatan)
    {
        $sql = "INSERT INTO quality_check (produksi_id, tingkat_cacat, jumlah, status, catatan)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iiiss', $produksi_id, $tingkat_cacat, $jumlah, $status, $catatan);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    public function createMany($jumlah)
    {
        $statusList = ['lulus', 'ulang'];
        for ($i = 0; $i < $jumlah; $i++) {
            $this->create(
                rand(1, 10),
                rand(0, 10),
                rand(100, 1000),
                $statusList[array_rand($statusList)],
                'Cek kualitas ke-' . ($i + 1)
            );
        }
    }
}
?>
