<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db.php");



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

        //echo($_POST['design_pt'].$_POST['curve_pt']);




        echo("<div style='padding: 10px' class='datagrid'>
          <table class='table table-striped table-bordered table-hover table-checkable order-column' id='product_dataTable'>
              <thead>
              

              <tr>
              <th>No</th>
              <th>Design No</th>                 
               <th>Lot No</th>
              <th>Pro No</th>
                    <th>Print date</th>
              <th>Curve No</th>
   
              </tr>
              </thead>
              <tbody>");
			  
			
			  
			  
			   $query = "
			   select * from (select * from (  SELECT COUNT(lot_no_pcdt) As T,design_pcdt,lot_no_pcdt,first_color_print_pcdt, curves_pcdt,qty_pcdt,pro_no_pcdt           
                FROM past_curves_details_tbl WHERE  design_pcdt='" . $_POST['design_pt'] . "'  AND  (curves_pcdt='" . $_POST['curve01'] . "'  OR  curves_pcdt='" . $_POST['curve02']. "'  OR   
				curves_pcdt='" . $_POST['curve03']. "'   OR  curves_pcdt='" . $_POST['curve04']. "'   OR  curves_pcdt='" . $_POST['curve05']. "'   OR  curves_pcdt='" . $_POST['curve06']. "'    OR  
				curves_pcdt='" . $_POST['curve07']. "'    OR  curves_pcdt='" . $_POST['curve08']. "'    OR  curves_pcdt='" . $_POST['curve09']. "'   OR  curves_pcdt='" . $_POST['curve10']. "'              
                ) group by lot_no_pcdt)aa
				
				 union ALL select * from (SELECT COUNT(`id`) As T,`desing_no_lpt`,`lot_no_lpt`,`org_date_lpt`,`curve_no_lpt`,`no_of_curves_lpt`,`pro_no_lpt` FROM `layout_plans_tbl` where `desing_no_lpt`='" . $_POST['design_pt'] . "'
				 AND  (curve_no_lpt='" . $_POST['curve01'] . "'  OR  curve_no_lpt='" . $_POST['curve02']. "'  OR   
				curve_no_lpt='" . $_POST['curve03']. "'   OR  curve_no_lpt='" . $_POST['curve04']. "'   OR  curve_no_lpt='" . $_POST['curve05']. "'   OR  curve_no_lpt='" . $_POST['curve06']. "'    OR  
				curve_no_lpt='" . $_POST['curve07']. "'    OR  curve_no_lpt='" . $_POST['curve08']. "'    OR  curve_no_lpt='" . $_POST['curve09']. "'   OR  curve_no_lpt='" . $_POST['curve10']. "') group by lot_no_lpt)bb
				 ) dd order by dd.T desc
				";
			  
			  
			

        
        
        
        
        
     
        $result = $conn->query($query);
        $rowcount = mysqli_num_rows($result);


        $counter = 0;
        if ($rowcount > 0) {
            while ($ma = $result->fetch_assoc()) {
                $counter++;
                ?>


                <tr class="odd gradeX" ng-repeat="row in searchList">                        
                    <td><?php echo($counter); ?></td>
                    <td><?php echo($ma['design_pcdt']); ?></td>
                    <td><?php echo($ma['lot_no_pcdt']); ?></td>
                    <td><?php echo($ma['pro_no_pcdt']); ?></td>
					<td><?php echo($ma['first_color_print_pcdt']); ?></td>
                    <td><?php 
                    
        
             
                    
                     $sql = "SELECT curves_pcdt,qty_pcdt FROM past_curves_details_tbl WHERE  design_pcdt='" . $ma['design_pcdt'] . "' AND lot_no_pcdt='".$ma['lot_no_pcdt']."'  
					 AND pro_no_pcdt='".$ma['pro_no_pcdt']."'  ";
					 
					 $res = $conn->query($sql);
					 
                    
                    
                         
        $rowcount = mysqli_num_rows($res);
        
          while ($man =  $res->fetch_assoc()) {
              if($_POST['curve01']==$man['curves_pcdt']  ||
                   $_POST['curve02']==$man['curves_pcdt'] ||
                   $_POST['curve03']==$man['curves_pcdt'] ||
                        $_POST['curve04']==$man['curves_pcdt'] ||
                        $_POST['curve05']==$man['curves_pcdt'] ||
                        $_POST['curve06']==$man['curves_pcdt'] ||
                        $_POST['curve07']==$man['curves_pcdt'] ||
                        $_POST['curve08']==$man['curves_pcdt'] ||
                        $_POST['curve09']==$man['curves_pcdt'] ||
                        $_POST['curve10']==$man['curves_pcdt'] ||
                        $_POST['curve11']==$man['curves_pcdt'] ||
                        $_POST['curve12']==$man['curves_pcdt'] ||
                        $_POST['curve13']==$man['curves_pcdt'] ||
                        $_POST['curve14']==$man['curves_pcdt'] ||
                       $_POST['curve15']==$man['curves_pcdt'] 
                      
                      
                      
                      ){
               echo("<p style='background-color: yellow;'><b>".$man['curves_pcdt']."-".$man['qty_pcdt']." <b><br> </p>");
              
              }
              else{
                    echo($man['curves_pcdt']."-".$man['qty_pcdt']."<br>"); 
                  
              }
              
              
              
          
          }
		  
		  
		  $rowcount_temp = mysqli_num_rows($res);
					 if($rowcount_temp == '0'){
						 
						 $sql = "SELECT `curve_no_lpt`,`no_of_curves_lpt` FROM layout_plans_tbl WHERE  desing_no_lpt='" . $ma['design_pcdt'] . "' AND lot_no_lpt='".$ma['lot_no_pcdt']."'  
					 AND pro_no_lpt='".$ma['pro_no_pcdt']."'  ";
					 
					
					 $res = $conn->query($sql);
						 
			
          while ($man =  $res->fetch_assoc()) {
              if($_POST['curve01']==$man['curve_no_lpt']  ||
                   $_POST['curve02']==$man['curve_no_lpt'] ||
                   $_POST['curve03']==$man['curve_no_lpt'] ||
                        $_POST['curve04']==$man['curve_no_lpt'] ||
                        $_POST['curve05']==$man['curve_no_lpt'] ||
                        $_POST['curve06']==$man['curve_no_lpt'] ||
                        $_POST['curve07']==$man['curve_no_lpt'] ||
                        $_POST['curve08']==$man['curve_no_lpt'] ||
                        $_POST['curve09']==$man['curve_no_lpt'] ||
                        $_POST['curve10']==$man['curve_no_lpt'] ||
                        $_POST['curve11']==$man['curve_no_lpt'] ||
                        $_POST['curve12']==$man['curve_no_lpt'] ||
                        $_POST['curve13']==$man['curve_no_lpt'] ||
                        $_POST['curve14']==$man['curve_no_lpt'] ||
                       $_POST['curve15']==$man['curve_no_lpt'] 
                      
                      
                      
                      ){
               echo("<p style='background-color: yellow;'><b>".$man['curve_no_lpt']."-".$man['no_of_curves_lpt']." <b><br> </p>");
              
              }
              else{
                    echo($man['curve_no_lpt']."-".$man['no_of_curves_lpt']."<br>"); 
                  
              }
              
              
              
          
          }
             }        
                    ?></td>

        

                </tr>

                        <?php
                    }
                }
            }
        } else {
            echo(false);
        }
        ?>