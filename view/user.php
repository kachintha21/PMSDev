<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/User.class.php");
include("../model/Section.class.php");

$user = new User(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$se = new Section(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



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



if (isset($_GET['id'])) {
    $user->deleteUser($_GET['id']);
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake |New User</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="../nassets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="../nassets/global/plugins/select2/select2.css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->

        <link href="../nassets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../nassets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" />

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

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="user_view.php"> View

                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">New User
                                </a>
                            </li>
                        </ul>
                        <div class="page-toolbar">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>New User </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>





                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_tt" id="org_name_tt"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="depart_tt" id="depart_tt"  value="<?php echo($loge_depart); ?>" />

                                        <div class="form-body">                    

                                            <div class="form-group form-group-sm">
                                                <label class="control-label col-sm-2">Employee Number <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="emp_no" id="emp_no" 
                                                            />                         
                                                </div>                                                        

                                            </div>




                                            <div class="form-group form-group-sm">
                                                <label class="control-label col-sm-2">First Name <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-3">
                                                    <input  type="text" class="form-control" name="fname" id="fname" 
                                                            />                         
                                                </div>   


                                                <label class="control-label col-sm-2">Last Name <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-3">
                                                    <input  type="text" class="form-control" name="fname" id="fname" 
                                                            />                         
                                                </div>  

                                            </div>



                                            <div class="form-group form-group-sm">
                                                <label class="control-label col-sm-2">Username <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-3">
                                                    <input  type="text" class="form-control" name="user_name" id="user_name" 
                                                            />                         
                                                </div>                                                        

                                            </div>



                                            <div class="form-group form-group-sm">
                                                <label class="control-label col-sm-2">Password <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-3">
                                                    <input  type="password" class="form-control" name="password" id="password" 
                                                            />                         
                                                </div>                                                        

                                            </div>


                                            <div class="form-group form-group-sm">
                                                <label class="control-label col-sm-2">Section<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-3">
                                                    <select  class="form-control" name="section" id="section">

                                                        <?php
                                                        $se->getSectionByName();
                                                        ?>

                                                    </select>                          
                                                </div>                                                        

                                            </div>









                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn purple" onClick="return submit_();" > <i class="fa fa-check"></i> Save </button>
                                                        <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>

                                    </form>


                                    <!-- END FORM-->
                                    <div  id="insert_response" style="color: #FF0000;  font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >
                                        <h3></h3>
                                        <p></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
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

<script src="../ajax_post/user_post.js"></script>


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
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../nassets/admin/pages/scripts/form-samples.js"></script>


<script src="../script/bootstrap.min.js"></script>
<script src="script/jquery-1.11.1.min.js"></script>
<!--<script src="script/certificate_post.js"></script>-->


<script src="../script/jquery_calculation.js"></script>

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