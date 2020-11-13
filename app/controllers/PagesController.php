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
        $data = $post->fetchAllPosts();
        view('managePost', compact('data'));
    }

    public function manageUsers()
    {
        require 'app/models/admin.php';
        $data = $post->fetchAllUsers();
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
        $posts = $post->fetchAllPosts();
        $users = $post->fetchAllUsers();
        view('dashboard', compact('posts', 'users'));
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