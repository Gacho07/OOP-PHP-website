<?php

namespace App\Models;

class DB {
    private $server;
    private $dbname;
    private $username;
    private $password;

    public $pdo;

    public function __construct(string $server, string $dbname, string $username, string $password)
    {
        $this->server = $server;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->pdo = new \PDO("mysql:host={$this->server};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(\PDOException $ex) {
            echo "Error with connection: " . $ex->getMessage();
        }
    }

    public function executeQuery(string $query) {
        return $this->pdo->query($query)->fetchAll();
    }

    public function executeOne($query)
    {
        return $this->pdo->query($query)->fetch();
    }

    public function executeOneRow(string $query, Array $params) {
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }

    public function executeInsert(string $query, Array $params)
    {
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($params);
        return $prepare;
    }

    public function executeUpdateDelete(string $query, Array $params) {
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($params);
        return $prepare;
    }
}