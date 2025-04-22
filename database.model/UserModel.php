<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Konstruktor
     * 
     * Inisialisasi CrudRepo untuk tabel "user".
     */

    /**
     * Ambil semua data pengguna.
     * 
     * @return array
     */
    public function getAllUsers() {}

    /**
     * Ambil data pengguna berdasarkan NIK.
     * 
     * @param string $nik
     * @return array|null
     */
    public function getUserByNIK($nik) {}

    /**
     * Tambah pengguna baru.
     * 
     * @param string $nik
     * @param string $nama
     * @param string $alamat
     * @param float $umur
     * @return bool
     */
    public function addUser($nik, $nama, $alamat, $umur) {}

    /**
     * Update data pengguna.
     * 
     * @param string $nik
     * @param string $nama
     * @param string $alamat
     * @param float $umur
     * @return bool
     */
    public function updateUser($nik, $nama, $alamat, $umur) {}

    /**
     * Hapus pengguna berdasarkan NIK.
     * 
     * @param string $nik
     * @return bool
     */
    public function deleteUser($nik) {}
}
