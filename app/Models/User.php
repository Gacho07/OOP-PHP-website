<?php

namespace App\Models;

use App\Models\DB;

class User
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryRegisterUser(string $first_name, string $last_name, string $email, string $password, int $idRole)
    {
        return $this->pdo->executeInsert("INSERT INTO user VALUES(NULL, ?, ?, ?, MD5(?), ?)", [$first_name, $last_name, $email, $password, $idRole]);
    }

    public function queryLoginUser(string $email, string $password)
    {
        return $this->pdo->executeOneRow("SELECT u.idUser, u.first_name, u.last_name, u.email, r.* FROM user u JOIN role r ON u.idRole = r.idRole WHERE u.email = ? AND u.password = MD5(?)", [$email, $password]);
    }
}
