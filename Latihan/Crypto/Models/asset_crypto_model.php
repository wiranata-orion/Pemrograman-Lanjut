<?php
class asset_crypto_model {
    private $conn;

    public function __construct() {

        $this->conn = new mysqli('localhost', 'root', '', 'manajemen_portofolio_aset_crypto');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllExchange() {
        $sql = "SELECT * FROM exchange";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPortofolios() {
        $sql = "SELECT * FROM portofolio";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCryptoAssets(){
        $sql = "SELECT * FROM aset_kripto";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllAssetCategories(){
        $sql = "SELECT * FROM asset_kategori";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllTransactions(){
        $sql = "SELECT * FROM transaksi";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addExchange($nama_exchange, $jenis_platform){
        $stmt = $this->conn->prepare("INSERT INTO exchange (nama_exchange, jenis_platform) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama_exchange, $jenis_platform);
        return $stmt->execute();
    }

    public function addPortofolios($nama_portofolio, $mata_uang, $deskripsi){
        $stmt = $this->conn->prepare("INSERT INTO portofolio (nama_portofolio, mata_uang_dasar, deskripsi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_portofolio, $mata_uang, $deskripsi);
        return $stmt->execute();
    }

    public function addCryptoAssets($simbol_aset, $nama_aset, $kategori_id){
        $stmt = $this->conn->prepare("INSERT INTO aset_kripto (simbol, nama_lengkap, kategori_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $simbol_aset, $nama_aset, $kategori_id);
        return $stmt->execute();
    }

    public function addAssetCategories($nama_kategori, $kelas_aset){
        $stmt = $this->conn->prepare("INSERT INTO asset_kategori (nama_kategori, kelas_aset) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama_kategori, $kelas_aset);
        return $stmt->execute();
    }

    public function addTransactions($portofolio_id, $aset_id, $exchange_id, $tipe_transaksi, $jumlah_aset, $harga_per_unit, $biaya , $tanggal_transaksi){
        $stmt = $this->conn->prepare("INSERT INTO transaksi (portofolio_id, aset_id, exchange_id, tipe_transaksi, jumlah_aset, harga_per_unit, biaya, tanggal_waktu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisiiis", $portofolio_id, $aset_id, $exchange_id, $tipe_transaksi, $jumlah_aset, $harga_per_unit, $biaya , $tanggal_transaksi);
        return $stmt->execute();
    }

    public function getExchange($id) {
        $stmt = $this->conn->prepare("SELECT * FROM exchange WHERE exchange_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getPortofolios($id) {
        $stmt = $this->conn->prepare("SELECT * FROM portofolio WHERE portofolio_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCryptoAssets($id) {
        $stmt = $this->conn->prepare("SELECT * FROM aset_kripto WHERE aset_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAssetCategories($id) {
        $stmt = $this->conn->prepare("SELECT * FROM asset_kategori WHERE kategori_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateExchange($id, $nama_exchange, $jenis_platform) {
        $stmt = $this->conn->prepare("UPDATE exchange SET nama_exchange = ?, jenis_platform = ? WHERE exchange_id = ?");
        $stmt->bind_param("ssi", $nama_exchange, $jenis_platform, $id);
        return $stmt->execute();
    }

    public function updatePortofolios($id, $nama_portofolio, $mata_uang, $deskripsi) {
        $stmt = $this->conn->prepare("UPDATE portofolio SET nama_portofolio = ?, mata_uang_dasar = ?, deskripsi = ? WHERE portofolio_id = ?");
        $stmt->bind_param("sssi", $nama_portofolio, $mata_uang, $deskripsi, $id);
        return $stmt->execute();
    }

    public function updateCryptoAssets($id, $simbol_aset, $nama_aset, $kategori_id) {
        $stmt = $this->conn->prepare("UPDATE aset_kripto SET simbol = ?, nama_lengkap = ?, kategori_id = ? WHERE aset_id = ?");
        $stmt->bind_param("ssii", $simbol_aset, $nama_aset, $kategori_id, $id);
        return $stmt->execute();
    }

    public function updateAssetCategories($id, $nama_kategori, $kelas_aset) {
        $stmt = $this->conn->prepare("UPDATE asset_kategori SET nama_kategori = ?, kelas_aset = ? WHERE kategori_id = ?");
        $stmt->bind_param("ssi", $nama_kategori, $kelas_aset, $id);
        return $stmt->execute();
    }

    public function hapusExchange($id) {
        $stmt = $this->conn->prepare("DELETE FROM exchange WHERE exchange_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function hapusPortofolios($id) {
        $stmt = $this->conn->prepare("DELETE FROM portofolio WHERE portofolio_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function hapusCryptoAssets($id) {
        $stmt = $this->conn->prepare("DELETE FROM aset_kripto WHERE aset_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function hapusAssetCategories($id) {
        $stmt = $this->conn->prepare("DELETE FROM asset_kategori WHERE kategori_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

}
?>