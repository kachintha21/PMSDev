<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PrintingSpeedMaster.class.php");
$pm = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($_SESSION['logged_usr_id']) {

    $pname = $_SESSION['session_pattern_no'];
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

if (isset($_GET['ID'])) {
    $data = $pm->getPrintingSpeedMasterById($_GET['ID']);
}

if (isset($_GET['id'])) {
    $pm->deletePrintingSpeedMaster($_GET['id']);
    header("location:printing_speed_master_view.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Printing Speed Master</title>
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


                    <h3 class="page-title">Printing Speed Master

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
                                <a href="printing_speed_master_view.php"> View

                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Printing Speed Master
                                </a>
                            </li>


                            <i class="fa fa-angle-right"></i>
                            <li>

                                <a href="printing_speed_master_ps.php">Changed Pattern
                                </a>
                            </li>

                        </ul>

                    </div>


                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption"> <i class="fa fa-gift"></i>Printing Speed Master






                                    </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_psmt" id="org_name_psmt"  value="<?php echo($loge_user); ?>" />
      <input  type="hidden" class="form-control"  name="id" id="id"        value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[0]);
                                                }
                                                ?>" />

                                        <input  type="hidden" class="form-control"  name="is_edit_psmt" id="is_edit_psmt" value="<?php
                                        if ($_GET['ID']) {
                                            echo($data[4] + 1);
                                        }
                                                ?>" />

                                        <div class="form-body">    

                                       <?php if ($_GET['ID']) { ?>
                                            
                                            
                                                                   <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                
                                                        <input  type="text" class="form-control" name="pattern_no_psmt" id="pattern_no_psmt" 
                                                                value="<?php
                                                                if ($_GET['ID']) {
                                                                    echo($data[1]);
                                                                }
                                                                ?>"  /> 

                                             
                                                </div>    

                                                <label class="control-label col-sm-2">color index<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                  
                                                        <input  type="text" class="form-control" name="color_index_psmt" id="color_index_psmt" 
                                                                value="<?php
                                                                if ($_GET['ID']) {
                                                                    echo($data[2]);
                                                                }
                                                                ?>"  />

                                                 

                                                </div>    

                                                <label class="control-label col-sm-2">Printing Speed<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    
                                                           
                                               
                                                     <input  type="text" class="form-control" name="printing_speed_psmt" id="printing_speed_psmt" 
                                                                value="<?php
                                                                if ($_GET['ID']) {
                                                                    echo($data[3]);
                                                                }
                                                                ?>"  /> 
                                                    
                             
                                                    
                                                </div>    




                                            </div>
                                            
                                            
                                            

                                            <?php } else { ?>

                                                <div class="form-group form-group">
                                                    <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                    <div class="col-sm-2">
                                                        <input  type="text" class="form-control" name="pattern_no_psmt" id="pattern_no_psmt"  value="<?php echo($pname); ?>"   readonly/>                       
                                                    </div>    





                                                </div>

                                                <div class="container"  style="width:100%" >
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-hover" id="tab_logic">

                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center" width="5%"> #</th>


                                                                        <th class="text-center" width="10%">color index</th>



                                                                        <th class="text-center" width="10%"> Printing Speed</th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
    <?php ?>
                                                                    <tr id='addr0' class="tr-row">
                                                                        <td>1</td>


                                                                        <td>
    <?php
    $query = "SELECT DISTINCT(colours_code_ct) as colours_code_ct, pattern_no_ct FROM colours_tbl  WHERE pattern_no_ct='" . $pname . "'  ";
    if ($result = $conn->query($query)) {
        ?>
                                                                                <select  class="form-control" name="color_index_psmt[]" id="color_index_psmt[]" >
                                                                                    <option value="">- Select -</option>
        <?php
        while ($ma = $result->fetch_assoc()) {
            ?>

                                                                                        <option data-type="<?php echo trim($ma['pattern_no_ct']); ?>"  data-name="<?php echo $ma['colours_code_ct']; ?>"     value="<?php echo $ma['colours_code_ct']; ?>"  >
            <?php echo($ma['colours_code_ct']); ?> </option>
                                                                                            <?php
                                                                                        }

                                                                                        /* freeresultset */
                                                                                        $result->free();
                                                                                        ?>  

                                                                                </select>
    <?php } ?>
                                                                        </td>

                                                                        <td><input type="number"  min="0"  class="form-control"  name='printing_speed_psmt[]'  placeholder='speed' id='printing_speed_psmt[]' /></td>

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

<?php } ?>









                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                     <?php
                                                        if ($_GET['ID']) {
                                                            ?>    
                                                        
                                                            <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i> save changes </button>
                                                              <?php } else { ?>
                                                         <button type="button" class="btn purple" onClick="return form_save();" > <i class="fa fa-check"></i> Save </button>
                                                               <?php } ?>
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
<script src="../js/pigment.js"></script>
<script src="../ajax_post/printing_speed_master_post.js"></script>
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