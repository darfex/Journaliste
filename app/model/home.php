<?php

namespace App\Model;
use Core\App;
use \PDO;
use \Exception;

class HOME
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchPost()
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE stat = 'published'");
            $statement->execute();
            $result =  $statement->fetchAll(PDO::FETCH_ASSOC);

            view('index', compact('result'));
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }
}

$news = new Home(
    App::get('database')
);

$news->fetchPost();