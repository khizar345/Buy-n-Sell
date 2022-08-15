<?php
    session_start()
?>
<!--the actual sign up page with which the user interacts, the header is almost identical to index page-->
<head lang="en">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable = no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16">
</head>

<body>
    <section class="header" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(images/banner2.png);"> <!--a different background image-->
            <div class="navbar">
                <a href="index.php"><img src="images/logo.png"></a> <!--self developed logo-->
                
                <nav>
                    <ul>
                        <a href="#footer" style="color: white"><li>About</li></a>
                        <a href="contact.php" style="color: white"><li>Contact Us</li></a>
                        <a href="login.php" style="color: white"><li>Log in</li></a>
                        <a href="#" style="color: white"><li>Business Portal</li></a>
                    </ul>
                    
                </nav>
                   <a href="cart.php"> <img src="images/cart.png" style= "width: 50px; height: 50px;"></a>
      
            </div>
            <h1>Sign Up</h1><br>          
            <div class="input-group" style="padding-bottom: 10px; padding-top:25px;"> <!--this is where user inputs data, action is taken in the signup script-->
                <form action="includes/signup.inc.php" class="form-control" method="post">
                    <p><input type="text" name="name" placeholder=" Full Name"></p>
                    <p><input type="text" name="email" placeholder=" Email"></p>
                    <p><input type="text" name="uid" placeholder=" Username"></p>
                    <p><input type="password" name="pwd" placeholder=" Password"></p>
                    <p><input type="password" name="pwdrepeat" placeholder=" Repeat Password"></p>
                    <button type="submit" class="input-group-text btn" name="submit">Sign Up</button>
                </form>
            </div>
        
            <?php
                // what the user will be shown upon ommiting errors or successfully signing up
                if(isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p><em>Please fill in all the fields!</em></p>";
                    }
                    else if ($_GET["error"] == "invaliduid"){
                        echo "<p><em>Please choose a proper username!</em></p>";
                    }
                    else if ($_GET["error"] == "invalidemail"){
                        echo "<p><em>Please choose a proper email!</em></p>";
                    }
                    else if ($_GET["error"] == "passworderror"){
                        echo "<p><em>Passwords do not match!</em></p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p><em>Oh! Something went wrong. Please try again.</em></p>";
                    }
                    else if ($_GET["error"] == "usernametaken"){
                        echo "<p><em>Username is already taken. Please try something else!</em></p>";
                    }
                    else if ($_GET["error"] == "none"){
                        echo "<p><em>Hello there! You have signed up.<br>Kindly login with your credentials.</em></p>";
                    }
                }

            ?>
        
        </section> 
    
</body>

<!--the footer inherited-->
<div id='footer'>
    <?php
        include_once 'footer.php';
    ?>
</div>