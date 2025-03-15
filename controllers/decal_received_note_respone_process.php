<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../model/DInspection.class.php");
$di = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

        $id = $_POST['ref_no_drn'];
        ?>                        

        <table style="width:100%">
            <tr>
                 <td class="font_1"  width="40%"><strong><b> No <b></strong></td> 
                <td class="font_1"  width="40%"><strong><b>Decal No <b></strong></td>       
                                <td class="font_1"  width="40%"><strong><b>Curve No<b></strong></td><td class="font_1"><strong><b>Lot No <b></strong></td><td class="font_1"><strong><b>Quantity<b></strong></td><td class="font_1"><strong><b>IS BS<b></strong></td></tr>

                                                                                <?php
                                                                                $query = "SELECT * FROM dinspection_tbl WHERE item02_dt='" . $id . "' and judgment_dt !='1'   ";
                                                                                ?>  

                                                                                <?php
                                                                                if ($result = $conn->query($query)) {
                                                                                    $sum = 0;
                                                                                    $x = 1;
                                                                                    while ($rowt = $result->fetch_assoc()) {
                                                                                    
                                                                                        ?> 

                                                                                            <tr> <td><?php echo($x); ?> </td>
                                                                                            <td><?php echo($rowt["decal_pattern_dt"]); ?> </td>
                                                                                            <td><?php echo($rowt["curve_no_dt"]); ?> </td>
                                                                                            <td width="50%"> <?php echo($rowt["lot_no_dt"]); ?> </td>
                                                                                            <td width="50%"> <?php echo($rowt["item01_dt"]); ?> </td>
																							<td width="50%"> <?php echo($rowt["remarks_dt"]); ?> </td>
                                                                                           </tr>


                                                                                        <?php
                                                                                        $sum += $rowt["item01_dt"];
                                                                                        $print_date = $rowt["org_date_dt"] . "-" . $rowt["org_time_dt"];
                                                                                        $x++;
                                                                                    }
                                                                                }
                                                                                ?>


                                                                                <tr > <td colspan="4" ><b><center>Total</center><b></b></td > <td  colspan="3"><?php echo($sum); ?></td>  </tr>   

                                                                                </table>


                                                                                <?php
                                                                            }
                                                                        } else {
                                                                            echo(false);
                                                                        }
                                                                        ?>