<?php

namespace App\Controllers;
use Core\App;

class UsersController
{
    public function login()
    {
        require 'app/models/auth.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $auth->Login($username, $password);
    }

    public function add_User()
    {
        require 'app/models/auth.php';

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $auth->AddAccount($username, $firstname, $lastname, $email, $password, $cpassword);
    }

    public function update_User()
    {
        require 'app/models/auth.php';
        dd($_POST);

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $currentPassword = $_POST['currentPassword'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $auth->UpdateUser($username, $firstname, $lastname, $emal, $currentPassword, $password, $cpassword);
    }
}