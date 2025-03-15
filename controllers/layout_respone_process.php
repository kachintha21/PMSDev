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
                                                           
                ?>                        
                                                                

                                                                <div class="container"  style="width:100%" >
                    <div class="row clearfix">
                   <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="tab_logic">

                        <thead>
                        <tr>
                            <th class="text-center" width="5%"> #</th>
                            <th class="text-center" width="15%"> Decol Pattern </th>
                            <th class="text-center" width="20%">Curve No</th>
                            <th class="text-center" width="15%"> Plan PCS</th>
                            <th class="text-center" width="20%"> Pcs per Sheet</th>
                            <th class="text-center" width="20%"> Actual</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       					
				             		?>
                        <tr id='addr0'>
                            <td>1</td>
                            <td>
                          
                                <input type="number" name='qty[]' id='qty[]' placeholder='Decol Pattern' class="form-control qty"
                                       step="0" min="0"/>
                            </td>
                      
                            
                            
                           <td><input type="text" name='name[]' id='name[]' placeholder='Curve No'  type="text"  class="form-control name" /></td>
                            
                           <td><input type="number" name='qty[]' id='qty[]' placeholder='Plan PCS' class="form-control qty"
                                       step="0" min="0"/></td>
                                       
                                       
                                       
                           <td><input type="number" name='price[]' id="" placeholder='Pcs per Sheet'
                                       class="form-control price" />
                            </td>
                            <td><input type="number" name='total[]' placeholder='0.00' class="form-control"
                                       /></td>
                        </tr>
                        <tr id='addr1'></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <button id="add_row" type="button" class="btn btn-default pull-left">Add Row</button>
                    <button id='delete_row' type="button" class="pull-right btn btn-default">Delete Row</button>
                </div>
            </div>
              

  
          





 
                   <?php
                                                            
                     

               
	     }		
		}
		else{
			echo(false);
			}



?>