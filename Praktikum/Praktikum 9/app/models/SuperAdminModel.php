<?php

require_once '../core/database.php';

class SuperAdmin extends Database {

    public function GetUserData($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function GetAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function tambahAkun($username, $password, $kategori) {
        $sql = "INSERT into users (username, password, kategori) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $kategori);
        return $stmt->execute();
    }

    public function hapus($username){
        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        return $stmt->execute();
    }

    public function edit($usernameawal, $username, $password, $kategori){
        $sql = "UPDATE users SET username = ?, password = ?, kategori = ? WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $username, $password, $kategori, $usernameawal);
        return $stmt->execute();
    }
}
?>