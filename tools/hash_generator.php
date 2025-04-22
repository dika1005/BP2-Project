<?php
$password = '123'; // Ganti ini sesuai password admin yang kamu mau
$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "<h3>Password: $password</h3>";
echo "<h3>Hashed: $hashed</h3>";
?>
