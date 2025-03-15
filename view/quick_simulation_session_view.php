<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
session_start();
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);

include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/CurveMaster.class.php");
include_once '../include/Planner/PrintPlanner.php';
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$id = $_SESSION['ref_no_no'];



define('LAYOUT_ID', 'AA');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> NLPL  Layout Simulator|
 <?php
            echo($id);
            ?></title>
        <style>
            .center {
                border: 2px solid black;
                width: 80%;
                display: block;
                margin-top: 15px;
                margin-left: 15px;
                background: #deeef2;
            }
            .center2 {
                border: 1px solid black;
                width: 80%;
            }

            .center3 {
                border: 1px solid black;
                width:80%;
            }


            td {
                border: 1px solid black;
                padding: 4.1px 5px;
            }

            .scroll-top{
                position: fixed;
                bottom: 10px;
                right: 10px;
                z-index: 99;
            }

            .noprint {
                display: none;
            }
            .noprint01 {
                display: none;
            }

            .y{
                border: 1px solid black;
                border-collapse: collapse;
            }

        </style>




        <script type="text/javascript" >
            function doPrint() {
                window.print();
                document.location.href = "Somewhere.aspx";
            }
        </script>
        <script type="text/javascript" src="../js/jquery-1.4.2.js"></script>

        <script>
            $(document).ready(function () {
                $(".scroll-top").click(function () {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <button type="button" class="scroll-top">Go to Top</button>
    <center>


        <div class="center">
            <table  cellpadding="0" cellspacing="0"   width="100%">


                <tr><td  class="td01" colspan="3" width="50%"  >
                        <b>
                            <h3> Noritake Printing Management Systems Layout Simulation tools <h3>

                                    </b>
                                    </td></tr>

                                    <tr>
                                        <td width="30%"  colspan="1" class="td01"><strong>Reference No</strong></td>
                                        <td  width="30%"   ><?php echo($id); ?></td>

                                        <td  width="2%" >
                                            
                                            <!-- <a href="planning_tools.php"    style="text-decoration: none"  >-->
                                                      <a href="simulation_print.php?id=<?php echo($id); ?>" >
                                            <img src="../img/print.png" width="20" height="20">
                                            
                                             </a>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td colspan="3" align="center">

                                            <?php
                                            $query = "SELECT * FROM planning_tbl  WHERE ref_no_fdt='" . $id . "'  ORDER BY total_fdt ASC  ";

                                            $curvesArray = [];
                                            if ($result = $conn->query($query)) {
                                                while ($rowt = $result->fetch_assoc()) {


                                                    $area = $cm->getCurveAreaByRefNo($rowt["design_fdt"], $rowt["curve_fdt"]);
                                                    $curvesArray[] = [
                                                        'id' => $rowt["curve_fdt"],
                                                        'area' => $area,
                                                        'qty' => $rowt["total_fdt"],
                                                        'design' => $rowt["design_fdt"]
                                                    ];

                                                    $design_fdt = $rowt["design_fdt"];
                                                    $schedule_date = $rowt["item05_fdt"];
                                                      $decal_design = $rowt["item03_fdt"];
                                                }
                                            }
                                            ?>

                                            <?php
                                            try {

                                                if (!isset($_SESSION['rangeBreaker'])) {
                                                    $_SESSION['rangeBreaker'] = ceil(max(array_column($curvesArray, 'qty')) / 100) * 100;
                                                }

                                                if (isset($_POST['grouper'])) {
                                                    $_SESSION['rangeBreaker'] = intval($_POST['grouper']);
                                                }
                                                
                                                $planner = new Planner\PrintPlanner(
                                                        2000.00, // sheet area with 2 decimal places
                                                        80.00, // printerable percentage (0-100)  with 2 decimal places,
                                                        $_SESSION['rangeBreaker'], $curvesArray, 1, $design_fdt
                                                );

                                                $plans = $planner->generatePlans();

                                                if (isset($_POST['plans'])) {
                                                    $selectedPlans = [];
                                                    foreach ($_POST['plans'] as $value) {
                                                        $selectedPlans[] = $planner->plans[$value];
                                                    }

                                                    $_SESSION['selectedPlans'] = $selectedPlans;

                                                    $res_id = "SELECT layout FROM `saved_layout_plans_tbl` ORDER BY id DESC LIMIT 1";
                                                    $result_id = $conn->query($res_id);

                                                    $layout = constant('LAYOUT_ID');
                                                    $result = $result_id->fetch_array(MYSQLI_ASSOC);
                                                    if (isset($result['layout'])) {
                                                        $layout = $result['layout'];
                                                        $layout++;
                                                    }

                                                    $planner->displayHTML($selectedPlans, $layout);
                                                    exit();
                                                }

                                                if (isset($_POST['save_plans']) && isset($_SESSION['selectedPlans']) && count($_SESSION['selectedPlans']) > 0) {

                                                    $servername = "localhost";
                                                    $username = "root";
                                                    $password = "";
                                                    $dbname = "nlpl";

                                                    // Create connection
                                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }



                                                    $stmt = $conn->prepare("INSERT INTO saved_layout_plans_tbl (`ref_id`, layout, design,decal_design,schedule,curve_no, curve_area, planned_qty, no_of_curves, no_of_sheets, close_curve_after, total_sheets_needed) VALUES (?, ?, ?,?, ?,?, ?, ?, ?, ?, ?,?) ");

                                                    $res_id = "SELECT layout FROM `saved_layout_plans_tbl` ORDER BY id DESC LIMIT 1";
                                                    $result_id = $conn->query($res_id);

                                                    $layoutId = constant('LAYOUT_ID');
                                                    $result = $result_id->fetch_array(MYSQLI_ASSOC);
                                                    if (isset($result['layout'])) {
                                                        $layoutId = $result['layout'];
                                                        $layoutId++;
                                                    }

                                                    $design = $design_fdt;
                                                    $shipment_date=$shipment_schedule_date;
                                                    if (is_array($_SESSION['selectedPlans']) && count($_SESSION['selectedPlans']) > 0) {
                                                        foreach ($_SESSION['selectedPlans'] as $plans) {
                                                            if (is_array($plans) && count($plans) > 0) {
                                                                foreach ($plans as $plan) {

                                                                    if (is_array($plan['curves_sets'])) {
                                                                        foreach ($plan['curves_sets'] as $v) {
                                                                            //$design ='design-';


                                                                            $s = 0;
                                                                            $design = $designId;
                        
                                                                            //$layout = $layoutId .'-'. time();
                                                                            $layout = $layoutId;

                                                                            $refId = $id;
                                                                            // prepare and bind

                                                                            $stmt->bind_param(
                                                                        "ssssdiiiiiii", $refId, $layout, $design_fdt,$decal_design, $schedule_date, $v['curve_no'], $v['curve_area'], $v['planned_qty'], $v['curves_per_sheet'], $v['no_of_sheets'], $v['close_curve_after'], $plan['total_no_of_sheets']
                                                                            );

                                                                            $stmt->execute();
                                                                        }
                                                                    }
                                                                    $layoutId++;
                                                                }
                                                            }
                                                        }
                                                    }

                                                    //unset($_SESSION['selectedPlans']);        

                                                    $stmt->close();
                                                    $conn->close();
                                                    ?>
                                                    <h2>You have successfully saved the plans.</h2>
                                                    <a href="planning_data.php">Go Back</a>
                                                    <?php
                                                    //header('Location: '.$_SERVER['PHP_SELF']);
                                                    die;
                                                }
                                                ?>
                                                <form action='' method='post'>
                                                    <label>
                                                        <div class="form-group">
                                                            Qty Grouper Value &nbsp;
                                                            <input type=number min="0" name='grouper' class="form-control" value='<?php echo $_SESSION['rangeBreaker']; ?>'><br>
                                                            <small>
                                                                Note: Please use this value to group your curves by quantity, in that way you can generate more accurate print plans.<br>
                                                                E.g. If your quantities are 452,400,360,800... use 400 as the grouper value.

                                                                <?php ?>
                                                            </small>
                                                        </div>
                                                        <br>
                                                        <input class="btn btn-primary" type=submit value='Regenerate Plans'>
                                                    </label>  
                                                </form>

                                                <form method='post' action=''>
                                                    <h3>Plans</h3>
                                                    <input class="btn btn-primary" type=submit value='Select Plans'>

                                                    <br><br>
                                                    <?php echo $plans; ?>

                                                </form>
                                                <?php
                                            } catch (Exception $exc) {
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
                                    <center>

                                        </body>
                                        </html>
