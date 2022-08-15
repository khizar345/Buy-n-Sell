<?php    session_start()  ?>
<!--the actual login page that the user interacts with, the header is almost identical to index page-->
<head lang="en">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable = no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <section class="header" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(images/loginbanner.png);"> <!--a different background image-->
            <div class="navbar">
                <a href="index.php"><img src="images/logo.png"></a> <!--self developed logo-->
                <nav>
                    <ul>
                        <a href="#footer" style="color: white"><li>About</li></a>
                        <a href="contact.php" style="color: white"><li>Contact Us</li></a>
                        <a href="#" style="color: white"><li>Business Portal</li></a>
                    </ul>  
                </nav>
                   <a href="cart.php"> <img src="images/cart.png" style= "width: 50px; height: 50px;"></a>
                <h6><small>* Not a member? <br><a href="signup.php">Sign up</a> here...</small></h6> <!--sign up link-->     
            </div>
             <h1>Log In</h1><br>         
            <div class="input-group" style="padding-bottom: 25px; padding-top:25px;"><!--this is where user inputs data, action is taken in the login script-->               
                <form action="includes/login.inc.php" class="form-control" method="post">
                    <p><input type="text" name="uid" placeholder=" Username or Email"></p>
                    <p><input type="password" name="pwd" placeholder=" Password"></p>
                    <button type="submit" name="submit" class="input-group-text btn">Log In</button>
                </form>
            </div>
            <?php
                //error handler if no inout is provided
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p><em>Please fill in all the fields!</em></p>";
                    }
                    //or invalid credentials
                    else if ($_GET["error"] == "invalidlogin"){
                        echo "<p><em>Incorrect log-in credentials. Please try again!</em></p>";
                    }
                }
            ?>      
        </section> 
</body>
<div id='footer'>
<?php
    include_once 'footer.php';
?>
</div>