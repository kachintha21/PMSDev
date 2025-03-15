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

        $rest = $pl->getPreparingLayoutByLotNo($_POST['pro_no_fot'], $_POST['lot_fot'], $session_pattern_no);
        ?>                        








        <div class="container"  style="width:100%" >




            <div class="row clearfix">


                <div class="form-group form-group">
                    <label class="control-label col-sm-2"># of Sheets<span style="color: crimson;"> *</span></label>
                    <div class="col-sm-2">


                        <input  type="number" class="form-control" name="pattern_no_plt" id="pattern_no_plt"  value="<?php
        echo($rest[14]);
        ?>" />

                    </div>    



                </div>




                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="tab_logic">

                        <thead>
                            <tr>
                                <th class="text-center" width="5%"> #</th>

                                <th class="text-center" width="20%">Lot No</th>
                                <th class="text-center" width="20%">Curve No</th>
                                <th class="text-center" width="15%">PCS Per sheet</th>



                            </tr>
                        </thead>
                        <tbody>



                            <?php
                            //echo($session_pattern_no.$_POST['pro_no_ct']);
                            $query = "SELECT * FROM planning_details_tbl WHERE pro_no_pdt='" . $_POST['pro_no_fot'] . "'  AND pattern_no_pdt='" . $session_pattern_no . "'   ";

                            if ($result = $conn->query($query)) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>  



                                    <tr id='addr0'>
                                        <td>1</td>


                                        <td><input type="text"     value="<?php echo($_POST['lot_fot']); ?>"   name='lot_no_fodt[]' id='lot_no_fodt[]' placeholder='Curve No'  type="text"  class="form-control name" /></td>

                                        <td><input type="text"     value="<?php echo($row["curve_no_pdt"]); ?>"   name='curve_no_fodt[]' id='curve_no_fodt[]' placeholder='Curve No'  type="text"  class="form-control name" /></td>

                                        <td><input type="number" name='per_sheet_fodt[]' id='per_sheet_fodt[]' placeholder='Plan PCS'  value="<?php echo($row["pcs_per_sheet_pdt"]); ?>"  class="form-control qty"
                                                   step="0" min="0"/></td>





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