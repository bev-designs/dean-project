<?php

class Signup extends Db {

    protected function setUser($username,$email,$password){
        $stmnt = $this->connect()->prepare("INSERT INTO users (user_name,user_email,user_password) VALUES (?, ?, ?);");
 
        //hash password before inserting it 
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            if(!$stmnt->execute(array($username,$email,$hashedPwd))){
              $stmnt = null;
            header("location: ../index.php?error = stmntfailed");
            exit();
        }
        $stmnt = null;
    }

    protected function checkData($username,$email) {
        $sql = "SELECT user_name FROM users WHERE user_name = ? OR user_password = ?";
        $stmnt = $this->connect()->prepare($sql);

        //if the statement fails, will use null not to run the rest of the code
        if(!$stmnt->execute(array($username,$email))){
            $stmnt = null;

        // header function will then send the user back to the front page with an error msg
            header("location: ../index.php?error = stmntfailed");
        //exit the script
            exit();
        }

        //check if any results were returned from the database 
       
        if($stmnt->rowCount() > 0) {
            $checkResults = false;
        }else{
            $checkResults = true;
        }
        return  $checkResults;
    }


    }

