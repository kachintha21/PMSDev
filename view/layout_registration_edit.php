<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
date_default_timezone_set("Asia/Colombo");
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/CurveMaster.class.php");
include("../model/PigmentModel.class.php");
include("../model/LayoutPlans.class.php");
include("../model/SavedLayoutplans.class.php");
include("../model/YieldMaster.class.php");
include("../model/Colours.class.php");
include("../model/Format.class.php");

$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$slp = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$yield = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ft = new Format(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$preparing = $pl->getPreparingLayoutByID($_GET['ID']);
$ID=$_GET['ID'];


if (isset($_GET['id'])) {
    $lp->deleteLayoutplans($_GET['id']);
    header("location:layout_registration_edit.php?ID=$ID");
    exit();
}


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
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
        <title>Noritake|Layout Registration   


        </title>
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


                    <h3 class="page-title">Layout Registration 
                       

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="printing_order_details.php"  style="text-decoration: none" title="View Data" ><b>View</b></a> <i class="fa fa-circle"></i> 
                                Layout Registration Edit
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
                                    <div class="caption"> <i class="fa fa-gift"></i>Layout Registration Edit




                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>





                                <div class="portlet-body form">

                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_plt" id="org_name_plt"  value="<?php echo($loge_user); ?>" />
                                      
                                        
                                        <input  type="hidden" class="form-control"  name="ID" id="ID"  value="<?php echo($ID)?>"  />
                                        
                                               <div class="form-group form-group">

                                       <label class="control-label col-sm-2"> Printing Pattern 

                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pro_no_lpt" id="pro_no_lpt"  value="<?php echo($session_pattern_no); ?>" readonly/>

                                                </div>  


                                              

                                            </div>

                                        <div class="form-body">                   
                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Production No

                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pro_no_lpt" id="pro_no_lpt"  value="<?php echo($preparing[2]); ?>" readonly/>

                                                </div>  


                                                <label class="control-label col-sm-2">Lot No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout" id="layout" value="<?php echo($preparing[3]); ?>" readonly/>

                                                </div>    

                                                <label class="control-label col-sm-2">Simulation Status<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <select  class="form-control" name='status' id='status'>



                                                        <option value="0">Registration </option>

                                                        <option value="1">Amend</option>
                                                        <option value="2">Confirm</option>

                                                        <option value="3">Rejected</option>

                                                        <option value="4">Waiting</option>


                                                    </select>      


                                                </div> 

                                            </div>



                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Shipment Request<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="shipment_request_plt" id="shipment_request_plt" 
                                                            value="<?php echo($preparing[5]); ?>"     />    



                                                </div>    


                                                <label class="control-label col-sm-2">Shipment Schedule<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="item01_plt" id="item01_plt"   
                                                            value="<?php echo($preparing[17]); ?>"   />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="date_plt" id="date_plt"   value="<?php echo($preparing[7]); ?>" />                         
                                                </div>                                                       

                                            </div>








                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Printing Way<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_way_plt" id="printing_way_plt" value="<?php echo($preparing[8]); ?>"    />                         
                                                </div>    

                                                <label class="control-label col-sm-2">Paper Size<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="paper_size_plt" id="paper_size_plt"    value="<?php echo($preparing[9]); ?>"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Body<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="body_plt" id="body_plt"    value="<?php echo($preparing[10]); ?>"  />                         
                                                </div>                                                       

                                            </div>

                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Factory<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="factory_plt" id="factory_plt"  value="<?php echo($preparing[11]); ?>"  />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Market<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="market_plt" id="market_plt"  value="<?php echo($preparing[12]); ?>" />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Decoration<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="decoration_plt" id="decoration_plt"   value="<?php echo($preparing[13]); ?>"  />                         
                                                </div>                                                       

                                            </div>
                                            <div  id="insert_response_ajax">         
                                            </div>


                                            <div class="form-group form-group">



                                               


                                                <label class="control-label col-sm-2">Order  <span style="color: crimson;"> </span></label>
                                                <div class="col-sm-2">
                                                    <input  type="number" class="form-control" name="number_sheet_plt" id="number_sheet_plt"  value="<?php echo($preparing[14]); ?>"   />                         
                                                </div> 
                                                
                                                 <label class="control-label col-sm-2">Printing lines<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_lines_plt" id="printing_lines_plt"  value="<?php echo($preparing[15]); ?>"  readonly/>                         
                                                </div> 
                                            </div>



                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Comment<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-6">
                                                    <textarea rows="5" cols="40" name="is_remarks_plt" id="is_remarks_plt" ><?php echo($preparing[16]); ?></textarea>

                                                </div> 



                                            </div>









                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logicp">

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="5%"> #</th>
                                                                    <th class="text-center" width="10%">Printing Pattern </th>
                                                                    <th class="text-center" width="10%">Curve No</th>
                                                                    <th class="text-center" width="10%">FG Pattern</th>

                                                                    <th class="text-center" width="8%">Planned Q'ty  </th> 
                                                                    <th class="text-center" width="8%">#curves </th> 
                                                                    <th class="text-center" width="8%">#sheets</th> 
                                                                    <th class="text-center" width="8%">Close Curve</th> 

                                                                    <th class="text-center" width="10%"> Total Sheet</th> 
                                                                     <th class="text-center" width="10%">Delete</th> 


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT * FROM layout_plans_tbl Where pro_no_lpt='" . $preparing[2] . "' AND  lot_no_lpt='" . $preparing[3] . "'   ORDER BY id DESC";

                                                                if ($result = $conn->query($query)) {
                                                                    $index=1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        ?>
                                                                        <tr id='addrp0'>
                                                                            <td><?php echo($index);?></td>
                                                                            
                                                                                   <input type="hidden" name='id[]' id='id[]' class="form-control" value="<?php echo($row["id"]); ?>"   readonly/>
                                                                            <td>
                                                                                <input type="text" name='desing_no_lpt[]' id='desing_no_lpt[]'  class="form-control" value="<?php echo($row["desing_no_lpt"]); ?>"   readonly/>


                                                                            </td>                                                








                                                                            <td><input type=text name='curve_no_lpt[]' id='curve_no_lpt[]'  class="form-control" value="<?php echo($row["curve_no_lpt"]); ?>"  readonly/></td>


                                                                            </td>




                                                                            <td><input type=text name='decal_no_lpt[]' id='decal_no_lpt[]'  class="form-control"   value="<?php echo($row["decal_no_lpt"]); ?>" /></td>



                                                                            <td><input type="number" name='planned_qty_lpt[]' id='planned_qty_lpt[]'    value="<?php echo($row["planned_qty_lpt"]); ?>"   type="text"  class="form-control" /></td>
                                                                            <td><input type="number" name='no_of_curves_lpt[]' id='no_of_curves_lpt[]'  value="<?php echo($row["no_of_curves_lpt"]); ?>"  type="text"  class="form-control" /></td>
                                                                            <td><input type="numner" name='no_of_sheets_lpt[]' id='no_of_sheets_lpt[]'  value="<?php echo($row["no_of_sheets_lpt"]); ?>"  class="form-control" /></td>
                                                                            <td><input type="number" name='close_curve_after_lpt[]' id='close_curve_after_lpt[]'  value="<?php echo($row["close_curve_after_lpt"]); ?>" class="form-control" min="0"  value="0"/></td>
                                                                            <td><input type="number" name='total_sheets_needed_lpt[]' id='total_sheets_needed_lpt[]' value="<?php echo($row["total_sheets_needed_lpt"]); ?>" placeholder='total'  min="0"  type="text"  class="form-control" /></td>

                        <td style="width:50px; text-align:center;">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor:pointer"
                                                                  onclick="deleteEntity('<?php echo($row['id']); ?>', 'layout_registration_edit.php?id=<?php echo($row['id']); ?> &ID=<?php echo($preparing[0]); ?>',
                                                                                  '<?php echo($row['id']); ?>')"; 
                                                                  ></span></td>



                                                                        </tr>

                                                                    <?php 
                                                                    
                                                                    $index++;
                                                                    }
                                                                }
                                                                ?>
                                                                <tr id='addrp1'></tr>


                                                            </tbody>


                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <button  type="button" class="btn btn-default pull-left" onclick="location.href='curve_registration_edit.php?ID=<?php echo($ID)?>&design=<?php echo($preparing[4]); ?>'">Add New</button>
                                                        
                                                    </div>
                                                </div>

                                             












                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">


                                                            <button type="button" class="btn purple" onClick="return form_edit();" > <i class="fa fa-check"></i>



                                                                Save changes </button>




                                                            <button type="button" class="btn default"  oonclick="location.href='printing_order_details.php'">Cancel</button>
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
        <script src="../js/script.js"></script>
        <script src="../js/layout_registration.js"></script>
        <script src="../ajax_post/layout_registration_post.js"></script>
        <script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
        <link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
        <script src='../select2/dist/js/select2.min.js'></script>
        <script src="../ajax_post/curveSelectList.js"></script>
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