<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/ProductStatus.class.php");
include("../model/PigmentMaster.class.php");
include("../model/PigmentModel.class.php");
include("../model/DInspection.class.php");

$pm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$dip = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $loge_depart = $_SESSION['logged_usr_depat'];
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
        <title>Noritake| WIP Report  </title>
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


                    <h3 class="page-title"> Report

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
                                <a href="#"> Report
                                </a>
                            </li>
                        </ul>
                         
                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Plan vs Actual
                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>


                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form  action="request_report.php"   class="form-horizontal form-bordered" id="myForm" method="get" >



                                        <div class="form-body">            
                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-3">Printing Pattern <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <select id="pattern_name"   class="form-control" style='width: 200px;'  name="pattern_name"   onchange="document.getElementById('myForm').submit()" >
                                                        <option value='0'>- Printing Pattern -</option>


                                                    </select>

                                                </div>    

                                            </div>





                                    </form>

                                    <?php if ($_GET['pattern_name']) { ?>
                                        <div>job resignation status-01</div>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>



                                                    <th>
                                                        Production No
                                                    </th>                                                                
                                                    <th>
                                                        Lot No
                                                    </th> 


                                                    <th>
                                                        Pattern No
                                                    </th> 





                                                    <th>
                                                        Shipment Request
                                                    </th> 




                                                    <th>
                                                        Shipment Schedule
                                                    </th> 

                                                    <th>
                                                        Date
                                                    </th> 





    <!--                                                <th>
                                                        Printing lines
                                                    </th>   -->









                                                    <th>
                                                        Printing Way
                                                    </th> 

    <!--                                                <th>
                                                        Paper Size
                                                    </th>   -->





                                                    <th>
                                                        Body
                                                    </th> 




    <!--                                                <th>
                                                        Factory
                                                    </th> 



                                                    <th>
                                                        Market 
                                                    </th> 


                                                    <th>
                                                        Decoration
                                                    </th> -->


                                                    <th>
                                                        #Sheet Order
                                                    </th> 



                                                    <th>
                                                        Printing 
                                                    </th> 




                                                    <th>
                                                        is edit
                                                    </th>

                                                    <th>    

                                                        Org Name
                                                    </th>  


                                                    <th>    

                                                        Date
                                                    </th>  


                                                    <th>    

                                                        Time
                                                    </th>  





                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $query = "SELECT * FROM preparing_layout_tbl Where pattern_no_plt='" . $_GET['pattern_name'] . "'  ORDER BY id DESC";
												
												
												
                                                ?>  

                                                <?php
                                                if ($result = $conn->query($query)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($dip->getDInspectionByJobNumber($row["pro_no_plt"]) == 0) {
                                                            ?>    



                                                            <tr>




                                                                <td>
                                                                    <?php echo($row["pro_no_plt"]); ?>
                                                                </td>




                                                                <td>
                                                                    <?php echo($row["lot_no_plt"]); ?> 
                                                                </td>





                                                                <td>
                                                                    <?php echo($row["pattern_no_plt"]); ?> 
                                                                </td>



                                                                <td>
                                                                    <?php echo($row["shipment_request_plt"]); ?> 
                                                                </td>

                                                                <td>
                                                                    <?php echo($row["item01_plt"]); ?> 
                                                                </td>


                                                                <td>
                                                                    <?php echo($row["date_plt"]); ?> 
                                                                </td>

                                                    <!--                                                        <td>
                                                                <?php echo($row["printing_lines_plt"]); ?> 
                                                                                                            </td>-->





                                                                <td>
                                                                    <?php echo($row["printing_way_plt"]); ?> 
                                                                </td>

                                                    <!--                                                        <td>
                                                                <?php echo($row["paper_size_plt"]); ?> 
                                                                                                            </td>-->



                                                                <td>
                                                                    <?php echo($row["body_plt"]); ?> 
                                                                </td>



                                                                <!--
                                                                                                                        <td>
                                                                <?php echo($row["factory_plt"]); ?> 
                                                                                                                        </td>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                                                                        <td>
                                                                <?php echo($row["market_plt"]); ?> 
                                                                                                                        </td>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                                                                        <td>
                                                                <?php echo($row["decoration_plt"]); ?> 
                                                                                                                        </td>-->





                                                                <td>
                                                                    <?php echo($row["number_sheet_plt"]); ?> 
                                                                </td>



                                                                <td>
                                                                    <?php echo($row["printing_plt"]); ?> 
                                                                </td>




                                                                <td>
                                                                    <?php echo($row["is_edit_plt"]); ?> 
                                                                </td>


                                                                <td>
                                                                    <?php
                                                                    if ($row["org_name_plt"] == "") {
                                                                        echo("-");
                                                                    } else {
                                                                        echo($row["org_name_plt"]);
                                                                    }
                                                                    ?> 
                                                                </td>


                                                                <td>
                                                                    <?php echo($row["org_date_plt"]); ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo($row["org_time_plt"]); ?>
                                                                </td>



                                                            </tr>


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

                                                                                </th>

                                                                                <th class="text-center" width="10%">Design

                                                                                </th>
                                                                                <th class="text-center" width="10%">Machine no

                                                                                </th>

                                                                                <th class="text-center" width="10%">Lot

                                                                                </th>

                                                                                <th class="text-center" width="10%"># Color</th>
                                                                                <th class="text-center" width="5%">Plan</th>
                                                                                <th class="text-center" width="15%">Actual</th>


                                                                                <th class="text-center" width="10%">P-Color</th>
                                                                                <th class="text-center" width="10%">Date</th>
                                                                                <th class="text-center" width="10%">Time</th>




                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            //print("SELECT * FROM virtual_planner_final_tbl WHERE  ref_no_vpft='" . $_GET['project_no_tct'] . "'  AND   machine_no_vpft='" . $_GET['machine_no_vpft'] . "' AND date_vpft='" . $_GET['date_vpft'] . "' AND design_vpft!='N/A' AND status_vpft='1' ORDER BY id ASC");exit;
                                                                            $query = "SELECT * FROM virtual_planner_final_tbl WHERE    design_vpft='" . $row["pattern_no_plt"] . "'   AND status_vpft='1' ORDER BY lot_vpft, id ASC";
																			
	//$query = "SELECT * FROM virtual_planner_final_tbl WHERE    pro_no_vpft='" . $row["pro_no_plt"] . "'   AND status_vpft='1' ORDER BY id ASC";
	
	
 
	
	
	
	
																			
																			
                                                                     ?>  
                                                                            <?php
                                                                            if ($result = $conn->query($query)) {
                                                                                $index = 0;
                                                                                while ($row = $result->fetch_assoc()) {
                                                                                    $index ++;
                                                                                    ?>    

                                                                                    <tr id='addr0' class="tr-row"  style="background-color: #FAEBD7;">
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
                                                                                            echo($row["machine_no_vpft"]);
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





                                                                                    </tr>

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>

                                                                        </tbody>
                                                                    </table>


                                                                    <?php
                                                                }
                                                                ?>



                                                            </div>
                                                        </div>
                                                        </form>

                                                    </div>  


                                                <?php
                                                }
                                            }
                                            ?>

                                            </tbody>
                                        </table>








                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>   
<?php } ?>




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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/form-samples.js"></script>
<script src="../script/bootstrap.min.js"></script>
<script src="script/jquery-1.11.1.min.js"></script>
<script src="../ajax_post/layout_registration_post.js"></script>

<script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
<link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='../select2/dist/js/select2.min.js'></script>
<script src="../ajax_post/report_ajax.js"></script>


<script type='text/javascript'>





                                                        $(document).ready(function () {
                                                            $('#myForm input').keydown(function (e) {
                                                                if (e.keyCode == 13) {

                                                                    if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') {// check for submit button and submit form on enter press
                                                                        return true;
                                                                    }

                                                                    $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();

                                                                    return false;
                                                                }

                                                            });
                                                        });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        FormSamples.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>