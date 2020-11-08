<?php

namespace App\Model;
use Core\App;
use \PDO;
use \Exception;

session_start();

class Post
{
    protected $pdo;
    protected $title;
    protected $content;
    protected $author;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPost($title, $image, $content, $tag, $status, $author)
    {
        $param = [
            'title'   => $this->sanitize_string($title),
            'image'   => $image,
            'content' => $this->sanitize_string($content),
            'tag'     => $this->sanitize_string($tag),
            'status'  => $status,
            'author'  => $author,
        ];

        App::get('query')->insert('posts', $param);
        redirect('dashboard');
    }

    public function editPost()
    {
        
    }

    private function sanitize_string($arg)
    {
        return filter_var($arg, FILTER_SANITIZE_STRING);
    }
}

$postAction = new Post(
    App::get('database')
);

if (isset($_POST['title']) && isset($_POST['content']) && $_POST['status'])
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $tag = $_POST['tag'];
    $image = $_POST['image'];
    $author = $_SESSION['username'];

    $postAction->addPost($title, $image, $content, $tag, $status, $author);
}