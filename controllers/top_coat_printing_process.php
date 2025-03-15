<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PrintingStatus.class.php");
include("../model/TopCoatPrinting.class.php");

$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sm = new TopCoatPrinting(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

        $INDEX=($_POST['judgment_tcpt']=="OK" ) ? '1' : '2';
		if($_POST['judgment_tcpt']=="OK" ){
			$INDEX =1;
			
			
		}
		else{
			
			$INDEX =0;
			
		}
       
       $res = $sm->createNewTopCoatPrinting(
            $_POST['id'],
            $_POST['pro_no_tcpt'],
            $_POST['pattern_no_tcpt'],
            $_POST['lot_no_tcpt'],
            $_POST['screen_mesh_tcpt'],
            $_POST['colours_index_tcpt'],
            $_POST['machine_no_tcpt'],
            $_POST['judgment_tcpt'],
            0,
            $_POST['item01_tcpt'],
            $_POST['item02_tcpt'],
            $_POST['item03_tcpt'],
            $_POST['item04_tcpt'],
            $_POST['item05_tcpt'],
            $_POST['org_name_tcpt'],        
            getServerDate(), getServerTime()
        );



  
               //$upadte=$ps->updatePrintingStatusById($_POST['pro_no_tcpt'],$_POST['pattern_no_tcpt'],$_POST['colours_index_tcpt'],4);   
               
               
                  $upadte=$ps->updatePrintingStatusBymultiple($_POST['pro_no_tcpt'],$_POST['pattern_no_tcpt'],$INDEX,6);
                    echo("1");
                
                
        
        
        
    }
} else {
    echo(false);
}
?>