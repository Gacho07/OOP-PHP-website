<?php

namespace App\Controllers;

use App\Models\Car;
use PDOException;

class CrudCarsController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadCrudCars()
    {
        $crudCars = new Car($this->database);

        try {
            $cars = $crudCars->queryGetAllCars();
            $this->json($cars);
        } catch (\PDOException $ex) {
            addError($ex->getMessage());
            $this->json(["error" => $ex->getMessage()], 500);
        }
    }

    public function getCarForUpdate($request)
    {
        if (isset($request['id'])) {
            $crudUpdateCar = new Car($this->database);

            try {
                $id = $request['id'];
                $cars = $crudUpdateCar->queryGetModelBodyworkCar($id);
                $this->json($cars);
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
                $this->json(["error" => $ex->getMessage()], 500);
            }
        } else {
            $this->json(["error" => "Bad request"], 400);
        }
    }

    public function updateSpecificCar($request)
    {
        if (isset($request['btnUpdateCar'])) {
            $carName = $request['tbCarName'];
            $price = $request['carPrice'];
            $idCar = $request['srcImage'];

            $carUpdateModel = new Car($this->database);
            try {
                $carUpdate = $carUpdateModel->queryUpdateCar($carName, $price, $idCar);
                if ($carUpdate) {
                    $_SESSION['updateSession'] = "Car successfully updated!";
                }
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
                $_SESSION['updateSession'] = "Error, car isn't updated!";
                $this->json(["error" => $ex->getMessage()], 500);
            }
        }
    }

    public function deleteSpecificCar($request)
    {
        if (isset($request['send'])) {
            $id = $request['id'];

            $car = new Car($this->database);

            try {
                $deleted = $car->queryDeleteCar($id);
                $this->json(["msg" => "Succesfully deleted!"], 204);
            } catch (PDOException $ex) {
                addError($ex->getMessage());
                $this->json(["error" => $ex->getMessage()], 500);
            }
        } else {
            $this->json(["error" => "Bad request"], 400);
        }
    }



    public function getCrudCarsPage()
    {
        $this->viewWithoutSlider("Pages/crudCars");
    }
}
