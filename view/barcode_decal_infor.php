<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/DInspection.class.php");
$di = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$id = $_GET['id'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Decal Transfer Note</title>
        <style>
            .center {
                border: 3px solid black;
                width: 10cm;
                height:10.0cm;
                display: block;

                /*                border: 3px solid black;
                                width: 10cm;
                                height:7.5cm;
                                display: block;*/

                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 510px;
            }

            .center3 {
                border: 1px solid black;
                width: 510px;
            }


            td {
                border: 1px solid black;
                padding: 4.1px 5px;
            }
            .font_1 {
                font-size: 12px;
            }
        </style>

        <style>
            .y{
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 11px;
            }
        </style>

        <style type="text/css" media="print">
            .noprint {
                display: none;
            }
            .noprint01 {
                display: none;
            }
        </style>
        <script type="text/javascript" >
            function doPrint() {
                window.print();
                document.location.href = "dinspection.php";
            }
        </script>
        <script type="text/javascript" src="../js/jquery-1.4.2.js"></script>
    </head>
    <body>
        <div class="center">
            <table  cellpadding="0" cellspacing="0"   width="100%">
                <tr><td colspan="2"><b>Decal Transfer Note<b></td></tr>
                                <tr><td>Ref Number</td><td><?php echo($id); ?></td></tr>
                                <tr>
                                    <td colspan="2" valign="top"  >

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0" class="y" valign="top" >
                                            <tr> <td class="font_1"><strong><b>No<b></strong></td> <td class="font_1"><strong><b>Job No<b></strong></td><td class="font_1"><strong><b>Lot-no <b></strong></td>
                                                                <td class="font_1"  width="40%"><strong><b>Decal No <b></strong></td>       
                                                                                <td class="font_1"  width="40%"><strong><b>Curve No<b></strong></td><td class="font_1"><strong><b>Quantity<b></strong></td></tr>

                                                                                                                                <?php
                                                                                                                                $query = "SELECT * FROM dinspection_tbl WHERE item02_dt='" . $id . "' ";
                                                                                                                                ?>  

                                                                                                                                <?php
                                                                                                                                if ($result = $conn->query($query)) {
                                                                                                                                       $sum = 0;
                                                                                                                                        while ($rowt = $result->fetch_assoc()) {
                                                                                                                                        $x = 1;
                                                                                                                                                                                                                                                                             ?> 

                                                                                                                                        <tr> <td>    <?php echo($x); ?> </td>  <td>    <?php echo($rowt["pro_no_dt"]); ?> </td>  <td width="20%"> <?php echo($rowt["lot_no_dt"]); ?> </td>  <td>    <?php echo($rowt["decal_pattern_dt"]); ?> </td><td><?php echo($rowt["curve_no_dt"]); ?> </td><td width="20%"> <?php echo($rowt["item01_dt"]); ?> </td></tr>


                                                                                                                                        <?php
                                                                                                                                                  $sum += $rowt["item01_dt"]; 
                                                                                                                                                     $print_date= $rowt["org_date_dt"]."-".$rowt["org_time_dt"]; 
                                                                                                                                        $x++;
                                                                                                                          
                                                                                                                                     
                                                                                                                                    }
                                                                                                                              
                                                                                                                                }
                                                                                                                                ?>


                                                                                                                                        <tr > <td colspan="3" ><b><center>Total</center><b></b></td > <td  colspan="3"><?php echo($sum);?></td>  </tr>     
                                                                                                                                </table>



                                                                                                                                <p><div align="center"> <img alt="<?php echo($id); ?>" src="../lib/barcode39.php?text=<?php echo($id); ?>" /> </div></p>

                                                                                                                                </td>

                                                                                                                                </tr>


                                                                                                                                <tr><td >Prepared By</td><td></td></tr>
                                                                                                                                <tr><td >Checked By</td><td></td></tr>
                                                                                                                                <tr><td >Authorized By</td><td></td></tr>
                                                                                                                                <tr><td>Received By</td><td></td></tr>
                                                                                                                                </table>
            <?php
            echo($print_date);
            ?>

                                                                                                                         
                                                                                                                                </div>
                                                                                                                                <input type="button" class="noprint"   value="Print"    onclick="window.print();
                window.location.href = 'dinspection_ps.php'"  />
                                                                                                                                <a href="dinspection_ps.php" class="noprint"   style="text-decoration: none"  >Next One</a>
                                                                                                                                </body>
