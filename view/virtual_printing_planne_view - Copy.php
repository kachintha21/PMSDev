<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/PigmentModel.class.php");
include("../model/PigmentMaster.class.php");
include("../model/Colours.class.php");
include("../model/MachineCalendar.class.php");
include("../model/PrintingMachineMaster.class.php");
include("../model/PrintingSpeedMaster.class.php");
include("../model/VirtualPlannerDetails.class.php");
include("../model/VirtualPlanner.class.php");
include("../model/PrintingDynamicStatus.class.php");
include("../model/LeadTimeRelationship.class.php");
include("../model/VirtualTimeStore.class.php");
include("../model/VirtualPlannerFinal.class.php");
include("../model/VirtualTempDetails.class.php");



$change_over = 17;

$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mc = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mm = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pds = new PrintingDynamicStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ltm = new LeadTimeRelationship(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vts = new VirtualTimeStore(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpf = new VirtualPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vtf = new VirtualTempDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);
} else {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    header("location:../index.php");
    exit();
}
?>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>NLPL|Daily Printing Plan </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left; 
                font-size: 12px;
            }
        </style>

        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
    <body class="page-header-fixed page-quick-sidebar-over-content ">
        <!-- BEGIN HEADER -->
        <div class="page-header -i navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <?php
            include_once '../tpl/header.php';
            ?>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php
            include_once '../tpl/menu.php';
            ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn blue">Save changes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->

                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        Daily Printing Plan
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Daily Printing Plan</a>

                            </li>

                        </ul>


                        <?php
                        $status = $pds->getPrintingDynamicStatusByPrintingIndexByRef($_GET['id']);
                        $od = $pl->getPreparingLayoutByNo($_GET['id']);
                        //$leadTime = $ltm->getLeadTimeRelationshipByPattern('12', '44');

						//print($_GET['id']);exit;
                        $vp_data = $vp->getVirtualPlannerByNo($_GET['id']);
                        ?>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="invoice">
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                            $machine_no = 'M0' . $i;
                            $Operator = $vp_data[3];
                            $dryer_capacity = 1200;
                            $process_name_pdst = $vp_data[1];
                            $machine_data = $mc->getMachineCalendarByDate($vp_data[2], $machine_no);
							//print($machine_no);exit;
                            if (!empty($machine_data)) {
                                ?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table style="width:100%">
                                            <tr>                                                

                                                <th>
                                                    <?php echo($vp_data[1]); ?> 

                                                    <?php
                                                    //$machine_no = 'M01';
                                                    $Operator = $vp_data[3];
                                                    $dryer_capacity = 1200;
                                                    $process_name_pdst = $vp_data[1];
                                                    $machine_data = $mc->getMachineCalendarByDate($vp_data[2], $machine_no);
                                                    ?>

                                                </th>
                                                <th style="<?php
                                                if ($_GET['ID']) {
                                                    echo 'background-color: Blue;';
                                                }
                                                ?>" ><?php
                                                        if ($_GET['ID']) {
                                                            echo("Plan is successfuly generated by system ");
                                                        }
                                                        ?></th>
                                            </tr>

                                        </table>  


                                        <table style="width:100%">
                                            <tr>
                                                <td style="width:10%">Date</td>
                                                <td style="width:10%"><b><?php echo($vp_data[2]); ?></b></td>
                                                <td style="width:10%"> Operator</td>
                                                <td style="width:10%"><b><?php echo($vp_data[3]); ?></b></td>
                                                <td style="width:10%">Machine No</td>
                                                <td style="width:5%"><b><?php echo($machine_no); ?></b></td>
                                                <td style="width:10%">#Shfit</td>
                                                <td style="width:5%"><b><?php echo($machine_data[3]); ?></b></td>
                                                <td style="width:10%">#Work Time(M)</td>
                                                <td style="width:10%"><b><?php echo($machine_data[4]); ?></b></td>
                                                <td style="width:10%">Dryer capacity</td>
                                                <td style="width:5%"><b><?php echo($dryer_capacity); ?></b></td>
                                            </tr>
                                            <?php
                                            $shift_start_time = " 2000-01-01 06:00:00";
                                            $prepare_time = "0:15";
                                            $prepareTime = "15";
                                            $change_over = "0:17";
                                            $changeOver = "17";
                                            ?> 
                                        </table> 
                                        <table style="width:100%">
                                            <tr>
                                                <td>No</td>                                          
                                                <td>M/No</td> 
                                                <td>Time</td> 
                                                <td>Shfit</td> 
                                                <td>Start Date</td>                                           
                                                <td>Patt. Finish Date </td>
                                                <td>Pro:No</td>
                                                <td>Design</td>
                                                <td>Lot</td>
                                                <td># colors </td>
                                                <td>Imp-Plan</td>
                                                <td>Imp-Actual</td>
                                                <td>Plan colors</td>
                                                <td>Time(min)</td>                                         
                                                <td>Change Over</td>
                                                <td>Plan Print</td>
                                                <td>X-Rite</td>
                                                <td>Screen</td>
                                                <td>Pigment</td>
                                                <td>Machine</td>                                        
                                                <td>Remarks</td>
                                            </tr>

                                            <?php
                                            $firstPrinting = $vts->getQtyFirstPrintingVirtualTimeStoreByIndex($machine_no, $vp_data[2]);
                                            $time_fp = round($firstPrinting / 20, 0);
                                            $time_duration_fp = "0:" . $time_fp;
                                            ?>
                                            <tr>
                                                <td>#</td>
                                                <td></td>
                                                <td><?php echo date("H:i", strtotime($shift_start_time)); ?></td>
                                                <td></td>
                                                <td>N/A</td>                                    
                                                <td>N/A</td>
                                                <td>M/P Time</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>                               
                                                <td>N/A </td>
                                                <td>N/A </td>                                       
                                                <td><?php echo($prepareTime); ?> </td>
                                                <td>N/A</td>                                 
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>                                      
                                                <td>N/A</td>                                      
                                                <td>N/A</td>                                        
                                                <td>N/A</td>   
                                                <?php
                                                if ($_GET['ID']) {
                                                    $id = 'N/A';
                                                    $ID_vpft = $vp_data[2] . 'M/P' . $machine_no;
                                                    $ref_no_vpft = $_GET['id'];
                                                    $design_vpft = 'N/A';
                                                    $pro_no_vpft = 'M/P Time';
                                                    $lot_vpft = 'N/A';
                                                    $num_colors_vpft = 'N/A';
                                                    $plan_colors_vpft = 'N/A';
                                                    $machine_no_vpft = $machine_no;
                                                    $date_vpft = $vp_data[2];
                                                    $time_vpft = date("H:i", strtotime($shift_start_time));
                                                    $shfit_vpft = 'N/A';
                                                    $start_date_vpft = 'N/A';
                                                    $finish_date_vpft = 'N/A';
                                                    $imp_plan_vpft = 'N/A';
                                                    $imp_actual_vpft = 'N/A';
                                                    $estimate_time_vpft = $prepareTime;
                                                    $print_time_vpft = 'N/A';
                                                    $change_over_vpft = 'N/A';
                                                    $xrite_vpft = 'N/A';
                                                    $screen_vpft = 'N/A';
                                                    $pigment_vpft = 'N/A';
                                                    $status_vpft = 'N/A';
                                                    $remarks_vpft = 'N/A';
                                                    $is_edit_vpft = 'N/A';
                                                    $item01_vpft = 'N/A';
                                                    $item02_vpft = 'N/A';
                                                    $item03_vpft = 'N/A';
                                                    $item04_vpft = 'N/A';
                                                    $item05_vpft = 'N/A';
                                                    $org_name_vpft = $loge_user;
                                                    $org_date_vpft = getServerDate();
                                                    $org_time_vpft = getServerTime();
                                                    $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                }
                                                ?>




                                            </tr>
                                            <tr>
                                                <td>#</td>   
                                                <td></td>
                                                <td><?php
                                                    $first_ptime = appendTime($shift_start_time, 15);
                                                    $three_time = appendTime($first_ptime, $time_fp);
                                                    echo date("H:i", strtotime($first_ptime));
                                                    ?>
                                                </td>
                                                <td>N/A</td>
                                                <td>N/A</td>                                      
                                                <td>N/A</td>                                           
                                                <td>F/P Time</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td><?php echo($firstPrinting); ?></td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td><?php echo($time_fp); ?></td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>                                        
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>

                                                <?php
                                                if ($_GET['ID']) {
                                                    $id = 'N/A';
                                                    $ID_vpft = $vp_data[2] . 'F/P' . $machine_no;
                                                    $ref_no_vpft = $_GET['id'];
                                                    $design_vpft = 'N/A';
                                                    $pro_no_vpft = 'F/P Time';
                                                    $lot_vpft = 'N/A';
                                                    $num_colors_vpft = 'N/A';
                                                    $plan_colors_vpft = 'N/A';
                                                    $machine_no_vpft = $machine_no;
                                                    $date_vpft = $vp_data[2];
                                                    $time_vpft = date("H:i", strtotime($first_ptime));
                                                    $shfit_vpft = 'N/A';
                                                    $start_date_vpft = 'N/A';
                                                    $finish_date_vpft = 'N/A';
                                                    $imp_plan_vpft = $firstPrinting;
                                                    $imp_actual_vpft = 'N/A';
                                                    $estimate_time_vpft = $time_fp;
                                                    $print_time_vpft = 'N/A';
                                                    $change_over_vpft = 'N/A';
                                                    $xrite_vpft = 'N/A';
                                                    $screen_vpft = 'N/A';
                                                    $pigment_vpft = 'N/A';
                                                    $status_vpft = 'N/A';
                                                    $remarks_vpft = 'N/A';
                                                    $is_edit_vpft = 'N/A';
                                                    $item01_vpft = 'N/A';
                                                    $item02_vpft = 'N/A';
                                                    $item03_vpft = 'N/A';
                                                    $item04_vpft = 'N/A';
                                                    $item05_vpft = 'N/A';
                                                    $org_name_vpft = $loge_user;
                                                    $org_date_vpft = getServerDate();
                                                    $org_time_vpft = getServerTime();
                                                    $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                }
                                                ?>


                                            </tr>

                                            <?php
											
                                            $query = "SELECT*FROM virtua_time_store_tbl WHERE  ref_no_vtst='" . $_GET['id'] . "'  AND machine_no_vtst='" . $machine_no . "' ORDER BY item02_vtst, plan_colors_vtst ASC";
                                            // $query = "SELECT*FROM virtua_time_store_tbl WHERE  ref_no_vtst='" . $_GET['id'] . "'  AND machine_no_vtst='" . $machine_no . "' ORDER BY lot_vtst, plan_colors_vtst ASC";
                                            //echo($query);
                                            $rowLimit = 1200;
                                            $dataProcessed = [];
                                            if ($result = $conn->query($query)) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $dataProcessed[$row['pro_no_vtst']][] = [
                                                        'id' => $row['id'],
                                                        'lot_no_vpt' => $row['lot_vtst'],
                                                        'item01_vpt' => $row['item02_vtst'],
                                                        'colours_pm' => $row['plan_colors_vtst'],
                                                        'qty' => $row['qty_vtst'],
                                                        'pro_no_vpt' => $row['pro_no_vtst'],
                                                        'ship_scheduled_date_vpt' => $row['date_vtst'],
                                                        'num_colors_vtst' => $row['num_colors_vtst'],
                                                        'qty_vpt' => $row['qty_vtst'],
                                                        'total_time_vtst' => $row['total_time_vtst'],
                                                        'machine_no_vtst' => $row['machine_no_vtst'],
                                                    ];
                                                }
                                            }
                                            ?>  


                                            <?php
                                            $total = 0;
                                            $PlanImpressions = 0;
                                            $index = 0;
                                            $sheetBreak = 0;
                                            $unloading_time = ($machine_data[4] == "1040") ? 45 : 0;
                                            $tea_time = ($machine_data[4] == "1040") ? 30 : 15;
                                            $full_time = $prepareTime + $time_fp + $tea_time + $unloading_time;
                                            $prevColor = '';
                                            $data = [];
                                            $getTime = $three_time;
                                            $isTeaTimeSet = false;
                                            $isEveTeaTimeSet = false;
                                            $dayCount = 1;
                                            while (count($dataProcessed) > 0) {
                                                foreach ($dataProcessed as $ref => $records) {
                                                    if ($index < 22) {
                                                        $row = reset($records);
                                                        $total += $row['qty'];
                                                        $leadTime = round(($row['num_colors_vtst'] - 1) / 3, 0);
                                                        $leadTime = ($leadTime == '1') ? 0 : $leadTime - 1;
                                                        $newDate = strtotime($row['ship_scheduled_date_vpt'] . '+ ' . $leadTime . 'days');
                                                        $caldate = Date('Y-m-d', $newDate);
                                                        $index ++;

                                                        if ($prevColor != $row['colours_pm']) {
                                                            $sheetBreak = 0;
                                                        }
                                                        $prevColor = $row['colours_pm'];
                                                        $total = 0;
                                                        $sheetBreak += $row['qty'];
                                                        $full_time += $row['total_time_vtst'];
                                                        $total_time = $row['total_time_vtst'];
                                                        $total_time_sum = "0:" . $total_time;
                                                        $oneSheetPerTime = $row['qty'] / $total_time;
                                                        $oldsheet = $row['qty'];
                                                        if ($full_time < 1040) {
                                                            ?>    


                                                            <?php
                                                            if (
                                                                    strtotime($getTime) >= strtotime("2000-01-0$dayCount 09:30:00") &&
                                                                    $isTeaTimeSet == false
                                                            ) {
                                                                $isTeaTimeSet = true;
                                                                ?>
                                                                <tr style="background-color: lightblue;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>09:30</td>
                                                                    <td colspan="10">
                                                                        Tea Time - <?php echo dayPrint($dayCount); ?>
                                                                    </td>
                                                                    <td >15</td>
                                                                    <td colspan="8"></td>

                                                                    <?php
                                                                    if ($_GET['ID']) {
                                                                        $id = 'N/A';
                                                                        $ID_vpft = $vp_data[2] . 'Morning Tea' . $machine_no;
                                                                        $ref_no_vpft = $_GET['id'];
                                                                        $design_vpft = 'N/A';
                                                                        $pro_no_vpft = 'Morning Tea Time';
                                                                        $lot_vpft = 'N/A';
                                                                        $num_colors_vpft = 'N/A';
                                                                        $plan_colors_vpft = 'N/A';
                                                                        $machine_no_vpft = $machine_no;
                                                                        $date_vpft = $vp_data[2];
                                                                        $time_vpft = '9:30';
                                                                        $shfit_vpft = 'N/A';
                                                                        $start_date_vpft = 'N/A';
                                                                        $finish_date_vpft = 'N/A';
                                                                        $imp_plan_vpft = 'N/A';
                                                                        $imp_actual_vpft = 'N/A';
                                                                        $estimate_time_vpft = 15;
                                                                        $print_time_vpft = 'N/A';
                                                                        $change_over_vpft = 'N/A';
                                                                        $xrite_vpft = 'N/A';
                                                                        $screen_vpft = 'N/A';
                                                                        $pigment_vpft = 'N/A';
                                                                        $status_vpft = 'N/A';
                                                                        $remarks_vpft = 'N/A';
                                                                        $is_edit_vpft = 'N/A';
                                                                        $item01_vpft = 'N/A';
                                                                        $item02_vpft = 'N/A';
                                                                        $item03_vpft = 'N/A';
                                                                        $item04_vpft = 'N/A';
                                                                        $item05_vpft = 'N/A';
                                                                        $org_name_vpft = $loge_user;
                                                                        $org_date_vpft = getServerDate();
                                                                        $org_time_vpft = getServerTime();
                                                                        $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                                    }
                                                                    ?>

                                                                </tr> 

                                                                <?php
                                                                $getTime = appendTime($getTime, 15);
                                                            }
                                                            ?>

                                                            <?php
                                                            if (
                                                                    strtotime($getTime) >= strtotime("2000-01-0$dayCount 15:00:00") &&
                                                                    $isEveTeaTimeSet == false
                                                            ) {
                                                                $isEveTeaTimeSet = true;
                                                                ?>
                                                                <tr style="background-color: lightblue;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>15:00</td>
                                                                    <td colspan="10">
                                                                        Evening Tea Time - <?php echo dayPrint($dayCount); ?>
                                                                    </td>
                                                                    <td >15</td>
                                                                    <td colspan="8"></td>


                                                                    <?php
																	
                                                                    if ($_GET['ID']) {
																		
                                                                        $id = 'N/A';
                                                                        $ID_vpft = $vp_data[2] . 'Evening Tea' . $machine_no;
                                                                        $ref_no_vpft = $_GET['id'];
                                                                        $design_vpft = 'N/A';
                                                                        $pro_no_vpft = 'Evening Tea Time';
                                                                        $lot_vpft = 'N/A';
                                                                        $num_colors_vpft = 'N/A';
                                                                        $plan_colors_vpft = 'N/A';
                                                                        $machine_no_vpft = $machine_no;
                                                                        $date_vpft = $vp_data[2];
                                                                        $time_vpft = '15:00';
                                                                        $shfit_vpft = 'N/A';
                                                                        $start_date_vpft = 'N/A';
                                                                        $finish_date_vpft = 'N/A';
                                                                        $imp_plan_vpft = 'N/A';
                                                                        $imp_actual_vpft = 'N/A';
                                                                        $estimate_time_vpft = 15;
                                                                        $print_time_vpft = 'N/A';
                                                                        $change_over_vpft = 'N/A';
                                                                        $xrite_vpft = 'N/A';
                                                                        $screen_vpft = 'N/A';
                                                                        $pigment_vpft = 'N/A';
                                                                        $status_vpft = 'N/A';
                                                                        $remarks_vpft = 'N/A';
                                                                        $is_edit_vpft = 'N/A';
                                                                        $item01_vpft = 'N/A';
                                                                        $item02_vpft = 'N/A';
                                                                        $item03_vpft = 'N/A';
                                                                        $item04_vpft = 'N/A';
                                                                        $item05_vpft = 'N/A';
                                                                        $org_name_vpft = $loge_user;
                                                                        $org_date_vpft = getServerDate();
                                                                        $org_time_vpft = getServerTime();
                                                                        $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                                    }
                                                                    ?>


                                                                </tr> 

                                                                <?php
                                                                $getTime = appendTime($getTime, 15);
                                                            }
                                                            ?>


                                                            <tr>
                                                                <td><?php echo($index); ?></td> 
                                                                <td><?php echo($row['machine_no_vtst']); ?></td>                                                  
                                                                <td><?php echo date("H:i", strtotime($getTime)); ?></td>
                                                                <td><?php echo(getShift(date("H", strtotime($getTime)))); ?></td>  
                                                               <td><?php echo($row['ship_scheduled_date_vpt']); ?></td>  
                                                               <td><?php echo $caldate; ?></td>
                                                                                                       
                                                                <td><?php echo($row['pro_no_vpt']); ?></td>
                                                                <td><?php echo($row['item01_vpt']); ?></td>
                                                                <td  style="<?php
                                                                if ($status > 0) {
                                                                    echo 'background-color: Blue;';
                                                                }
                                                                ?>" ><?php echo($row['lot_no_vpt']); ?></td>
                                                                <td><?php echo($row['num_colors_vtst']); ?></td>  
                                                                <td style="<?php
                                                                if ($sheetBreak > 25000) {
                                                                    echo 'background-color: red;';
                                                                }
                                                                ?>"><?php
                                                                        echo($row['qty_vpt']);

                                                                        $PlanImpressions += $row['qty'];
                                                                        ?>
                                                                </td>
                                                                <td></td>
                                                                <td> <?php echo($row['colours_pm']); ?></td>
                                                                <td><?php echo($row['total_time_vtst']);
                                                                        ?>
                                                                <td><?php echo($changeOver); ?></td>
                                                                <td><?php echo(abs($row['total_time_vtst'] - $changeOver)); ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>



                                                                <?php
                                                                if ($_GET['ID']) {
                                                                    $id = 'N/A';
                                                                    $ID_vpft = $row['id'];
                                                                    $ref_no_vpft = $_GET['id'];
                                                                    $design_vpft = $row['item01_vpt'];
                                                                    $pro_no_vpft = $row['pro_no_vpt'];
                                                                    $lot_vpft = $row['lot_no_vpt'];
                                                                    $num_colors_vpft = $row['num_colors_vtst'];
                                                                    $plan_colors_vpft = $row['colours_pm'];
                                                                    $machine_no_vpft = $row['machine_no_vtst'];
                                                                    $date_vpft = $vp_data[2];
                                                                    $time_vpft = date("H:i", strtotime($getTime));
                                                                    $shfit_vpft = getShift(date("H", strtotime($getTime)));
                                                                    $start_date_vpft = $caldate;
                                                                    $finish_date_vpft = $row['ship_scheduled_date_vpt'];
                                                                    $imp_plan_vpft = $row['qty_vpt'];
                                                                    $imp_actual_vpft = '0';
                                                                    $estimate_time_vpft = $row['total_time_vtst'];
                                                                    $print_time_vpft = abs($row['total_time_vtst'] - $changeOver);
                                                                    $change_over_vpft = $changeOver;
                                                                    $xrite_vpft = '';
                                                                    $screen_vpft = '';
                                                                    $pigment_vpft = '';
                                                                    $status_vpft = '0';
                                                                    $remarks_vpft = '';
                                                                    $is_edit_vpft = '';
                                                                    $item01_vpft = '';
                                                                    $item02_vpft = '';
                                                                    $item03_vpft = '';
                                                                    $item04_vpft = '';
                                                                    $item05_vpft = '';
                                                                    $org_name_vpft = $loge_user;
                                                                    $org_date_vpft = getServerDate();
                                                                    $org_time_vpft = getServerTime();
                                                                    $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                                }
                                                                ?>

                                                            </tr> 








                                                            <?php
                                                            if ($total > $rowLimit) {
                                                                break;
                                                            }
                                                            $getTime = appendTime($getTime, $total_time);
                                                        }
                                                    }
                                                }

                                                foreach (array_keys($dataProcessed) as $key) {
                                                    array_shift($dataProcessed[$key]);
                                                    if (!count($dataProcessed[$key])) {
                                                        unset($dataProcessed[$key]);
                                                    }
                                                }
                                            }
                                            ?>

                                            <tr style="background-color: lightblue;">
                                                <td></td>
                                                <td></td>
                                                <td><?php echo date("H:i", strtotime($getTime)); ?></td>
                                                <td colspan="10">
                                                    Paper unload time  
                                                </td>                                                        
                                                <td>45</td>
                                                <td colspan="8">                                                           
                                                </td> 

                                                <?php
                                                if ($_GET['ID']) {
                                                    $id = 'N/A';
                                                    $ID_vpft = $vp_data[2] . 'Paper unload time ' . $machine_no;
                                                    $ref_no_vpft = $_GET['id'];
                                                    $design_vpft = 'N/A';
                                                    $pro_no_vpft = 'Paper unload time';
                                                    $lot_vpft = 'N/A';
                                                    $num_colors_vpft = 'N/A';
                                                    $plan_colors_vpft = 'N/A';
                                                    $machine_no_vpft = $machine_no;
                                                    $date_vpft = $vp_data[2];
                                                    $time_vpft = date("H:i", strtotime($getTime));
                                                    $shfit_vpft = 'N/A';
                                                    $start_date_vpft = 'N/A';
                                                    $finish_date_vpft = 'N/A';
                                                    $imp_plan_vpft = 'N/A';
                                                    $imp_actual_vpft = 'N/A';
                                                    $estimate_time_vpft = 45;
                                                    $print_time_vpft = 'N/A';
                                                    $change_over_vpft = 'N/A';
                                                    $xrite_vpft = 'N/A';
                                                    $screen_vpft = 'N/A';
                                                    $pigment_vpft = 'N/A';
                                                    $status_vpft = 'N/A';
                                                    $remarks_vpft = 'N/A';
                                                    $is_edit_vpft = 'N/A';
                                                    $item01_vpft = 'N/A';
                                                    $item02_vpft = 'N/A';
                                                    $item03_vpft = 'N/A';
                                                    $item04_vpft = 'N/A';
                                                    $item05_vpft = 'N/A';
                                                    $org_name_vpft = $loge_user;
                                                    $org_date_vpft = getServerDate();
                                                    $org_time_vpft = getServerTime();
                                                    $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                }
                                                ?>

                                            </tr>   

                                            <?php $getTimeLast = appendTime($getTime, 45); ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo date("H:i", strtotime($getTimeLast)); ?></td>
                                                <td colspan="20">                                                          
                                                </td>   

                                                <?php
                                                if ($_GET['ID']) {
                                                    $id = 'N/A';
                                                    $ID_vpft = $vp_data[2] . 'End' . $machine_no;
                                                    $ref_no_vpft = $_GET['id'];
                                                    $design_vpft = 'N/A';
                                                    $pro_no_vpft = 'End';
                                                    $lot_vpft = 'N/A';
                                                    $num_colors_vpft = 'N/A';
                                                    $plan_colors_vpft = 'N/A';
                                                    $machine_no_vpft = $machine_no;
                                                    $date_vpft = $vp_data[2];
                                                    $time_vpft = date("H:i", strtotime($getTimeLast));
                                                    $shfit_vpft = 'N/A';
                                                    $start_date_vpft = 'N/A';
                                                    $finish_date_vpft = 'N/A';
                                                    $imp_plan_vpft = 'N/A';
                                                    $imp_actual_vpft = 'N/A';
                                                    $estimate_time_vpft = 'N/A';
                                                    $print_time_vpft = 'N/A';
                                                    $change_over_vpft = 'N/A';
                                                    $xrite_vpft = 'N/A';
                                                    $screen_vpft = 'N/A';
                                                    $pigment_vpft = 'N/A';
                                                    $status_vpft = 'N/A';
                                                    $remarks_vpft = 'N/A';
                                                    $is_edit_vpft = 'N/A';
                                                    $item01_vpft = 'N/A';
                                                    $item02_vpft = 'N/A';
                                                    $item03_vpft = 'N/A';
                                                    $item04_vpft = 'N/A';
                                                    $item05_vpft = 'N/A';
                                                    $org_name_vpft = $loge_user;
                                                    $org_date_vpft = getServerDate();
                                                    $org_time_vpft = getServerTime();
                                                    $vpf->createNewVirtualPlannerFinal($id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft);
                                                }
                                                ?>

                                            </tr>  


                                        </table>
                                        <table style="width:100%">                                    
                                            <tr>
                                                <td style="width:10%">Remaining time</td>
                                                <td style="width:5%"><b><?php echo($machine_data[4] - $full_time); ?></b></td>                                        
                                                <td style="width:10%">Total Plan Screen Change overs</td>
                                                <td style="width:10%"><b><?php echo($index); ?></b></td>
                                                <td style="width:10%"> Plan Impressions</td>
                                                <td style="width:10%"><b><?php echo($PlanImpressions); ?></b></td>
                                            </tr>
                                        </table>


                                    </div>


                                </div>


                                <?php
                            }
                        }
                        ?>





                        <div class="row">

                            <button class="btn btn-lg blue hidden-print margin-bottom-5">Other color(Not Plan)</button>

                            <table style="width:100%" class="next">                                    
                                <tr>
                                    <th style="width:10%">  
                                        Pro No
                                    </th>

                                    <th style="width:10%"> 
                                        Lot Number
                                    </th>
                                    <th style="width:10%"> 
                                        Design
                                    </th>
                                    <th style="width:10%">
                                      Reaming   colors 
                                    </th>   

                                    <th style="width:10%">
                                        # colors 
                                    </th> 
                                    
                                               <th style="width:10%">
                                        Estimated Date
                                    </th> 
                                    
                                    
                                </tr>


                                <?php
                                $query = "SELECT*FROM virtual_temp_details_tbl Where ref_no_vtdt='" . $_GET['id'] . "' AND item02_vtdt='0'   ORDER BY priority_vtdt,lot_no_vtdt,colours_vtdt ASC";
                                if ($result = $conn->query($query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>


                                        <tr>                                
                                            <td><?php echo($row['pro_no_vtdt']); ?></td>
                                            <td><?php echo($row['lot_no_vtdt']); ?></td>
                                            <td><?php echo($row['design_no_vtdt']); ?></td>
                                            <td><?php echo($row['colours_vtdt']); ?></td>
                                            <td><?php echo($row['number_colour_vtdt']); ?></td>
                                            
                                            <td>                                                                                                
                                                <?php
                                                
                                                echo($vtf->getVirtualTempDetailsPrintDate($row['lot_no_vtdt'],$row['colours_vtdt'],$row['number_colour_vtdt']-1));
                                                ?>
                                            </td>
                                        </tr>




    <?php }
} ?>
                            </table>


                        </div>



                        <div class="row">
                            <div class="col-xs-4">
                                <div class="well">
                                    <address>
                                        <strong>Noritake (PVT) LTD <?php echo($_GET['ID']) ?>
                                        </strong><br/>

                                    </address>
                                </div>
                            </div>
                            <div class="col-xs-8 invoice-block">

                                <br/>
<?php
if (empty($_GET['ID'])) {
    ?>
                                    <a class="btn btn-lg blue hidden-print margin-bottom-5"                   onclick="PlanSaveConfirm('<?php echo($_GET['id']); ?>', 'virtual_printing_planne_view.php?id=<?php echo($_GET['id']); ?>&ID=<?php echo ('save'); ?> ',
                                                        '<?php echo($_GET['id']); ?>')";  >
                                        Save MM Plan
                                    </a>

<?php } ?>

                                <a class="btn btn-lg blue hidden-print margin-bottom-5"                   onclick="PlanResetConfirm('<?php echo($_GET['id']); ?>', 'delete_virtual_printing_planner.php?id=<?php echo($_GET['id']); ?>',
                                                '<?php echo($_GET['id']); ?>')";  >
                                    Reset Plan <i >                                             



                                    </i>



                                </a>

                                <!--                                        <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
                                                                            Print <i class="fa fa-print"></i>
                                                                        </a>--->


                                <a class="btn btn-lg green hidden-print margin-bottom-5" onclick="window.location.href = 'virtual_planner_beta_view.php'">
                                    Cancel <i ></i>
                                </a>


                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
            <div class="page-quick-sidebar-wrapper">
                <div class="page-quick-sidebar">
                    <div class="nav-justified">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#quick_sidebar_tab_1" data-toggle="tab">
                                    Users <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#quick_sidebar_tab_2" data-toggle="tab">
                                    Alerts <span class="badge badge-success">7</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    More<i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-bell"></i> Alerts </a>
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-info"></i> Notifications </a>
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-settings"></i> Settings </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                    <h3 class="list-heading">Staff</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">8</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar3.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Bob Nilson</h4>
                                                <div class="media-heading-sub">
                                                    Project Manager
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar1.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nick Larson</h4>
                                                <div class="media-heading-sub">
                                                    Art Director
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">3</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar4.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Hubert</h4>
                                                <div class="media-heading-sub">
                                                    CTO
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar2.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Wong</h4>
                                                <div class="media-heading-sub">
                                                    CEO
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">Customers</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">2</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar6.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lara Kunis</h4>
                                                <div class="media-heading-sub">
                                                    CEO, Loop Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 03:10 AM
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="label label-sm label-success">new</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar7.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                                <div class="media-heading-sub">
                                                    Project Manager,<br>
                                                    SmartBizz PTL
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar8.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lisa Stone</h4>
                                                <div class="media-heading-sub">
                                                    CTO, Keort Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 13:10 PM
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">7</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar9.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Portalatin</h4>
                                                <div class="media-heading-sub">
                                                    CFO, H&D LTD
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar10.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Irina Savikova</h4>
                                                <div class="media-heading-sub">
                                                    CEO, Tizda Motors Inc
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">4</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar11.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Maria Gomez</h4>
                                                <div class="media-heading-sub">
                                                    Manager, Infomatic Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 03:10 AM
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="page-quick-sidebar-item">
                                    <div class="page-quick-sidebar-chat-user">
                                        <div class="page-quick-sidebar-nav">
                                            <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-messages">
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        When could you send me the report ? </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        Its almost done. I will be sending it shortly </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        Alright. Thanks! :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:16</span>
                                                    <span class="body">
                                                        You are most welcome. Sorry for the delay. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        No probs. Just take your time :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body">
                                                        Alright. I just emailed it to you. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        Great! Thanks. Will check it right away. </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body">
                                                        Please let me know if you have any comment. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        Sure. I will check and buzz you if anything needs to be corrected. </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message here...">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                                <div class="page-quick-sidebar-alerts-list">
                                    <h3 class="list-heading">General</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                                Take action <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                Finance Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New order received with <span class="label label-sm label-success">
                                                                Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    30 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
                                                                Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    2 hours
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                IPO Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">System</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                                Take action <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                Finance Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New order received with <span class="label label-sm label-success">
                                                                Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    30 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                                Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    2 hours
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                IPO Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                                <div class="page-quick-sidebar-settings-list">
                                    <h3 class="list-heading">General Settings</h3>
                                    <ul class="list-items borderless">
                                        <li>
                                            Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">System Settings</h3>
                                    <ul class="list-items borderless">
                                        <li>
                                            Security Level
                                            <select class="form-control input-inline input-sm input-small">
                                                <option value="1">Normal</option>
                                                <option value="2" selected>Medium</option>
                                                <option value="e">High</option>
                                            </select>
                                        </li>
                                        <li>
                                            Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
                                        </li>
                                        <li>
                                            Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
                                        </li>
                                        <li>
                                            Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                    </ul>
                                    <div class="inner-content">
                                        <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN FOOTER -->
<?php
include_once '../tpl/footer.php';
?>
        >
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../js/script.js"></script>

        <script>
                                    $(document).ready(function () {
                                        $("button").click(function () {
                                            $(".next").toggle();
                                        });
                                    });
        </script>
        <script>
            jQuery(document).ready(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                Demo.init(); // init demo features
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>