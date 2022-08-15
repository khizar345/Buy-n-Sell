<?php
// this is where all the functions for creating a user and loging them in are defined

//two conditions for providing or not providing credentials upon signup
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    //an algorithm to see if the characters are in this range
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//check if email provided is in the right format
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//check if two passwords in sign up form match
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//check if user exists
function uidExists($conn, $username, $email){
    //either a username or email
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    //initializing a new prepared statement
    //prevents user from changing database in any sort of way 
    $stmt = mysqli_stmt_init($conn);
    //check if prepared statment will fail or succeed when the sql statement is run in the database
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    //if not failed, pass in data from the user
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    //^what is being submitted^
    //the the statment is executed with the statement passed in
    mysqli_stmt_execute($stmt);
    //grab the data if exists in database
    $resultData = mysqli_stmt_get_result($stmt);
    //check if there is a particular result
    if($row = mysqli_fetch_assoc($resultData)){
        //grab the data with the username if it exists i.e. if true then login the user
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    //close the prepared statement
    mysqli_stmt_close($stmt);
}
//create a new user
function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    //hash password to make it more secure
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
//if no input is provided
function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//login a user
function loginUser($conn, $username, $pwd){
    //check if the typed in user exists in the database
    //this function was previously defined taking in either email or username
     $uidExists = uidExists($conn, $username, $username);
    //when this returns it will automatically fit in to one of the two inputs asked in the function previously
     if($uidExists === false){
        header("location: ../login.php?error=invalidlogin");
        exit();
    }
    //compare hashed password with the password provided by the user that is also hashed when inputed 
    $pwd_prvd = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwd_prvd);
    //check password
    if ($checkPwd === false){
        header("location: ../login.php?error=invalidlogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.user.php");
        exit();
    }
}