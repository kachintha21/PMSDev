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
	$today=date("Y-m-d");
	
   if (isset($_GET["id"])) { 
 
   $vpf->updateVirtualPlannerUdateIDHold($_GET["id"], '', '0', '', 0, '', '',$today);
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
        <title>Noritake|Machine Plan Hold Details </title>
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


                    <h3 class="page-title">Machine Plan Hold Details
                        
                      

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
                                    <a href="demo.php?project_no_tct=<?php echo($_GET['project_no_tct']); ?> &machine_no_vpft=<?php echo($_GET['machine_no_vpft']); ?> &date_vpft=<?php echo($_GET['date_vpft']); ?>  &hold=<?php echo('hold'); ?>'"  style="text-decoration: none" title="Hold Details" ><b>Hold(<?php echo($vpf->getHoldVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                
                            </li>
                         

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
                                    <div class="caption"> <i class="fa fa-gift"></i>Machine Plan Hold Details
                                       
                                        
                                      
                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="demo.php"  class="form-horizontal form-bordered" id="testform"  method="get">

                                        <input  type="hidden" class="form-control"  name="org_name_pidt" id="org_name_pidt"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="barcode_ref_no_pidt" id="barcode_ref_no_pidt" value="<?php echo($pl->getNextPigmentIssuesDetailsRefNo("pigment_issues_details_tbl", "NLPLPM")); ?>"  />

                                        <div class="form-body">                 
                                      


                                      


                                    </form>




                                    
                                    
                         
                                      <div class="container"  style="width:100%" >
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-hover" id="tab_logic">

                                                    <thead>
                                                        <tr>


                                                            <th class="text-center" width="2%">No</th>

                                                            <th class="text-center" width="10%">Time

                                                            <th class="text-center" width="10%">Start
                                                                Date</th>                        

                                                            <th class="text-center" width="10%"> Finish	
                                                                Date

                                                            </th>
                                                            <th class="text-center" width="10%">Pro No
															
															<th class="text-center" width="10%">Mc No

                                                            </th>

                                                            <th class="text-center" width="10%">Design

                                                            </th>

                                                            <th class="text-center" width="10%">Lot

                                                            </th>

                                                            <th class="text-center" width="10%"># Color</th>
                                                            <th class="text-center" width="5%">Plan</th>
                                                     


                                                            <th class="text-center" width="10%">P-Color</th>
                                                            <th class="text-center" width="10%">Date</th>
                                                            <th class="text-center" width="10%">Time</th> 
															<th class="text-center" width="10%">Reason</th>
                                                              <th class="text-center" width="10%">add</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
														//print("SELECT * FROM virtual_planner_final_tbl WHERE  ref_no_vpft='" . $_GET['project_no_tct'] . "'  AND   machine_no_vpft='" . $_GET['machine_no_vpft'] . "' AND date_vpft='" . $_GET['date_vpft'] . "' AND design_vpft!='N/A' AND status_vpft='3' ORDER BY id ASC");exit;
                                                        $query = "SELECT * FROM virtual_planner_final_tbl WHERE    status_vpft='3' ORDER BY id ASC";
                                                        ?>  

                                                        <?php
                                                        if ($result = $conn->query($query)) {
                                                            $index = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                $index ++;
                                                                ?>    

                                                                <tr id='addr0' class="tr-row"  style="background-color: #ccccff;">
                                                                    <td>

                                                                        <?php
                                                                        echo($index);
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
                                                                        echo($row["machine_no_vpft"]);
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
                                                                        <?php
                                                                        echo($row["item05_vpft"]);
                                                                        ?>

                                                                    </td>

                                                                   <td>
                                                                   <span class="glyphicon glyphicon-plus" aria-hidden="true" style="cursor:pointer"
                                                                  onclick="AddDoEntity('<?php echo($row['id']); ?>', 'machine_hold_details.php?project_no_tct=<?php echo($row['ref_no_vpft']); ?>&machine_no_vpft=<?php echo($row['machine_no_vpft']); ?>&date_vpft=<?php echo($row['date_vpft']); ?>&id=<?php echo($row['id']); ?>',
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
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>