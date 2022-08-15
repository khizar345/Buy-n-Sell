<?php
include_once('addtocart.php');

if(isset($_POST['search'])){
    $ValueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM `all_products` WHERE CONCAT(`img`, `name`, `price`) LIKE '%".$ValueToSearch."%'";
    $search_result = filterTable($query);
}
else{
    $query = "SELECT * FROM all_products";
    $search_result = filterTable($query);
}

function filterTable($query){
    //Create a connection
    $conn = mysqli_connect("localhost", "root", "", "products");
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}
    
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
       <section class="header" style="height:auto;width:auto;">
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
            <!--    <h6><small>* Not a member? <br><a href="signup.php">Sign up</a> here...</small></h6>sign up link-->
                
            </div>
           <h4 style="text-align:center;">Search Results:</h4>
           <?php
                if($insert == true){
                echo "<p class='submitMSG'>The Product Has Been Added To Your Cart!</p>";
                }
            ?>
           <div style="overflow-x:auto;">
           <table align = "center" style="width:1800px; line-height:80px; margin:auto; margin-top:60px; color: white; border-color:white; text-align: center;">
                <?php
                    while($rows = mysqli_fetch_array($search_result)){
                 ?>       
                        <tr style="font-size:20px">
                            <td><?php echo '<img src="data:image;base64,'.base64_encode($rows['img']).'" alt="Image" style="height:auto; width:auto; padding:20px">';?></td>
                            <td><?php echo $rows['name']?></td>
                            <td><?php echo $rows['price']?></td>
                            <form action="" method="post">
                                <td><input type="submit" name="add_to_cart" value="Add to Cart" style="background:transparent; color:white; border:none;"></td>
                                <input type="hidden"  name="name" value="<?php echo $rows['name']?>">
                                <input type="hidden"  name="price" value="<?php echo $rows['price']?>">
                            </form>
                        </tr>
                 <?php
                    }
                 ?>
            </table>
           </div>
        </section>   
        <div id="footer"> <!--this is for the about us link, when pressed the user is scrolled down to the footer smoothly and they are shown the location and contact options-->
        <?php //a seperate footer file is imported here and the rest of the webpages code
            include_once 'footer.php';
        ?>
        </div>
    </body>
    
</html>