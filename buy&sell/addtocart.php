<?php


$insert = false;

if(isset($_POST['add_to_cart'])){
    

$name = $_POST['name'];
$price = $_POST['price'];
include_once('includes/products.inc.php');
//cart table
$sql = "INSERT INTO `cart` (`name`, `price`) VALUES ('$name', '$price');";
//echo $sql;

if($conn -> query($sql) == true){
    //echo "Successfully Entered Data!";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $conn->error";
}
 
 }

?>
 
