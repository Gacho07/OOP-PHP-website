<?php

namespace App\Controllers;

use App\Models\User;

class RegisterController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadRegister($request)
    {
        if (isset($request['send'])) {
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $email = $request['email'];
            $password = $request['password'];

            $registerModel = new User($this->database);

            try {
                $register = $registerModel->queryRegisterUser($first_name, $last_name, $email, $password, 1);
                $this->json($register);
            } catch (\PDOException $ex) {
                addError($ex->getMessage());
                $this->json(["error" => $ex->getMessage()], 500);
            }
        } else {
            $this->json(["error" => "Bad request"], 400);
        }
    }

    public function getRegisterPage()
    {
        $this->viewWithoutSlider("Pages/register");
    }
}
