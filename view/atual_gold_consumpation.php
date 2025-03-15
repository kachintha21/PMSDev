<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
date_default_timezone_set("Asia/Colombo");
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/GoldConsumpation.class.php");

$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$gc = new GoldConsumpation(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



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
    $gc->deleteGoldConsumpation($_GET['id']);
       $pl->resetGoldconsumpationPreparingLayoutByRePro($_GET['id']);
    header("location:gold_consumption_details.php");
    exit();
}


?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Gold/Platinum consumption





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


                    <h3 class="page-title">Gold/Platinum consumption
                        <?PHP
                        //ECHO($pl->alphaID(0));
                        ?>

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html"><b>Home</b></a>
                                <i class="fa fa-angle-right"></i>
                            </li>


                            <li> <a href="gold_consumption_details.php"  style="text-decoration: none" title="View Data" ><b>View</b></a> <i class="fa fa-circle"></i> 
                                Gold/Platinum consumption
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
                                    <div class="caption"> <i class="fa fa-gift"></i>Gold/Platinum consumption 




                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>





                                <div class="portlet-body form">

                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >








                                        <div class="form-body">                   

                                            <!-- BEGIN FORM-->
                                            <form action="atual_gold_consumpation.php"  class="form-horizontal form-bordered" id="testform"  method="get">
                                                <div class="form-group form-group">

                                                    <label class="control-label col-sm-2">Production No 
                                                        <?php
                                                       // $sql = "SELECT pro_no_plt FROM preparing_layout_tbl GROUP BY id ";
                                                        ?>
                                                        <span style="color: crimson;"> *</span></label>
                                                    <div class="col-sm-3">                                            
                                                        <select  class="form-control" name="project_no_tct" id="project_no_tct"   onchange="this.form.submit()"> 
                                                             <option value='0'>- Production No -</option>
                                                          
                                                            '
                                                        </select>

                                                    </div>  



                                            </form>
                                        </div>




                                        <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >
                                            <?php
                                            $Pdata = $pl->getPreparingLayoutByNo($_GET['project_no_tct']);
                                            ?>

                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logicp">
                              <input  type="hidden" class="form-control"  name="org_name_gct[]" id="org_name_gct[]"  value="<?php echo($loge_user); ?>" />
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="5%"> # </th>
                                                                    <th class="text-center" width="10%">Production No </th>
                                                                    <th class="text-center" width="10%">Lot Number</th>
                                                                    <th class="text-center" width="8%">Printing Pattern</th> 
                                                                    <th class="text-center" width="8%">#Printing </th> 
                                                                    <th class="text-center" width="8%">Color</th> 
                                                                     <th class="text-center" width="8%">Atual sheet</th> 
                                                                    <th class="text-center" width="8%">Consumption</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT colours_name_pm,colour_code_pm FROM pigment_master_tbl WHERE pattern_pm='" . $Pdata[4] . "' AND colours_pm='S01' AND (colour_code_pm='060' OR colour_code_pm='061')";
                                                                if ($result = $conn->query($query)) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        ?>          

                                                                        <tr id='addrp0'>
                                                                            <td>1</td>
                                                                            <td>

                                                                                <?php
                                                                                ?>


                                                                                <input type=text name='pro_no_gct[]' id='pro_no_gct[]'  class="form-control price" value="<?php echo($Pdata[2]); ?>" readonly/>                                                   



                                                                            </td>




                                                                            <td><input type=text name='lot_no_gct[]' id='lot_no_gct[]'  class="form-control price" value="<?php echo($Pdata[3]); ?>" readonly/></td>



                                                                            <td><input  name='pattern_no_gct[]' id='pattern_no_gct[]'      type="text"  class="form-control name" value="<?php echo($Pdata[4]); ?>" readonly/></td>
                                                                            <td><input  name='printing_gct[]' id='printing_gct[]'   type="text"  class="form-control printing" value="<?php echo($Pdata[15]); ?>" readonly/></td>
                                                                            <td>
                                                                                <select class="form-control" name="color_gct[]" id="color_gct[]">
                                                                                    <!-- <option value="<?php echo($row['colour_code_pm']) ?>"><?php echo($row['colours_name_pm']); ?></option> -->

                                                                                    <option value="GOLD"><?php echo("GOLD"); ?></option>
   										    <option value="SILVER"><?php echo("SILVER"); ?></option>
                                                                                </select>    



                                                                            </td>
                                                                                                                                     <td><input type="number" name='atual_sheet[]' id='atual_sheet[]'  class="form-control tname" min="0"  value="0" /></td>
                                                                            <td><input type="number" name='consumption_gct[]' id='consumption_gct[]'  class="form-control tname" min="0"  value="0" /></td>



                                                                        </tr>


                                                                        <tr id='addrp1'></tr>

                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>


                                                        </table>
                                                    </div>
                                                </div>





                                                <!--                                            <div class="container"  style="width:100%" >
                                                                                                <div class="row clearfix">
                                                                                                    <div class="col-md-12">
                                                                                                        <table class="table table-bordered table-hover" id="tab_logicp">
                                                
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th class="text-center" width="5%"> # </th>
                                                
                                                                                                                    <th class="text-center" width="10%">Job</th>
                                                                                                                    <th class="text-center" width="10%">Lot Number</th>
                                                
                                                                                                                    <th class="text-center" width="8%">Printing Pattern</th> 
                                                                                                                    <th class="text-center" width="8%">#Printing </th> 
                                                                                                                    <th class="text-center" width="8%">Color</th> 
                                                                                                                    <th class="text-center" width="8%">Consumption</th> 
                                                
                                                
                                                
                                                
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                <?php ?>
                                                                                                                <tr id='addrp0'>
                                                                                                                    <td>1</td>
                                                
                                                                                                                    <td>
                                                
                                                
                                                
                                                <?php
                                                $query = "SELECT lot_no_plt,pattern_no_plt,pro_no_plt,printing_plt FROM preparing_layout_tbl WHERE pro_no_plt='" . $_GET['project_no_tct'] . "'  ";
                                                ?>
                                                
                                                
                                                                                                                        <select name="curve_no_lpt[]" id="curve_no_lpt[]" class="form-control product">
                                                                                                                            <option value="">-Select-</option>
                                                <?php
                                                if ($result = $conn->query($query)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>  
                                                                                                                                            <option data-price="<?php echo($row['lot_no_plt']); //echo $row['decal_design_no_cmt'];      ?>"  data-name="<?php echo $row['pattern_no_plt']; ?>"  data-printing="<?php echo $row['printing_plt']; ?>"   value="<?php echo $row['pro_no_plt'] ?>">
                                                        <?php echo($row['pro_no_plt']); ?> 
                                                        
                                                                                                                                            </option>                                                         
                                                        
                                                        
                                                        
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                
                                                                                                                        </select>                                                      
                                                
                                                
                                                
                                                
                                                
                                                                                                                    </td>
                                                
                                                
                                                
                                                
                                                                                                                    <td><input type=text name='decal_no_lpt[]' id='decal_no_lpt[]'  class="form-control price"  readonly/></td>
                                                
                                                
                                                
                                                                                                                    <td><input  name='planned_qty_lpt[]' id='planned_qty_lpt[]'      type="text"  class="form-control name" readonly/></td>
                                                                                                                    <td><input  name='no_of_curves_lpt[]' id='no_of_curves_lpt[]'   type="text"  class="form-control printing" readonly/></td>
                                                                                                                    <td>
                                                                                                                        <select class="form-control">
                                                                                                                            <option value="Gold">Gold</option>
                                                                                                                            <option value="Platinum">Platinum</option>


                                                                                                                            
                                                                                                                        </select>    
                                                
                                                
                                                
                                                                                                                    </td>
                                                                                                                    <td><input type="number" name='close_curve_after_lpt[]' id='close_curve_after_lpt[]'  class="form-control tname" min="0"  value="0" /></td>
                                                
                                                
                                                
                                                
                                                
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
                                                                                                </div>-->














                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">


                                                            <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i>



                                                                Save </button>




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
<script src="../js/script.js"></script>
<script src="../js/atual_gold_consumpation.js"></script>
<script src="../ajax_post/atual_gold_consumpation_post.js"></script>
<script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
<link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='../select2/dist/js/select2.min.js'></script>
<script src="../ajax_post/get_list.js"></script>
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