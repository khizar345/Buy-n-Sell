<?php
//occur when submit
if(isset($_POST["submit"])){
    //the different inputs submitted via post function
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';
    //error handlers
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=passworderror");
        exit();
    }
    
    if(uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    //if everything goes well with no errors a user is created, i.e. placed in the database
    createUser($conn, $name, $email, $username, $pwd);
}

else{
    //redirects user to signup page upon success
    header("location: ../signup.php");
} 