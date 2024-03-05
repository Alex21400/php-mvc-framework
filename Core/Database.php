<?php

namespace Core;

use PDO;

class Database {
    private $host = 'localhost';
    private $dbName = 'test1';
    private $user = 'root';
    private $pass = '';

    private $connection;
    public $statement;

    public function __construct()
    {   
        $dsn = "mysql:host=$this->host; dbname=$this->dbName";

        $this->connection = new PDO($dsn, $this->user, $this->pass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get() {
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result = $this->find();

        if(! $result) {
            http_response_code(404);

            return  view('views/404.php');

            die();
        }

        return $result;
    }
}
?>