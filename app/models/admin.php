<?php

namespace Core\Models;
use Core\App;
use \PDO;
use \Exception;

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
            $statement = $this->pdo->prepare("SELECT * FROM posts ORDER BY author");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function fetchAllUsers()
    {
        try
        {
            $statement = $this->pdo->prepare("SELECT * FROM users ORDER BY user_role");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function updatePostStatus($status, $id)
    {
        $statement = $this->pdo->prepare("UPDATE posts SET stat = :stat WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':stat', $status);
        $statement->execute();
    }

    public function updateUserRole($role, $id)
    {
        $statement = $this->pdo->prepare("UPDATE users SET user_role = :user_role WHERE id = :id ");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':user_role', $role);
        $statement->execute();
    }

    public function delete($table, $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}

$action = new Fetch(
    App::get('database')
);