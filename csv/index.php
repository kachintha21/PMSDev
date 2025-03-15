<?php
 error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$con = mysqli_connect($server, $username, $password, $db);
$sql = mysqli_query($con, "INSERT INTO  colours_tbl(pattern_no_ct,colours_code_ct,colours_name_ct,item01_ct,item02_ct,item03_ct,item04_ct,pigment_name_ct,qty_ct)
                                                   
                                     select * from
                                   ( select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD1,IMHRT1   from pigment_csv_tbl 
                                    union all 
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD2,IMHRT2  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD3,IMHRT3  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD4,IMHRT4  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD5,IMHRT5  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD6,IMHRT6  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD7,IMHRT7  from pigment_csv_tbl
                                    union all
                                    select IMIEBN ,IMHABN,CCCC,IMIRCD,IMFUSU,IMKAMS,IMZACD,IMECD8,IMHRT8  from pigment_csv_tbl ) AAA
                                      ") or die("sql3");
?>
 
