<?php
class Anime_model {
    private $koneksi;

    public function __construct() {
        $this->koneksi = new mysqli("localhost", "root", "", "db_anime");
        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }

    public function getAll() {
        $result = $this->koneksi->query("SELECT * FROM anime");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $result = $this->koneksi->query("SELECT * FROM anime WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function tambah($judul, $genre, $tahun, $rating) {
        $sql = "INSERT INTO anime (judul, genre, tahun_rilis, rating) 
                VALUES ('$judul', '$genre', '$tahun', '$rating')";
        return $this->koneksi->query($sql);
    }

    public function update($id, $judul, $genre, $tahun, $rating) {
        $sql = "UPDATE anime 
                SET judul='$judul', genre='$genre', tahun_rilis='$tahun', rating='$rating' 
                WHERE id=$id";
        return $this->koneksi->query($sql);
    }

    public function hapus($id) {
        return $this->koneksi->query("DELETE FROM anime WHERE id=$id");
    }
}
?>
