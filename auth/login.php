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

        </div>
        <div class="login-container">
            <h2>Login</h2>
            <?php $loginMessage = $loginMessage ?? ''; ?>
            <?= $loginMessage ?>
            <form action="doLogin.php" method="POST"></form>
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
