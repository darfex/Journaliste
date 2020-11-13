<?php

namespace App\Controllers;
use Core\App;
session_start();

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
        
        isset($_POST['role']) ? $role = $_POST['role'] : $role = "";

        $auth->AddAccount($username, $firstname, $lastname, $email, $password, $cpassword, $role);
    }

    public function update_User()
    {
        require 'app/models/auth.php';

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $currentPassword = $_POST['currentPassword'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $auth->UpdateUser($username, $firstname, $lastname, $email, $currentPassword, $password, $cpassword);
    }

    public function deleteUser()
    {
        require 'app/models/admin.php';
        $id = $_GET['id'];
        $action->delete('users', $id);
        redirect('users');
    }

    public function changeUserRole()
    {
        require 'app/models/admin.php';
        $id = $_GET['id'];
        $role = $_GET['role'];
        $action->updateUserRole($role, $id);
        redirect('users');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        redirect('login');
    }
}