<?php
namespace App\Controllers;
session_start();

class PagesController
{
    public function home()
    {
        require 'app/models/post.php';
        $data = $postAction->fetchAllPosts();
        view('index', compact('data'));
    }

    public function post()
    {
        require 'app/models/post.php';
        $title = $_GET['post'];
        $post = $postAction->fetchPost($title);
        view('post', compact('post'));
    }

    public function managePosts()
    {
        require 'app/models/admin.php';
        require 'app/models/post.php';
        $author = $_SESSION['username'];
        $_SESSION['role'] === 'user'? $data =$postAction->fetchUserPost($author) : $data = $action->fetchAllPosts();
        if(empty($data))
        {
            echo "<script>alert('You have not posted anything yet!);
            window.location.href='addPost';</script>";
        }
        view('managePost', compact('data'));
    }

    public function manageUsers()
    {
        require 'app/models/admin.php';
        $data = $action->fetchAllUsers();
        view('manageUsers', compact('data'));
    }

    public function viewPost()
    {
        require 'app/models/post.php';
        $title = $_GET['post'];
        $post = $postAction->fetchPost($title);
        view('adminView', compact('post'));
    }

    public function dashboard()
    {
        require 'app/models/admin.php';
        require 'app/models/post.php';
        if ($_SESSION['role'] === 'user') 
        {
            $author = $_SESSION['username'];
            $posts = $postAction->fetchUserPost($author);
            view('dashboard', compact('posts'));
        }else
        {
            $posts = $action->fetchAllPosts();
            $users = $action->fetchAllUsers();
            view('dashboard', compact('posts', 'users'));
        }
    }

    public function profile()
    {
        view('profile');
    }

    public function addUser()
    {
        view('new-user');
    }

    public function addPost()
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