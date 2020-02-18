<?php

namespace App\Controllers;

use App\Models\Car;

class CarOneController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarOnePage()
    {
        if (isset($_GET['idModelBodywork'])) {
            $modelBodyworkCarModel = new Car($this->database);

            try {
                $modelBodyworkCar = $modelBodyworkCarModel->queryGetModelBodyworkCar($_GET['idModelBodywork']);

                $characteristic = $modelBodyworkCar->description;
                $definedElement = explode(", ", $characteristic);

                $this->data['modelBodyworkCar'] = $modelBodyworkCar;
                $this->data['description'] = $definedElement;
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
            }

            $this->viewWithoutSlider("Pages/carOne", $this->data);
        } else {
            $this->viewWithoutSlider("Errors/404");
        }
    }
}
