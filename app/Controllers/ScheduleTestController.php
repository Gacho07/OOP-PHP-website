<?php

namespace App\Controllers;

use App\Models\Car;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ScheduleTestController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getScheduleTestPage()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']->idRole === '1') {
            $carModel = new Car($this->database);

            try {
                $car = $carModel->queryGetAllCars();
                $this->data['car'] = $car;
                $this->viewWithoutSlider("Pages/scheduleTest", $this->data);
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
            }
        } else {
            $this->viewWithoutSlider("Errors/404");
        }
    }

    public function mailer()
    {
        require 'app/assets/vendor/PHPMailer/src/PHPMailer.php';
        require 'app/assets/vendor/PHPMailer/src/SMTP.php';
        require 'app/assets/vendor/PHPMailer/src/Exception.php';

        try {
            # create an instance of PHPMailer
            $mail = new PHPMailer(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug = 0;
            # enable SMTP
            $mail->isSMTP();
            # set a host
            $mail->Host = "smtp.gmail.com";
            # set authentication to true
            $mail->SMTPAuth = true;
            # set login details for Gmail account
            $mail->Username = "auditorne.php@gmail.com";
            $mail->Password = "Sifra123";
            # set type of protection
            $mail->SMTPSecure = 'tls';
            # set a port
            $mail->Port = 587;
            # set who is sending email
            $mail->setFrom("auditorne.php@gmail.com", "Proba");
            # set where we are sending email
            $mail->addAddress("marko.gacanovic.38.17@ict.edu.rs", "Marko Gacanovic");
            $mail->isHTML(true);
            # set subject
            $mail->Subject = "Testing";
            # set body
            $mail->Body = "We will contact You for date of testing.";

            # send an email
            $mail->send();
        } catch (Exception $ex) {
            addError($ex->getMessage());
        }
    }
}
