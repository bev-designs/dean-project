<div class="row my-form">
    <div class="main col-xs-5">
    <form method="post" action="includes/login.php">
        <h4>Log In to your Account</h4>

        <input type=text name="username" placeholder="Username / Email:"> <br>
        <input type=password name="password" placeholder="Password:"> <br> <br>

        <button type=submit name=login class="btn">Log In</button>  <br> <br> <br>

    </form>
    </div>

    <div class="main col-xs-5">
    <form method="POST" action="includes/signup.php">
        <h4>Do not have an Account? Sign Up Here.</h4>

        <input type=text name="username" placeholder="Username" value=""> <br>
        <input type=text name="email" placeholder="Email"> <br>
        <input type=password name="password" placeholder="Password"> <br>
        <input type=password name="pwdRepeat" placeholder="Confirm Password"> <br> <br> 

        <button type=submit name=signup class="btn">Sign Up</button>  <br> <br> <br>


    </form>
    </div>

</div>
