<?php



include  __DIR__ . '/../model/produit.php';

session_start();
class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }


    public function all()
    {
        return  $this->model->allProduit();
    }

    public function create($name, $prix, $quantity)
    {
        return  $this->model->createProduit($name, $prix, $quantity);
    }
}

$controller = new UserController();



if (isset($_POST['add'])) {


    extract($_POST);

    // echo $name.$prix.$quantite;


    if (empty($name)) {
        $_SESSION['name'] = "Name is required";
    } elseif (strlen($name) < 3) {
        $_SESSION['name'] = "Name must be at least 3 characters";
    } else {
        $_SESSION['name'] = "";
    }


    if (empty($quantite)) {
        $_SESSION['quantite'] = "quantite is required";
    } elseif (!filter_var($quantite, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['quantite'] = "quantite must be number";
    } else {
        $_SESSION['quantite'] = "";
    }

    if (empty($prix)) {
        $_SESSION['prix'] = "prix is required";
    } elseif (!filter_var($prix, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['prix'] = "prix must be number";
    } else {
        $_SESSION['prix'] = "";
    }


    if (empty($_SESSION['name']) &&  empty($_SESSION['quantite']) && empty($_SESSION['prix'])) {
         $controller->create($name, $prix, $quantite);
        header("location:../../oop/views/produit/index.php");
        exit();
    }else{
        header("location:../../oop/views/produit/add.php");
        exit();
    }
}

// echo $_SESSION['name'];