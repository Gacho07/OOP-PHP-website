<?php

namespace App\Controllers;

class HomeController extends HeadController {
    public function getHomePage() {
        $this->view("Pages/home");
    }
}