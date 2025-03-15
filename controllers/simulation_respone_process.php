<?php
session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/conn.php");
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
include("../model/SavedLayoutplans.class.php");
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sm = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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
        //$session_pattern_no = $_SESSION['session_pattern_no'];

        $rest = $sm->getSavedLayoutplansByLotNo($_POST['lot_no_plt']);
        ?>                        








        <div class="container"  style="width:100%" >




            <div class="row clearfix">


                <div class="form-group form-group">
                    <label class="control-label col-sm-2"># of Sheets
                        
                  
                        <span style="color: crimson;"> *</span></label>
                    <div class="col-sm-2">


                        <input  type="number" class="form-control" name="pattern_no_plt" id="pattern_no_plt"  value="<?php
        echo($rest[7]);
        ?>" />

                    </div>    



                </div>




                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="tab_logic">

                        <thead>
                            <tr>
                                <th class="text-center" width="5%"> #</th>
                                                                    <th class="text-center" width="15%">   Desing </th>
                                                                    <th class="text-center" width="20%"> Curve No</th>
                                                                    <th class="text-center" width="15%"> planned_qty</th>
                                                                    <th class="text-center" width="20%"> no_of_curves</th>
                                                                    <th class="text-center" width="20%">no_of_sheets</th>
                                                                      <th class="text-center" width="20%"> close_curve_after </th>
                                                                      
                                                                         <th class="text-center" width="20%">  total_sheets_needed </th>


                            </tr>
                        </thead>
                        <tbody>



                            <?php
                            //echo($session_pattern_no.$_POST['pro_no_ct']);
 
                                                       $query = "SELECT * FROM saved_layout_plans_tbl WHERE layout='" .$_POST['lot_no_plt']. "'    ";

                            if ($result = $conn->query($query)) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>  



                                    <tr id='addr0'>
                                        <td>1</td>


                                  <td>

                                                                        <input type="text" name='decol_pattern_no_pdt[]'  value="<?php echo($row["design"]);?>"  id='decol_pattern_no_pdt[]' placeholder='Decol Pattern' class="form-control qty"
                                                                               step="0" min="0"/>
                                                                    </td>

                                                                    <td><input type="text" name='curve_no_pdt[]' id='curve_no_pdt[]'  value="<?php echo($row["curve_no"]);?>" placeholder='Curve No'  type="text"  class="form-control name" /></td>

                                                                    <td><input type="number" name='plan_pcs_pdt[]' id='plan_pcs_pdt[]' value="<?php echo($row["planned_qty"]);?>" placeholder='Plan PCS' class="form-control qty"
                                                                               step="0" min="0"/></td>



                                                                    <td><input type="number" name='pcs_per_sheet_pdt[]' id="pcs_per_sheet_pdt[]" value="<?php echo($row["no_of_curves"]);?>"  placeholder='Pcs per Sheet'
                                                                               class="form-control price" />
                                                                    </td>
                                                                    <td><input type="number" name='actual_pdt[]' id="actual_pdt[]"  value="<?php echo($row["no_of_sheets"]);?>" placeholder='0.00' class="form-control"
                                                                               /></td>
                                                                                      <td><input type="number" name='actual_pdt[]' id="actual_pdt[]"  value="<?php echo($row["close_curve_after"]);?>" placeholder='0.00' class="form-control"
                                                                               /></td>
                                                                                      
                                                                                           <td><input type="number" name='actual_pdt[]' id="actual_pdt[]"  value="<?php echo($row["total_sheets_needed"]);?>" placeholder='0.00' class="form-control"
                                                                               /></td>




                                    </tr>

                <?php
            }
        }
        ?>

                            <tr id='addr1'></tr>
                        </tbody>
                    </table>
                </div>
            </div>










        <?php
    }
} else {
    echo(false);
}
?>