<?php


class Connection
{
    // private $data;

    public function connection()
    {
      return mysqli_connect('localhost','root','','oop');
    }

}
// $data= new connection();

// var_dump($data->connection());