<?php
class UserModel
{
    private $db;

    public function __construct($db)
    {
        if (!($db instanceof mysqli)) {
            throw new Exception("Koneksi database tidak valid");
        }
        $this->db = $db;
    }

    public function getUserByNIK($nik)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE NIK = ?");
        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("s", $nik);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM user";
        $result = $this->db->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function addUser($nik, $password, $nama, $alamat, $jenisKelamin, $umur)
    {
        if ($this->getUserByNIK($nik)) {
            return ['error' => 'NIK sudah terdaftar.'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO user (NIK, Password, Nama, Alamat, JenisKelamin, Umur) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            return ['error' => 'Gagal mempersiapkan statement.'];
        }

        $stmt->bind_param("sssssi", $nik, $hashedPassword, $nama, $alamat, $jenisKelamin, $umur);
        if ($stmt->execute()) {
            return true;
        }

        return ['error' => $stmt->error];
    }

    public function updateUser($nik, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE user SET Password = ? WHERE NIK = ?");

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ss", $hashedPassword, $nik);
        return $stmt->execute();
    }

    public function deleteUser($nik)
    {
        $stmt = $this->db->prepare("DELETE FROM user WHERE NIK = ?");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("s", $nik);
        return $stmt->execute();
    }

    public function verifyLogin($nik, $password)
    {
        $user = $this->getUserByNIK($nik);

        if ($user && password_verify($password, $user['Password'])) {
            return true;
        }

        return false;
    }
}
