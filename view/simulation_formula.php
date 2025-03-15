<?php  
              error_reporting(E_PARSE|E_WARNING|E_ERROR);
              include("../include/db_config.php");
              include("../model/CurveMaster.class.php"); 
              include("../model/SimulationResult.class.php");              
              include("../include/conn.php");
              include("../include/common.php");
              
              $id=$_GET['id'];

              
              
                $cm=new CurveMaster(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                $sr=new SimulationResult(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  
  
                                                                $total=2310*80/100;   
                                                                $query_01 = "SELECT * FROM planning_tbl WHERE ref_no_fdt='".$id."'  GROUP BY  curve_fdt  ORDER BY `curve_fdt` ASC";
                                                                                                                               /// $query_01 = "SELECT * FROM planning_tbl WHERE ref_no_fdt='".$id."'  GROUP BY  curve_fdt  ORDER BY `curve_fdt` ASC";
                                                                
                                                                
                                                                if ($result = $conn->query($query_01)) {
                                                                while ($row = $result->fetch_assoc()) { 
                                                                


                                                                $total=2310*80/100;
                                                                $get_max=$cm->getCurveAreaByRefNo($row["design_fdt"],$row["curve_fdt"]);
                                                                $sheet=$total%$get_max;
                                                                $sheet_value=$total/$get_max;
                                                                $curve_value = (int)$sheet_value; 
                                                                $requid_sheet=$row["total_fdt"]/$curve_value;                                                                        
                                                                $curve_value = (int)$sheet_value; 
                                                                $requid_sheet=round($row["total_fdt"]/$curve_value);   

                                                                echo("..........Case one..........................<br>");
                                                               // echo("Total:  ".$total."<br>");
                                                                echo("Curve No:".$row["curve_fdt"]."<br>");
                                                                echo("Desing no:    ".$row["design_fdt"]."<br>");                                 
                                                                echo("Qty:".$row["total_fdt"]."<br>");
                                                                echo("Aera:".$get_max."<br>");
                                                                echo("Sheet per Curve:".$curve_value."<br>");
                                                                echo("Number Of Sheet:".$requid_sheet."<br>");
                                                                echo("Waste Per Sheet:".$sheet."<br>");
                                                                echo("Total Waste:".$sheet*$requid_sheet."<br>");  
                                                                
                                                                
                                                                
                                                               $res=$sr->createNewSimulationResult(
                                                                $_POST['id'],
                                                                "Individual Simulation",
                                                                $row["curve_fdt"],
                                                                $row["design_fdt"],
                                                                $row["total_fdt"],
                                                                $get_max,
                                                                $curve_value,
                                                                $requid_sheet,
                                                                $sheet,
                                                                $sheet*$requid_sheet,
                                                                 $id,
                                                                $_POST['item02_st'],
                                                                $_POST['item03_st'],
                                                                $_POST['item04_st'],
                                                                $_POST['item05_st'],
                                                                $_POST['org_name_st'],        
                                                      		 getServerDate(),
                                                                  getServerTime()
                                                                 );
                                                                
                                                                
      
                                                                      
                                                             }
                                                             }

                                                                $total=2310*80/100;
                                                                $get_max=$cm->getCurveAreaByRefNo($row["design_fdt"],$row["curve_fdt"]);
                                                                $query_01 = "SELECT * FROM planning_tbl WHERE  ref_no_fdt='".$id."'   GROUP BY  curve_fdt  ORDER BY `curve_fdt` ASC";
                                                                
                                                                                                            ///$query_01 = "SELECT * FROM planning_tbl WHERE  ref_no_fdt='".$id."'   AND  curve_fdt='001'  GROUP BY  curve_fdt  ORDER BY `curve_fdt` ASC"; 
                                                                
                                                                
                                                                if ($result = $conn->query($query_01)) {
                                                                while ($row = $result->fetch_assoc()) { 



                                                                $total=2310*80/100;
                                                                $get_max=$cm->getCurveAreaByRefNo($row["design_fdt"],$row["curve_fdt"]);
                                                                $sheet=$total%$get_max;
                                                                $sheet_value=$total/$get_max;
                                                                $curve_value = (int)$sheet_value; 
                                                                $requid_sheet=round($row["total_fdt"]/$curve_value);  
                                                             
                                                                 echo("<font style='background-color:powderblue;' >..........Case Two..........................</font>"."<br>");
                                                                 echo("Qty:    ".$row["total_fdt"]."<br>");
                                                                 echo("Aera:   ".$get_max."<br>");
                                                                 $requid_sheet=1;

                                                                echo("Sheet Per Curve:   ".$requid_sheet."<br>");
                                                                echo("Number Of Sheet:   ".$row["total_fdt"]/$requid_sheet."<br>");
                                                                echo("Waste Per Sheet:   ".$sheet."<br>");
                                                                 
                                                                
                                                       
                                                             }}
         
                                                            header("Location:simulation_data.php");                                          



?>
 
 