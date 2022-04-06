<?php
if(isset($_POST["login"])){

    //getting user data
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    //instatiating signupControl Class
    include("../classes/db.class.php");
    include("../classes/login.class.php");
    include("../classes/login-cntrl.class.php");

    $login = new LoginCntrl($username,$password);
    //Running error handelers & user signup
    $login->loginUser();

    //going to back front page
    header("location: ../index.php?error=none");
    
}