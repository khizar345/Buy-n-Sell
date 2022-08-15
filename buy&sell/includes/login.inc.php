<?php
// the script is similar to sign up however here it is checked if the user exists in the database
if(isset($_POST["submit"])){
    
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';
    //error handler
if(emptyInputLogin($username, $pwd) !== false){
    header("location: ../login.php?error=emptyinput");
    exit();
    }
    //otherwise user logged in
    loginUser($conn, $username, $pwd);
}
//redirected to login page if the user accesses this page incorrectly
else{
    header("location: ../login.php");
    exit();
} 