<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/VirtualPlanner.class.php");
include("../model/VirtualPlannerDetails.class.php");
include("../model/LeadTimeRelationship.class.php");

$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ltr = new LeadTimeRelationship(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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
    $vp->deleteVirtualPlanner($_GET['id']);
    header("location:virtual_planner_beta_view.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Virtual Planner</title>
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


                    <h3 class="page-title">Virtual Planner

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
                                <a href="virtual_planner_beta_view.php"> View

                                </a>

                            </li>
                            <i class="fa fa-angle-right"></i>

                            <li>
                                <a href="#"> Virtual Planner

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
                                    <div class="caption"> <i class="fa fa-gift"></i>Virtual Planner
                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>



                                <?php
                                $tt = $ltr->getLeadTimeRelationshipByType('normal');
                                //echo($tt);
                                ?>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_vpt" id="org_name_vpt"  value="<?php echo($loge_user); ?>" />


                                        <div class="form-body">                
                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Date<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="date" class="form-control" name="date_vpt" id="date_vpt" 
                                                            >                         
                                                </div>    


                                                <label class="control-label col-sm-2">Plan No <span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="ref_no_vpt" id="ref_no_vpt" 
                                                            value="<?php echo($vp->getNextVirtualPlannerRefNo("virtual_planner_tbl", "NLPLVP")); ?>" 
                                                            readonly/>                         
                                                </div>    
                                            </div>




                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">
                                                            

                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="1%">No </th>
                                                                              <th class="text-center" width="1%"><input type="checkbox" name="select-all" id="select-all" /> </th>

                                                                    <th class="text-center" width="5%">Production No</th>
                                                                    <th class="text-center" width="7%">Lot No</th>
                                                                    <th class="text-center" width="7%">Pattern</th>
                                                                    <th class="text-center" width="7%">Qty</th>
                                                                    <th class="text-center" width="8%">Schedule Date</th>
                                                                    <th class="text-center" width="8%">Printing Schedule Date</th>

                                                                    <th class="text-center" width="1%">Delete</th>
                                                            </thead>



                                                            <?php
  $query = "SELECT* FROM preparing_layout_tbl   ORDER BY id DESC LIMIT 30 ";
                                                            if ($result = $conn->query($query)) {
                                                                $i = 0;
                                                                while ($ma = $result->fetch_assoc()) {
                                                                    //if($ma['id']>583){
                                                                   
                                                                    $i++;
                                                                    ?>

                                                                    <tr id='addr0' class="tr-row">
                                                                        <td><?php echo($i) ?></td>
                                                                               <td>  <input type="checkbox" id="ID[]" name="ID[]"  id value="<?php echo($ma['id']); ?>"></td>
                                                                        


                                                                        <td><input type="text" name="pro_no_vpt[]"  id="ref_no_plt[]" value="<?php echo($ma['ref_no_plt']); ?>" placeholder='pattern'  class="form-control pattern" readonly/>

                                                                        <td><input type="text" name='lot_no_vpt[]' id='lot_no_vpt[]'  value="<?php echo($ma['lot_no_plt']); ?>" placeholder='pattern'  class="form-control pattern" readonly/>
                                                                        <td><input type="text" name='item01_vpt[]' id='item01_vpt[]' value="<?php echo($ma['pattern_no_plt']); ?>"  placeholder='Lot No'  class="form-control lot" readonly/>
                                                                        <td><input type="number" name='qty_vpt[]' id='qty_vpt[]' value="<?php echo($ma['printing_plt']); ?>"  placeholder='Sheet Qty' class="form-control qty" readonly/>

                                                                        </td>
                                                                        <td><input type="text" placeholder='Shipment Date'  value="<?php echo($ma['shipment_request_plt']); ?>" class="form-control date" readonly
                                                                                   /></td>

                                                                        <td><input type="text" name='ship_scheduled_date_vpt[]' id='ship_scheduled_date_vpt[]' placeholder='Shipment Date'  value="<?php
                                                                            $date = new DateTime($ma['shipment_request_plt']); // For today/now, don't pass an arg.
                                                                            $date->modify("-$tt day");
                                                                            echo $date->format("Y-m-d");
                                                                            // echo($ma['shipment_request_plt']);
                                                                            ?>" class="form-control date" readonly
                                                                                   /></td>


                                                                        <td style="width:50px; text-align:center;">
                                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor:pointer"
                                                                                  onclick="plan('<?php echo($ma['lot_no_plt']); ?>', 'virtual_planner_delete.php?id=<?php echo($ma['id']); ?>',
                                                                                                  '<?php echo($ma['ref_no_plt']); ?>')" 
                                                                                  ></span></td>
                                                                    </tr>


                                                                    <?php
                                                                //}
                                                            }}
                                                            ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn purple" onClick="return submit_save();" >  Plan </button>
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

<script src="../js/virtual_planner.js"></script>


<script src="../ajax_post/virtual_planner_beta_post.js"></script>
<script src="../js/script.js"></script>

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
<script src="../js/jquery.min.js"></script>
<script>
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
</script>


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