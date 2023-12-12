<?php


include __DIR__.'/../connection.php';


// session_start();
class Register
{

    private $db;

    public function __construct()
    {

        $data= new connection();
        $this->db=$data->connection();
    }


    public function loginUser($email)
    {
      
        $stmt = $this->db->prepare("select * from  users  where email= ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return  $stmt->get_result();
    }


   
}