<?php
$username="root";
$password="";
$servername= "localhost";
$dbname="vertual_manager";
//create connection (servername, username, passcode, dbname)
$conn = new mysqli($servername,$username, $password, $dbname);

//check connection 
if($conn->connect_error)
die("Connection failed : ".$conn->connect_error);

?>
