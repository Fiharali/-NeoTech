<?php


include __DIR__.'/connection.php';


session_start();
class User
{

    private $db;
    private $name;
    private $email;
    private $password;

    public function __construct($name,$email,$password)
    {
        $this->db=Connection::connection();
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }
    public function CheckUser()
    {
      
        $stmt = $this->db->prepare("select * from  users  where email= ? ");
        $stmt->bind_param('s', $this->email);
        $stmt->execute();
        return  $stmt->get_result();
    }

    public function createUser()
    {
        $stmt = $this->db->prepare("INSERT INTO users  VALUES (null,?, ?, ?)");
        $stmt->bind_param('sss', $this->name, $this->email, $this->password);
        $stmt->execute();
    }
    
}