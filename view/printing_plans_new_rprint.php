<?php
session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/CurveMaster.class.php");
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


$id=$_GET['id'];




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
                width: 620px;
                display: block;
                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 620px;
            }

            .center3 {
                border: 1px solid black;
                width: 620px;
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
                    <td width="50%"  colspan="1" class="td01"><strong> Ref Number</strong></td>
                    <td colspan="1"><?php echo($id); ?></strong></td>
                    <td colspan="1"><a href="curve_registration.php?id=<?php echo($id);?>" class="noprint"   style="text-decoration: none"  >
                        
                            <img src="../img/add.png" width="20" hight="20" title="Add curve new">
                        </a></td>
                    



                </tr>






                <tr>
                    <td colspan="3" align="center">

                        <table class="y" width="100%" valign="top" >
                            <tr><td>Design No</td> <td>Printing Pattern   </td><td>Curve No</td>
                          
                            <td>Qty</td>
                                            
                            </tr>

                            <?php
                            

                            $query = "SELECT * FROM planning_tbl  WHERE ref_no_fdt='" . $id . "'  ORDER BY  item03_fdt,total_fdt ASC  ";
                            ?>  

                            <?php
                            if ($result = $conn->query($query)) {
                                while ($rowt = $result->fetch_assoc()) {
									if($rowt["total_fdt"]>0){
									
                                    ?> 

                                    <tr><td>    <?php echo($rowt["design_fdt"]); ?> </td>

                                        <td> 
                                            
											 <?php echo($rowt["item03_fdt"]); ?>
                                       
												
								
												
										   
										    

                                       
                                           </td>

                                        <td>    <?php echo($rowt["curve_fdt"]); ?> </td   
                                        
                                                                           
                                        
                                        >
                                        
                                     
                                        
                                        
                                        
                                        <td>    <?php echo($rowt["total_fdt"]); ?> </td>
                                 
                                    
                                    </tr>


                                    <?php
									}
                                }
                            }
                            ?>

                        </table>




                        <table class="y"  width="100%" valign="top" >
                             <tr><td colspan="6">ACTUAL LAY OUT</td></tr>
                            <tr><td>Lay Out deatials</td> 
                                <td>Lot no</td>
                                <td>Order Sheets</td>
                                <td>Print Sheets</td>
                                <td>Order no</td>
                              </tr>

                            <tr><td style="height:400px" ></td> <td></td><td></td><td></td><td></td></tr>
                        </table>


                    </td>
                </tr>


           

                <tr>
                    <td colspan="2" ><strong>Printed Date</strong></td>
                    <td><strong><?php echo(getServerDate() ."-". getServerTime()); ?></strong></td>
                </tr>





              



            </table>
        </div>
        <input type="button" class="noprint"   value="Print"    onclick="window.print();
                window.location.href = 'planning_tools.php'"  />
           <a href="planning_data.php" class="noprint"   style="text-decoration: none"  >Next One</a>
</html>