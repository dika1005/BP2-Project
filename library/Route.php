<?php

class Route
{
    private static $routes = [];

    public static function get($path, $callback)
    {
        self::addRoute('GET', $path, $callback);
    }

    public static function post($path, $callback)
    {
        self::addRoute('POST', $path, $callback);
    }

    public static function any($path, $callback)
    {
        self::addRoute('ANY', $path, $callback);
    }

    private static function addRoute($method, $path, $callback)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
        ];
    }

    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['path'] === $uri &&
                ($route['method'] === $method || $route['method'] === 'ANY')) {
                if (is_callable($route['callback'])) {
                    call_user_func($route['callback']);
                } else {
                    require_once $route['callback'];
                }
                return;
            }
        }

        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
    }
}
