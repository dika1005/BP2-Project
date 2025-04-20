<?php
/**
 * Class UserModel
 * 
 * Kelas ini menyediakan lapisan abstraksi untuk berinteraksi dengan tabel "user" di database.
 * Kelas ini menggunakan CrudRepo untuk melakukan operasi CRUD dan mengelola koneksi database.
 */
class UserModel
{
    /**
     * @var CrudRepo $repo
     * Sebuah instance CrudRepo untuk menangani operasi database pada tabel "user".
     */

    /**
     * Konstruktor
     * 
     * Menginisialisasi instance CrudRepo untuk tabel "user".
     */
    public function __construct() {}

    /**
     * Mendapatkan semua pengguna dari tabel "user".
     * 
     * @return array Sebuah array yang berisi semua data pengguna.
     */
    public function getAllUsers() {}

    /**
     * Mendapatkan data pengguna tertentu berdasarkan NIK (identitas unik).
     * 
     * @param string $nik NIK dari pengguna yang ingin diambil.
     * @return array|null Data pengguna jika ditemukan, atau null jika tidak ditemukan.
     */
    public function getUserByNIK($nik) {}

    /**
     * Menambahkan pengguna baru ke tabel "user".
     * 
     * @param string $nik NIK dari pengguna baru.
     * @param string $nama Nama dari pengguna baru.
     * @param string $alamat Alamat dari pengguna baru.
     * @param float $umur Umur dari pengguna baru.
     * @return bool True jika operasi berhasil, false jika gagal.
     */
    public function addUser($nik, $nama, $alamat, $umur) {}

    /**
     * Memperbarui informasi pengguna yang sudah ada di tabel "user".
     * 
     * @param string $nik NIK dari pengguna yang ingin diperbarui.
     * @param string $nama Nama baru dari pengguna.
     * @param string $alamat Alamat baru dari pengguna.
     * @param float $umur Umur baru dari pengguna.
     * @return bool True jika operasi berhasil, false jika gagal.
     */
    public function updateUser($nik, $nama, $alamat, $umur) {}

    /**
     * Menghapus pengguna dari tabel "user" berdasarkan NIK.
     * 
     * @param string $nik NIK dari pengguna yang ingin dihapus.
     * @return bool True jika operasi berhasil, false jika gagal.
     */
    public function deleteUser($nik) {}
}
