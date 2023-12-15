<?php



namespace app\controller;

include __DIR__.'/../../vendor/autoload.php';

use app\model\Produit;

session_start();
class ProduitController
{

    private $model;

    public function __construct()
    {
        $this->model = new Produit();
    }


    public function all()
    {
        return  $this->model->allProduit();
    }

    public function create($name, $prix, $quantite)
    {
        // extract($_POST);

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
            $this->model->createProduit($name, $prix, $quantite);
            header("location:../../oop/views/produit/index.php");
            exit();
        } else {
            header("location:../../oop/views/produit/add.php");
            exit();
        }
    }

    public function delete($id)
    {
        $this->model->deleteProduit($id);
        // header("location:../../oop/views/produit/index.php");
        // exit();
    }


    public function edit($id) {
        return  $this->model->editProduit($id);
    }

    public function update($name, $prix, $quantite,$id)
    {
        // extract($_POST);

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
            $this->model->updateProduit($name, $prix, $quantite,$id);
            header("location:../../oop/views/produit/index.php");
            exit();
        } else {
            header("location:../../oop/views/produit/edit.php");
            exit();
        }
    }
}

$controller = new ProduitController();



if (isset($_POST['add'])) {
    extract($_POST);
    $controller->create($name, $prix, $quantite);
}



if (isset($_POST['delete'])) {
    extract($_POST);
    $controller->delete($id);
}


if (isset($_POST['update'])) {
    extract($_POST);
    $controller->update($name, $prix, $quantite,$id);
}