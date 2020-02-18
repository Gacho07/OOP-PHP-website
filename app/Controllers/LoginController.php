<?php

namespace App\Controllers;

use App\Models\User;

class LoginController extends HeadController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($request)
    {
        if (isset($request['btnLogin'])) {
            $email = $request['tbEmail'];
            $password = $request['tbPassword'];

            $rePassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^!+=*-_.@]).{8,32}$/";

            $errors = [];

            if (!preg_match($rePassword, $password)) {
                $errors[] = "Check again your password!";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Check again your email!";
            }

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            } else {
                $user = new User($this->database);

                try {
                    $loggedUser = $user->queryLoginUser($email, $password);
                } catch (\PDOException $ex) {
                    addError($ex->getMessage());
                }

                if ($loggedUser) {
                    $_SESSION['user'] = $loggedUser;

                    if ($loggedUser->idRole === '2') {
                        $this->redirect("index.php?page=adminHome");
                    } else {
                        $this->redirect("index.php?page=carModels");
                    }
                } else {
                    $_SESSION['errors'] = ["Error! Wrong email or password"];
                }
            }
        }
        $this->viewWithoutSlider("Pages/login");
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirect("index.php");
    }
}
