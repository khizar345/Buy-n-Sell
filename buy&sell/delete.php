<?php
    
    require_once("includes/products.inc.php");
        
    if(isset($_GET['del'])){
        
        $rows['id'] = $_GET['del'];
        $query = "DELETE FROM cart WHERE id = '".$rows['id']."'";
        $result = mysqli_query($conn, $query);
        
        if($result){
            header("location:cart.php");
        }
        else{
            echo "Deletion falied!";
        }
    }
    else{
        header("location:cart.php");
    }
?>