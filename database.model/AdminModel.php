<?php
class AdminModel
{
    private $db;

    public function __construct($db)
    {
        if (!($db instanceof mysqli)) {
            throw new Exception("Koneksi database tidak valid");
        }
        $this->db = $db;
    }

    public function getAdminByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE Username = ?");
        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getAllAdmins()
    {
        $query = "SELECT * FROM admin";
        $result = $this->db->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function addAdmin($username, $password)
    {
        if ($this->getAdminByUsername($username)) {
            return ['error' => 'Username sudah digunakan.'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO admin (Username, Password) VALUES (?, ?)");

        if (!$stmt) {
            return ['error' => 'Gagal mempersiapkan statement.'];
        }

        $stmt->bind_param("ss", $username, $hashedPassword);
        if ($stmt->execute()) {
            return true;
        }

        return ['error' => $stmt->error];
    }

    public function updateAdmin($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE admin SET Password = ? WHERE Username = ?");

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ss", $hashedPassword, $username);
        return $stmt->execute();
    }

    public function deleteAdmin($username)
    {
        $stmt = $this->db->prepare("DELETE FROM admin WHERE Username = ?");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("s", $username);
        return $stmt->execute();
    }

    public function verifyLogin($username, $password)
    {
        $admin = $this->getAdminByUsername($username);

        if ($admin && password_verify($password, $admin['Password'])) {
            return true;
        }

        return false;
    }
}
