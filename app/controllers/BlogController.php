<?php

namespace App\Controllers;

class BlogController
{
    public function newPost()
    {
        require 'app/models/post.php';
    }

    public function fetchPost()
    {
        require 'app/models/post.php';
    }

    public function admin()
    {
        require 'app/models/adminPost.php';
    }
}