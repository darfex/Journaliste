<?php

namespace Core;

class Request
{
    public static function uri()
    {
        return trim(substr(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 20), '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}