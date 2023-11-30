<?php

class DataBase
{
    private \PDO $connection;

    public function __construct()
    {
        $config = include_once 'config.php';
        try
        {
            $this->connection= new PDO($config['dsn'],$config['user'],$config['pass']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES , false);
        }
        catch (\PDOException $e)
        {
            die("Database exeption".$e->getMessage());
        }
    }


    function getList()
    {
        $statement = $this->connection->prepare('SELECT * FROM `comments` ORDER BY `id`;');
        $statement->execute();
        return $statement->fetchAll();
    }
    function getById($id)
    {
        $statement = $this->connection->prepare('SELECT * FROM `comments` WHERE `id` = :id;');
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $com = $statement->fetchAll();
        return array_shift($com);
    }

    function addComment($name,$text)
    {
        $statement = $this->connection->prepare('INSERT INTO `comments` (`author`, `text`) VALUES(:name, :text);');
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':text', $text, PDO::PARAM_STR);
        $statement->execute();

    }
    function updateComment($name,$text,$id)
    {
        $statement = $this->connection->prepare(
            'UPDATE `comments` SET `author` = :name, `text` = :text  WHERE `id` = :id;'
        );
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':text', $text, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
    }
    function deleteComment($id)
    {
        $statement = $this->connection->prepare('DELETE FROM `comments` WHERE id = :id;');
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

    }
}