<?php

class Session
{
    public static function checkAdminLogin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            self::redirectToLogin();
        }
    }

    public static function checkUserLogin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
            self::redirectToLogin();
        }
    }

    public static function checkAnyLogin()
    {
        if (!isset($_SESSION['role'])) {
            self::redirectToLogin();
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        self::redirectToLogin();
    }

    private static function redirectToLogin()
    {
        header("Location: ../../auth/Login.php");
        exit;
    }
}
