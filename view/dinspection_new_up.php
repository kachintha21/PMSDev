<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/ProductStatus.class.php");
include("../model/PigmentModel.class.php");
include("../model/FilmOuting.class.php");
include("../controllers/json_pp_process.php");
include("../model/PrintingStatus.class.php");
include("../model/DecalInspection.class.php");
include("../model/DInspection.class.php");
include("../model/Defect.class.php");
include("../model/LayoutPlans.class.php");




$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pt = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$Status = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$did = new DecalInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ndi = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lay = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$def = new Defect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_GET['pro'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);

    $preparing = $pl->getPreparingLayoutByNo($session_pattern_no);
} else {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    header("location:../index.php");
    exit();
}


if (isset($_GET['id'])) {
    $col->deleteColours($_GET['id']);
    header("location:colour_data.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Decal Inspection </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

            #div1, #div2, #div3, #div4 {

                width:  100%;

            }

          
            #div4 { overflow-x: auto;}




        </style>

<script>
document.getElementById("save_data").onclick = function() {
    //disable
    this.disabled = true;

    //do some validation stuff
}

</script>
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


                    <h3 class="page-title">Decal Inspection  - UnPlanned

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="dinspection_view.php"  style="text-decoration: none" title="View Data" ><b>View</b></a>
                                <i class="fa fa-angle-right"></i> </li>

                            <li> <a href="defects_categories_view.php"  style="text-decoration: none" title="Defects Report" ><b>Defects Report </b></a>
                                <i class="fa fa-angle-right"></i> </li>


                            <li> <a href="#"  style="text-decoration: none" title="WIP" >WIP(<?php echo($did->getWipDecalInspection()); ?>)</a>                       <i class="fa fa-angle-right"></i> </li>





                            <li> <a href="#"  style="text-decoration: none" title="Daily_Output" >Daily_Output(<?php echo($did->getDailyOutPutQtyDecalInspection(getServerDate())); ?>)</a>   <i class="fa fa-angle-right"></i> </li>


                            <li> <b>
                                    <a  href="#"   style="text-decoration: none" title="Changed Job No"
                                        onClick="return Changed_pattern('',
                                                        'dinspection_ps.php',
                                                        '<?php echo($session_pattern_no); ?>');" 
                                        > Changed Job No </a>
                                </b> 

                        </ul>

                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Decal Inspection - UnPlanned
                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>



                                <div class="portlet-body form">



                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" id="myForm" class="form-horizontal form-bordered" >

                                        <input  type="hidden" class="form-control"  name="org_name_dt" id="org_name_dt"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="item02_dt" id="item02_dt"   

                                                value="<?php echo($ndi->getNextDInspectionRefNo("dinspection_tbl", "DIN")); ?>" />

                                        <div class="form-body">   
                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <input  type="text" class="form-control" name="pattern_no_dt" id="pattern_no_dt"  value="<?php echo($preparing[4]); ?>" readonly/>

                                                </div>  

												



                                                <label class="control-label col-sm-2">Production No <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <input  type="text" class="form-control" name="pro_no_dt" id="pro_no_dt"  value="<?php echo($session_pattern_no); ?>" readonly/>

                                                </div>   


                                                <label class="control-label col-sm-2">Lot No <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <input  type="text" class="form-control" name="lot_no_dt" id="lot_no_dt"  value="<?php echo($preparing[3]); ?> "  readonly/>

                                                </div>   


                                            </div>




											
											
											
											
											
											
											
											  



                                            <div class="container"  style="width:100%" >
                                               
												
												<div class="portlet box blue-hoki">
											<div  class="portlet-title">
											<label class="control-label col-sm-2">Inspection Completed
											<span style="color: crimson;"> </span></label>
                                                
											</div>
											</div>
											
											
											 <div class="form-group form-group">
                                                  
												
												
												 <label class="control-label col-sm-2">Lot Finished <span style="color: crimson;"> </span></label>
                                                <div class="col-sm-2">
                                                    <select class="form-control"    name='is_fin' id='is_fin'>


													<option value="notFIN">Not Finished </option>

                                                        <option value="isFIN">Finished</option>
                                                        

                                                    </select>
													</div>   

												<label class="control-label col-sm-2"> Inspected Sheets </label>
                                                <div class="col-sm-2">


                                                    <input  type="number" class="form-control" name="ins_qty" id="ins_qty"  value=""/>

                                                </div>  

												<label class="control-label col-sm-2"> EPF No </span></label>
                                                <div class="col-sm-2">


                                                    <input  type="number" class="form-control" name="epf_no" id="epf_no"  value=""/>

                                                </div>  												

                                            </div>

                                                

                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" class="btn purple" onClick="return form_save();" id="save_data" > <i class="fa fa-check"></i> Save </button>
                                                            <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div  id="insert_response"   class="form-group form-group"  style="font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >

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
            <script src="../js/dinspection.js"></script>
            <script src="../js/script.js"></script>

            <script src="../ajax_post/dinspection_post_new.js"></script>
			<script src="../ajax_post/dinspection_post_new_up.js"></script>
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

<script>
function disableBtn(){
    document.getElementById('btn').disabled = true;
}
</script>
            <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>