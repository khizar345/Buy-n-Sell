<?php
    include_once('includes/contact.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head lang="en">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable = no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16">
</head>

    <body>
        <img class="bg" src="images/contactbanner.png"> 
        <div class="navbar" style="padding-top:30px;">
                <a href="index.php"><img src="images/logo.png" style= "width: 200px; height: 150px;"></a>  <!--self developed logo-->
                
                <nav>
                    <ul>
                        <a href="#footer" style="color: white"><li>About</li></a>
                        <a href="login.php" style="color: white"><li>Log in</li></a>
                        <a href="#" style="color: white"><li>Business Portal</li></a>
                    </ul>
                    
                </nav>
                   <a href="cart.php"> <img src="images/cart.png" style= "width: 50px; height: 50px;"></a><br />
                <h6><small>* Not a member? <br><a href="signup.php">Sign up</a> here...</small></h6> <!--sign up link-->
            </div>
            <div class="container">
                
                <h3 style="text-align:center;">Kindly Fill Out The Following Form To Send Us A Message:</h3>
                <p>Thank-You!</p>
                <?php
                if($insert == true){
                echo "<p class='submitMSG'>Thank You For Submitting Your Query! We Will Get Back To You Shortly.</p>";
                }
                ?>
                <form action="contact.php" method="post">
                    <input type="text" name="name" id="name" placeholder="Please Enter Your Name:">
                    <input type="text" name="age" id="age" placeholder="Please Enter Your Age:">
                    <input type="text" name="gender" id="gender" placeholder="Please Enter Your Gender:">
                    <input type="email" name="email" id="email" placeholder="Please Enter Your Email:">
                    <input type="phone" name="phone" id="phone" placeholder="Please Enter Your Phone#:">
                    <textarea name="desc" id="desc" cols="30" rows="7" placeholder="Enter other information here!"></textarea>
                    <button type="submit" class="input-group-text btn" name="submit">Submit!</button>
                </form><br>
            </div>
        <div id="footer"> <!--this is for the about us link, when pressed the user is scrolled down to the footer smoothly and they are shown the location and contact options-->
        <?php //a seperate footer file is imported here and the rest of the webpages code
            include_once 'footer.php';
        ?>
        </div>
        
    </body>

</html>