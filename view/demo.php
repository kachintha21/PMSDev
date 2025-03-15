<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/VirtualPlannerFinal.class.php");
include("../model/PigmentIssuesDetails.class.php");
include("../model/PigmentModel.class.php");
$pl = new PigmentIssuesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpf = new VirtualPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($_SESSION['logged_usr_id']) {
    $pr = $_GET['project_no_tct'];
    $pname = $_SESSION['design_number_pidt'];
    $loge_user = $_SESSION['logged_usr_id'];
    $loge_depart = $_SESSION['logged_usr_depat'];
   
   if (isset($_GET["id"])) {                                                                           
   $vpf->updateVirtualPlannerUdateID($_GET["id"], '', '0', '', 0, '', '');
   }
                           
    
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

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Machine Plan </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->

        <link href="../assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

  

        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>

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


                    <h3 class="page-title">Machine Plan
                        
                      

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Machine Plan
                            </li>
                            <i class="fa fa-angle-right"></i></li>
                                   <li> 
                                    <a  target="_blank" href="machine_hold_details.php?project_no_tct=<?php echo($_GET['project_no_tct']); ?> &machine_no_vpft=<?php echo($_GET['machine_no_vpft']); ?> &date_vpft=<?php echo($_GET['date_vpft']); ?>  &hold=<?php echo('hold'); ?>'"  style="text-decoration: none" title="Hold Details" ><b>Hold(<?php echo($vpf->getHoldVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li> 
                                <a href="#"  style="text-decoration: none" title="WIP Details" ><b>WIP(<?php echo($vpf->getWipVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li> <a href="#"  style="text-decoration: none" title="Daily_Output" ><b>Daily_Output(<?php echo($vpf->getDailyVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a> <i ></i> </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Machine Plan
                                        <?php
                                        if (isset($_POST["status"])) {
                                            $vpf->updateVirtualPlannerFinalByID($_POST["id"], '', $_POST["status"], $_POST["imp_actual_vpft"], 1, getServerDate(), getServerTime(), $_POST["hre"], $_POST["screen"], $_POST["pigment"], $_POST["color_book"], $_POST["plate_box"], $_POST["ac_sheets"], $_POST["pl_time"], $_POST["co_time"], $_POST["pr_time"], $_POST["lo_time"], $_POST["lt_reason"], $_POST["lp_reason"], $_POST["quality_req"], $_POST["check_status"], $_POST["ap_dt"], $_POST["proceed_decision"], $_POST["approval_date"], $_POST["approval_status"]);
                                        }
                                        ?>
                                        
                                      
                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="demo.php"  class="form-horizontal form-bordered" id="testform"  method="get">

                                        <input  type="hidden" class="form-control"  name="org_name_pidt" id="org_name_pidt"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="barcode_ref_no_pidt" id="barcode_ref_no_pidt" value="<?php echo($pl->getNextPigmentIssuesDetailsRefNo("pigment_issues_details_tbl", "NLPLPM")); ?>"  />

                                        <div class="form-body">                 
                                            <div class="form-group form-group">

                                                <!--                                    <form id="testform" action="demo.php"  class="form-horizontal form-bordered" method="get">-->



                                                <label class="control-label col-sm-1">Ref No
                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <?php
                                                    $sql = "SELECT ref_no_vt,id FROM virtual_planner_tbl GROUP BY id ";
                                                    ?>
                                                    <select  class="form-control" name="project_no_tct" id="project_no_tct" required> 

                                                        <option value="">- Select -</option>
                                                        <?php
                                                        if ($res = $conn->query($sql)) {
                                                            while ($pr = $res->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo ($pr['ref_no_vt']); ?>" <?php echo (($_GET['id'] ?? "") == $pr['ref_no_vt'] ? "selected" : $pr['ref_no_vt']); ?>><?php echo ($pr['ref_no_vt']); ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>'
                                                    </select>



                                                </div>


<?php
 print  $machine = $_GET['machine_no_vpft'];
?>

<input  type="hidden" name="machine" id="machine" class="form-control" value="<?php 
													
													if(isset($_GET['machine_no_vpft']))
													{
													print 	$_GET['machine_no_vpft'];
													}else
													{

													}
													
													
													?>" >

                                                <label class="control-label col-sm-1">MC/No
                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    
                                                    
                                                    <?php
print  $_GET['machine_no_vpft'];
?>
                                                    
                                                    
                                                    <select  class="form-control" name="machine_no_vpft" id="machine_no_vpft" required> 




                                                        <option value="">- Select -</option>
                                                        <?php
                                                        for ($i = 1; $i < 5; $i++) {
                                                            ?>
                                                            <option value="<?php echo ("M0" . $i); ?>" ><?php echo ("M0" . $i); ?></option>
                                                       <?php
														}
                                                        ?> 
                                                    </select>
                                                </div>

                                                <label class="control-label col-sm-1">Date
                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input type="date" name="date_vpft" id="date_vpft" class="form-control" value="<?php 
													
													if(isset($_GET['date_vpft']))
													{
													print 	$_GET['date_vpft'];
													}else
													{
													echo(getServerDate());
													}
													
													
													?>" >
                                                </div>
                                                <div class="col-sm-1">                         
                                                    <button type="button" class="btn purple" onClick="document.getElementById('testform').submit()" >  Find </button>
                                                </div>
                                                </form>
                                            </div>
                                            
                                             <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                   
                                        
                                        <div class="form-body">                 
                                            <div class="form-group form-group">

      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#94F393">
      
      <?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Values to search for
$mc_no = $_GET['machine_no_vpft'] ?? 'default_mc_no'; // Replace with actual value or default
$P_date = $_GET['date_vpft'] ?? '2024-01-01'; // Replace with actual value or default

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM tbl_impressions_data WHERE mc_no = ? AND P_date = ?");
$stmt->bind_param("ss", $mc_no, $P_date);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
$row = $result->fetch_assoc();

// Close connections
$stmt->close();


?>
<tbody>
            <tr style="font-size:12px">
                <td>Planned Impressions <input name="pl_im" type="text" id="pl_im" size="5" value="<?php echo $row['pl_im']; ?>"></td>
                <td>Actual Impressions <input name="act_im" type="text" id="act_im" size="5" value="<?php echo $row['act_im']; ?>"></td>
                <td>P/P Time <input name="pp_time" type="text" id="pp_time" size="5" value="<?php echo $row['pp_time']; ?>"></td>
                <td>Paper Unload Time (min) <input name="unload_time" type="text" id="unload_time" size="5" value="<?php echo $row['unload_time']; ?>"></td>
                <td>1st Shift Operator EPF <input name="shift1_op" type="text" id="shift1_op" size="5" value="<?php echo $row['shift1_op']; ?>"></td>
                <td>1st Shift Helper EPF <input name="shift1_helper" type="text" id="shift1_helper" size="5" value="<?php echo $row['shift1_helper']; ?>"></td>
                <td>2nd Shift Operator EPF <input name="shift2_op" type="text" id="shift2_op" size="5" value="<?php echo $row['shift2_op']; ?>"></td>
                <td>2nd Shift Helper EPF <input name="shift2_helper" type="text" id="shift2_helper" size="5" value="<?php echo $row['shift2_helper']; ?>"></td>
                <td>Data Uploaded by -EPF <input name="data_uploader" type="text" id="data_uploader" size="5" value="<?php echo $row['data_uploader']; ?>"></td>
                <td><button type="button" class="btn green">Submit</button></td>
            </tr>
        </tbody>
    </table>

                                                    </div></div>
                                                </form>
                                            </div>



                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="2%">No</th>
                                                                     <th class="text-center" width="2%">Pigment Data</th>
                                                                     <th class="text-center" width="2%">Screen Data</th>
                                                                    <th class="text-center" width="8%">Time

                                                                    <th class="text-center" width="8%">Start
                                                                        Date</th>                        

                                                                    <th class="text-center" width="10%"> Finish	
                                                                        Date
                                                                    </th>
                                                                    <th class="text-center" width="10%">Pro No
                                                                    </th>

                                                                    <th class="text-center" width="10%">Design
                                                                    </th>

                                                                    <th class="text-center" width="7%">Lot
                                                                    </th>

                                                                    <th class="text-center" width="5%">#Color</th>

                                                                    <th class="text-center" width="6%">Color  </th>
                                                                    <th class="text-center" width="5%">Plan</th>
                                                                    <th class="text-center" width="10%">Actual</th>
																	<th class="text-center" width="10%">Hold Reason</th>
                                                                    <th class="text-center" width="15%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                
                                                                
																 $query = "SELECT a.*,b.item01_pm,c.is_edit_ppft,d.is_edit_spft FROM virtual_planner_final_tbl a 
LEFT JOIN pigment_master_tbl b ON a.design_vpft=b.pattern_pm 
AND a.plan_colors_vpft=b.colours_pm 
LEFT JOIN pigment_planner_final_tbl c
ON a.pro_no_vpft=c.pro_no_ppft AND a.plan_colors_vpft=c.plan_colors_ppft
AND a.ref_no_vpft=c.ref_no_ppft
LEFT JOIN screen_planner_final_tbl d
ON a.pro_no_vpft=d.pro_no_spft AND a.plan_colors_vpft=d.plan_colors_spft
WHERE     a.machine_no_vpft='" . $_GET['machine_no_vpft'] . "' 
AND a.date_vpft='" . $_GET['date_vpft'] . "' and a.plan_colors_vpft !='S00'  AND (a.status_vpft ='' ||  a.status_vpft ='0') ORDER BY CAST(a.time_vpft  AS INTEGER),a.id ASC";
                                                                ?>  

                                                                <?php
                                                                if ($result = $conn->query($query)) {
                                                                    $index = 0;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $index ++;
																		$tea=$row["time_vpft"];
																		
																		if($tea<'9:00'){
																			
																			$tea_t=$tea;																			
																		}
																		if($tea_t<$tea){
																			
																			?>
																			<tr>
																			<td colspan='10'>"Tea Time"</td>
																			</tr>
																			<?php
																		}
																		
																		
																		$teac=$row["time_vpft"];
																		
																		if($teac<14.00){
																			//print(333);exit;
																			$teac_t=$teac;																			
																		}
																		else{
																			//print($tea);exit;
																			
																		}
																		if($teac_t<$teac && $teac_tt!=1){
																			
																			$teac_tt=1;
																			?>
																			<tr>
																			<td colspan='10'>"Shift Change"</td>
																			</tr>
																			<?php
																		}
																		
																		$teac2=$row["time_vpft"];
																		
																		if($teac2<18.00){
																			//print(333);exit;
																			$teac2_t=$teac2;																			
																		}
																		else{
																			//print($tea);exit;
																			
																		}
																		if($teac2_t<$teac2 && $teac2_tt!=1){
																			
																			$teac2_tt=1;
																			?>
																			<tr>
																			<td colspan='10'>"Tea Time"</td>
																			</tr>
																			<?php
																		}
																		
                                                                        ?>    

                                                                        <tr id='addr0' class="tr-row" 
                                                                            <?php 
										if($row["item01_pm"]>'1000')
                                        { ?> style="background-color: red;"<?php }
                                        else if($row["is_edit_ppft"] == '1' && $row["is_edit_spft"] == '1')
                                        { ?> style="background-color: #CBC3E3;"<?php }
										
                                        else if($row["is_edit_ppft"] == '1')
                                        { ?> style="background-color: orange;"<?php }
										
                                        else if($row["is_edit_spft"] == '1')
                                        { ?> style="background-color: yellow;"<?php }
										
										else
                                        { ?> style="background-color: lightblue;"<?php }
                                    
										?> >
                                                                            
                                                                           
                                                                            
                                                                            
                                                                            <td>

                                                                                <?php
                                                                                echo($index);
                                                                                ?>

                                                                            </td>
                                                                            
                                                                            <td>
                                                                                
                                                                                <?php
                                                                                if($row["is_edit_ppft"]=='1')
                                                                                { 
                                                                                echo("Yes"); 
                                                                                 }
                                                                                
                                                                                ?>

                                                                            </td>
                                                                            
                                                                            <td>
                                                                                
                                                                                <?php
                                                                                if($row["is_edit_spft"]=='1')
                                                                                { 
                                                                                echo("Yes"); 
                                                                                 }
                                                                                
                                                                                ?>

                                                                            </td>

                                                                            <td>
                                                                                <?php
                                                                                echo($row["time_vpft"]);
                                                                                ?>

                                                                            </td>
																			
																			 <td>


                                                                                <?php
                                                                                echo($row["start_date_vpft"]);
                                                                                ?>

                                                                            </td>


                                                                            <td>

                                                                                <?php
                                                                                echo($row["finish_date_vpft"]);
                                                                                ?>
                                                                            </td>


                                                                           



                                                                            <td>
                                                                                <?php
                                                                                echo($row["pro_no_vpft"]);
                                                                                ?>

                                                                            </td>

                                                                            <td>
                                                                                <?php
                                                                                echo($row["design_vpft"]);
                                                                                ?>

                                                                            </td>


                                                                            <td>
                                                                                <?php
                                                                                echo($row["lot_vpft"]);
                                                                                ?>

                                                                            </td>


                                                                            <td>
                                                                                <?php
                                                                                echo($row["num_colors_vpft"]);
                                                                                ?>

                                                                            </td>





                                                                            <td>
                                                                                <?php
                                                                                echo($row["plan_colors_vpft"]);
                                                                                ?>

                                                                            </td>

                                                                            <td>
                                                                                <?php
                                                                                echo($row["imp_plan_vpft"]);
                                                                                ?>

                                                                            </td>

                                                                    <form method="post" action="">



                                                                        <input type="hidden" id="id" name="id" value="<?php echo($row["id"]) ?>">

                                                                        <td>


                                                                            <input class="form-control" type="number" id="imp_actual_vpft" name="imp_actual_vpft" value="<?php echo($row["imp_plan_vpft"]) ?>">

                                                                        </td>
																		
																		<td>



                                                                        <?php
																		
                                                                        $query = "SELECT id,reason FROM tbl_hold_reasons  ";
																		//print($query);exit;
                                                                        ?>


                                                                        <select name="hre" id="hre" class="form-control product">
                                                                           <option value="Pigment light">Pigment light</option>
<option value="Pigment hard">Pigment hard</option>
<option value="Pigment dark">Pigment dark</option>
<option value="Pigment not enough">Pigment not enough</option>
<option value="pigment bucket seraching">pigment bucket seraching</option>
<option value="pigment not in stock">pigment not in stock</option>
<option value="Pigment expired">Pigment expired</option>
<option value="Pigment color changed">Pigment color changed</option>
<option value="Pigment not available">Pigment not available</option>
<option value="Screen damage">Screen damage</option>
<option value="No screen available">No screen available</option>
<option value="Pinhole touch">Pinhole touch</option>
<option value="Screen cleaning">Screen cleaning</option>
<option value="Registering is difficuilt">Registering is difficuilt</option>
<option value="Curve closing">Curve closing</option>
<option value="Layout damages">Layout damages</option>
<option value="Tone ok  (by authority)">Tone ok  (by authority)</option>
<option value="Tone Not ok">Tone Not ok</option>
<option value="Wrong screen">Wrong screen</option>
<option value="Moore appeared">Moore appeared</option>
<option value="Operator absent">Operator absent</option>
<option value="Operator short leave">Operator short leave</option>
<option value="Helper absent">Helper absent</option>
<option value="Helper short leave">Helper short leave</option>
<option value="Machine break down">Machine break down</option>
<option value="Power failure">Power failure</option>
<option value="Slow printing">Slow printing</option>
<option value="Meeting">Meeting</option>
<option value="Cleaning">Cleaning</option>
<option value="Test">Test</option>
<option value="Gold late">Gold late</option>
<option value="No authority">No authority</option>
<option value="Print additional lots">Print additional lots</option>
<option value="Reprint">Reprint</option>
<option value="Plann changed">Plann changed</option>
<option value="Thickness adjustment">Thickness adjustment</option>
<option value="One color only">One color only</option>
<option value="Advance printed">Advance printed</option>
<option value="Partial print">Partial print</option>
<option value="Plate box not available">Plate box not available</option>
<option value="Color book not available">Color book not available</option>
<option value="Xrite data not available">Xrite data not available</option>
<option value="PP">PP</option>
<option value="Machine maintainance">Machine maintainance</option>
<option value="Layout Delay">Layout Delay</option>
<option value="Delay print-Reason mentioned previously">Delay print-Reason mentioned previously</option>


                                                                        </select>                                                       





                                                                    </td>

                                                                        <td>
                                                                            <select class="form-control"  name="status" id="status" onchange="this.form.submit();">
                                                                                <!--   
                                                                                  <option value="1">YES</option><option selected>-Select-</option>-->
                                                                                <option >-</option>
                                                                                <option value="1">YES</option>
                                                                                <option value="3">HOLD</option>
                                                                            </select> 
                                                                        </td>


                                                                    



                                                                    </tr>
                                                                    
                                                                    <tr class="tr-row" style="background-color: lightblue;">
  <td colspan="15">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>Screen</td>
          <td>Pigment</td>
          <td>Color Book</td>
          <td>Plate Box</td>
          <td>AC Sheets</td>
          <td>PLTime</td>
          <td>CO Time</td>
          <td>PR Time</td>
          <td>LO Time</td>
          <td>LT Reason</td>
          <td>LP Reason</td>
          <td>Q Req.</td>
          <td>Check Status</td>
          <td>T/D Value</td>
          <td>Proceed?</td>
          <td>AP D/T</td>
          <td>Check</td>
        </tr>
        <tr>
          <td>
            <select name="screen" id="screen">
              <option value="">--</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </td>
          <td>
            <select name="pigment" id="pigment">
              <option value="">--</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </td>
          <td>
            <select name="color_book" id="color_book">
              <option value="">--</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </td>
          <td>
            <select name="plate_box" id="plate_box">
              <option value="">--</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </td>
          <td>
            <input name="ac_sheets" type="text" id="ac_sheets" size="5" onkeyup="sum();">
          </td>
          <td>
            <input name="pl_time" type="text" id="pl_time" size="5" onkeyup="add(this.id)">
          </td>
          <td>
            <input name="co_time" type="text" id="co_time" size="5" onkeyup="add(this.id)">
          </td>
          <td>
            <input name="pr_time" type="text" id="pr_time" size="5" onkeyup="add(this.id)">
          </td>
          <td>
            <input name="lo_time" type="text" id="lo_time" size="5" onkeyup="add(this.id)">
          </td>
          <td>
            <select name="lt_reason" id="lt_reason" style="width: 75px;">
              <option value="">--</option>
              <option value="Pigment light">Pigment light</option>
              <option value="Pigment hard">Pigment hard</option>
              <option value="Pigment dark">Pigment dark</option>
              <option value="Pigment not enough">Pigment not enough</option>
              <option value="pigment bucket searching">pigment bucket searching</option>
              <option value="pigment not in stock">pigment not in stock</option>
              <option value="Pigment expired">Pigment expired</option>
              <option value="Pigment color changed">Pigment color changed</option>
              <option value="Pigment not available">Pigment not available</option>
              <option value="Screen damage">Screen damage</option>
              <option value="No screen available">No screen available</option>
              <option value="Pinhole touch">Pinhole touch</option>
              <option value="Screen cleaning">Screen cleaning</option>
              <option value="Registering is difficult">Registering is difficult</option>
              <option value="Curve closing">Curve closing</option>
              <option value="Layout damages">Layout damages</option>
              <option value="Tone ok (by authority)">Tone ok (by authority)</option>
              <option value="Tone Not ok">Tone Not ok</option>
              <option value="Wrong screen">Wrong screen</option>
              <option value="Moore appeared">Moore appeared</option>
              <option value="Operator absent">Operator absent</option>
              <option value="Operator short leave">Operator short leave</option>
              <option value="Helper absent">Helper absent</option>
              <option value="Helper short leave">Helper short leave</option>
              <option value="Machine break down">Machine break down</option>
              <option value="Power failure">Power failure</option>
              <option value="Slow printing">Slow printing</option>
              <option value="Meeting">Meeting</option>
              <option value="Cleaning">Cleaning</option>
              <option value="Test">Test</option>
              <option value="Gold late">Gold late</option>
              <option value="No authority">No authority</option>
              <option value="Print additional lots">Print additional lots</option>
              <option value="Re-print">Re-print</option>
              <option value="Plan changed/Adjusted">Plan changed/Adjusted</option>
              <option value="thickness adjustment">thickness adjustment</option>
              <option value="One color only">One color only</option>
              <option value="Advance printed">Advance printed</option>
              <option value="Partial print">Partial print</option>
              <option value="Plate box not available">Plate box not available</option>
              <option value="Color book not available">Color book not available</option>
              <option value="X-rite data not available">X-rite data not available</option>
              <option value="P/P">P/P</option>
              <option value="Machine maintenance">Machine maintenance</option>
            </select>
          </td>
          <td>
            <select name="lp_reason" id="lp_reason" style="width: 75px;">
              <!-- Duplicate options removed for brevity -->
              <option value="">--</option>
              <option value="Pigment light">Pigment light</option>
              <option value="Pigment hard">Pigment hard</option>
              <option value="Pigment dark">Pigment dark</option>
              <option value="Pigment not enough">Pigment not enough</option>
              <option value="pigment bucket searching">pigment bucket searching</option>
              <option value="pigment not in stock">pigment not in stock</option>
              <option value="Pigment expired">Pigment expired</option>
              <option value="Pigment color changed">Pigment color changed</option>
              <option value="Pigment not available">Pigment not available</option>
              <option value="Screen damage">Screen damage</option>
              <option value="No screen available">No screen available</option>
              <option value="Pinhole touch">Pinhole touch</option>
              <option value="Screen cleaning">Screen cleaning</option>
              <option value="Registering is difficult">Registering is difficult</option>
              <option value="Curve closing">Curve closing</option>
              <option value="Layout damages">Layout damages</option>
              <option value="Tone ok (by authority)">Tone ok (by authority)</option>
              <option value="Tone Not ok">Tone Not ok</option>
              <option value="Wrong screen">Wrong screen</option>
              <option value="Moore appeared">Moore appeared</option>
              <option value="Operator absent">Operator absent</option>
              <option value="Operator short leave">Operator short leave</option>
              <option value="Helper absent">Helper absent</option>
              <option value="Helper short leave">Helper short leave</option>
              <option value="Machine break down">Machine break down</option>
              <option value="Power failure">Power failure</option>
              <option value="Slow printing">Slow printing</option>
              <option value="Meeting">Meeting</option>
              <option value="Cleaning">Cleaning</option>
              <option value="Test">Test</option>
              <option value="Gold late">Gold late</option>
              <option value="No authority">No authority</option>
              <option value="Print additional lots">Print additional lots</option>
              <option value="Re-print">Re-print</option>
              <option value="Plan changed/Adjusted">Plan changed/Adjusted</option>
              <option value="thickness adjustment">thickness adjustment</option>
              <option value="One color only">One color only</option>
              <option value="Advance printed">Advance printed</option>
              <option value="Partial print">Partial print</option>
              <option value="Plate box not available">Plate box not available</option>
              <option value="Color book not available">Color book not available</option>
              <option value="X-rite data not available">X-rite data not available</option>
              <option value="P/P">P/P</option>
              <option value="Machine maintenance">Machine maintenance</option>
            </select>
          </td>
          <td>
            <select name="quality_req" id="quality_req" style="width: 75px;">
              <option value="">--</option>
              <option value="X-rite check">X-rite check</option>
              <option value="Density check">Density check</option>
              <option value="Tone check">Tone check</option>
              <option value="Thickness">Thickness</option>
              <option value="Quality not required">Quality not required</option>
            </select>
          </td>
          <td>
            <select name="check_status" id="check_status" style="width: 75px;">
              <option value="">--</option>
              <option value="Ok">Ok</option>
              <option value="Not Ok">Not Ok</option>
            </select>
          </td>
          <td>
            <input type="text" name="ap_dt" id="ap_dt" size="5">
          </td>
          <td>
            <select name="proceed_decision" id="proceed_decision" style="width: 75px;">
              <option value="">--</option>
              <option value="Density ok,Operator decided to proceed">Density ok,Operator decided to proceed</option>
              <option value="Tone ok,Operator decided to proceed">Tone ok,Operator decided to proceed</option>
              <option value="Test ok,Operator decided to proceed">Test ok,Operator decided to proceed</option>
              <option value="Color condition ok,Operator decided to proceed">Color condition ok,Operator decided to proceed</option>
              <option value="Thickness ok,Operator decided to proceed">Thickness ok,Operator decided to proceed</option>
              <option value="Density ok,Jayantha gave permission">Density ok,Jayantha gave permission</option>
              <option value="Tone ok,Jayantha gave permission">Tone ok,Jayantha gave permission</option>
              <option value="Test ok,Jayantha gave permission">Test ok,Jayantha gave permission</option>
              <option value="Color condition ok,Jayantha gave permission">Color condition ok,Jayantha gave permission</option>
              <option value="Thickness ok,Jayantha gave permission">Thickness ok,Jayantha gave permission</option>
              <option value="Density ok,Sandamali gave permission">Density ok,Sandamali gave permission</option>
              <option value="Tone ok,Sandamali gave permission">Tone ok,Sandamali gave permission</option>
              <option value="Test ok,Sandamali gave permission">Test ok,Sandamali gave permission</option>
              <option value="Color condition ok,Sandamali gave permission">Color condition ok,Sandamali gave permission</option>
              <option value="Thickness ok,Sandamali gave permission">Thickness ok,Sandamali gave permission</option>
              <option value="Density ok,Dammika gave permission">Density ok,Dammika gave permission</option>
              <option value="Tone ok,Dammika gave permission">Tone ok,Dammika gave permission</option>
              <option value="Test ok,Dammika gave permission">Test ok,Dammika gave permission</option>
              <option value="Color condition ok,Dammika gave permission">Color condition ok,Dammika gave permission</option>
              <option value="Thickness ok,Dammika gave permission">Thickness ok,Dammika gave permission</option>
              <option value="Density ok,Amila gave permission">Density ok,Amila gave permission</option>
              <option value="Tone ok,Amila gave permission">Tone ok,Amila gave permission</option>
              <option value="Test ok,Amila gave permission">Test ok,Amila gave permission</option>
              <option value="Color condition ok,Amila gave permission">Color condition ok,Amila gave permission</option>
            </select>
          </td>
          <td>
            <input type="text" name="approval_date" id="approval_date" size="5">
          </td>
          <td>
            <select name="approval_status" id="approval_status" style="width: 75px;">
              <option value="">--</option>
              <option value="Density ok.Jayantha approved">Density ok.Jayantha approved</option>
              <option value="Tone ok.Jayantha approved">Tone ok.Jayantha approved</option>
              <option value="Thickness ok.Jayantha approved">Thickness ok.Jayantha approved</option>
              <option value="Color condition ok.Jayantha approved">Color condition ok.Jayantha approved</option>
              <option value="Density ok.Sandamali approved">Density ok.Sandamali approved</option>
              <option value="Tone ok.Sandamali approved">Tone ok.Sandamali approved</option>
              <option value="Thickness ok.Sandamali approved">Thickness ok.Sandamali approved</option>
              <option value="Color condition ok.Sandamali approved">Color condition ok.Sandamali approved</option>
              <option value="Density ok.Amila approved">Density ok.Amila approved</option>
              <option value="Tone ok.Amila approved">Tone ok.Amila approved</option>
              <option value="Thickness ok.Amila approved">Thickness ok.Amila approved</option>
              <option value="Color condition ok.Amila approved">Color condition ok.Amila approved</option>
              <option value="Density ok.Dammika approved">Density ok.Dammika approved</option>
              <option value="Tone ok.Dammika approved">Tone ok.Dammika approved</option>
              <option value="Thickness ok.Dammika approved">Thickness ok.Dammika approved</option>
              <option value="Color condition ok.Dammika approved">Color condition ok.Dammika approved</option>
            </select>
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </td>
</tr>

<tr>
  <td height="40" colspan="15">&nbsp;</td>
</tr>

</form>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>


                                    </form>




                                    <div class="container"  style="width:100%" >
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-hover" id="tab_logic">

                                                    <thead>
                                                        <tr>


                                                            <th class="text-center" width="2%">No</th>
                                                            <th class="text-center" width="2%">Pigment Data</th>
                                                            <th class="text-center" width="2%">Screen Data</th>

                                                            <th class="text-center" width="10%">Time

                                                            <th class="text-center" width="10%">Start
                                                                Date</th>                        

                                                            <th class="text-center" width="10%"> Finish	
                                                                Date

                                                            </th>
                                                            <th class="text-center" width="10%">Pro No

                                                            </th>

                                                            <th class="text-center" width="10%">Design

                                                            </th>

                                                            <th class="text-center" width="10%">Lot

                                                            </th>

                                                            <th class="text-center" width="10%"># Color</th>
                                                            <th class="text-center" width="5%">Plan</th>
                                                            <th class="text-center" width="15%">Actual</th>


                                                            <th class="text-center" width="10%">P-Color</th>
                                                            <th class="text-center" width="10%">Date</th>
                                                            <th class="text-center" width="10%">Time</th>
                                                              <th class="text-center" width="10%">Undo</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
													
                                                        <?php
														
														//print("SELECT * FROM virtual_planner_final_tbl WHERE  ref_no_vpft='" . $_GET['project_no_tct'] . "'  AND   machine_no_vpft='" . $_GET['machine_no_vpft'] . "' AND date_vpft='" . $_GET['date_vpft'] . "' AND design_vpft!='N/A' AND status_vpft='1' ORDER BY id ASC");exit;
                                                        $query = "SELECT a.*,b.item01_pm,c.is_edit_ppft,d.is_edit_spft FROM virtual_planner_final_tbl a LEFT JOIN pigment_master_tbl b
ON a.design_vpft=b.pattern_pm AND a.plan_colors_vpft=b.colours_pm
LEFT JOIN pigment_planner_final_tbl c
ON a.pro_no_vpft=c.pro_no_ppft AND a.plan_colors_vpft=c.plan_colors_ppft
AND a.ref_no_vpft=c.ref_no_ppft
LEFT JOIN screen_planner_final_tbl d
ON a.pro_no_vpft=d.pro_no_spft AND a.plan_colors_vpft=d.plan_colors_spft
WHERE     a.machine_no_vpft='" . $_GET['machine_no_vpft'] . "' AND a.date_vpft='" . $_GET['date_vpft'] . "' and a.plan_colors_vpft !='S00'  AND a.status_vpft ='1'  ORDER BY a.id ASC";
                                                        ?>  
                                                        <?php
                                                        if ($result = $conn->query($query)) {
                                                            $index = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $index ++;
                                                                ?>    

                                                                <tr id='addr0' class="tr-row" 
                                                                    
                                                                    <?php 
										if($row["item01_pm"]>'1000')
                                        { ?> style="background-color: red;"<?php }
                                        else if($row["is_edit_ppft"] == '1' && $row["is_edit_spft"] == '1')
                                        { ?> style="background-color: #CBC3E3;"<?php }
										
                                        else if($row["is_edit_ppft"] == '1')
                                        { ?> style="background-color: orange;"<?php }
										
                                        else if($row["is_edit_spft"] == '1')
                                        { ?> style="background-color: yellow;"<?php }
										
										else
                                        { ?> style="background-color: lightblue;"<?php }
										?>
                                                                            
                                                                            
                                                                            
                                                                            >
                                                                    
                                                                    <td>

                                                                        <?php
                                                                        echo($index);
                                                                        ?>

                                                                    </td>
                                                                    
                                                                     
                                                                            <td>
                                                                                
                                                                                <?php
                                                                                if($row["is_edit_ppft"]=='1')
                                                                                { 
                                                                                echo("Yes"); 
                                                                                 }
                                                                                
                                                                                ?>

                                                                            </td>
                                                                            <td>
                                                                                
                                                                                <?php
                                                                                if($row["is_edit_spft"]=='1')
                                                                                { 
                                                                                echo("Yes"); 
                                                                                 }
                                                                                
                                                                                ?>

                                                                            </td>

                                                                    <td>
                                                                        <?php
                                                                        echo($row["time_vpft"]);
                                                                        ?>

                                                                    </td>


                                                                    <td>

                                                                        <?php
                                                                        echo($row["finish_date_vpft"]);
                                                                        ?>
                                                                    </td>


                                                                    <td>


                                                                        <?php
                                                                        echo($row["start_date_vpft"]);
                                                                        ?>

                                                                    </td>



                                                                    <td>
                                                                        <?php
                                                                        echo($row["pro_no_vpft"]);
                                                                        ?>

                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        echo($row["design_vpft"]);
                                                                        ?>

                                                                    </td>


                                                                    <td>
                                                                        <?php
                                                                        echo($row["lot_vpft"]);
                                                                        ?>

                                                                    </td>


                                                                    <td>
                                                                        <?php
                                                                        echo($row["num_colors_vpft"]);
                                                                        ?>

                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        echo($row["imp_plan_vpft"]);
                                                                        ?>

                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        echo($row["imp_actual_vpft"]);
                                                                        ?>

                                                                    </td>


                                                                    <td>
                                                                        <?php
                                                                        echo($row["plan_colors_vpft"]);
                                                                        ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo($row["item01_vpft"]);
                                                                        ?>

                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        echo($row["item02_vpft"]);
                                                                        ?>

                                                                    </td>


                                                                         <td>
                                                                   <span class="fa fa-undo" aria-hidden="true" style="cursor:pointer"
                                                                  onclick="unDoEntity('<?php echo($row['id']); ?>','demo.php?project_no_tct=<?php echo($row['ref_no_vpft']); ?>&machine_no_vpft=<?php echo($row['machine_no_vpft']); ?>&date_vpft=<?php echo($row['date_vpft']); ?>&id=<?php echo($row['id']); ?>',
                                                                  '<?php echo($row['id']); ?>')"
                                                                  ></span
                                                                    ></td>



                                                                </tr>

                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                    
                                    
                       
                                    
                                </div>
                            </div>
                        </div>
                        <!--</form>-->
                    </div>
                </div>
            </div>   





        </div>
    </div>

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN FOOTER -->
<?php
include_once '../tpl/footer.php';
?>


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

<script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../nassets/admin/pages/scripts/table-editable.js"></script>
<script src="../ajax_post/save_post.js"></script>
<script src="../ajax_post/tool.js"></script>
<script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
<link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='../select2/dist/js/select2.min.js'></script>
<script src="../ajax_post/sselect2Del_ajax.js"></script>
<script  type="text/javascript">
                                                                        $('#unchk').click(function () {
                                                                            $('input[type="checkbox"]').each(function () {
                                                                                $(this).attr("checked", false);
                                                                            });
                                                                        })
</script>

<script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
     <script src="../js/script.js"></script>


<script>
            jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        TableEditable.init();
    });
</script>

<script>
        $(document).ready(function() {
       
            $(".btn.green").click(function() {
                // Gather all input data
                var data = {
                    pl_im: $("#pl_im").val(),
                    act_im: $("input[name='act_im']").val(),
                    pp_time: $("input[name='pp_time']").val(),
                    unload_time: $("input[name='unload_time']").val(),
                    shift1_op: $("input[name='shift1_op']").val(),
                    shift1_helper: $("input[name='shift1_helper']").val(),
                    shift2_op: $("input[name='shift2_op']").val(),
                    shift2_helper: $("input[name='shift2_helper']").val(),
                    data_uploader: $("input[name='data_uploader']").val(),
                    mc_no: $("input[name='machine']").val(),
                    p_date: $("input[name='date_vpft']").val()
                };

                // Send data using AJAX
                $.ajax({
                    type: "POST",
                    url: "save_data.php",
                    data: data,
                    success: function(response) {
                        alert(response); // Show response from the PHP script
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>