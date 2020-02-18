<?php

namespace App\Controllers;



class AdminStatisticsController extends HeadController
{
    public function getStatisticsPage()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']->idRole === '2') {
            $this->viewWithoutSlider("Pages/adminHome", $this->data);
        } else {
            $this->viewWithoutSlider("Errors/403");
        }
    }

    public function loadStatistics()
    {
        $pages = accessPagesPercentage();

        $dataPoints = array(
            array("label" => "Home", "y" => $pages['home']),
            array("label" => "Login", "y" => $pages['login']),
            array("label" => "Register", "y" => $pages['register']),
            array("label" => "Car Models", "y" => $pages['carModels']),
            array("label" => "Car Model", "y" => $pages['carModel']),
            array("label" => "Car One", "y" => $pages['carOne']),
            array("label" => "Car Two", "y" => $pages['carTwo']),
            array("label" => "Schedule Test", "y" => $pages['scheduleTest'])
        );
        $this->json($dataPoints);
    }
}
