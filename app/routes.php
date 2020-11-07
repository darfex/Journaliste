<?php

$router->get("", 'PagesController@home');
$router->get("dashboard", 'PagesController@home');
$router->get("profile", 'PagesController@profile');
$router->get("adduser", 'PagesController@newuser');
$router->get('addpost', 'PagesController@newpost');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');
$router->post('auth', 'UsersController@auth');
$router->post('add-user', 'UsersController@auth');