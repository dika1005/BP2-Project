<?php
session_start();

// Load semua dependensi
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../database.lib/Koneksi.php';
require_once __DIR__ . '/../database.repo/AdminRepository.php';
require_once __DIR__ . '/../database.repo/UserRepository.php';
require_once __DIR__ . '/../public/root/index.php';

// Cek kalau bukan POST, kembalikan ke login
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../auth/Login.php");
    exit;
}

// Ambil data dari form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$role     = $_POST['role'] ?? '';

// Validasi input
if (empty($username) || empty($password) || empty($role)) {
    $_SESSION['error'] = "Semua field harus diisi!";
    header("Location: ../auth/Login.php");
    exit;
}

// Koneksi ke database
$koneksi = new Koneksi();
$db = $koneksi->getConnection();

// Siapin redirect default dan status login
$loginBerhasil = false;
$redirect = ' ../auth/Login.php';

// Proses login sesuai role
switch ($role) {
    case 'admin':
        $repo = new AdminRepository($db);
        $loginBerhasil = $repo->login($username, $password);
        $redirect = ' ../admin/layout.php';
        break;

    case 'user':
        $repo = new UserRepository($db);
        $loginBerhasil = $repo->login($username, $password);
        $redirect = ' ../AKOW/user/dashboard.php';
        break;

    default:
        $_SESSION['error'] = "Role tidak valid!";
        header("Location: ../auth/Login.php");
        exit;
}

// Kalau login berhasil, simpan session
if ($loginBerhasil) {
    $_SESSION['Username'] = $username;
    $_SESSION['role'] = $role;
    header("Location: $redirect");
    exit;
}

// Kalau gagal, kasih pesan error
$_SESSION['error'] = "Username, password, atau role salah!";
header("Location: ../auth/Login.php");
exit;
