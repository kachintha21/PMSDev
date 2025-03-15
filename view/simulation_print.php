<?php
session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/CurveMaster.class.php");
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


/* if ($_SESSION['ref_no_no']) {
  $id = $_SESSION['ref_no_no'];
  }
 */
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Printing Plans <?php
            echo($id);
            ?></title>
        <style>
            .center {
                border: 3px solid black;
                width: 820px;
                display: block;
                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 820px;
            }

            .center3 {
                border: 1px solid black;
                width: 820px;
            }


            td {
                border: 1px solid black;
                padding: 4.1px 5px;
            }
        </style>

        <style>
            .y{
                border: 1px solid black;
                border-collapse: collapse;
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
        <div class="center">
            <table  cellpadding="0" cellspacing="0"   width="100%">
                               <tr>
                    <td width="50%"  colspan="2" class="td01"><strong>Planning Ref No</strong></td>
                    <td><?php echo($id); ?></strong></td>
                </tr>
                

                <tr>
                    <td colspan="3" align="center">

                        <table class="y" width="100%" valign="top" >
                            <tr>
                                <td>layout</td>
                                <td>design </td>
                                <td>Curve No</td>                                
                                <td>Planned Qty</td>                                
                                <td>No of Curves (Per Sheet)</td>
                                <td>Close Curve After</td>
                                <td>No of Sheets</td>
                            </tr>
                            <?php
                            $query = "SELECT * FROM saved_layout_plans_tbl  WHERE ref_id='" . $id . "'    ";
                            ?>  

                            <?php
                            if ($result = $conn->query($query)) {
                                while ($rowt = $result->fetch_assoc()) {
                                    ?> 

                                    <tr>
                                        <td>    <?php echo($rowt["layout"]); ?> </td>
                                        <td>    <?php echo($rowt["design"]); ?> </td>
                                        <td>    <?php echo($rowt["curve_no"]); ?> </td>
                                        <td>    <?php echo($rowt["planned_qty"]); ?>  </td>                                        
                                        <td>    <?php echo($rowt["no_of_curves"]); ?> </td>             
                                        <td>    <?php echo($rowt["close_curve_after"]); ?> </td>
                                        <td>    <?php echo($rowt["total_sheets_needed"]); ?> </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </table>

                        <table class="y"  width="100%" valign="top" >
                            <tr><td colspan="6">Commment </td></tr>
                         

                            <tr> <td style="height:200px"> 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                </td></tr>
                        </table>
                        
                        


                    </td>
                </tr>


           


                <tr>
                    <td colspan="2" ><strong>Printed Date</strong></td>
                    <td><strong><?php echo(getServerDate() . getServerTime()); ?></strong></td>
                </tr>





                <tr>
                    <td colspan="2" ><strong>Approved Name</strong></td>
                    <td><strong>..........................</strong></td>
                </tr>



            </table>
        </div>
        <input type="button" class="noprint"   value="Print"    onclick="window.print();
                window.location.href = 'planning_data.php'"  />
        <a href="planning_data.php" class="noprint"   style="text-decoration: none"  >Next One</a>
    </body>
</html>