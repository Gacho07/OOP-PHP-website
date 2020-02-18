<?php

namespace App\Models;

use App\Models\DB;

class Car
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryGetModelBodyworkCar($id)
    {
        return $this->pdo->executeOneRow("SELECT * FROM car c JOIN model_bodywork_car mbc ON c.idModelBodywork = mbc.idModelBodywork JOIN image_car ic ON mbc.idImage = ic.idImage WHERE c.idModelBodywork = ?", [$id]);
    }

    public function queryGetAllCars()
    {
        return $this->pdo->executeQuery("SELECT * FROM car c JOIN model_bodywork_car mbc ON c.idModelBodywork = mbc.idModelBodywork JOIN image_car ic ON mbc.idImage = ic.idImage");
    }

    //// Start INSERT 
    public function queryInsertCar($name, $description, $price, $idModelBodywork)
    {
        $query = "INSERT INTO car (carName, description, price, idModelBodywork) VALUES (?,?,?,?)";
        return $this->pdo->executeInsert($query, [$name, $description, $price, $idModelBodywork]);
    }
    public function queryInsertCar2($idBodywork, $idModel, $idImage)
    {
        $query = "INSERT INTO model_bodywork_car (idBodywork, idModel, idImage) VALUES(?,?,?)";
        return $this->pdo->executeInsert($query, [$idBodywork, $idModel, $idImage]);
    }
    public function queryInsertCar3($miniImage, $newImage)
    {
        $query = "INSERT INTO image_car (miniImage, newImage) VALUES(?,?)";
        return $this->pdo->executeInsert($query, [$miniImage, $newImage]);
    }
    function getLargestId()
    {
        $query = "SELECT MAX(idModelBodywork) as idMBC from model_bodywork_car";
        return $this->pdo->executeOne($query);
    }
    function getLargestIdImage()
    {
        $query = "SELECT MAX(idImage) as idImage from image_car";
        return $this->pdo->executeOne($query);
    }
    //// End INSERT

    public function queryUpdateCar($carName, $price, $idCar)
    {
        $query = "UPDATE car SET carName = ?, price = ?  WHERE idCar = ?";
        return $this->pdo->executeUpdateDelete($query, [$carName, $price, $idCar]);
    }

    public function queryDeleteCar(int $id)
    {
        return $this->pdo->executeUpdateDelete("DELETE FROM car WHERE idCar=?", [$id]);
    }
}
