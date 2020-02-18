<?php
session_start();
# Config
require_once "app/config/config.php";
require_once "app/config/setup.php";

# Controllers

use App\Controllers\AdminStatisticsController;
use App\Controllers\HomeController;
use App\Controllers\CarModelsController;
use App\Controllers\CarModelController;
use App\Controllers\CarOneController;
use App\Controllers\CarTwoController;
use App\Controllers\CrudCarsController;
use App\Controllers\InsertCarController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\ScheduleTestController;

$carModelsController = new CarModelsController();
$carModelController = new CarModelController();
$carOneController = new CarOneController();
$carTwoController = new CarTwoController();
$registerController = new RegisterController();
$loginController = new LoginController();
$scheduleTestController = new ScheduleTestController();
$crudCarsController = new CrudCarsController();
$insertCarController = new InsertCarController();
$adminStatisticsController = new AdminStatisticsController();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "carModels":
            $carModelsController->getCarModelsPage();
            break;
        case "carModel":
            $carModelController->getCarModelPage($_GET);
            break;
        case "carOne":
            $carOneController->getCarOnePage();
            break;
        case "carTwo":
            $carTwoController->getCarTwoPage();
            break;
        case "register":
            $registerController->getRegisterPage();
            break;
        case "login":
            $loginController->login($_POST);
            break;
        case "logout":
            $loginController->logout();
            break;
        case "crudCars":
            $crudCarsController->getCrudCarsPage();
            break;
        case "scheduleTest":
            $scheduleTestController->getScheduleTestPage();
            $scheduleTestController->mailer();
            break;
        case "adminHome":
            $adminStatisticsController->getStatisticsPage();
            break;
        case "updateCar":
            $crudCarsController->updateSpecificCar($_POST);
            break;
        case "addCars":
            $insertCarController->getInsertPage();
            break;
        case "insertCar":
            $insertCarController->insertCar($_POST);
            break;
    }
} elseif (isset($_GET['ajax'])) {
    switch ($_GET['ajax']) {
        case "ajaxCarModels":
            $carModelsController->loadCarModels();
            break;
        case "ajaxRegister":
            $registerController->loadRegister($_POST);
        case "ajaxSortFilter":
            $sortModelsController->loadSortedFilteredModels($_POST);
            break;
        case "ajaxLoadCars":
            $crudCarsController->loadCrudCars();
            break;
        case "ajaxLoadStatistics":
            $adminStatisticsController->loadStatistics();
            break;
        case "ajaxUpdateCars":
            $crudCarsController->getCarForUpdate($_POST);
            break;
        case "ajaxDeleteCars":
            $crudCarsController->deleteSpecificCar($_POST);
            break;
    }
} else {
    $homeController = new HomeController();
    $homeController->getHomePage();
}
