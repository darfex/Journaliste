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
    protected $count = 0;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPost($title, $image, $content, $tag, $status, $author)
    {
        if ($this->num_words($content))
        {
            $param = [
                'title'   => $this->sanitize_string($title),
                'image'   => $image,
                'content' => $this->sanitize_string($content),
                'tag'     => $this->sanitize_string($tag),
                'stat'  => $status,
                'author'  => $author,
            ];

            App::get('query')->insert('posts', $param);
            redirect('dashboard');
        }
        else{
            $message = "Content must not be less than 200 words";
            view('new-post', compact('message'));
        }
    }

    public function editPost()
    {

    }

    public function num_words($content) // Number of words should be >= 200
    {
        $content = explode(' ', $content);

        foreach($content as $word)
        {
            $this->count += 1;
        }
        return $this->count >= 200 ? true : false;
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