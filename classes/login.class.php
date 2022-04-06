<?php

class Login extends Db {

    protected function getUser($username,$password){
        $stmnt = $this->connect()->prepare("SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;");
 
        if(!$stmnt->execute(array($username,$password))){
            $stmnt = null;
            header("location: ../index.php?error=stmntfailed");
            exit();
        }

        //check if any results were returned from the database 
       
        if($stmnt->rowCount() == 0) {
            $stmnt = null;
            header("location: ../index.php?error=user-not-found");
            exit();
        }

        $pwdHashed = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password,$pwdHashed[0]["user_password"]);

        if($checkPassword == false) {
            $stmnt = null;
            header("location: ../index.php?error=wrong-password");
            exit();

        } elseif($checkPassword == true) {
            $stmnt = $this->connect()->prepare("SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?;");

            if(!$stmnt->execute(array($username,$username,$password))){
                $stmnt = null;
                header("location: ../index.php?error=stmntfailed");
                exit();
            }

            if($stmnt->rowCount() == 0) {
                $stmnt = null;
                header("location: ../index.php?error=user-not-found");
                exit();
            }

            $user = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["user_name"];

            $stmnt = null;
        }
    }

}