<?php



include  __DIR__ . '/../model/user.php';

// session_start();
class AuthController
{

    

    public function Register($name, $email, $password, $confirm_password)
    {
        // return  $this->check($email);

        if (empty($name)) {
            $_SESSION['name'] = "Name is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['name'] = "Name must be at least 3 characters";
        } else {
            $_SESSION['name'] = "";
        }


        if (empty($email)) {
            $_SESSION['email'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email'] = "email must be valid";
        } else {
            $_SESSION['email'] = "";
        }

        if (empty($password)) {
            $_SESSION['password'] = "password is required";
        } elseif (strlen($password) < 7) {
            $_SESSION['password'] = "password  must be >= 8";
        } else {
            $_SESSION['password'] = "";
        }

        if ($password != $confirm_password) {
            $_SESSION['confirm_password'] = "password doesn't match";
        } else {
            $_SESSION['confirm_password'] = "";
        }
        $checkUser = new User(null, $email, null);
        $check = $checkUser->CheckUser();
        if ($check->num_rows > 0) {
            $_SESSION['email'] = "email exist ";
        }


        if (empty($_SESSION['name']) &&  empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['confirm_password'])) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $checkUser = new User($name, $email, $password);
            $checkUser->createUser();
            header("location:../views/produit/index.php");
            exit();
        } else {
            header("location:../views/auth/register.php");
            exit();
        }
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
            $checkUser = new User(null, $email, $password);
            $check = $checkUser->CheckUser();
            if ($check->num_rows > 0) {
                $user = $check->fetch_assoc();
                if (password_verify($password, $user["password"])) {
                    header("location:../views/produit/index.php");
                } else {
                    $_SESSION['password'] = "password is incorrect";
                    header("location:../../views/auth/login.php");
                }
            } else {
                $_SESSION['email'] = "email  doesn't exist ";
                header("location:../views/auth/login.php");
            }
        } else {
            header("location:../views/auth/login.php");
            exit();
        }
    }
}





if (isset($_POST['register'])) {
    extract($_POST);
    $registerController = new AuthController();
    $registerController->Register($name, $email, $password, $confirm_password);
}

if (isset($_POST['login'])) {
    extract($_POST);
    $registerController = new AuthController();
    $registerController->login($email,  $password);
}