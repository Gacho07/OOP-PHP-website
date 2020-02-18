<?php

namespace App\Models;

use App\Models\DB;


class Model_Car
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryGetModelCar()
    {
        return $this->pdo->executeQuery("SELECT * FROM model_car");
    }
}
