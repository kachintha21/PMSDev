<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$con = mysqli_connect($server, $username, $password, $db);
$sql = mysqli_query($con, "INSERT INTO  oil_data_tbl(pattern_no_odt,colours_code_odt,colours_name_odt,item01_odt,item02_odt,item03_odt,item04_odt,oil_name_odt,oil_qty_odt)
                                                   
                                     select * from
                                   ( select IMIEBN,IMHABN,CCCC,IMIRCD,IMZACD,IMPEG1,IMPEG2,IMBNM1,IMTHR1  from pigment_csv_tbl 
                                       union all                                 
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMZACD,IMPEG1,IMPEG2,IMBNM2,IMBNM2  from pigment_csv_tbl ) AAA
                                      ") or die("sql3");
?>
 
