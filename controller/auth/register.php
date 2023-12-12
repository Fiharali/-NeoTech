<?php



include  __DIR__ . '/../../model/auth/register.php';

// session_start();
class RegisterController
{

    private $user;

    public function __construct()
    {
        $this->user = new Register();
    }

    public function check($email)
    {
        return  $this->user->CheckUser($email);
    }
    public function add($name, $email, $password,$confirm_password)
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

        if ($password!=$confirm_password) {
            $_SESSION['confirm_password'] = "password doesn't match";
        }else{
            $_SESSION['confirm_password'] = "";
            
        }

        $check = $this->check($email);

        if ($check->num_rows > 0) {
            $_SESSION['email'] = "email exist ";
        } 


        if (empty($_SESSION['name']) &&  empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['confirm_password'])) {

            $password = password_hash($password, PASSWORD_DEFAULT);
            $check = $this->check($email);
            $this->user->createUser($name, $email, $password);
            header("location:../../views/produit/index.php");
            exit();
        } else {
            header("location:../../views/auth/register.php");
            exit();
        }
    }
}

$registerController = new RegisterController();
if (isset($_POST['register'])) {
    extract($_POST);
    $registerController->add($name, $email, $password,$confirm_password);
}