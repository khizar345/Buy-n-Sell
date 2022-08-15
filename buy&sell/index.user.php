<!--Starting a php session-->
<?php
    session_start()
?>

<html lang="en">
    <head>
        <!--Links to bootstrap and external css stylesheet-->
        <title>Buy&Sell.com</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"> <!--this bootstrap was imported for different logos but unfotunetely did not work-->
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable = no"> <!--resizable screen for different aspect ratio to make website responsive-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
         <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16"><!--tab icon-->
    </head>
    <body>
       <section class="header">
            <div class="navbar">
                <img src="images/logo.png"> <!--self developed logo-->
                
                <nav>
                    <ul>
                        <a href="#footer" style="color: white"><li>About</li></a>
                        <a href="contact.php" style="color: white"><li>Contact Us</li></a>
                    </ul>
                    
                </nav>
                   <a href="cart.php"> <img src="images/cart.png" style= "width: 50px; height: 50px;"></a>
                <?php
                if(isset($_SESSION["useruid"])){
                    echo "<h6>Hi! " . $_SESSION["useruid"] . " </h6>";
                    echo "<h6><a href='includes/logout.inc.php'>Log out</a></h6>";
                    }    
                ?>
            </div>   
           
            <h1>Hassle Free Shopping!</h1>
            <h2>  </h2>
           <form>
            <div class="input-group"><!--bootstrap class-->
                <input type="text" name="ValueToSearch" class="form-control" placeholder="Search for a product..."> <!--input box-->
                <div class="input-group-append">
                    <input type="submit" name ="search" class="input-group-text btn" value="GO!"><!--submit button-->
                </div>
            </div>
            </form>
        </section>     

        <section class="offers"><!--subsequent section after the header for different offers-->
            <h1>Best Selling Categories</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"><!--bootstrap columns-->
                        <div class="offer-box">
                            <div class = "offer-img">
                                <img src="images/2.png"><!--offer image--> <!--the same goes for other offers-->
                            </div>
                            <div class="offer-details">
                                <h4>Breakfast</h4>
                                <p>Online shopping for Grocery & Gourmet Food from a great selection of Cereals, Breakfast & Cereal Bars, Pancake, Waffle & Baking and much much more! Forgot to bring milk the night before? There is no need worry anymore because you can easily place an order for any size of milk and have it delivered right at your doorstep before you leave for work.</p>
                                <a href="#" style="color:white"><div>
                                    <i class="fa"><strong>Shop Now!</strong></i> <!--fa is the class in the bootsrap for fancy logos, but this did not seem to work-->
                                </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="offer-box">
                            <div class = "offer-img">
                                <img src="images/1.png">
                            </div>
                            <div class="offer-details">
                                <h4>Cleaning</h4>
                                <p>We supply best quality cleaning chemicals, cleaning equipments and advanced cleaning robots for home and offices cleaning. Our inventory of cleaning products can give you a wide range of options to choose the right product suitable for the job! Moreover, you can have the product delivered to you at right at your doorstep.</p>
                                <a href="#" style="color:white"><div>
                                    <i class="fa"><strong>Shop Now!</strong></i>
                                </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="offer-box">
                            <div class = "offer-img">
                                <img src="images/3.png">
                            </div>
                            <div class="offer-details">
                                <h4>Snacks</h4>
                                <p>Do you get from breakfast to lunch and lunch to dinner without anything on something? Is it hard for you to get snacks because of a busy work schedule? Snacks are the best solution for mid-day hunger. Whether you do not have time to cook, or want to save money, or simply have a hanger: Browse through a wide range of snacks.</p>
                                <a href="#" style="color:white"><div>
                                    <i class="fa"><strong>Shop Now!</strong></i>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
                            
            </div>
        </section>
        
        
        <div id="footer"> <!--this is for the about us link, when pressed the user is scrolled down to the footer smoothly and they are shown the location and contact options-->
        <?php //a seperate footer file is imported here and the rest of the webpages code
            include_once 'footer.php';
        ?>
        </div>
        
    </body>
</html>