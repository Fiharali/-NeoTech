<?php

session_start();

include  __DIR__ . '/../../model/auth/login.php';


class RegisterController
{

    private $user;

    public function __construct()
    {
        $this->user = new Register();
    }

    public function login($email, $password)
    {

        if (empty($email)) {
            $_SESSION['email'] = "email is required";
        } else {
            $_SESSION['email'] = "";
        }

        if (empty($password)) {
            $_SESSION['password'] = "password is required";
        } else {
            $_SESSION['password'] = "";
        }

        if (empty($_SESSION['email']) &&  empty($_SESSION['password'])) {
            $check =  $this->user->loginUser($email);
            if ($check->num_rows > 0) {
                $user = $check->fetch_assoc();
                if (password_verify($password, $user["password"])) {
                    header("location:../../views/produit/index.php");
                } else {
                    $_SESSION['password'] = "password is incorrect";
                    header("location:../../views/auth/login.php");
                }
            } else {
                $_SESSION['email'] = "email  doesn't exist ";
            header("location:../../views/auth/login.php");

            }
        } else {
            header("location:../../views/auth/login.php");
            exit();
        }
    }
   
}

$registerController = new RegisterController();
if (isset($_POST['login'])) {
    extract($_POST);
    $registerController->login($email, $password);
}