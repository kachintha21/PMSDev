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
        <title>Noritake|Pigment Management
        </title>
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
                                <i class="fa fa-home"></i>
                                <a href="pigment_expire_data.php"> Pigment Expire Report</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            
                            <li>
                                <a href="#">Pigment Management</a>
                             </li>
                            
                     
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
                                        <i ></i>Pigment Management
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
                                                    <button  class="btn green" onclick="window.location = 'pigment_issue.php';">
                                                        New <i class="fa fa-plus"></i>
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
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>




                                                <th>
                                                    Barcode Ref Number 
                                                </th>                                                                                                                           

                                                <th>
                                                    Pattern 
                                                </th> 


                                                <th>
                                                    Color No
                                                </th> 

                                                <th>
                                                    Color Name
                                                </th> 




                                                <th>
                                                    Weight
                                                </th> 



                                                <th>
                                                    Re-Mixing Date 
                                                </th> 

                                                <th>
                                                    Re-Mixing Date 
                                                </th>     


                                                <th>
                                                    Date
                                                </th> 
                                                <th>
                                                    Time
                                                </th> 

                                                <th>
                                                    Delete
                                                </th>





                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $query = "SELECT * FROM pigment_issues_details_tbl  GROUP BY barcode_ref_no_pidt DESC";
                                            ?>  

                                            <?php
                                            if ($result = $conn->query($query)) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $newdate = strtotime('+180 days', strtotime($row["re_mixing_date_pidt"]));
                                                    $expired = date('Y-m-d', $newdate);
                                                    ?>    


                                                    <tr>


                                                        <td>
                                                            <a href="barcode.php?id=<?php echo($row["barcode_ref_no_pidt"]); ?>">
                                                                <?php echo($row["barcode_ref_no_pidt"]); ?> 
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <?php echo($row["design_number_pidt"]); ?> 
                                                        </td>




                                                        <td>
                                                            <?php echo($row["color_number_pidt"]); ?> 
                                                        </td>



                                                        <td>
                                                            <?php echo($row["color_name_pidt"]); ?> 
                                                        </td>





                                                        <td>									
                                                            <?php echo($row["weight_pidt"]); ?> 
                                                        </td>

                                                        <td>									
                                                            <?php echo($row["re_mixing_date_pidt"]); ?> 
                                                        </td>



                                                            <?php
                                                            if($row["re_mixing_date_pidt"]!==""){
                                                             if (getServerDate() < $expired) {
                                                            ?>
                                                            <td>							
                                                            <?php echo($expired) ?>
                                                            </td>
                                                            <?php } else {
                                                                ?>   
                                                            <td style="background-color:#FF0000">							
                                                            <?php echo($expired) ?>
                                                            </td>
                                                            <?php }  } else {   ?>
                                                            

                                                              <td>									
                                                            <?php echo($row["re_mixing_date_pidt"]); ?> 
                                                        </td>

                                                            <?php }?>

                                                        <td>									
        <?php echo($row["org_date_pidt"]); ?> 
                                                        </td>

                                                        <td>									
                                                            <?php echo($row["org_time_pidt"]); ?> 
                                                        </td>


                                                        <td style="width:50px; text-align:center;">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor:pointer"
                                                                  onclick="deleteEntity('<?php echo($row['id']); ?>', 'pigment_issue.php?id=<?php echo($row['id']); ?>',
                                                                                          '<?php echo($row['id']); ?>')"; 
                                                                  ></span></td>

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