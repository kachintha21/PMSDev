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
                    $sql = "INSERT into pigment_csv_tbl (
                
        IMIEBN,
        IMHABN,
        IMZACD,
        IMSHAB,
        IMHAKB,
        IMIRCD,
        IMKAMS,
        IMHASU,
        IMFUSU,
        IMHKSU,
        IMECD1,
        IMECD2,
        IMECD3,
        IMECD4,
        IMECD5,
        IMECD6,
        IMECD7,
        IMECD8,
        IMHRT1,
        IMHRT2,
        IMHRT3,
        IMHRT4,
        IMHRT5,
        IMHRT6,
        IMHRT7,
        IMHRT8,
        IMBNM1,
        IMBNM2,
        IMTHR1,
        IMTHR2,
        IMPEG1,
        IMPEG2,
        IMPHR1,
        IMPHR2,
        IMUDAT
  
                    ) 
                            values (
                                                    '".$getData[0]."',	
                    '".$getData[1]."',	
                    '".$getData[2]."',	
                    '".$getData[3]."',	
                    '".$getData[4]."',	
                    '".$getData[5]."',	
                    '".$getData[6]."',	
                    '".$getData[7]."',	
                    '".$getData[8]."',	
                    '".$getData[9]."',	
                    '".$getData[10]."',	
                    '".$getData[11]."',	
                    '".$getData[12]."',	
                    '".$getData[13]."',	
                    '".$getData[14]."',	
                    '".$getData[15]."',	
                    '".$getData[16]."',	
                    '".$getData[17]."',	
                    '".$getData[18]."',	
                    '".$getData[19]."',	
                    '".$getData[20]."',	
                    '".$getData[21]."',	
                    '".$getData[22]."',	
                    '".$getData[23]."',	
                    '".$getData[24]."',	
                    '".$getData[25]."',	
                    '".$getData[26]."',	
                    '".$getData[27]."',	
                    '".$getData[28]."',	
                    '".$getData[29]."',	
                    '".$getData[30]."',	
                    '".$getData[31]."',	
                    '".$getData[32]."',	
                    '".$getData[33]."',	
                    '".$getData[34]."'	
                    	

	

                                
                                
                                )";
                    $result = mysqli_query($conn, $sql);
                }
            }
            if($bug > 0){
                          
                header("location:pigment_csv_upload_view.php");
              
              
    exit();
              
            }

            fclose($file);
        }
    }


?>