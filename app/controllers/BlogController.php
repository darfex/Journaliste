<?php

namespace App\Controllers;
session_start();
class BlogController
{
    public function addPost()
    {
        require 'app/models/post.php';
        $title   = $_POST['title'];
        $content = $_POST['content'];
        $status  = $_POST['status'];
        $tag     = $_POST['tag'];
        $image   = $_POST['image'];
        $author  = $_SESSION['username'];

        $postAction->addPost($title, $image, $content, $tag, $status, $author);
    }

    public function changePostStatus()
    {
        require 'app/models/admin.php';
        $id = $_GET['id'];
        $status = $_GET['status'];
        $action->updatePostStatus($status, $id);
        redirect('posts');
    }

    public function deletePost()
    {
        require 'app/models/admin.php';
        $id = $_GET['id'];
        $action->delete('posts', $id);
        redirect('posts');
    }

    public function editPost()
    {
        require 'app/models/post.php';
        $title = $_GET['post'];
        $post = $postAction->fetchPost($title);
        view('updatePost', compact('post'));
    }

    public function updatePost()
    {
        require 'app/models/post.php';
        $title   = $_POST['title'];
        $content = $_POST['content'];
        $status  = $_POST['status'];
        $tag     = $_POST['tag'];
        $image   = $_POST['image'];
        $id = $_GET['id'];
        $postAction->updatePost($title, $content, $image, $tag, $status, $id);
    }

    public function search()
    {
        require 'app/models/post.php';
        $search = $_POST['search'];

        $data = $postAction->search($search);
        VIEW('search', compact('data'));
    }
}