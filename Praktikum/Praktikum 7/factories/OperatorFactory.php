<?php
require_once '/../core/database.php';

class OperatorFactory extends Database
{
    public function create($nama, $shift)
    {
        $sql = "INSERT INTO operator (nama, shift) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $nama, $shift);
        $stmt->execute();

        return $this->conn->insert_id;
    }

    public function createMany($jumlah)
    {
        $shiftList = ['pagi', 'siang', 'malam'];
        for ($i = 0; $i < $jumlah; $i++) {
            $nama = "Operator " . chr(65 + $i);
            $shift = $shiftList[array_rand($shiftList)];
            $this->create($nama, $shift);
        }
    }
}
?>
