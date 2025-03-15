<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/VirtualPlannerFinal.class.php");
include("../model/ScreenPlannerFinal.class.php");
include("../model/PigmentIssuesDetails.class.php");
include("../model/PigmentModel.class.php");
include("../model/PigmentMaster.class.php");
$pl = new PigmentIssuesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpf = new VirtualPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$spf = new ScreenPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($_SESSION['logged_usr_id']) {
    $pr = $_GET['project_no_tct'];
    $pname = $_SESSION['design_number_pidt'];
    $loge_user = $_SESSION['logged_usr_id'];
    $loge_depart = $_SESSION['logged_usr_depat'];

    if (isset($_GET["id"])) {
        $spf->updateScreenPlannerFinalUdateID($_GET["id"], '', '', 0, '', '');
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
        <title>Noritake|Screen Plan </title>
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


                    <h3 class="page-title">Screen Plan



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
                                <a href="#">Screen Plan
                            </li>
                            <i class="fa fa-angle-right"></i></li>
                            <li> 
                                <a  target="_blank" href="machine_hold_details.php?project_no_tct=<?php echo($_GET['project_no_tct']); ?> &machine_no_vpft=<?php echo($_GET['machine_no_vpft']); ?> &date_vpft=<?php echo($_GET['date_vpft']); ?>  &hold=<?php echo('hold'); ?>'"  style="text-decoration: none" title="Hold Details" ><b>Hold(<?php echo($spf->getHoldScreenVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li> 
                                <a href="#"  style="text-decoration: none" title="WIP Details" ><b>WIP(<?php echo($spf->getWipScreenVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li> <a href="#"  style="text-decoration: none" title="Daily_Output" ><b>Daily_Output(<?php echo($spf->getDailyScreenVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a> <i ></i> </li>
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
                                    <div class="caption"> <i class="fa fa-gift"></i>Screen Plan 
<?php
if (isset($_POST["status"])) {
    $spf->updateScreenPlannerFinalUdateID($_POST["id"], '', $_POST["imp_actual_vpft"], 1, getServerDate(), getServerTime());
}
?>


                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="screen_plan.php"  class="form-horizontal form-bordered" id="testform"  method="get">

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




                                                <label class="control-label col-sm-1">MC/No
                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <select  class="form-control" name="machine_no_vpft" id="machine_no_vpft" required> 

                                                        <option value="">- Select -</option>
<?php
for ($i = 1; $i < 5; $i++) {
    ?>
                                                            <option value="<?php echo ("M0" . $i); ?>" ><?php echo ("M0" . $i); ?></option>
                                                            <?php
                                                        }
                                                        ?>'
                                                    </select>
                                                </div>

                                                <label class="control-label col-sm-1">Date
                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input type="date" name="date_vpft" id="date_vpft" class="form-control" value="<?php echo(getServerDate()) ?>" >
                                                </div>
                                                <div class="col-sm-1">                         
                                                    <button type="button" class="btn purple" onClick="document.getElementById('testform').submit()" >  Find </button>
                                                </div>
                                                </form>
                                            </div>


                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="2%">No</th>
																	<th class="text-center" width="2%">MC No</th>
                                                                    <th class="text-center" width="10%">Change Over 
                                                                    <th class="text-center" width="10%">Time </th>                      
                                                                    <th class="text-center" width="10%">Date 
                                                                    </th>
                                                                    <th class="text-center" width="10%">Pro No
                                                                    </th>
                                                                    <th class="text-center" width="10%">Design
                                                                    </th>
                                                                    <th class="text-center" width="7%">Lot
                                                                    </th>                                                                    
                                                                    <th class="text-center" width="7%">Total sheets
                                                                    </th>                                                                     	
                                                                    <th class="text-center" width="7%">color
                                                                    </th>                                                                    
                                                                    <th class="text-center" width="7%">Plan colors
                                                                    </th>

                                                                    <th class="text-center" width="5%">Plan</th>
                                                                    <th class="text-center" width="8%">Actual</th>
                                                                    <th class="text-center" width="15%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

<?php //print("SELECT * FROM screen_planner_final_tbl WHERE     machine_no_spft='" . $_GET['machine_no_vpft'] . "' AND date_spft='" . $_GET['date_vpft'] . "' and plan_colors_spft !='S00'  ORDER BY id ASC");exit;
$query = "SELECT a.*,b.item01_pm FROM screen_planner_final_tbl a LEFT JOIN pigment_master_tbl b
ON a.design_spft=b.pattern_pm AND a.plan_colors_spft=b.colours_pm WHERE a.date_spft='" . $_GET['date_vpft'] . "' 
and a.plan_colors_spft !='S00'  and a.is_edit_spft !='1' ORDER BY CAST(time_spft AS UNSIGNED INTEGER),a.pro_no_spft ASC";
?>  

                                                                <?php
                                                                if ($result = $conn->query($query)) {
                                                                    $index = 0;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $index ++;
                                                                        ?>    

                                                                        <tr id='addr0' class="tr-row"  <?php 
										if($row["item01_pm"]>'1000'){ ?> style="background-color: red;"<?php }
										
										else{ ?> style="background-color: lightblue;"<?php }
										?>>
                                                                            <td>

        <?php
        echo($index);
        ?>

                                                                            </td>
																			
																			<td>
        <?php
        echo($row["machine_no_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["change_over_spft"]);
        ?>

                                                                            </td>


                                                                            <td>

        <?php
        echo($row["time_spft"]);
        ?>
                                                                            </td>


                                                                            <td>


        <?php
        echo($row["date_spft"]);
        ?>

                                                                            </td>



                                                                            <td>
        <?php
        echo($row["pro_no_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["design_spft"]);
        ?>

                                                                            </td>


                                                                            <td>
        <?php
        echo($row["lot_spft"]);
        ?>

                                                                            </td>



                                                                            <td>
        <?php
        echo($row["imp_plan_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($pigm->getNumberPigmentMasterByNo($row['design_spft']));
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["plan_colors_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["mesh_type_spft"]);
        ?>

                                                                            </td>









                                                                    <form method="post" action="">



                                                                        <input type="hidden" id="id" name="id" value="<?php echo($row["id"]) ?>">

                                                                        <td>


                                                                            <input class="form-control" type="text" id="imp_actual_vpft" name="imp_actual_vpft" value="<?php echo($row["mesh_type_spft"]) ?>">

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


                                                                    </form>



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


                                    </form>




                                    <div class="container"  style="width:100%" >
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-hover" id="tab_logic">

                                                    <thead>
                                                        <tr>

                                                            <th class="text-center" width="2%">No</th>
															<th class="text-center" width="2%">MC No</th>
                                                            <th class="text-center" width="10%">Change Over 
                                                            <th class="text-center" width="10%">Time </th>                      
                                                            <th class="text-center" width="10%">Date 
                                                            </th>
                                                            <th class="text-center" width="10%">Pro No
                                                            </th>
                                                            <th class="text-center" width="10%">Design
                                                            </th>
                                                            <th class="text-center" width="7%">Lot
                                                            </th>                                                                    
                                                            <th class="text-center" width="7%">Total sheets
                                                            </th>                                                                     	
                                                            <th class="text-center" width="7%">color
                                                            </th>                                                                    
                                                            <th class="text-center" width="7%">Plan colors
                                                            </th>


                                                        
                                                            <th class="text-center" width="10%">Date</th>
                                                            <th class="text-center" width="10%">Time</th>
                                                            <th class="text-center" width="10%">Undo</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$query = "SELECT a.*,b.item01_pm FROM screen_planner_final_tbl a LEFT JOIN pigment_master_tbl b
ON a.design_spft=b.pattern_pm AND a.plan_colors_spft=b.colours_pm WHERE    
  a.date_spft='" . $_GET['date_vpft'] . "' and a.plan_colors_spft !='S00'  and a.is_edit_spft ='1' ORDER BY CAST(time_spft AS UNSIGNED INTEGER) ASC";
?>  
                                                        <?php
                                                        if ($result = $conn->query($query)) {
                                                            $index = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $index ++;
                                                                ?>    

                                                                <tr id='addr0' class="tr-row"  <?php 
										if($row["item01_pm"]>'1000'){ ?> style="background-color: red;"<?php }
										
										else{ ?> style="background-color: #FAEBD7;"<?php }
										?>>
                                                                                                                                           <td>

        <?php
        echo($index);
        ?>

                                                                            </td>
																			<td>
        <?php
        echo($row["machine_no_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["change_over_spft"]);
        ?>

                                                                            </td>


                                                                            <td>

        <?php
        echo($row["time_spft"]);
        ?>
                                                                            </td>


                                                                            <td>


        <?php
        echo($row["date_spft"]);
        ?>

                                                                            </td>



                                                                            <td>
        <?php
        echo($row["pro_no_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["design_spft"]);
        ?>

                                                                            </td>


                                                                            <td>
        <?php
        echo($row["lot_spft"]);
        ?>

                                                                            </td>



                                                                            <td>
        <?php
        echo($row["imp_plan_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($pigm->getNumberPigmentMasterByNo($row['design_spft']));
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["plan_colors_spft"]);
        ?>

                                                                            </td>

                                                                            <td>
        <?php
        echo($row["mesh_type_spft"]);
        ?>

                                                                            </td>
                                                                    <td>
        <?php
        echo($row["item01_spft"]);
        ?>

                                                                    </td>

                                                                    <td>
        <?php
        echo($row["item02_spft"]);
        ?>

                                                                    </td>


                                                                    <td>
                                                                        <span class="fa fa-undo" aria-hidden="true" style="cursor:pointer"
                                                                              onclick="unDoEntity('<?php echo($row['id']); ?>', 'screen_plan.php?project_no_tct=<?php echo($row['ref_no_spft']); ?>&machine_no_vpft=<?php echo($row['machine_no_spft']); ?>&date_vpft=<?php echo($row['date_spft']); ?>&id=<?php echo($row['id']); ?>',
                                                                                              '<?php echo($row['id']); ?>')"
                                                                              ></span
                                                                    </td>



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
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>