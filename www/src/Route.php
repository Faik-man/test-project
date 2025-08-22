<?php

declare(strict_types=1);

namespace App;

final class Route {
    public static function get() {
        $routes = require $_SERVER['DOCUMENT_ROOT'] . '/../routes.php';

        $validRoutes = array_filter($routes, function($key) {
            $pattern = '#^' . str_replace('/', '\/', $key) . '$#';
            $url = explode('?', $_SERVER['REQUEST_URI'])[0];
            return preg_match($pattern, $url);
        }, ARRAY_FILTER_USE_KEY);

        if (count($validRoutes) > 0) {
            $value = reset($validRoutes);
            $arValue = explode('/', $value);
            if (count($arValue) == 1) {
                $class = 'App\\Controller\\' . ucfirst($value) . 'Controller';
                $model = new \App\Model\Database();
                $view = new \App\View($value);

                $controller = new $class($model, $view);
                $controller->index();
            } else if (count($arValue) == 2) {
                $func = $arValue[1];
                $className = 'App\\Controller\\' . ucfirst($arValue[0]) . 'Controller';
                $model = new \App\Model\Database();
                $view = new \App\View($value);

                $controller = new $className($model, $view);
                $controller->$func();
            } else {
                http_response_code(404);
            }
        } else {
            http_response_code(404);
        }
    }
}
