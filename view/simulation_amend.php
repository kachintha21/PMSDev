<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
date_default_timezone_set("Asia/Colombo");
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/PigmentModel.class.php");
include("../model/LayoutPlans.class.php");
include("../model/SavedLayoutplans.class.php");
include("../model/YieldMaster.class.php");


$lot_no = $_GET['id'];
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$slp = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$yield= new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);











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
        <title>Noritake|Simulation Amend      

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


                    <h3 class="page-title">Simulation Amend

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="simpulation_save.php"  style="text-decoration: none" title="View Data" ><b>View</b></a> <i class="fa fa-circle"></i> 
                                Simulation Amend
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
                                    <div class="caption"> <i class="fa fa-gift"></i>Simulation Amend




                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>


                                <?php
                                $slp_rest = $slp->getSavedLayoutplansGroupByLotNo($_GET['id']);

                                $Model = $pm->getPigmentModelByNo($slp_rest[3]);
                                $ref_no=$pl->getNextPreparingLayoutRefNo("preparing_layout_tbl", "NLPLLSP");




                            
                                ?>



                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_ct" id="org_name_ct"  value="<?php echo($loge_user); ?>" />
                                        <input  type="hidden" class="form-control"  name="desing" id="desing"  value="<?php echo($slp_rest[3]); ?>" />


                                        <?php
                                        $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $slp_rest[3] . "'    ";

                                        if ($result = $conn->query($query)) {
                                            $i = 2;
                                            while ($row = $result->fetch_assoc()) {
                                                $i++;

                                                $date = strtotime("+$i day");

                                                $ndate = date("Y-m-d", $date);
                                                ?>

                                                <input  type="hidden" class="form-control"  name="ref_no_pst[]" id="ref_no_pst[]"  value="<?php echo($ref_no); ?>" />
                                                <input  type="hidden" class="form-control"  name="pattern_no_pst[]" id="pattern_no_pst[]"  value="<?php echo($slp_rest[3]); ?>" />
                                                <input  type="hidden" class="form-control"  name="color_pst[]" id="color_pst[]"  value="<?php echo($row["colours_pm"]); ?>" />
                                                <input  type="hidden" class="form-control"  name="lot_no_pst[]" id="lot_no_pst[]"  value="<?php echo($lot_no); ?>" />
                                                <input  type="hidden" class="form-control"  name="plan_date_pst[]" id="plan_date_pst[]"  value="<?php echo($ndate); ?>" />



                                                <input  type="hidden" class="form-control"  name="npattern_no_pst[]" id="npattern_no_pst[]"   value="<?php echo($slp_rest[3]); ?>" />
                                                <input  type="hidden" class="form-control"  name="nproduction_no_pst[]" id="nproduction_no_pst[]"   value="<?php echo($ref_no); ?>"/>
                                                <input  type="hidden" class="form-control"  name="nlot_no_pst[]" id="nlot_no_pst[]"   value="<?php echo($lot_no); ?>"  />                
                                                <input  type="hidden" class="form-control"  name="nscreen_mesh_pst[]" id="nscreen_mesh_pst[]"   value="<?php echo($row["screen_mesh_pm"]); ?>"/>
                                                <input  type="hidden" class="form-control"  name="ncolour_index_pst[]" id="ncolour_index_pst[]"  value="<?php echo($row["colours_pm"]); ?>" />                                                              
                                                <input  type="hidden" class="form-control"  name="ncolour_name_pst[]" id="ncolour_name_pst[]"   value="<?php echo($row["colours_name_pm"]); ?>"/>



        <?php
    }
    $i++;
}
?>



                                        <div class="form-body">                   






                                            <div class="form-group form-group">

                                                <label class="control-label col-sm-2">Production No <?php
                                                
                                              
                                                ?>
                                                
                                                <?php
                                                //echo($Model['11']);
                                                
                                                $qty=$slp->getMaxSheetQtyByLotNo($lot_no);

                                                $add_sheet_qty=$yield->getYieldAdditionalSheetsByQty($qty)+$Model['11'];

                                
                                                
                                                ?>
                                                
                                                <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pro_no_lpt" id="pro_no_lpt"  value="<?php echo($ref_no); ?>" readonly/>

                                                </div>  


                                                <label class="control-label col-sm-2">Lot No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout" id="layout"  value="<?php echo($lot_no); ?>" />

                                                </div>    

                                                <label class="control-label col-sm-2">Simulation Status<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">


                                                    <select  class="form-control" name='status' id='status'>

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
                                                    <input  type="text" class="form-control" name="shipment_request_plt" id="shipment_request_plt" 
                                                      value="<?php   if($slp_rest[4]==""){  echo(getServerDate()); }  else { echo($slp_rest[4]);  } ?>"      />    



                                                </div>    


                                                <label class="control-label col-sm-2">Shipment Schedule<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="item01_plt" id="item01_plt"  value="<?php   if($slp_rest[4]==""){  echo(getServerDate()); }  else { echo($slp_rest[4]);  } ?>"   />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="date_plt" id="date_plt"  value="<?php echo(getServerDate());?>" />                         
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
                                                    <input  type="text" class="form-control" name="factory_plt" id="factory_plt"  value="KLA" />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Market<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="market_plt" id="market_plt"  value="<?php echo($Model[9]); ?>"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Decoration<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="decoration_plt" id="decoration_plt"  value="<?php echo($Model[8]); ?>"  />                         
                                                </div>                                                       

                                            </div>
                                            <div  id="insert_response_ajax">         
                                            </div>


                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Number of Sheet Order<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="number_sheet_plt" id="number_sheet_plt" value="<?php echo($qty); ?>"  />                         
                                                </div>    


                                                <label class="control-label col-sm-2">Printing<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_plt" id="printing_plt" value="<?php echo($add_sheet_qty); ?>"  />                         
                                                </div>     


                                                <label class="control-label col-sm-2">Printing lines<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_lines_plt" id="printing_lines_plt"  value="NLPL"  />                         
                                                </div> 

                                            </div>























                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">
                                                            <thead>
                                                                <tr>                            

                                                                    <th class="text-center" width="10%">  ID </th>
                                                                    <th class="text-center" width="10%">   Desing </th>
                                                                    <th class="text-center" width="10%"> Curve No</th>
                                                                    <th class="text-center" width="10%"> Decal Pattern No</th>
                                                                    <th class="text-center" width="15%"> planned_qty</th>
                                                                    <th class="text-center" width="20%"> no_of_curves</th>
                                                                    <th class="text-center" width="20%">no_of_sheets</th>
                                                                    <th class="text-center" width="20%"> close_curve_after </th>

                                                                    <th class="text-center" width="20%">  total_sheets_needed </th>

                                                                    <th class="text-center" width="5%"> Delete</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
<?php
//echo($session_pattern_no.$_POST['pro_no_ct']);
$query = "SELECT * FROM saved_layout_plans_tbl WHERE layout='" . $lot_no . "'    ";

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        ?> 
                                                                        <tr id='addr0'>


                                                            <input type="hidden" name='schedule[]'  id="schedule[]" value="<?php echo($row["schedule"]); ?>"  
                                                                                     />

                                                                            <td>
                                                                                <input type="text" name='id[]'  id="id[]" value="<?php echo($row["id"]); ?>"  id='id[]' placeholder='Decol Pattern' class="form-control qty"
                                                                                       step="0" min="0"/>
                                                                            </td>
                                                                            <td>

                                                                                <input type="text" name='design[]'  id="design[]" value="<?php echo($row["design"]); ?>"  id='decol_pattern_no_pdt[]' placeholder='Decol Pattern' class="form-control qty"
                                                                                       step="0" min="0"/>
                                                                            </td>

                                                                            <td><input type="text" name='curve_no[]' id='curve_no[]'  value="<?php echo($row["curve_no"]); ?>" placeholder='Curve No'  type="text"  class="form-control name" /></td>
                                                                            <td><input type="text" name='decal_design[]' id='decal_design[]'  value="<?php echo($row["decal_design"]); ?>" placeholder='decal_design'  type="text"  class="form-control name" /></td>


                                                                            <td><input type="number" name='planned_qty[]' id='planned_qty[]' value="<?php echo($row["planned_qty"]); ?>" placeholder='Plan PCS' class="form-control qty"
                                                                                       step="0" min="0"/></td>



                                                                            <td><input type="number" name='no_of_curves[]' id="no_of_curves[]" value="<?php echo($row["no_of_curves"]); ?>"  placeholder='Pcs per Sheet'
                                                                                       class="form-control price" />
                                                                            </td>
                                                                            <td><input type="number" name='no_of_sheets[]' id="no_of_sheets[]"  value="<?php echo($row["no_of_sheets"]); ?>" placeholder='0.00' class="form-control"
                                                                                       /></td>
                                                                            <td><input type="number" name='close_curve_after[]' id="close_curve_after[]"  value="<?php echo($row["close_curve_after"]); ?>" placeholder='0.00' class="form-control"
                                                                                       /></td>

                                                                            <td><input type="number" name='total_sheets_needed[]' id="total_sheets_needed[]"  value="<?php echo($row["total_sheets_needed"]); ?>" placeholder='0.00' class="form-control"
                                                                                       /></td>

                                                                            <td style="width:25px; text-align:center;">
                                                                                <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor:pointer"
                                                                                      onclick="deleteEntity('<?php echo($row['id']); ?>', 'simulation_amend_delete.php?id=<?php echo($row['id']); ?>',
                                                                                                      '<?php echo($row['layout']); ?>')"; 
                                                                                      ></span></td>

                                                                        </tr>
                                                                        <tr id='addr1'></tr>

        <?php
    }
}
?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                









                                                <div class="container"  style="width:100%" >
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-hover" id="tab_logicp">

                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center" width="5%"> #</th>
                                                                        <th class="text-center" width="10%">Design </th>
                                                                        <th class="text-center" width="10%">Curve No</th>
                                                                        <th class="text-center" width="10%">Decal Design</th>

                                                                        <th class="text-center" width="15%">Planned Q'ty  </th> 
                                                                        <th class="text-center" width="15%">#curves </th> 
                                                                        <th class="text-center" width="15%">#sheets</th> 
                                                                        <th class="text-center" width="15%"> 	Close Curve After</th> 

                                                                        <th class="text-center" width="10%">  	Total</th> 


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php ?>
                                                                    <tr id='addrp0'>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <input type="text" name='desing_no_lpt[]' id='desing_no_lpt[]' placeholder='Design'  type="text"  class="form-control name" />


                                                                        </td>                                                
                                                                        <td><input type=text name='curve_no_lpt[]' id='curve_no_lpt[]' placeholder='Curve No'  type="text"  class="form-control name" /></td>
                                                                        </td>                                                
                                                                        <td><input type=text name='decal_no_lpt[]' id='decal_no_lpt[]' placeholder='Decal No'  type="text"  class="form-control name" /></td>
                                                                        <td><input type="number" name='planned_qty_lpt[]' id='planned_qty_lpt[]' placeholder='planned_qty'  type="text"  class="form-control name" /></td>
                                                                        <td><input type="number" name='no_of_curves_lpt[]' id='no_of_curves_lpt[]' placeholder='no_of_curves'  type="text"  class="form-control name" /></td>
                                                                        <td><input type="numner" name='no_of_sheets[]' id='no_of_sheets[]' placeholder='no_of_sheets'  type="text"  class="form-control name" /></td>
                                                                        <td><input type="number" name='close_curve_after_lpt[]' id='close_curve_after_lpt[]' placeholder='close_curve'  type="text"  class="form-control name" /></td>
                                                                        <td><input type="number" name='total_sheets_needed_lpt[]' id='total_sheets_needed_lpt[]' placeholder='total'  type="text"  class="form-control name" /></td>




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

                                                      
                                                                <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i>
                                                                
                                                                
                                                                
                                                                 Save changes </button>




                                                                <button type="button" class="btn default"  oonclick="location.href='simulation_amend_data.php'">Cancel</button>
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
            <script src="../js/simulation_amend.js"></script>


            <script src="../js/script.js"></script>

            simulation_amend.js

            <script src="../ajax_post/simulation_amend_post.js"></script>


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