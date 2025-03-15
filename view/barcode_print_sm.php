<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/ScreenMaking.class.php");
include("../model/PigmentMaster.class.php");

$cl = new ScreenMaking(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$colours = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$id = $_SESSION['pro_no_sm'];
$new_id = $_SESSION['id'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Barcode Print</title>
        <style>
            .center {
                border: 3px solid black;
                width: 300px;
                display: block;
                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 300px;
            }

            .center3 {
                border: 1px solid black;
                width: 300px;
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
                    <td width="50%"  colspan="2" class="td01"><strong>Production No</strong></td>
                    <td><?php echo($id); ?>                    
           
                    </strong></td>
                 </tr>


                <tr>
            <td colspan="3" align="center"><div> <img alt="<?php echo($id); ?>" src="../lib/barcode39.php?text=<?php echo($id); ?>" /> </div></td>
             </tr>

                <tr>
               
                     
             

                        <?php
                        $query = "SELECT * FROM screen_making_tbl WHERE id='".$new_id."'  ";
                        ?>  

                            <?php
                            if ($result = $conn->query($query)) {
                                while ($row = $result->fetch_assoc()) {    
                                    
                                         $colours_array=$colours->getColoursIndexPigmentMasterByMeshNo($row['pattern_no_sm'],$row['screen_mesh_sm']);
                                    
                                    
                            ?> 
   
                    
                    
                    
                   <tr>
                        <td width="50%"  colspan="2" class="td01"><strong>Design</strong></td>
                        <td><?php 
                        echo($row['pattern_no_sm']);
                        ?></td>     
                    </tr>
                    

                     
   
                    <tr>
                        <td width="50%"  colspan="2" class="td01"><strong>Lot No</strong></td>
                        <td><?php 
                        echo($row['lot_no_sm']);
                        ?></td>     
                    </tr>
                    
                    
                        <tr>
                    <td width="50%"  colspan="2" class="td01"><strong>ScreenMesh</strong></td>
                    <td>
                    <?php
                                    echo($row['screen_mesh_sm']);
                    
                    ?>
                    
                    </td>     
                   </tr>
                    
                    
                    

                    <tr>
                    <td width="50%"  colspan="2" class="td01"><strong>color Index</strong></td>
                    <td>
                    <?php
                                    echo($colours_array[2]);
                    
                    ?>
                    
                    </td>     
                   </tr>
                   
                   
                    <tr>
                    <td width="50%"  colspan="2" class="td01"><strong>Time Stamp</strong></td>
                    <td>
                    <?php
                                    echo($row['org_date_sm']."  ".$row['org_time_sm']);
                    
                    ?>
                    
                    </td>     
                   </tr>
                   


        <?php
    }
}
?>

                    





               

                                         


                                            <tr>
                                                <td colspan="3" align="center"><strong>Noritake Lanka Porcelain (Pvt) Ltd</strong></td>
                                            </tr>
                                            </table>
                                            </div>
                                            <input type="button" class="noprint"   value="Print"    onclick="window.print();
        window.location.href = 'screen_making.php'"  />
                                            <a href="screen_making.php" class="noprint"   style="text-decoration: none"  >Next One</a>
                                            </body>
                                            </html>