<?php
$insert = false;

if(isset($_POST['name'])){
    
$server = "localhost";
$username = "root";
$password = "";
$db = "contact";

$con = mysqli_connect($server, $username, $password, $db);

if(!$con){
    die("Connection failed due to ".mysqli_connect_error());
}
//echo "Connection successful!";

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `contact_form` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;

if($con -> query($sql) == true){
    //echo "Successfully Entered Data!";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

}
?>