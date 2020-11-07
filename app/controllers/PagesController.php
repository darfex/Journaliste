<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        view('index');
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