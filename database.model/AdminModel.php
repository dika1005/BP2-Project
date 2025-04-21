<?php
/**
 * Class AdminModel
 * 
 * Abstraksi untuk interaksi dengan tabel "admin".
 */
class AdminModel
{
    /**
     * Konstruktor
     * 
     * Inisialisasi CrudRepo untuk tabel "admin".
     */
    public function __construct() {}

    /**
     * Ambil semua data admin.
     * 
     * @return array
     */
    public function getAllAdmins() {}

    /**
     * Ambil data admin berdasarkan username.
     * 
     * @param string $username
     * @return array|null
     */
    public function getAdminByUsername($username) {}

    /**
     * Tambah admin baru.
     * 
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function addAdmin($username, $password) {}

    /**
     * Update data admin.
     * 
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function updateAdmin($username, $password) {}

    /**
     * Hapus admin berdasarkan username.
     * 
     * @param string $username
     * @return bool
     */
    public function deleteAdmin($username) {}

    /**
     * Verifikasi login admin.
     * 
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function verifyLogin($username, $password) {}
}
