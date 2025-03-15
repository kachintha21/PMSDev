<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../model/Colours.class.php");
include("../model/PigmentIssuesDetails.class.php");
$pl = new PigmentIssuesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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


        $Issues = $pl->gePigmentIssuesByNo($_POST['barcode_ref_no_pidt']);
        echo($Issues[3]);
        
         echo("<input  type='hidden' class='form-control' name='printing_pattern_pst' id='printing_pattern_pst'  value='$Issues[5]'  /> ");
        ?>                        
        <div  class="form-group form-group">
            <table style="width:50%" style="border: 2px solid black;"   >

                <tr >
                    <td>Printing  Pattern</td><td>  <?php
        echo($Issues[5])
        ?> </td> 

                    <td>Weight</td>  <td>  <?php
                echo($Issues[4]);
        ?> </td> 

                </tr>




                <tr >
                    <td> </td></td> 



                </tr>
                
                




                <tr style="background-color: lightblue;" >
                    <?php
                    ?>
                    <td>Pri No</td>  <td>Color Name </td>     <td>Contents</td>     <td>DIL Meas</td>

                </tr>

                <?php
                $sql = "SELECT * FROM  colours_tbl WHERE  pattern_no_ct='" . $Issues[5] . "' AND  colours_code_ct='" . $Issues[6] . "' ";

                if ($res = $conn->query($sql)) {
                    $index = 0;
                    $total == 0;
                    while ($row = $res->fetch_assoc()) {
                        $index++;
                        ?>
                        <tr>
                            <td><?php
                if ($index == 1) {
                    echo($Issues[6]);
                }
                        ?></td>     <td>

                                <?php
                                if ($index == 1) {
                                    echo($row['colours_name_ct']);
                                    $code = $row['colours_name_ct'];
                                                          echo("<input  type='hidden' class='form-control' name='color_name_pidt' id='color_name_pidt'  value='$code'  /> ");
                                   
                                }
                                ?>
                            </td>     <td>
                                <?php echo($row['pigment_name_ct'] . "   -     " . $row['qty_ct']);
                                ?></td>    

                            <td><?php
                if ($index == 1) {
                    echo("(" . $row['item02_ct'] . ")" . "<br>");
                    echo("" . $row['item04_ct'] . "" . "<br>");

                    $oil = "SELECT*FROM oil_data_tbl WHERE  pattern_no_odt='" . $Issues[5] . "' AND  colours_code_odt='" . $Issues[6] . "' ";
                    if ($reso = $conn->query($oil)) {
                        while ($rowo = $reso->fetch_assoc()) {
                            echo($rowo['oil_name_odt'] . "<br>");
                            echo("1:" . $rowo['oil_qty_odt'] . "<br>");
                        }
                    }
                }
                                ?>
                            </td>

                        </tr>


                        <?php
                    }
                    ?>





                </table>

            </div>













            <?php
        }
    }
} else {
    echo(false);
}
?>