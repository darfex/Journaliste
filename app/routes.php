<?php
$router->get("", 'PagesController@home');
$router->get('post', 'PagesController@post');
$router->get("dashboard", 'PagesController@dashboard');
$router->get("profile", 'PagesController@profile');
$router->get("addUser", 'PagesController@addUser');
$router->get('addPost', 'PagesController@addPost');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');
$router->get('posts', 'PagesController@managePosts');
$router->get('view', 'PagesController@viewPost');
$router->get('status', 'BlogController@changePostStatus');
$router->get('delete', 'BlogController@deletePost');
$router->get('edit', 'BlogController@editPost');
$router->post('auth', 'UsersController@auth');
$router->post('add-user', 'UsersController@auth');
$router->post('add-post', 'BlogController@addPost');