<?php

use Core\App;

App::bind('config', require 'config.php');

App::bind('database', 
    Connection::make(App::get('config')['database'])
);

App::bind('query', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function redirect($path)
{
    header("Location: {$path}");
}

function view($name, $data=[])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function dd($data)
{
    die(var_dump($data));
}