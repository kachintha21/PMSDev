<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/conn.php");


$error = "";
$is_admin=0;

$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
   if(count($_POST) > 0){
           
		// if errors
		if($error != ""){
		   echo $error;
             }
                 else{
                     $query = "SELECT * FROM tickets_tbl Where tickets_ref_no_tt='".$_POST['tickets_no_tat']."'";
                     
                     if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                             
                ?>                         
                                                                    <div class="col-sm-2">
                                                                     <input   type="text" class="form-control"  name="pro_id_psfo"  id="pro_id_psfo" value="<?php echo($row["depart_tt"]);?>"  required code-mask>
                                                                 </div>
                        
                                                                  <div class="col-sm-2">
                                                                     <input   type="text" class="form-control"   value="<?php echo($row["subject_tt"]);?>"   required code-mask>
                                                                  </div>
                                                                    <div class="col-sm-2">                                                
                                                                     <input   type="text" class="form-control"   value="<?php echo($row["description_tt"]);?>"   required code-mask>
                                                                     <label><a title="More" href="tickets_view.php?id=<?php echo($_POST['tickets_no_tat']);?>" target="new">More</a></label>                                                            
                                                                  </div>
 
                   <?php
                                                             }
                     }

               
	     }		
		}
		else{
			echo(false);
			}



?>