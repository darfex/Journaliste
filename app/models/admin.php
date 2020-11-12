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

    public function fetchAllPosts()
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function changeStatus($status, $id)
    {
        $statement = $this->pdo->prepare("UPDATE posts SET stat = :stat WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':stat', $status);
        $statement->execute();
    }

    public function delete($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function edit($title)
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM posts Where title = :title");
            $statement->bindParam(':title', $title);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
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

if (isset($_GET['status']) && $_GET['status'] === 'published')
{
    $id = $_GET['id'];
    $status = $_GET['status'];
    $post->changeStatus($status, $id);
    redirect('posts');
}
elseif(isset($_GET['status']) && $_GET['status'] === 'draft')
{
    $id = $_GET['id'];
    $status = $_GET['status'];
    $post->changeStatus($status, $id);
    redirect('posts');
}