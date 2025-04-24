<?php

require_once __DIR__ . '/../library/Route.php';

$basePath = __DIR__; // folder AKOW

Route::get('/', function () use ($basePath) {
    require_once "$basePath/component/header.php";
    require_once "$basePath/component/footer.php";
});

Route::get('/AKOW/index.php', function () use ($basePath) {
    require_once "$basePath/component/header.php";
    require_once "$basePath/component/footer.php";
});

Route::get('../login', "$basePath/auth/Login.php");
Route::post('../auth/Login.php', "$basePath/auth/Login.php");

Route::get('../register', "$basePath/auth/register.php");

Route::get('../admin', "$basePath/admin/layout.php");

Route::post('../backLog/doLogin.php', realpath(__DIR__ . '/../backLog/doLogin.php'));

Route::dispatch();
