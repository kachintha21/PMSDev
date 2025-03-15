<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);

include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/CurveMaster.class.php");
include_once '../include/Planner/PrintPlanner.php';
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
                width: 100%;
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
                    <td width="50%"  colspan="2" class="td01"><strong>Planning Ref No</strong></td>
                    <td><?php echo($id); ?></strong></td>

                    
                </tr>






                <tr>
                    <td colspan="3" align="center">

                            <?php
                            $query = "SELECT * FROM planning_tbl  WHERE ref_no_fdt='" . $id . "'  ORDER BY total_fdt ASC  ";
                          
			 $curvesArray = [];
                            if ($result = $conn->query($query)) {
                                while ($rowt = $result->fetch_assoc()) {
									
											
											$area=$cm->getCurveAreaByRefNo($rowt["design_fdt"],$rowt["curve_fdt"]);
											$curvesArray[] = [
												'id' => $rowt["curve_fdt"],
												'area' => $area,
												'qty' => $rowt["total_fdt"]
											];
											
                                            
                                            
                                }
                            }
                            ?>

                        <?php
						try {
							
							$planner = new Planner\PrintPlanner(
									2000.00, // sheet area with 2 decimal places
									80.00, // printerable percentage (0-100)  with 2 decimal places,
									50,
									$curvesArray
								);
							
							$plans = $planner->generatePlans();
							
							if(count($_POST) > 0){
								$selectedPlans = [];
								foreach ($_POST['plans'] as $value) {
									$selectedPlans[] = $planner->plans[$value];
								}
								echo "<pre>";
								print_r($selectedPlans);
								exit();
							}else{
								?> <form target=_blank method='post' action=''>
								<h3>Plans</h3>
								<input type=submit value='Select Plans'><br><br>
								<?php 
								echo implode(", ", array_column($curvesArray, 'id'));								
								echo $plans; ?>
								</form>
								<?php
							}
							
							
							
							
							
						} 
						catch (Exception $exc) {
							echo "<pre>";
							var_dump($exc->getMessage());
							print_r($curvesArray);
							exit();
						}
						?>


                    </td>
                </tr>


           



            </table>
        </div>
        <input type="button" class="noprint"   value="Print"    onclick="window.print();
                window.location.href = 'planning_data.php'"  />
        <a href="planning_data.php" class="noprint"   style="text-decoration: none"  >Next One</a>
    </body>
</html>
