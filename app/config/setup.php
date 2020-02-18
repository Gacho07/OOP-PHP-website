<?php

spl_autoload_register(function ($path) {
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
    $path[0] = strtolower($path[0]);
    $path .= ".php";
    require_once $path;
});

function addError($error)
{
    @$open = fopen(ERROR_FILE, "a");
    $add = $error . "\t" . date('d-m-Y H:i:s') . "\n";
    @fwrite($open, $add);
    @fclose($open);
}

function recordAccess()
{
    @$open = fopen(LOG_FILE, "a");
    if ($open) {
        $date = date('d-m-Y H:i:s');
        @fwrite(
            $open,
            "{$_SERVER['REQUEST_URI']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n"
        );
        @fclose($open);
    }
}

function accessPagesPercentage()
{
    $array = [];

    $sum = 0;
    $home = 0;
    $login = 0;
    $register = 0;
    $models = 0;
    $model = 0;
    $carOne = 0;
    $carTwo = 0;
    $scheduleTest = 0;

    $oneDayAgo = strtotime("1 day ago");
    $base = "/Skoda/";

    @$file = file(LOG_FILE);
    if (count($file)) {
        foreach ($file as $i) {
            $parts = explode("\t", $i);
            $url = explode("&", $parts[0]);

            if (strtotime($parts[1]) >= $oneDayAgo) {
                switch ($url[0]) {
                    case "{$base}":
                        $home++;
                        $sum++;
                        break;
                    case "{$base}index.php":
                        $home++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=login":
                        $login++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=register":
                        $register++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=carModels":
                        $models++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=carModel":
                        $model++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=carOne":
                        $carOne++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=carTwo":
                        $carTwo++;
                        $sum++;
                        break;
                    case "{$base}index.php?page=scheduleTest":
                        $scheduleTest++;
                        $sum++;
                        break;
                }
            }
        }
    }

    $array['home'] = $home;
    $array['login'] = $login;
    $array['register'] = $register;
    $array['carModels'] = $models;
    $array['carModel'] = $model;
    $array['carOne'] = $carOne;
    $array['carTwo'] = $carTwo;
    $array['scheduleTest'] = $scheduleTest;

    return $array;
}
