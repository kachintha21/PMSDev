<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../model/Colours.class.php");
$cont = 0.314
;


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


        $qty = $_POST['design_number_pidt']
        ?>                        
        <div  class="form-group form-group">
            <table style="width:50%" style="border: 5px solid black;"  >
                <tr style="background-color: lightblue;">
                    <?php
                    ?>
                    <td>Pri No</td>  <td>Color Name </td>     <td>Contents</td>     <td>DIL Meas</td>

                </tr>

                <?php
                $sql = "SELECT * FROM  colours_tbl WHERE  pattern_no_ct='" . $_POST['design_number_pidt'] . "' AND  colours_code_ct='" . $_POST['colour_index'] . "' ";

                if ($res = $conn->query($sql)) {
                    $index = 0;
                    $total == 0;
                    while ($row = $res->fetch_assoc()) {
                        $index++;
                        ?>
                        <tr>
                            <td><?php
                                if ($index == 1) {
                                    echo($_POST['colour_index']);
                                }
                                ?></td>     <td>

                                <?php
                                if ($index == 1) {
                                    echo($row['colours_name_ct']);
                                    $code=$row['colours_name_ct'];
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

                                    $oil = "SELECT*FROM oil_data_tbl WHERE  pattern_no_odt='" . $_POST['design_number_pidt'] . "' AND  colours_code_odt='" . $_POST['colour_index'] . "' ";
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
                }
                ?>





            </table>

        </div>













        <?php
    }
} else {
    echo(false);
}
?>