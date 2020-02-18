<?php

namespace App\Models;

use App\Models\DB;

class Role
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryGetRole() {
        return $this->pdo->executeQuery("SELECT * FROM role");
    }
}
