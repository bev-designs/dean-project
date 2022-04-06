<?php

class SignupCntrl extends Signup {

    //properties
    private $username;
    private $email;
    private $password;
    private $pwdRepeat;

    //method to
    public function __construct($username,$email,$password,$pwdRepeat){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->pwdRepeat = $pwdRepeat;

    }
    public function signUpUser() {
        if($this->emptyData() == false) {
            //echo "Empty Input";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this-> invalidName() == false) {
            //echo "Invalid Username";
            header("location: ../index.php?error=username");
            exit();
        }

        if($this-> validEmail() == false) {
            //echo "Invalid Email Address";
            header("location: ../index.php?error=email");
            exit();
        }

        if($this-> passwordMatch() == false) {
            //echo "Password does not Match";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if($this-> checkValues() == false) {
           // echo "User/Email Already Exists";
            header("location: ../index.php?error=userexists");
            exit();
        }

        $this->setUser($this->username,$this->email,$this->password);
    }
   //Running error handelers & user signup

   private function emptyData() {
    
    if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->pwdRepeat)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

   private function invalidName(){
    
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $this->username)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

   private function validEmail(){
    
    if(!filter_var($this->email , FILTER_VALIDATE_EMAIL)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

   private function passwordMatch(){
    
    if($this->password !== $this->pwdRepeat){
        $result = false;
    }else{
        $result = true;
    }
    return $result;        
}

private function checkValues(){
    
    if(!$this->checkData($this->username, $this->email)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;         
}

}
