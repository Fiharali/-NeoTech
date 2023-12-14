<?php

namespace app\model;
class Connection
{
    // private $data;

    public static  function connection()
    {
      return mysqli_connect('localhost','root','','oop');
    }

}
// $data= new connection();

// var_dump($data->connection());