<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/Colours.class.php");

$drn = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$color = $drn->getColoursCodeByPatternNoId($_GET['id']);


if ($_SESSION['logged_usr_id']) {

    $pname = $_SESSION['design_number_pidt'];
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
        <title>Noritake|Color Edit</title>
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
        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <link rel="shortcut icon" href="favicon.ico"/>

        <style>
            .center {
                border: 3px solid black;
                width: 10cm;
                height:10.0cm;
                display: block;

                /*                border: 3px solid black;
                                width: 10cm;
                                height:7.5cm;
                                display: block;*/

                margin-top: 15px;
                margin-left: 15px;
            }
            .center2 {
                border: 1px solid black;
                width: 510px;
            }

            .center3 {
                border: 1px solid black;
                width: 510px;
            }


            td {
                border: 1px solid black;
                padding: 4.1px 5px;
            }
            .font_1 {
                font-size: 12px;
            }
        </style>

        <style>
            .y{
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 11px;
            }
        </style>

        <style type="text/css" media="print">
            .noprint {
                display: none;
            }
            .noprint01 {
                display: none;
            }
        </style>
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
                    <h3 class="page-title">Color Edit
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
                                <a href="decal_received_note_view.php"> View

                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            Color Edit
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <!--                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                                                                    Actions <i class="fa fa-angle-down"></i>
                                                                </button>-->
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <!--                                    <li>
                                                                            <a href="#">Action</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Another action</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Something else here</a>
                                                                        </li>
                                                                        <li class="divider">
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Separated link</a>
                                                                        </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Color Edit
                                    </div>
                                    <!--                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>-->
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="post" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >
                                        <input  type="hidden" class="form-control"  name="org_name_ct" id="org_name_ct"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="is_edit_ct" id="is_edit_ct"  value="<?php echo($color[12] + 1); ?>" />
                                        <input  type="hidden" class="form-control"  name="id" id="id"  value="<?php echo($color[0]); ?>" />




                                        <div class="form-body"> 





                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="pattern_no_ct" id="pattern_no_ct"  value="<?php echo($color[2]); ?>"
                                                            readonly/>


                                                </div> 


                                                <label class="control-label col-sm-2">Colours Index<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="colours_code_ct" id="colours_code_ct"  value="<?php echo($color[3]); ?>" readonly/>
                                                </div> 



                                                <label class="control-label col-sm-2">Color name<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="colours_name_ct" id="colours_name_ct"  value="<?php echo($color[4]); ?>" />
                                                </div> 

                                            </div>






                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pigment Name<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="pigment_name_ct" id="pigment_name_ct"  value="<?php echo($color[5]); ?>"
                                                            />


                                                </div> 


                                                <label class="control-label col-sm-2">Qty	<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="number"      class="form-control" name="qty_ct" id="qty_ct"  value="<?php echo($color[6]); ?>" />
                                                </div> 



                                                <label class="control-label col-sm-2">Color code<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="item01_ct" id="item01_ct"  value="<?php echo($color[7]); ?>" />
                                                </div> 

                                            </div>





                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Consumption<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="number"      class="form-control" name="item02_ct" id="item02_ct" value="<?php echo($color[8]); ?>"
                                                            />


                                                </div> 


                                                <label class="control-label col-sm-2">Infor<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="item03_ct" id="item03_ct"  value="<?php echo($color[9]); ?>" />
                                                </div> 

                                                <label class="control-label col-sm-2">Screen Mesh<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <input  type="text"      class="form-control" name="item04_ct" id="item04_ct"  value="<?php echo($color[10]); ?>" />
                                                </div> 





                                            </div>








                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i> save changes </button>
                                                        <button type="button" class="btn default"  onclick="goBack()" >Cancel</button>
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
<!--<script src="script/certificate_post.js"></script>-->



<script src="../js/pigment.js"></script>



<script src="../ajax_post/color_post.js"></script>


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