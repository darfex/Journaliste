<?php

namespace App\Controllers;
use Core\App;

class UsersController
{
    public function auth()
    {
        require 'app/models/auth.php';
    }
}