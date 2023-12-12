<?php


class Produit
{
    private $db;

    public function __construct()
    {
        $this->db =  mysqli_connect('localhost','root','','oop');
    }

    public function allProduit()
    {
        

        $stmt = $this->db->prepare("select *from produit");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }

    
    public function createProduit($name, $prix, $quantity)
    {
      
        $stmt = $this->db->prepare("INSERT INTO produit  VALUES (null,?, ?, ?)");
        $stmt->bind_param('sii', $name, $prix, $quantity);
        $stmt->execute();
    }

    public function editProduit($id)
    {
      
        $stmt = $this->db->prepare("select * from produit where id=? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function updateProduit($name,$prix,$quantite,$id)
    {
      
        $stmt = $this->db->prepare("UPDATE produit SET name=?,prix=?,quantité=? where id=? ");
        $stmt->bind_param('siii', $name,$prix,$quantite,$id);
        $stmt->execute();
    
    }

    public function deleteProduit($id)
    {
      
        $stmt = $this->db->prepare("delete  from produit where id=? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    
    }
}