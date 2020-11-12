<?php

namespace App\Controllers;

class BlogController
{
    public function addPost()
    {
        require 'app/models/post.php';
    }

    public function changePostStatus()
    {
        require 'app/models/admin.php';
    }

    public function deletePost()
    {
        require 'app/models/admin.php';
        $id = $_GET['id'];
        $post->delete($id);
        redirect('posts');
    }

    public function editPost()
    {
        require 'app/models/admin.php';
        $title = $_GET['post'];
        $post = $post->edit($title);
        view('updatePost', compact('post'));
    }
}