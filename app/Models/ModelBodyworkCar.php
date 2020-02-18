<?php

namespace App\Models;

use App\Models\DB;


class ModelBodyworkCar
{
    private $pdo;

    public function __construct(DB $pdo)
    {
        $this->pdo = $pdo;
    }

    public function queryModelsSortFilter($idSort, $idBodywork)
    {
        $querySort = "SELECT * FROM model_bodywork_car mbc JOIN model_car mc ON mbc.idModel = mc.idModel JOIN image_car ic ON mbc.idImage = ic.idImage WHERE ic.path LIKE 'app/assets/images/CarModels/%'";

        if ($idBodywork != '0') {
            $querySort .= " AND mbc.idBodywork = $idBodywork";
        }

        if ($idSort == '1') {
            $querySort .= " ORDER BY ic.name ASC";
        } elseif ($idSort == '2') {
            $querySort .= " ORDER BY ic.name DESC";
        }

        return $this->pdo->executeQuery($querySort);
    }

    public function queryGetModelsImages()
    {
        return $this->pdo->executeQuery("SELECT * FROM model_bodywork_car mbc JOIN model_car mc ON mbc.idModel = mc.idModel JOIN image_car ic ON mbc.idImage = ic.idImage WHERE ic.path LIKE 'app/assets/images/CarModels/%'");
    }

    public function queryGetOneModelImage($idModel)
    {
        return $this->pdo->executeOneRow("SELECT * FROM model_car mc JOIN model_bodywork_car mbc ON mc.idModel = mbc.idModel JOIN image_car ic ON mbc.idImage = ic.idImage WHERE mc.idModel = ?", [$idModel]);
    }

    public function queryGetModelBodyworkImage($idModel)
    {
        return $this->pdo->executeOneRow("SELECT * FROM model_bodywork_car mbc JOIN model_car mc ON mbc.idModel = mc.idModel JOIN car c ON mbc.idModelBodywork = c.idModelBodywork JOIN image_car ic ON mbc.idImage = ic.idImage WHERE ic.path LIKE 'app/assets/images/Bodywork/%' AND mc.idModel = ?", [$idModel]);
    }
}
