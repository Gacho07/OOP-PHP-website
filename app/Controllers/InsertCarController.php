<?php

namespace App\Controllers;

use App\Models\Bodywork;
use App\Models\Model_Car;
use App\Models\Car;

class InsertCarController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getInsertPage()
    {
        $bodyworkDDModel = new Bodywork($this->database);
        $carModel = new Model_Car($this->database);

        try {
            $bodyworkDD = $bodyworkDDModel->queryGetBodywork();
            $model = $carModel->queryGetModelCar();

            $this->data['bodyworks'] = $bodyworkDD;
            $this->data['models'] = $model;
        } catch (\PDOException $ex) {
            addError($ex->getMessage());
        }

        $this->viewWithoutSlider("Pages/addCar", $this->data);
    }

    public function insertCar($request)
    {
        if (isset($request['insertButton'])) {
            $bodyworks = $request['ddlBodywork'];
            $models = $request['ddlModels'];
            $carName = $request['insertName'];
            $description = $request['insertDescription'];
            $price = $request['insertPrice'];

            $image = $_FILES['carImage'];
            $fileName = $image['name'];
            $tmpName = $image['tmp_name'];
            $fileSize = $image['size'];
            $fileType = $image['type'];

            $uploadMini = "app/assets/images/Mini-Models/" . time() . "MINI" . $fileName;
            $uploadNew = "app/assets/images/Mini-Models/" . time() . "NEW" . $fileName;
            $uploadMini2 = "app/assets/images/Mini-Models/" . time() . "MINI" . $fileName;
            $uploadNew2 = "app/assets/images/Mini-Models/" . time() . "NEW" . $fileName;

            $errors = [];

            if ($bodyworks == "0") {
                $errors[] = "Choose bodywork!";
            }
            if ($models == "0") {
                $errors[] = "Choose model!";
            }
            if ($carName == "") {
                $errors[] = "Name is mandatory!";
            }
            if ($description == "") {
                $errors[] = "Description is mandatory!";
            }
            if ($price == "") {
                $errors[] = "Price is mandatory!";
            }
            if ($fileName == "") {
                $errors[] = "Image is mandatory!";
            }

            if (count($errors) != 0) {
                foreach ($errors as $err) {
                    echo "<script>alert('$err')</script>";
                }
            } else {
                list($width, $height) = getimagesize($tmpName);
                $x = 150;
                $y = 100;

                // Creating new image from file
                if ($fileType == "image/jpeg") {
                    $existingImage = imagecreatefromjpeg($tmpName);
                } elseif ($fileType == "image/gif") {
                    $existingImage = imagecreatefromgif($tmpName);
                } elseif ($fileType == "image/png") {
                    $existingImage = imagecreatefrompng($tmpName);
                }
                $newHeight = $y;
                $newWidth = $width * $y / $height;

                // Creating new image in color
                $emptyImage = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($emptyImage, $existingImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                $white = imagecolorallocate($emptyImage, 255, 255, 255);
                imagefill($emptyImage, 0, 0, $white);

                $newImage = $emptyImage;

                // Saving
                $compression = 75;
                if ($fileType == "image/jpeg") {
                    imagejpeg($newImage, $uploadMini, $compression);
                } elseif ($fileType == "image/gif") {
                    imagegif($newImage, $uploadMini);
                } elseif ($fileType == "image/png") {
                    imagepng($newImage, $uploadMini);
                }

                // New image
                list($width2, $height2) = getimagesize($tmpName);

                // Creating new image from file
                if ($fileType == "image/jpeg") {
                    $existingImage2 = imagecreatefromjpeg($tmpName);
                } elseif ($fileType == "image/gif") {
                    $existingImage2 = imagecreatefromgif($tmpName);
                } elseif ($fileType == "image/png") {
                    $existingImage2 = imagecreatefrompng($tmpName);
                }
                $newHeight2 = 200;
                $newWidth2 = $width2 * $newHeight2 / $height2;

                // Creating new image in color
                $emptyImage2 = imagecreatetruecolor($newWidth2, $newHeight2);
                imagecopyresampled($emptyImage2, $existingImage2, 0, 0, 0, 0, $newWidth2, $newHeight2, $width2, $height2);
                $white = imagecolorallocate($emptyImage2, 255, 255, 255);
                imagefill($emptyImage2, 0, 0, $white);

                $newImage2 = $emptyImage2;

                // Saving
                $compression = 75;
                if ($fileType == "image/jpeg") {
                    imagejpeg($newImage2, $uploadNew, $compression);
                } elseif ($fileType == "image/gif") {
                    imagegif($newImage2, $uploadNew);
                } elseif ($fileType == "image/png") {
                    imagepng($newImage2, $uploadNew);
                }

               
                try {
                    $insertCar = new Car($this->database);

                    $idMBC = $insertCar->getLargestId();
                    $largestID = $idMBC->idMBC;

                    $idImage = $insertCar->getLargestIdImage();
                    $largestIDImage = $idImage->idImage;

                    $insert = $insertCar->queryInsertCar($carName, $description, $price, $largestID);
                    $insert2 = $insertCar->queryInsertCar2($bodyworks, $models, $largestIDImage);
                    $insert3 = $insertCar->queryInsertCar3($uploadMini2, $uploadNew2);
                } catch (\PDOException $ex) {
                    addError($ex->getMessage());
                }
            }
        }
    }
}
