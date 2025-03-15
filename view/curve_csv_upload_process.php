<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "nlpl";

   $conn = mysqli_connect($servername, $username, $password, $db);

    if(isset($_POST["Import"])){

        $filename=$_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            $bug = 0;
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $bug++ ;
                if($getData[0] !=''){
                    $sql = "INSERT into curve_master_tbl (
                
        fg_design_no_cmt,
        curve_no_cmt,
        decal_design_no_cmt,
        curve_area_cmt
 
  
                    ) 
                            values (
                    '".$getData[0]."',	
                    '".$getData[1]."',	
                    '".$getData[2]."',	
                    '".$getData[3]."'	
                   
                    	

	

                                
                                
                                )";
                    $result = mysqli_query($conn, $sql);
                }
            }
            if($bug > 0){
                
              header("location:../csv/run.php");
              header("location:curve_view.php");
    exit();
              
            }

            fclose($file);
        }
    }


?>