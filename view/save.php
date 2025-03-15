<?php
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../class/Supplier.class.php");
include("../include/conn.php");




        $es= new Supplier(
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15
        );
        $res_es=$es->createNew($es);
         echo($res_es);
      
?>

