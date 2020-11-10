<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        require 'app/models/post.php';
    }

    public function dashboard()
    {
        view('dashboard');
    }

    public function profile()
    {
        view('profile');
    }

    public function newuser()
    {
        view('new-user');
    }

    public function newpost()
    {
        view('new-post');
    }

    public function login()
    {
        view('login');
    }

    public function register()
    {
        view('register');
    }
}