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
        <title>Noritake|Pigment Plan </title>
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


                    <h3 class="page-title">Pigment Plan



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
                                <a href="#">Pigment Plan
                            </li>
                            <i class="fa fa-angle-right"></i></li>
                            <li> 
                                <a  target="_blank" href="machine_hold_details.php?project_no_tct=<?php echo($_GET['project_no_tct']); ?> &machine_no_vpft=<?php echo($_GET['machine_no_vpft']); ?> &date_vpft=<?php echo($_GET['date_vpft']); ?>  &hold=<?php echo('hold'); ?>'"  style="text-decoration: none" title="Hold Details" ><b>Hold(<?php echo($spf->getHoldScreenVirtualPlannerFinal($_GET['project_no_tct'], $_GET['machine_no_vpft'], $_GET['date_vpft'])); ?>)</b></a>                     
                                <i class="fa fa-angle-right"></i>
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
                                    <div class="caption"> <i class="fa fa-gift"></i>Pigment Plan 
<?php
if (isset($_POST["status"])) {
    $spf->updateScreenPlannerFinalUdateID($_POST["id"], '', $_POST["imp_actual_vpft"], 1, getServerDate(), getServerTime());
}
?>


                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>
                                <div class="portlet-body form">
                                
                                        <div class="form-body">                 
                                           <div class="container mt-5">
        <h2>samples and special orders(Melody machine)</h2>
        
        <!-- Form -->
        <form id="dataForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table id="tab_logic" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MC No</th>
                        <th>Change Over</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Pro No</th>
                        <th>Design</th>
                        <th>Lot</th>
                        <th>Total Sheets</th>
                        <th>Colors</th>
                        <th>Plan Color</th>
                        <th>Actual Color</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
            
            <!-- Buttons -->
            <button type="button" class="btn btn-primary mb-3" onclick="addRow()">Add Row</button>
            <button type="submit" class="btn btn-success mb-3">Save Data</button>
        </form>
        
        <!-- JavaScript to add rows -->
        <script>
            function addRow() {
                var table = document.getElementById("tab_logic").getElementsByTagName('tbody')[0];
                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                var cell8 = row.insertCell(7);
                var cell9 = row.insertCell(8);
                var cell10= row.insertCell(9);
                var cell11 = row.insertCell(10);
                var cell12 = row.insertCell(11);
                var cell13 = row.insertCell(12);
                
                cell1.innerHTML = rowCount + 1;
                cell2.innerHTML = '<input type="text" class="form-control" name="mc_no[]">';
                cell3.innerHTML = '<input type="text" class="form-control" name="change_over[]">';
                cell4.innerHTML = '<input type="text" class="form-control" name="time[]">';
                cell5.innerHTML = '<input type="date" class="form-control" name="date[]">';
                cell6.innerHTML = '<input type="text" class="form-control" name="pro_no[]">';
                cell7.innerHTML = '<input type="text" class="form-control" name="design[]">';
                cell8.innerHTML = '<input type="text" class="form-control" name="lot[]">';
                cell9.innerHTML = '<input type="text" class="form-control" name="total_sheets[]">';
                cell10.innerHTML = '<input type="text" class="form-control" name="plan_colors[]">';
                cell11.innerHTML = '<input type="text" class="form-control" name="plan[]">';
                cell12.innerHTML = '<input type="text" class="form-control" name="actual[]">';
                cell13.innerHTML = '<select class="form-control" name="status[]"><option>-</option><option value="1">YES</option><option value="3">HOLD</option></select>';
            }
        </script>
        
        <!-- PHP to process form submission -->
        <?php
        
        include("database_connections.php");

	error_reporting(0);
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Retrieve all arrays from POST data
            $mc_no = $_POST['mc_no'];
            $change_over = $_POST['change_over'];
            $time = $_POST['time'];
            $date = $_POST['date'];
            $pro_no = $_POST['pro_no'];
            $design = $_POST['design'];
            $lot = $_POST['lot'];
            $total_sheets = $_POST['total_sheets'];
            $color = $_POST['color'];
            $plan_colors = $_POST['plan_colors'];
            $plan = $_POST['plan'];
            $actual = $_POST['actual'];
            $status = $_POST['status'];
            
            // Process each row of data (assuming they are all the same length)
            $num_rows = count($mc_no); // or use count of any other array since they should all be the same length
            
            for ($i = 0; $i < $num_rows; $i++) {
                // Retrieve each field value for current row
                $mc_no_value = $mc_no[$i];
                $change_over_value = $change_over[$i];
                $time_value = $time[$i];
                $date_value = $date[$i];
                $pro_no_value = $pro_no[$i];
                $design_value = $design[$i];
                $lot_value = $lot[$i];
                $total_sheets_value = $total_sheets[$i];
                $color_value = $color[$i];
                $plan_colors_value = $plan_colors[$i];
                $plan_value = $plan[$i];
                $actual_value = $actual[$i];
                $status_value = $status[$i];
                
                
                date_default_timezone_set('Asia/Colombo');
                $currentDate = date("Y-m-d");
                $currentTime = date("H:i:s");
        
                
                // Example: You can process each row's data here, like inserting into a database
                
                // Example: Insert into a MySQL database
               // print("INSERT INTO pigment_planner_final_tbl (design_ppft, pro_no_ppft, lot_ppft,plan_colors_ppft,colors_name_ppft,item01_ppft,date_ppft,is_edit_ppft,imp_plan_ppft,imp_actual_ppft,change_over_ppft,time_ppft,item02_ppft,item03_ppft) VALUES ('$design_value', '$pro_no_value', '$lot_value','$plan_colors_value', '$plan_value', '$mc_no_value', '$date_value','1', '$total_sheets_value','$actual_value','$change_over_value','$time_value','$currentDate','$currentTime')");exit;
                 $sql = "INSERT INTO pigment_planner_final_tbl (design_ppft, pro_no_ppft, lot_ppft,plan_colors_ppft,colors_name_ppft,item01_ppft,date_ppft,is_edit_ppft,imp_plan_ppft,imp_actual_ppft,change_over_ppft,time_ppft,item02_ppft,item03_ppft) VALUES ('$design_value', '$pro_no_value', '$lot_value','$plan_colors_value', '$plan_value', '$mc_no_value', '$date_value','1', '$total_sheets_value','$actual_value','$change_over_value','$time_value','$currentDate','$currentTime')";
                 mysqli_query($con, $sql);
                
                // For demo purpose, you can also echo the values
               // echo "Row $i: $mc_no_value, $change_over_value, $time_value, $date_value, $pro_no_value, $design_value, $lot_value, $total_sheets_value, $color_value, $plan_colors_value, $plan_value, $actual_value, $status_value <br>";
            }
        }
        ?>
        
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