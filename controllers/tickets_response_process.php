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
                                                                

                           <div class="form-group form-group-sm">
                            <label class="control-label col-sm-2">PC Control Number<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="pc_number_tt" id="pc_number_tt"  value="<?php echo($row["pc_number_tt"]);?>" />                            
                            </div>

                         
                            <label class="control-label col-sm-2">Department<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="depart_tt" id="depart_tt"  value="<?php echo($row["depart_tt"]);?>" />                            
                            </div>
                            
                            
                             <label class="control-label col-sm-2">Subject<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="subject_tt" id="subject_tt"  value="<?php echo($row["subject_tt"]);?>" />                            
                            </div>
                         </div>


                          <div class="form-group form-group-sm">
                            <label class="control-label col-sm-2">Request Date<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="pc_number_tt" id="pc_number_tt"  value="<?php echo($row["request_date_tt"]);?>" />                            
                            </div>

                         
                            <label class="control-label col-sm-2">Request Person<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="depart_tt" id="depart_tt"  value="<?php echo($row["org_name_tt"]);?>" />                            
                            </div>
                            
                            
                         </div>


  
                        <div class="form-group form-group-sm">                                                  
                              <label class="control-label col-sm-2">Description<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-5">
                                <textarea  rows="5"  cols="40" name="description_tt" id="description_tt"><?php echo($row["description_tt"]);?></textarea>
                                             
                           </div>
                            
                         </div>

                         <?php
                                                        $query = "SELECT * FROM tickets_approved_tbl WHERE tickets_no_tat='".$_POST['tickets_no_tat']."' ";
                                                          
                                                          ?> 
   <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($rowa = $result->fetch_assoc()) {
                                                            
                                                            ?>

                          <div class="form-group form-group-sm">
                            <label class="control-label col-sm-2">Approved Date
<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="pc_number_tt" id="pc_number_tt"  value="<?php echo($rowa["assign_date_tat"]);?>" />                            
                            </div>

                         
                            <label class="control-label col-sm-2">Assign Person<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="depart_tt" id="depart_tt"  value="<?php echo($rowa["assign_name_tat"]);?>" />                            
                            </div>
                           
                         </div>

                <?php
                                                            }}
                
                ?>





 
                   <?php
                                                             }
                     }

               
	     }		
		}
		else{
			echo(false);
			}



?>