<?php

namespace Core\Models;
use Core\App;
use \PDO;
use \Exception;

session_start();

class Fetch
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchPosts()
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_OBJ);

            view('adminpost', compact('data'));
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}

$post = new Fetch(
    App::get('database')
);

$post->fetchPosts();