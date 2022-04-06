<?php

class LoginCntrl extends Login {

    private $username;
    private $password;


    public function __construct($username,$password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser() {

        if($this->emptyData() == false) {
            //echo "Enter Username";
            header("location: ../index.php?error=empty-input");
            exit();
        }

        $this->getUser($this->username,$this->password);
    }

    //Running error handelers & user signup
   private function emptyData() {
    
    if(empty($this->username) || empty($this->password)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

}
