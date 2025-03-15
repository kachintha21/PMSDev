<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nlpl";
// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
 if ($conn->connect_error) {
	 //print(123123);exit;
    die("Connection failed: " . $conn->connect_error);
  }
  else{
	  //print(3333);exit;
	  
	  
  }
?>