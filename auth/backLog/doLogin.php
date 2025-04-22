<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../database.model/AdminModel.php';
require_once __DIR__ . '/../../database.model/UserModel.php';  // Pastikan UserModel juga pakai mysqli
require_once __DIR__ . '/../../database.lib/Koneksi.php'; // Pastikan Koneksi juga pakai mysqli
require_once __DIR__ . '/../../database.lib/Session.php';
Session::checkAdminLogin();

$conn = new Koneksi(); // Kelas dari Koneksi.php (pakai mysqli ya!)
$db = $conn->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role === 'admin') {
        $admin = new AdminModel($db);
        $user = $admin->getAdminByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['Username'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: ../AKOW/admin/layout.php");
            exit;
        } else {
            $_SESSION['error'] = "Username atau password salah.";
            header("Location: ../../auth/Login.php");
            exit;
        }
    } elseif ($role === 'user') {
        $userModel = new UserModel($db);
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['Username'] = $username;
            $_SESSION['role'] = 'user';
            header("Location: ../../user/dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Username atau password salah.";
            header("Location: ../../auth/Login.php");
            exit;
        }
    }

    $_SESSION['error'] = "Login gagal! Role tidak dikenali.";
    header("Location: ../../auth/Login.php");
    exit;
}
