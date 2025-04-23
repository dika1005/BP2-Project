<?php
// Routing manual
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Bikin path absolut ke folder root proyek kamu
$basePath = __DIR__; // asumsikan index.php ada di folder AKOW

switch ($uri) {
    case '/AKOW/':
    case '/AKOW/index.php':
        require_once "$basePath/component/header.php";
        require_once "$basePath/component/footer.php";
        break;

    case '/AKOW/login':
    case '/AKOW/auth/Login.php':
        require_once "$basePath/auth/Login.php";
        break;

    case '/AKOW/register':
        require_once "$basePath/auth/register.php";
        break;

    case '/AKOW/admin':
        require_once "$basePath/admin/layout.php";
        break;

    case '/AKOW/backLog/doLogin.php':
        require_once realpath(__DIR__ . '/../../backLog/doLogin.php');
        break;


    default:
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        break;
}
