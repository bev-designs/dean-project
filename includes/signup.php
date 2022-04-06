<?php

if(isset($_POST["signup"])){

    //getting user data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];

     //instatiating signupControl Class
    // include("autoloader.php");
    include("../classes/db.class.php");
    include("../classes/signup.class.php");
    include("../classes/signup-cntrl.class.php");

     $signup = new SignupCntrl($username,$email,$password,$pwdRepeat);

    //Running error handelers & user signup
    $signup->signUpUser();

    //going to back front page
    header("location: ../index.php?error=none");
    
}