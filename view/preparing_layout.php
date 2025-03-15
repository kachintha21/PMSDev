<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/SimulationResult.class.php");
include("../model/SavedLayoutplans.class.php");


include("../model/PigmentModel.class.php");

$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sr = new SimulationResult(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$save = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);
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
        <title>Noritake|Decal Details Registration</title>
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


                    <h3 class="page-title">Decal Details Registration

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="printing_order_details.php"  style="text-decoration: none" title="View Data" ><b>View</b></a> <i class="fa fa-circle"></i> </li>

                            <li> <a href="index.php"  style="text-decoration: none" title="Daily_Output" ><b>Daily_Output(<?php echo($pl->getDailyOutPutQtyPreparingLayout(getServerDate(), $session_pattern_no)); ?>)</b></a> <i class="fa fa-circle"></i> </li>
                            <li> <b>
                                    <a  href="#"   style="text-decoration: none" title="Changed Pattern No"
                                        onClick="return Changed_pattern('',
                                                        'decal_details_reg_ps.php',
                                                        '<?php echo($session_pattern_no); ?>');" 
                                        > Changed Pattern No </a>
                                </b> 



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
                                    <div class="caption"> <i class="fa fa-gift"></i>Decal Details Registration




                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_ct" id="org_name_ct"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="ref_no_plt" id="ref_no_plt"  value="<?php echo($pl->getNextPreparingLayoutRefNo("planning_details_tbl", "NLPL")); ?>" />

                                        <div class="form-body">                   




                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pattern_no_plt" id="pattern_no_plt"  value="<?php echo($session_pattern_no); ?>" />

                                                </div>    



                                            </div>







                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Production No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pro_no_plt" id="pro_no_plt" 
                                                            />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Lot No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">

                                                    <select  class="form-control" name="lot_no_plt" id="lot_no_plt" onchange="return getData();" >


                                                        <?php
                                                        $save->getSavedLayoutplansByLotNumber();
                                                        ?>
                                                    </select>

                                                </div> 


                                            </div>


                                            <div class="form-group form-group"   id="insert_response_data">



                                            </div>




                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Shipment Request<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="shipment_request_plt" id="shipment_request_plt" 
                                                            />    



                                                </div>    


                                                <label class="control-label col-sm-2">Shipment Schedule<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="item01_plt" id="item01_plt"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="date_plt" id="date_plt"  />                         
                                                </div>                                                       

                                            </div>




                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Printing Way<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_way_plt" id="printing_way_plt" value="<?php echo($Model[5]); ?>"   />                         
                                                </div>    

                                                <label class="control-label col-sm-2">Paper Size<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="paper_size_plt" id="paper_size_plt"   value="<?php echo($Model[3]); ?>" />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Body<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="body_plt" id="body_plt"   value="<?php echo($Model[6]); ?>"  />                         
                                                </div>                                                       

                                            </div>

                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Factory<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="factory_plt" id="factory_plt" />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Market<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="market_plt" id="market_plt"  value="<?php echo($Model[8]); ?>"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Decoration<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="decoration_plt" id="decoration_plt"  value="<?php echo($Model[7]); ?>"  />                         
                                                </div>                                                       

                                            </div>
                                            <div  id="insert_response_ajax">         
                                            </div>


                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Number of Sheet Order<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="number_sheet_plt" id="number_sheet_plt"  />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Printing<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_plt" id="printing_plt"  />                         
                                                </div>     


                                                <label class="control-label col-sm-2">Printing lines<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_lines_plt" id="printing_lines_plt"  />                         
                                                </div> 

                                            </div>


                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Re-marks<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-8">
                                                    <textarea rows="5" cols="50" class="form-control" name="is_remarks_plt" id="is_remarks_plt">-</textarea>


                                                </div>    



                                            </div>



                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logicp">

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="5%"> #</th>
                                                                    <th class="text-center" width="15%">Color </th>
                                                                    <th class="text-center" width="20%">Plan Date</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php ?>
                                                                <tr id='addrp0'>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <select  class="form-control" name="color_ptt[]" id="color_ptt[]">

                                                                            <?php
                                                                            $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $session_pattern_no . "'  ORDER BY colours_pm  ASC";
                                                                            ?>  

                                                                            <?php
                                                                            if ($result = $conn->query($query)) {
                                                                                while ($row = $result->fetch_assoc()) {
                                                                                    ?> 



                                                                                    <option value="<?php echo($row["colours_pm"]); ?>"><?php echo($row["colours_pm"]); ?></option>





                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>


                                                                        </select> 
                                                                    </td>                                                
                                                                    <td><input type="date" name='print_date_ptt[]' id='print_date_ptt[]' placeholder='Curve No'  type="text"  class="form-control name" /></td>

                                                                </tr>
                                                                <tr id='addrp1'></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <button id="add_rowp" type="button" class="btn btn-default pull-left">Add Row</button>
                                                        <button id='delete_rowp' type="button" class="pull-right btn btn-default">Delete Row</button>
                                                    </div>
                                                </div>



















                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" class="btn purple" onClick="return submit_save();" > <i class="fa fa-check"></i> Save </button>
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
        <script src="../js/preparing_layout.js"></script>
        <script src="../js/printing_master.js"></script>

        <script src="../js/script.js"></script>



        <script src="../ajax_post/new_preparing_layout_post.js"></script>


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