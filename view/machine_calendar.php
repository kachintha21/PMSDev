<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/MachineCalendar.class.php");

$mc = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pro_no_ppt'];
    $loge_depart = $_SESSION['logged_usr_depat'];
} else {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    header("location:../index.php");
    exit();
}


if (isset($_GET['ID'])) {
    $data = $mc->getPlanedQtyById($_GET['ID']);
}
if (isset($_GET['id'])) {
   $mc->deleteMachineCalendar($_GET['id']);
    header("location:machine_calendar_view.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Machine Calendar</title>
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


                    <h3 class="page-title">Machine Calendar

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="machine_calendar_view.php"  style="text-decoration: none" title="View Data" ><b>View</b></a> 

                                <i class="fa fa-angle-right"></i>

                                Machine Calendar










                        </ul>

                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Machine Calendar




                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_mlt" id="org_name_mlt"  value="<?php echo($loge_user); ?>" />

  <input  type="hidden" class="form-control"  name="id" id="id"        value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[0]);
                                                }
                                                ?>" />

                                        <input  type="hidden" class="form-control"  name="is_edit_mlt" id="is_edit_mlt" value="<?php
                                        if ($_GET['ID']) {
                                            echo($data[5] + 1);
                                        }
                                                ?>" />
                                        
                                        
                                        <div class="form-body">                   





                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control"  name="date_mlt" id="date_mlt" value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[1]);
                                                }
                                                ?>"   />
                                                </div>    


                                                <label class="control-label col-sm-2">M/No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                 <?php if ($_GET['ID']) {?>    
                                                   <input  type="text" class="form-control"  name="machine_no_mlt" id="machine_no_mlt"  value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[2]);
                                                }
                                                ?>"  />
      
                                                 <?php } else {?>  
                                                       <select class="form-control"    name='machine_no_mlt' id='machine_no_mlt'>
                                                        <option value="M01">M01</option>
                                                        <option value="M02">M02</option>
                                                        <option value="M03">M03 </option>
                                                        <option value="M04">M04 </option>
                                                    </select>

                                                 <?php }?>  

                                                </div>    

                                                <label class="control-label col-sm-2">#shift<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    
                                                      <?php if ($_GET['ID']) {?>
                                                 
                                                    <input  type="number" class="form-control"  name="number_shift_mlt" id="number_shift_mlt" value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[3]);
                                                }
                                                ?>"   />
                                                     <?php } else {?>  
                                                    
                                                       <select class="form-control"    name='number_shift_mlt' id='number_shift_mlt'>

                                                        
                                                        <option value="2">2</option>
                                                        <option value="1">1</option>
                                                        <option value="2">3</option>

                                                    </select>
                                                        <?php }?>  
                                                </div>   
                                                
                                            </div>

                                            
                                             <div class="form-group form-group">
                                               


                                                <label class="control-label col-sm-2">Holiday status<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                                 <?php if ($_GET['ID']) {?>
                                                 
                                                             <input  type="number" class="form-control"  name="item01_mlt" id="item01_mlt" value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[6]);
                                                }
                                                ?>"   />
                                                    
                                                       <?php } else {?>  
                                                    
                                                       <select class="form-control"    name='item01_mlt' id='item01_mlt'>
                                                        <option value="1">Normal</option>
                                                        <option value="2">Saturday</option>
                                                        <option value="3">Holiday </option>
                                               
                                                    </select>

                                                                <?php }?>  




                                                </div>    

                                               
                                                
                                            </div>






                                            <div  id="insert_response_ajax"   class="form-group form-group"  style="font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >

                                            </div>







                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i> Save </button>
                                                    <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                    <div  id="insert_response"   class="form-group form-group"  style="font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >

                                    </div>
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
            <script src="../js/script.js"></script>  


            <script src="../ajax_post/machine_calendar_post.js"></script>
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








    </body>
    <!-- END BODY -->
</html>