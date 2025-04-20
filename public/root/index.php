<?php
// Routing manual
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        require_once '../component/header.php';
        require_once '../component/footer.php';
        break;

    case '/login':
        require_once '../auth/login.php';
        break;

    case '/register':
        require_once '../auth/register.php';
        break;

    case '/admin':
        require_once '../admin/index.php';
        break;

    default:
        echo "404 - Page not found";
        break;
}
