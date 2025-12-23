<?php

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register() {
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
                $error = "Օգտանունը պետք է լինի առնվազն 3 նիշ և միայն լատինատառ:";
            }
            elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)) {
                $error = "Գաղտնաբառը պետք է լինի մինիմում 6 նիշ, պարունակի մեծատառ, թիվ և հատուկ նշան (@#$%^&*):";
            } 
            else {
                if ($this->userModel->register($username, $password)) {
                    header("Location: index.php?action=login");
                    exit;
                } else {
                    $error = "Այս օգտանունը արդեն զբաղված է:";
                }
            }
        }
        require 'views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
            } else {
                $error = "Սխալ օգտանուն կամ գաղտնաբառ:";
                require 'views/login.php';
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}