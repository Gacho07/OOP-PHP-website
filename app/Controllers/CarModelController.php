<?php

namespace App\Controllers;

use App\Models\ModelBodyworkCar;
use App\Models\Car;

class CarModelController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarModelPage($request)
    {
        if (isset($request['idModel'])) {
            $idModel = $request['idModel'];

            $oneImageModel = new ModelBodyworkCar($this->database);
            try {
                $oneImage = $oneImageModel->queryGetOneModelImage($idModel);
                $this->data['image'] = $oneImage;
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
            }
           
            $bodyworkModel = new ModelBodyworkCar($this->database);
            try {
                $bodywork = $bodyworkModel->queryGetModelBodyworkImage($idModel);
                $this->data['bodywork'] = $bodywork;
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
            }

            $modelBodyworkCarModel = new Car($this->database);
            try {
                $modelBodyworkCar = $modelBodyworkCarModel->queryGetModelBodyworkCar($idModel);
                $this->data['modelBodyworkCar'] = $modelBodyworkCar;
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
                addError("1");
            }
                                             
            $this->viewWithoutSlider("Pages/carModel", $this->data);
        } else {
            $this->viewWithoutSlider("Error/404");
        }
       
    }
}
