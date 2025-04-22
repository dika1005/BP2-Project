<?php
session_start();

class Session
{
    public static function checkAdminLogin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: ../../auth/Login.php");
            exit;
        }
    }

    public static function checkUserLogin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
            header("Location: ../../auth/Login.php");
            exit;
        }
    }

    public static function checkAnyLogin()
    {
        if (!isset($_SESSION['role'])) {
            header("Location: ../../auth/Login.php");
            exit;
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ../../auth/Login.php");
        exit;
    }
}
