<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Design Details  </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="../nassets/global/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="../nassets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="../nassets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="../nassets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
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


                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Design Details  </a>

                            </li>
                            <li>

                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">

                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button  class="btn green" onclick="window.location = 'machine_hold_details.php';">
                                                        New Design <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                        <div class="form-body">                   

                                            <!-- BEGIN FORM-->
                                            <form action="machine_hold_details.php"  class="form-horizontal form-bordered" id="testform"  method="get">
                                                <div class="form-group form-group">

                                       
                                                    <div class="col-sm-3">                                            
                                                        <select  class="form-control" name="pattern_no_pmt" id="pattern_no_pmt"   onchange="this.form.submit()"> 
                                                             <option value='0'>- Printing Pattern -</option>
                                                          
                                                            '
                                                        </select>

                                                    </div>  


</div>
                                            </form>
                                        
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
                                            if(empty($_GET['pattern_no_pmt'])){
                                                //print('123');exit;
                                                  $query = "SELECT * FROM virtual_planner_final_tbl WHERE    status_vpft='3' ORDER BY id ASC";
                                            
                                            }else{
                                                
                                                  $query = "SELECT * FROM virtual_planner_final_tbl WHERE design_vpft='".$_GET['pattern_no_pmt']."'  and status_vpft='3' ORDER BY id ASC ";
                                                
                                            }
                                          
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
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT -->
                </div>
            </div>


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php
        include_once '../tpl/footer.php';
        ?>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="../nassets/global/plugins/respond.min.js"></script>
        <script src="../nassets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="../nassets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="../nassets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="../nassets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="../nassets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../nassets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../nassets/admin/pages/scripts/table-editable.js"></script>

        <script src="../js/script.js"></script>
        <script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
<link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='../select2/dist/js/select2.min.js'></script>
<script src="../ajax_post/get_printing_no.js"></script>

        <script>
                                                                      jQuery(document).ready(function () {
                                                                          Metronic.init(); // init metronic core components
                                                                          Layout.init(); // init current layout
                                                                          QuickSidebar.init(); // init quick sidebar
                                                                          Demo.init(); // init demo features
                                                                          TableEditable.init();
                                                                      });
        </script>
    </body>
    <!-- END BODY -->
</html>