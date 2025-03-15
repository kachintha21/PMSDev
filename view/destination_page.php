<?php
    error_reporting(E_PARSE | E_WARNING | E_ERROR);
    include("../include/common.php");
    include("../include/db_config.php");
    include("../include/conn.php");
    include("../model/DInspection.class.php");
    $di = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $pro_no = $_GET['pro_no'];
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            /* Optional CSS styles for formatting the table */
            table {
            border-collapse: collapse;
            width: 4.5cm;
            
            }
            th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }
            th {
            background-color: #f2f2f2;
            }
        </style>
        
        <style>
    .no-border-table {
        border-collapse: collapse;
    }
    .no-border-table td, .no-border-table th {
        border: none;
    }
</style>
        <style>
            .center {
            border: 3px solid black;
            width: 4.5cm;
            height: 4.5cm;
            display: block;
            
            /*                border: 3px solid black;
            width: 4.5cm;
            height:4.5cm;
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
            font-size: 10px;
            }
        </style>
        
        <style>
            .y{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 8px;
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
        
        <style>
            /* Define the column layout */
            .column {
            float: left;
            width: 50%;
            }
            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }
        </style>
    </head>
    <body>
        
        <table  cellpadding="0" cellspacing="0" border='1'  width="100%">
            <?php
                $query = "SELECT bb.decoration_pm,bb.body_pm,bb.item01_pm,a.desing_no_lpt,a.lot_no_lpt,a.pro_no_lpt,
                MIN(a.no_of_sheets_lpt) AS no_of_sheets_pln,cc.imp_plan_vpft,
                a.curve_no_lpt,a.no_of_curves_lpt
                FROM layout_plans_tbl a 
                LEFT JOIN (SELECT * FROM pigment_master_tbl b GROUP BY b.pattern_pm) bb
                ON a.desing_no_lpt = bb.pattern_pm
                LEFT JOIN (SELECT * FROM virtual_planner_final_tbl c GROUP BY c.pro_no_vpft) cc
                ON a.pro_no_lpt = cc.pro_no_vpft
                WHERE a.pro_no_lpt ='" . $pro_no . "' GROUP BY a.pro_no_lpt ";
                
                if ($result = $conn->query($query)) 
                {
                    while ($rowt = $result->fetch_assoc()) 
                    { ?>
                    
                    <tr>
                        <td colspan ='2'  class="font_1"><?php echo($rowt["decoration_pm"])." - ".$rowt["body_pm"]." - ".$rowt["item01_pm"]; ?> </td> 
                    </tr>
                    <tr class="font_1">
                        <td width="50%" ><?php echo(" Design - ".$rowt["desing_no_lpt"]); ?> </td> 
                        <td width="50%"><?php echo(" Lot - ".$rowt["lot_no_lpt"]); ?> </td> 
                    </tr>
                    <tr class="font_1">
                        <td rowspan="2">Pro No - <?php echo($rowt["pro_no_lpt"]); ?></td>
                        <td align='center'>PRI-S/H-</td>
                    </tr>
                    <tr class="font_1">
                        <td> 
                            <div class="row">
                                <div align='center' class="column"><?php echo($rowt["no_of_sheets_pln"]); ?></div>
                                <div align='center' class="column"><?php echo($rowt["imp_plan_vpft"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="font_1">
                        <td rowspan="2"><?php $current_date = date("Y-m-d"); echo "Date: " . $current_date; ?></td>
                        <td align='left'>BOX No -</td>
                    </tr>
                    <tr class="font_1">
                        <td> 
                            <div class="row">
                                <div align='left' class="column">Layout - </div>
                                <div align='left' class="column">System</div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr colspan=2>
                <td colspan=2>
                    <!-- Remove border from this table -->
                    <table class="no-border-table">
                        <tbody>
                            <?php
                            if (isset($_POST['submit'])) {
                                $selected_values = $_POST['dropdown'];
                                
                                foreach ($selected_values as $row) {
                                    echo "<tr>";
                                    foreach ($row as $cell) {
                                        if ($cell != 'Select') {
                                            echo "<td>$cell</td>";
                                        } else {
                                            echo "<td></td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </td>
            </tr>
                    
                    
                    <?php
                        
                        
                    }
                }
                
            ?> 
            
            
            
            
            
        </table>
        
         <input type="button" class="noprint"   value="Print"    onclick="window.print();
            window.location.href = 'layout_box_view.php'"  />
        
    </body>
</html>
