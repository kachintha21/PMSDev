<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "nlpl";

    $conn = mysqli_connect($servername, $username, $password, $db);
    $sql01 = mysqli_query($conn,"TRUNCATE TABLE pigment_model_tbl");
    $sql02 = mysqli_query($conn,"TRUNCATE TABLE pigment_master_tbl");              
    $sql03 = mysqli_query($conn,"TRUNCATE TABLE colours_tbl");  
    $sql04 = mysqli_query($conn,"TRUNCATE TABLE oil_data_tbl");   
    $sql05 = mysqli_query($conn,"TRUNCATE TABLE pigment_csv_tbl"); 
   
     header("location:pigment_csv_upload_view.php");
     
 

?>