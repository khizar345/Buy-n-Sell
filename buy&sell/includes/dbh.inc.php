<?php    
//database for the login system where user credentials are stored
//Connecting to database
$serverName = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbName = "loginsystem";   

//Create a connection
$conn = mysqli_connect($serverName, $serverUsername, $serverPassword, $dbName);

//Die if connection was not successful
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}
