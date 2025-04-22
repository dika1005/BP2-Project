<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../database.model/AdminModel.php';
require_once __DIR__ . '/../../database.model/UserModel.php';
require_once __DIR__ . '/../../database.lib/Koneksi.php';
require_once __DIR__ . '/../../database.lib/Session.php';

$conn = new Koneksi();
$db = $conn->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil dan bersihkan input dari form
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Validasi input
    if (empty($username) || empty($password) || empty($role)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: Login.php");
        exit;
    }

    if ($role === 'admin') {
        $adminModel = new AdminModel($db);
        $admin = $adminModel->getAdminByUsername($username);

        if ($admin && password_verify($password, $admin['Password'])) {
            $_SESSION['Username'] = $admin['Username'];
            $_SESSION['role'] = 'admin';
            header("Location: ../../admin/layout.php");
            exit;
        }
    } elseif ($role === 'user') {
        $userModel = new UserModel($db);
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['Password'])) {
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['role'] = 'user';
            header("Location: ../../user/dashboard.php");
            exit;
        }
    }

    // Jika login gagal, redirect dengan pesan error
    $_SESSION['error'] = "Username, password, atau role salah!";
    header("Location: ../../auth/Login.php");
    exit;
}
