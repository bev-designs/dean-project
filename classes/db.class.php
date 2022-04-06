<?php

class Db {

private $host="localhost";
private $username="root";
private $userpassword="";
private $dbname="deanj";

   //method to connect to database 
   //protected so that method can be accessed within child classes

protected function connect(){

    try {

    $conn=new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname,$this->username, $this->userpassword);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

    }catch(PDOException $e) {

        echo "Connection failed: " . $e->getMessage();
        die();
    }
}

} 