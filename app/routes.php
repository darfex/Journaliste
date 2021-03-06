<?php

$router->get("", 'PagesController@home');
$router->get('post', 'PagesController@post');
$router->get("dashboard", 'PagesController@dashboard');
$router->get("profile", 'PagesController@profile');
$router->get("addUser", 'PagesController@addUser');
$router->get('addPost', 'PagesController@addPost');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');
$router->get('view', 'PagesController@viewPost');
$router->get('PostStatus', 'BlogController@changePostStatus');
$router->get('UserRole', 'UsersController@changeUserRole');
$router->get('deletePost', 'BlogController@deletePost');
$router->get('deleteUser', 'UsersController@deleteUser');
$router->get('edit', 'BlogController@editPost');
$router->get('logout', 'UsersController@logout');
$router->get('posts', 'PagesController@managePosts');
$router->get('users', 'PagesController@manageUsers');
$router->post('addUser', 'UsersController@add_User');
$router->post('update-post', 'BlogController@updatePost');
$router->post('auth', 'UsersController@login');
$router->post('add-user', 'UsersController@add_User');
$router->post('add-post', 'BlogController@addPost');
$router->post('update-profile', 'UsersController@update_User');
$router->post('search', 'BlogController@search');