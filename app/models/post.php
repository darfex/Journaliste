<?php

namespace App\Models;
use Core\App;
use \PDO;
use \Exception;

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
                'img'   => $image,
                'content' => $content,
                'tag'     => $this->sanitize_string($tag),
                'stat'    => $status,
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

    public function updatePost($title, $content, $image, $tag, $status, $id)
    {
        if ($this->num_words($content))
        {
            $title = $this->sanitize_string($title);
            $tag = $this->sanitize_string($tag);

            if(!empty($image))
            {
                $statement = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content, tag = :tag, stat = :stat, img = :img WHERE id = :id");
                $statement->bindParam(':title', $title);
                $statement->bindParam(':content', $content);
                $statement->bindParam(':tag', $tag);
                $statement->bindParam(':img', $image);
                $statement->bindParam(':stat', $status);
                $statement->bindParam(':id', $id);
                $statement->execute();
            }
            else{
                $statement = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content, tag = :tag, stat = :stat WHERE id = :id");
                $statement->bindParam(':title', $title);
                $statement->bindParam(':content', $content);
                $statement->bindParam(':tag', $tag);
                $statement->bindParam(':stat', $status);
                $statement->bindParam(':id', $id);
                $statement->execute();
            }
            redirect('posts');
        }
        else{
            $message = "Content must not be less than 200 words";
            view('upDatePost', compact('message'));
        }
    }

    public function fetchPost($title) // Fetch specific post
    {
        try{
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE title = :title");
            $statement->bindParam(':title', $title);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function fetchAllPosts() // To be displayed on the homepage
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE stat = 'published' ORDER BY  updatedOn DESC");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function fetchUserPost($author)
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE author = :author ORDER BY title");
            $statement->bindParam(':author', $author);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
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