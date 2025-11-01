<?php
class ProduksiRepository extends Database
{

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function autoDeleteOld($days = 30)
    {
        try {
            $batas = date('Y-m-d H:i:s', strtotime("-{$days} days"));
            
            $sql = "
                DELETE FROM produksi_uang 
                WHERE deleted_at IS NOT NULL 
                AND deleted_at < ?  
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$batas]);
            
            return [
                'success' => true,
                'count' => $stmt->rowCount(),
                'message' => 'Auto delete completed successfully'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'count' => 0,
                'message' => 'Error during auto delete: ' . $e->getMessage()
            ];
        }
    }


    public function restoreBulk($ids)
    {
        if (empty($ids)) return 0;
        $in = str_repeat('?,', count($ids) - 1) . '?';
        $stmt = $this->conn->prepare("UPDATE produksi_uang SET deleted_at = NULL WHERE id IN ($in)");
        $stmt->execute($ids);
        return $stmt->rowCount();
    }

    public function forceDeleteBulk($ids)
    {
        if (empty($ids)) return 0;
        $in = str_repeat('?,', count($ids) - 1) . '?';
        $stmt = $this->conn->prepare("DELETE FROM produksi_uang WHERE id IN ($in)");
        $stmt->execute($ids);
        return $stmt->rowCount();
    }
}
