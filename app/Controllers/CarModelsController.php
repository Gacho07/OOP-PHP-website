<?php

namespace App\Controllers;

use App\Models\ModelBodyworkCar;
use PDOException;

class CarModelsController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadCarModels()
    {
        $carModels = new ModelBodyworkCar($this->database);

        try {
            $allCarModels = $carModels->queryGetModelsImages();
            $this->json($allCarModels);
        } catch (\PDOException $ex) {
            addError($ex->getMessage());
            $this->json(["error"=>$ex->getMessage()], 500);
        } 
    }

    public function loadSortedFilteredModels($request)
    {
        if (isset($request['send'])) {
            try {
                $idSort = $request['idSort'];
                $idBodywork = $request['idBodywork'];

                $carModels = new ModelBodyworkCar($this->database);

                $allCarModels = $carModels->queryModelsSortFilter($idSort, $idBodywork);
                $this->json($allCarModels);
            } catch(\PDOException $ex) {
                addError($ex->getMessage());
                $this->json(["error" => $ex->getMessage()], 500);
            }
        } else {
            $this->json(["error"=>"Bad request"], 400);
        }
    }

    public function getCarModelsPage()
    {
        $this->viewWithoutSlider("Pages/carModels");
    }
}
