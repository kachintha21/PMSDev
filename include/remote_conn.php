<?php
error_reporting(E_PARSE|E_WARNING|E_ERROR);

//$servername = "10.0.0.12";
//$username = "printing";
//$password = "nlpl1234";
//$dbname = "packing_system";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//  }
  
  
 

$servername = "10.0.0.12";
$username = "printing";
$password = "nlpl1234";
$dbname = "packing_system";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  



?>
