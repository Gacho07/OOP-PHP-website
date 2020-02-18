<?php

namespace App\Controllers;

use App\Models\ModelBodyworkCar;

class CarTwoController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarTwoPage ()
    {
        if (isset($_GET['idBodyworkModel'])) {
            $bodyworkCarModel = new ModelBodyworkCar($this->database);

            try {
                $bodywork = $bodyworkCarModel->queryGetModelBodyworkImage($_GET['idBodyworkModel']);

                $characteristic = $bodywork->description;
                $definedElement = explode(", ", $characteristic);

                $this->data['bodywork'] = $bodywork;
                $this->data['description'] = $definedElement;
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
            }

            $this->viewWithoutSlider("Pages/carTwo", $this->data);
        } else {
            $this->viewWithoutSlider("Errors/404");
        }
    }
}
