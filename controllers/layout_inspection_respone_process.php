<?php
session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/conn.php");
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$error = "";
$is_admin = 0;

$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_POST) > 0) {

    // if errors
    if ($error != "") {
        echo $error;
    } else {
        $session_pattern_no = $_SESSION['session_pattern_no'];
        $pro_no_lit=$_POST['pro_no_lit'];
        $lot_no_lit=$_POST['lot_no_lit'];
        $ref=$pro_no_lit."-".$lot_no_lit;
        

        //$rest = $pl->getPreparingLayoutByLotNo($_POST['pro_no_lit'], $_POST['lot_no_lit'], $session_pattern_no);
        
         echo("<a href='../view/decal_printing_pcc.php?id=$ref'>View</a>");
        
        ?>                        





                 












        <?php
    }
} else {
    echo(false);
}
?>