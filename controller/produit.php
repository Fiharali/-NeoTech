<?php


include  __DIR__ . '/../model/produit.php';
class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel('localhost','root','','oop');
    }



    public function all() {
        return  $this->model->allProduit();
        
       
    }
}