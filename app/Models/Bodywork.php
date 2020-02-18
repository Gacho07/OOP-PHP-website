<?php

namespace App\Models;

use App\Models\DB;


class Bodywork
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryGetBodywork() {
        return $this->pdo->executeQuery("SELECT * FROM bodywork_car");
    }
}
