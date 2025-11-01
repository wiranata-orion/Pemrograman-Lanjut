<?php
require_once '/../core/database.php';

class ProduksiFactory extends Database
{
    public function create($tanggal, $jumlah, $mesin_id, $bahan_id, $operator_id)
    {
        $sql = "INSERT INTO produksi (tanggal, jumlah_lembar, mesin_id, bahan_id, operator_id)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('siiii', $tanggal, $jumlah, $mesin_id, $bahan_id, $operator_id);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    public function createMany($jumlah)
    {
        for ($i = 0; $i < $jumlah; $i++) {
            $this->create(
                date('Y-m-d', strtotime("-$i days")),
                rand(500, 5000),
                rand(1, 5),
                rand(1, 5),
                rand(1, 5)
            );
        }
    }
}
?>
