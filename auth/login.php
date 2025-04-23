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
            <!-- Gambar bisa ditambahkan di sini -->
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <?php
            session_start();
            $loginMessage = $_SESSION['error'] ?? '';
            unset($_SESSION['error']);
            ?>
            <?= $loginMessage ?>
            <form action="../backLog/doLogin.php" method="POST">

                <input type="text" name="username" placeholder="Username" autocomplete="username" required>
                <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>

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