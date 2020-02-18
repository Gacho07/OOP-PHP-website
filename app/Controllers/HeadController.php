<?php

namespace App\Controllers;

use App\Models\DB;
use App\Models\Menu;

class HeadController {
    protected $data = null;
    protected $database;

    public function __construct()
    {
        $this->database = new DB(SERVER, DBNAME, USERNAME, PASSWORD);
    }

    protected function view($fileName, $data = null)
    {
        include "app/Views/Fixed/head.php";
        include "app/Views/Fixed/navigation.php";
        include "app/Views/Fixed/slider.php";
        include "app/Views/{$fileName}.php";
        include "app/Views/Fixed/footer.php";
    }

    protected function viewWithoutSlider($fileName, $data = null) {
        include "app/Views/Fixed/head.php";
        include "app/Views/Fixed/navigation.php";
        include "app/Views/{$fileName}.php";
        include "app/Views/Fixed/footer.php";
    }

    protected function redirect($page)
    {
        header("Location: " . $page);
    }

    protected function json($data = null, $statusCode = 200) {
        header("Contet-Type: application/json");
        echo json_encode($data);
        http_response_code($statusCode);
    }
}