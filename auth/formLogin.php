<?php
session_start(); // Start session before any output
if (headers_sent()) {
    die("Redirect failed. Please click <a href='index.php'>here</a>");
}
$loginMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // User data statis
    $users = [
        'admin' => ['username' => 'admin', 'password' => 'admin123'],
        'user'  => ['username' => 'user', 'password' => 'user123']
    ];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if (isset($users[$role])) {
        if ($username === $users[$role]['username'] && $password === $users[$role]['password']) {
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            // Redirect based on role
            if ($role === 'admin') {
                header('Location: index.php', true, 302);
                exit();
            } else {
                header('Location: predika.php', true, 302);
                exit();
            }
        } else {
            $loginMessage = "<p class='error'>Username atau password salah!</p>";
        }
    } else {
        $loginMessage = "<p class='error'>Role tidak valid!</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../public/css/styleLog.css">
</head>
<body>
    <div class="container-wrapper">
        <div class="image-container">
            <img src="../public/img/posyandubg.png" alt="Login Image">
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <?= $loginMessage ?>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
