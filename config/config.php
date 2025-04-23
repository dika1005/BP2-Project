<?php
// Aktifkan autoloading manual
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../controller/',
        __DIR__ . '/../database.lib/',
        __DIR__ . '/../database.model/',
        __DIR__ . '/../database.repo/',
        __DIR__ . '/../public/root/',

    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
