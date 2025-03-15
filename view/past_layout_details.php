<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PastLayoutDetails.class.php");



$pld = new PastLayoutDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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


if (isset($_GET['id'])) {
    $pld->deletePastLayoutDetails($_GET['id']);
    header("location:past_layout_details_data.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Past Layout Details</title>
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


                    <h3 class="page-title">Past Layout Details

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
                                <a href="past_layout_details_data.php"> View

                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Past Layout Details
                                </a>
                            </li>



                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                                    Actions <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
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
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Past Layout Details






                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_pldt" id="org_name_pldt"  value="<?php echo($loge_user); ?>" />


                                        <div class="form-body">                   


                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Production No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pro_no_pldt" id="pro_no_pldt" 


                                                            required/>                         
                                                </div>    




                                                <label class="control-label col-sm-2">DESIGN NO <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <input  type="text" class="form-control" name="design_no_pldt" id="design_no_pldt"   required/> 

                                                </div>










                                                <label class="control-label col-sm-2">LOT NO<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="lot_no_pldt" id="lot_no_pldt"  required/>                         
                                                </div> 


                                            </div>



                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">NO OF SHEETS<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="number" class="form-control" name="sheet_pldt" id="sheet_pldt" 
                                                            required/>                         
                                                </div>   



                                                <label class="control-label col-sm-2">FACTORY<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="factory_pldt" id="factory_pldt" 
                                                            required/>                         
                                                </div>    


                                                <label class="control-label col-sm-2">F-FINISH DATE<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="layout_finish_date_pldt" id="layout_finish_date_pldt" 
                                                            required/>                         
                                                </div> 


                                            </div>              



                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">1st color Print Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="first_color_print_date_pldt" id="first_color_print_date_pldt" 
                                                            required/>                         
                                                </div>   



                                                <label class="control-label col-sm-2">Layout Maker<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout_maker_pldt" id="layout_maker_pldt" 
                                                            required/>                         
                                                </div>    


                                                <label class="control-label col-sm-2">Layout Check<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout_check_pldt" id="layout_check_pldt" 
                                                            required/>                         
                                                </div> 


                                            </div> 





                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Print Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="print_date_pldt" id="print_date_pldt" 
                                                            />                         
                                                </div>   




                                            </div> 



                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="5%"> #</th>

                                                                    <th class="text-center" width="15%">Curves No</th>
                                                                    <th class="text-center" width="10%">Qty</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php ?>
                                                                <tr id='addr0' class="tr-row">
                                                                    <td>1</td>








                                                                    <td><input type="text" name='curves_no_pldt[]' id='curves_no_pldt[]'  placeholder='Curves'
                                                                               class="form-control g-price"/>


                                                                    <td><input type="number" name='qty_pldt[]' id='qty_pldt[]'  placeholder='Qty'
                                                                               class="form-control g-cname" />

                                                                    </td>

                                                                </tr>
                                                                <tr id='addr1' class="tr-row"></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <button id="add_row" type="button" class="btn btn-default pull-left">Add Row</button>
                                                        <button id='delete_row' type="button" class="pull-right btn btn-default">Delete Row</button>
                                                    </div>
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



<script src="../js/past_layout_details.js"></script>



<script src="../ajax_post/past_layout_details_post.js"></script>


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