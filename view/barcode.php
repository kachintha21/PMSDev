<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/Colours.class.php");
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$id = $_GET['id'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Barcode Print</title>
        <style>
            .center {
                border: 3px solid black;
                width: 10cm;
                height:7.5cm;
                display: block;

                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 410px;
            }

            .center3 {
                border: 1px solid black;
                width: 410px;
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
                document.location.href = "Somewhere.aspx";
            }
        </script>
        <script type="text/javascript" src="../js/jquery-1.4.2.js"></script>
    </head>
    <body>
        <div class="center"    >
            <table  cellpadding="0" cellspacing="0"   width="100%">
                
                <tr>
                    <td colspan="2" valign="top"  >
                    
                    <strong>Ref No : <?php echo($id); ?></strong>
                    </br></br>
                        <table width="100%" border="1" cellpadding="0" cellspacing="0" class="y" valign="top" >
                            <tr><td class="font_1"><strong><b>Design No<b></strong></td><td class="font_1"><strong><b>Col No<b></strong></td><td class="font_1"><strong><b>Col Name<b></strong></td></tr>

                                                                    <?php
                                                                    $query = "SELECT * FROM pigment_issues_details_tbl WHERE barcode_ref_no_pidt='" . $id . "'  group BY design_number_pidt DESC";
                                                                    ?>  

                                                                    <?php
                                                                    if ($result = $conn->query($query)) {
                                                                        while ($rowt = $result->fetch_assoc()) {
                                                                            $design_number_pidt = $rowt["design_number_pidt"];
                                                                            $color_number_pidt = $rowt["color_number_pidt"];
                                                                            $re_mixing_date_pidt = $rowt["re_mixing_date_pidt"];
                                                                            $color_name_pidt=$rowt["color_name_pidt"];
                                                                                    $remarks_pidt=$rowt["remarks_pidt"];
                                                                            
                                                                            ?> 

                                                                            <tr><td>    <?php echo($rowt["design_number_pidt"]); ?> </td><td >    <?php echo($rowt["color_number_pidt"]); ?> </td><td width="50%">    <?php echo($rowt["color_name_pidt"]); ?> </td></tr>


                                                                            <?php
                                                                        }
                                                                    }

                                                                    $rt = "SELECT * FROM color_relationships_tbl WHERE design_no_crt='" . $design_number_pidt . "'    AND  col_no_crt='" . $color_number_pidt . "'  AND  col_name_crt='" . $color_name_pidt . "'  ";  
                                                                       if ($cr = $conn->query($rt)) {
                                                                        while ($rowcr = $cr->fetch_assoc()) {

                                                                     


                                                                    ?>

<tr><td>    <?php echo($rowcr["ndesign_no_crt"]); ?> </td><td >    <?php echo($rowcr["ncol_no_crt"]); ?> </td><td width="50%">    <?php echo($rowcr["ncol_name_crt"]); ?> </td></tr>




<?php
                                                                        }
                                                                    }?>


                                                                    </table>
                        <p><div align="center"> <img alt="<?php echo($id); ?>" src="../lib/barcode39.php?text=<?php echo($id); ?>" /> </div></p>
                        
                        <span class="font_1"><strong>Re-Mixing Date :</strong><strong> <?php echo($re_mixing_date_pidt); ?></strong></span>
                        
                        </td>

                                                                    <td width="49%" align="center" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="y"   valign="top" > 

                                                                          
                                                                                            <tr><td class="font_1"><strong><b>Pigment<b> </strong></td><td class="font_1"><strong><b>Content(g)<b></strong></td></tr>

                                                                                                                        <?php
//$query = "SELECT * FROM pigment_issues_details_tbl WHERE barcode_ref_no_pidt='" . $id . "' ";

                                                                                                                        $sql = "SELECT * FROM  colours_tbl WHERE  pattern_no_ct='" . $design_number_pidt . "'  AND  colours_code_ct='" . $color_number_pidt . "' ";

                                                                                                                        if ($result = $conn->query($sql)) {
                                                                                                                            while ($row = $result->fetch_assoc()) {

                                                                                                                                $item02_ct = $row['item02_ct'];
                                                                                                                                $item04_ct = $row['item04_ct'];
                                                                                                                                ?>

                                                                                                                                <tr><td>  <?php echo($row["pigment_name_ct"]); ?>  </td><td>  <?php echo($row["qty_ct"]); ?> </td></tr>



                                                                                                                                <?php
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                        <tr><td colspan="1"  >Oil </td><td colspan="1"  ><?php
                                                                                                                                echo("(" . $item02_ct . ")" . "<br>");
                                                                                                                                echo("" . $item04_ct . "" . "<br>");

                                                                                                                                $oil = "SELECT*FROM oil_data_tbl WHERE  pattern_no_odt='" . $design_number_pidt . "' AND  colours_code_odt='" . $color_number_pidt . "' ";
                                                                                                                                if ($reso = $conn->query($oil)) {
                                                                                                                                    while ($rowo = $reso->fetch_assoc()) {
                                                                                                                                        echo($rowo['oil_name_odt'] . "<br>");
                                                                                                                                        echo("1:" . $rowo['oil_qty_odt'] . "<br>");
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                ?> </td></tr>

                                                                                                                        </table></td>
                                                                                                                        </tr>



                                                                                                                       


                                                                                                                                                                                                 
                                                                                                                         
                                                                                                                        </tr>
                                                                                          </table>
            
            <?php
            echo($remarks_pidt);
            
            ?>
                                                                                                                        </div>
                                                                                                                        <input type="button" class="noprint"   value="Print"    onclick="window.print();
                window.location.href = 'pigment_issue.php'"  />
                                                                                                                        <a href="pigment_issue.php" class="noprint"   style="text-decoration: none"  >Next One</a>
                                                                                                                        </body>
