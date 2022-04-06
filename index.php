<?php

include("includes/header.php");

 
 if(isset($_SESSION["userid"])) {

    echo '<div class="nav nav-tabs container p-5 my-5 bg-light text-dark">';
    echo '<ul class="nav nav-tabs">';
        echo '<li class="nav-item links"><a class="nav-link active text-success" data-bs-toggle="tab" href="indexx.php" style="font-size:2vmax;"><strong>DEAN JOHANNIE PHOTOGRAPHY</strong></a>';
        echo '<li class="nav-item"><a class="links" data-bs-toggle="tab" href="indexx.php">H O M E</a></li>';
        echo '<li class="nav-item"><a class="links" data-bs-toggle="tab" href="includes/logout.php">LOGOUT</a></li>';
        echo '<li class="nav-item"><a class="links" data-bs-toggle="tab" href=#>'; echo $_SESSION["username"]; echo '</a></li>';
    echo '</ul> </div>';

    include("includes/slideshow.php");
?>


<div class="container-fluid bookings slideanim">
    <br> <br>
    <h1 class="text-success"><strong>Book your Photoshoot with Dean J.</strong></h1> <br> <br>

<div class="before-qoute">
    <form method="POST" action="#qoutation">

       <label for="user">Name & Surname:</label> <br>
           <input type="text" name="name" required> <br> <br>

       <label for="email">Email:</label> <br>
           <input type="email" name="email" required>  <br> <br>

       <label for="phone">Phone Number:</label> <br>
           <input type="tel" name="phone" pattern="[0-9]{10}" required> <br> <br>

           <input type="submit" name="qoute" value="Get A Qoute"> <br> <br>
              
    </form>
</div>
</div>

<?php
} else {

    echo '<div class="nav nav-tabs container p-5 my-5 bg-light text-dark">';
        echo '<ul class="nav nav-tabs">';
        echo '<li class="nav-item"><a class="nav-link active text-success" data-bs-toggle="tab" href="indexx.php" style="font-size:2vmax;"><strong>DEAN JOHANNIE PHOTOGRAPHY</strong></a>';
        echo '<li class="nav-item"><a class="links" href="indexx.php">H O M E</a></li> </ul>';
    echo '</div>';

 include("includes/form.php");

}

$host="localhost";
$username="root";
$userpassword="";
$dbname="deanj";

// insert user data into our database
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];

  
try {
    $conn = new PDO("mysql:host=$host;dbname=deanj", $username, $userpassword);
   // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql= "INSERT INTO qoute (name, email , phone) VALUES ('$name', '$email','$phone')";
    $conn->exec($sql);
    echo '';
 }  catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
 }
}


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["qoute"])){
    
    try {
        $conn = new PDO("mysql:host=$host; dbname=deanj" ,$username, $userpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
         echo '<h3 class="text-success slideanim"><strong>Get A Qoute</strong></h3> <br> <br>';
    
         echo '<div id="qoutation" class="container slideanim">';
    
              echo '<form method="POST" action="#confirm">';

                echo '<label for="user">Name:</label> <br>';
                    echo '<input class="form-control" type="text" name="name" required> <br> <br>';

                echo '<label for="user">Phone:</label> <br>';
                    echo '<input class="form-control" type="tel" pattern="[0-9]{10}" name="phone" required> <br> <br>';
    
                echo '<label for="user">Date & Time:</label> <br>';
                    echo '<input class="form-control" type="datetime-local" name="datetime" id="date" required> <br> <br>';
    
                echo '<select class="form-control"name="slots"> <br>';
                    echo '<option value="1">1 Hour</option>';
                     echo '<option value="2">2 Hours</option>';
                    echo '<option value="3">3 Hours</option>';
                    echo '<option value="4">4 Hours</option>';
                    echo '<option value="5">5 Hours</option>';
                    echo '<option value="6">6 Hours</option>';
                    echo '<option value="day">Full day</option>';
                echo '</select> <br> <br> ';

                echo '<textarea class="form-control" rows="5" name="comment" placeholder="We would like an outdoor shoot, Will change outfits in between. We have picked a place of our own etc..."></textarea> <br> <br>';
    
                echo '<input type="submit" name="submit1" value="Qoute Me"> <br> <br>';
            echo '</form>';
    
        echo '</div>';
        echo '</div>';

      }  catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }
    }

if(isset($_POST["submit1"])){
    switch ($_POST["slots"]){
        case "1":
            echo '<div class="container confirm-booking id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$20.00</strong> <br> <br>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "2":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strongUSD$40.00</strong>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "3":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$60.00</strong>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "4":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$80.00</strong> <br> <br>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "5":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$100.00</strong>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "6":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$120.00</strong>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        case "day":
            echo '<div class="container confirm-booking" id="confirm">';
            echo 'Selected Photoshoot will cost : <br>';
            echo '<strong>USD$140.00</strong>'; 
            echo '<form method="POST" action="#confirm"><button class="btn btn-success btn-block" type="submit" name="submit2">Confirm Your Booking</button> </form> </div>';
            break;

        default :
        echo 'Invalid Selection';
    }
}

// insert user data into our database
if(isset($_POST["datetime"]) && isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["comment"]) && isset($_POST["slots"])) {
    $date=$_POST["datetime"];
    $subject=$_POST["comment"];
    $slot=$_POST["slots"];
    $name=$_POST["name"];
    $phone=$_POST["phone"];

  
try {
    $conn = new PDO("mysql:host=$host;dbname=deanj", $username, $userpassword);
   // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql= "INSERT INTO bookings (name, phone, date, subject, slot) VALUES ('$name', '$phone', '$date', '$subject','$slot')";
    $conn->exec($sql);
    echo '';
 }  catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
 }

}

  if(isset($_POST["submit2"])){
    echo '<div class="container confirm-booking" id="confirm">';
     echo ' Booking Confirmed</div>';
 }

?>

<script>$(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
  </script>
