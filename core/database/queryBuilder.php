<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchall(PDO::FETCH_OBJ);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ":" . implode(', :', array_keys($parameters))
        );

        try
        {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function update($table, $parameters)
    {
        $sql = sprintf(
            "UPDATE %s SET"
        );
    }
}