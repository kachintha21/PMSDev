<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PreparingLayout.class.php");
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$cont=0.314
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
        

        $qty=$_POST['printing_qty_pp']
        ?>                        

                                        <table style="width:100%">
                                    <tr>
                                    <?php
                             
                                    ?>
                                       <td>Color</td>  <td>Pigment Name</td>     <td>Contents(%)</td>     <td>  Total pigment(g)</td>

                                    </tr>



                                    <?php
                                    
                                  
                                    $sql = "SELECT * FROM  colours_tbl WHERE  pattern_no_ct='".$_POST['pattern_no_pp']."' AND  colours_code_ct='".$_POST['colour_index']."' ";

                                    if ($res = $conn->query($sql)) {

                                        $total==0;
                                        while ($row = $res->fetch_assoc()) {

                                    
                                    
                                    ?>


                                    <tr>

                                    
                                    <td><b><?php echo($row['colours_name_ct']); ?></b></td>     <td><b><?php echo($row['pigment_name_ct']); ?></b></td>     <td><b><?php echo($row['qty_ct']); ?></b></td>     <td><b><?php
                                    $Contents=$row['qty_ct']*$cont*$qty;

                                    $total=$row['qty_ct']*$cont*$qty+$total;
                                    
                                    
                                    echo(round($Contents,3)); ?></b></td>

                                    </tr>


                                    <?php
                                        }
                                    


                                     
                                    
                                    }
                           
                                    
                                    ?>

<tr>
<td colspan="3"> Total Pigment Requirement(g) </td> <td><b> <?php 

echo($total);
?></b></td>   

                                    </tr>




                                </table>
                               




                                


                  






        <?php
    }
} else {
    echo(false);
}
?>