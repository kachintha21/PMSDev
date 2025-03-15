<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/remote_conn.php");
include("../include/common.php");
include("../model/Planning.class.php");
include("../model/PlanningAuto.class.php");
include("../model/ToolsUpdate.class.php");

$pl = new Planning(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pa = new PlanningAuto(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pd = new ToolsUpdate(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$smin_date = "SELECT MIN(ORNYDATE)AS mdate FROM tbl_minus_report_dec_final";
$resmdate = $conn->query($smin_date);

//$data_min = $resmdate->num_rows;
$rowdmin = $resmdate->fetch_assoc();
      




$date01 = date_create($_POST['date1']);
$getdate01 = date_format($date01, "Ymd");
$date02 = date_create($_POST['date2']);
$getdate02 = date_format($date02, "Ymd");



if (isset($_POST['SubmitButton'])) {
    $qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final  WHERE (ORNYDATE BETWEEN  '" . $getdate01 . "' AND '" . $getdate02 . "'   )  AND (dec_patt='" . $_POST['dec_patt'] . "' OR  dec_curve='" . $_POST['dec_curve'] . "'  OR    item='" . $_POST['item'] . "')  group by dec_patt,dec_curve	 ORDER BY dec_patt ASC	 		 
 
";
    $qcolumn = "SELECT * FROM tbl_minus_report_dec_final  WHERE (ORNYDATE  BETWEEN  '" . $getdate01 . "' AND '" . $getdate02 . "'  )  
AND (dec_patt='" . $_POST['dec_patt'] . "' OR  dec_curve='" . $_POST['dec_curve'] . "'  OR    item='" . $_POST['item'] . "')
GROUP BY ORNYDATE	ORDER BY ORNYDATE ASC			 
 
";
    $redata = $conn->query($qdata);
    $datacount = $redata->num_rows;
    $recolumndate = $conn->query($qcolumn);
    $recolumnship = $conn->query($qcolumn);
    $columncount = $recolumn->num_rows;
} else {

    $qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final   group by dec_patt,dec_curve	 ORDER BY dec_curve ASC	LIMIT 300 		 
 	";
    
        /*$qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final  WHERE ORNYDATE BETWEEN   '20200101' AND '20200831'   group by dec_patt,dec_curve	 ORDER BY dec_curve ASC	";*/
    	 
 	
    $qcolumn = "SELECT * FROM tbl_minus_report_dec_final GROUP BY ORNYDATE ORDER BY ORNYDATE ASC ";	 
    $redata = $conn->query($qdata);
    $datacount = $redata->num_rows;
    $recolumndate = $conn->query($qcolumn);
    $recolumnship = $conn->query($qcolumn);
    $columncount = $recolumn->num_rows;
}



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
?>
<!DOCTYPE html>
<html lang="en">  
    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Planning Tools           
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
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>

    <body class="page-header-fixed page-quick-sidebar-over-content ">
        <!-- BEGIN HEADER -->
        <div class="page-header -i navbar navbar-fixed-top">
            <div class="page-header -i navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <?php
                include_once '../tpl/header.php';
                ?>
                <!-- END HEADER INNER -->
            </div>
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
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn blue">Save changes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->

                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        Production Requirement 
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Home</a>>>
                                <a href="planning_data.php">View</a>


                                <i class="fa fa-angle-right"></i>
                            </li>


                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <p>
                                    Your  can filter details by using Design No,Curve No ,Item No,Shipment date 
                                </p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="#" name="frmPurchaseRequestAddEdit" method="post" class="form-horizontal form-bordered" id="myForm" >

                                    <input  type="hidden" class="form-control"  name="org_name_fdt" id="org_name_fdt"  value="<?php echo($loge_user); ?>" />
                                    <input  type="hidden" class="form-control"  name="depart_tt" id="depart_tt"  value="<?php echo($loge_depart); ?>" />

                                    <div class="form-body">   


                                        <div class="form-group form-group-sm">

                                            <div class="col-sm-2">
                                                <input  type="text" class="form-control" name="dec_patt"  placeholder='Design No' onkeyup="return form_submit();"   id="dec_patt" 
                                                        /> 

                                            </div>


                                            <div class="col-sm-2">
                                                <input  type="text" class="form-control" name="dec_curve" placeholder='Curve No' id="dec_curve" onkeyup="return form_submit();" />  
                                            </div>




                                            <div class="col-sm-2">
                                                <input  type="text" class="form-control" name="item" placeholder='Item' id="item"  onkeyup="return form_submit();"    />  
                                            </div>




                                            <div class="col-sm-2">
                                                <input type="text" class="form-control"   name="date1" id="date1" value="<?PHP echo($rowdmin["mdate"]); ?>"  value maxlength="20" onchange="return form_submit();" 


                                                       />                           
                                            </div>



                                            <div class="col-sm-2">						
                                                <input type="date" class="form-control" name="date2" id="date2"  maxlength="20" onchange="return form_submit();"   />                           
                                            </div>



                                            <div class="col-sm-2"> 
                                                <button type="submit" class="btn btn-info" name="SubmitButton"  >
                                                    <span class="glyphicon glyphicon-search"></span> Search
                                                </button>



                                            </div>


                                        </div>


                                        <div class="form-actions">

                                        </div>

                                </form>


                                <!-- END FORM-->
                                <div  id="insert_response" style="color: #FF0000;  font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >
                                    <h3></h3>
                                    <p></p>
                                </div>

                            </div>


                            <!-- BEGIN SAMPLE TABLE PORTLET-->


                            <!-- END SAMPLE TABLE PORTLET-->
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box purple">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Production Requirement 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="planning_tools.php" title="Set default" class="reload">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <form  name="frmProductAddEdit" class="form-horizontal form-bordered" id="myForm" accept-charset="UTF-8">

                                            <div class="form-group">


                                                <label class="control-label col-md-2">

                                                    Plan Date



                                                    <span style="color: crimson;"> *</span></label>
                                                <div class="col-md-2">
                                                    <input  type="date" class="form-control" name="item02_fdt" id="item02_fdt" value="<?PHP echo(getServerDate()); ?>"  />

                                                </div>

                                            </div>



                                            <input  type="hidden" class="form-control" name="ref_no_fdt" id="ref_no_fdt"  value="<?php echo($pa->getNextPlanningAutoRefNo("planning_auto_tbl", "NLPL" . getServerNewDate()));
            ?>"/>


                                            <table class="table table-striped table-bordered table-hover"  >



                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="checkbox-table" >


                                                    <thead style="background-color: lightgray; text-align:center;">
                                                        <tr>
                                                            <td rowspan="2" style="font-size:11px; padding:0px;">Design <?php echo($datt); ?></td>
                                                            <td rowspan="2" style="font-size:12px; padding:4px;">Curve</td>	
                                                            <td rowspan="2" style="font-size:12px; padding:4px;">Item</td>	
                                                            <td rowspan="2" style="font-size:12px; padding:4px;">ID</td>	
                                                            <td rowspan="2" style="font-size:12px; padding:4px;">Total</td>


                                                            <?php
                                                            while ($rowc = $recolumndate->fetch_assoc()) {
                                                                ?>

                                                                <td style="font-size:12px; padding:4px;" colspan="4" >

                                                                    <?php echo($rowc["ORNYDATE"]); ?>
                                                                    <input type="checkbox" id="K<?php echo($rowc["id"]); ?>" name="checkboxt[]" value='<?php echo($rowc["ORNYDATE"] . "-" . $rowc["ORDEST"]); ?>' />

                                                                    <input  type="hidden" class="form-control"  name="ORNYDATE[]" id="ORNYDATE[]"  value="<?php echo($rowc["ORNYDATE"] . "-" . $rowc["ORDEST"]); ?>" />
                                                                </td> 	

                                                            <?php } ?>
                                                        </tr>


                                                        <tr>


                                                            <?php
                                                            while ($rows = $recolumnship->fetch_assoc()) {
                                                                ?>
                                                                <td style="font-size:12px; padding:4px;" colspan="4" ><?php echo($rows["ORDEST"]); ?>
                                                                    <input  type="hidden" class="form-control"  name="ORDEST[]" id="ORDEST[]" value="<?php echo($rows["ORDEST"]); ?>" />


                                                                </td>	
                                                            <?php } ?>								
                                                        </tr>

                                                    </thead>





                                                    <tbody>



                                                        <?php
                                                        ?>  

                                                        <?php
                                                        while ($row = $redata->fetch_assoc()) {

                                                            $update = $pd->getToolsUpdateByNo($row["id"]);
                                                            if ($update == 0) {
                                                                ?>




                                                            <input type="hidden"   name="dec_patt[]"  value="<?php echo($row["dec_patt"]); ?>"/>

                                                            <input type="hidden"   name="dec_curve[]"  value="<?php echo($row["dec_curve"]); ?>"/>
                                                            <input type="hidden"   name="item[]"  value="<?php echo($row["item"]); ?>"/>
                                                            <input type="hidden"   name="idtt[]" id="idtt[]"  value="<?php echo($row["id"]); ?>"/>

                                                            <tr id="<?php echo($row["id"]); ?>">
                                                                <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_patt"]); ?></td>                                                                            
                                                                <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_curve"]); ?></td>	
                                                                <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["item"]); ?></td>
                                                                <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["id"]); ?></td>
                                                                <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"  >
                                                                    <input type="text"  id="total_<?php echo($row["id"]); ?>" name="t[]" />

                                                                </td>
                                                                <?php
                                                                $recolumnqty = $conn->query($qcolumn);
                                                                while ($rowq = $recolumnqty->fetch_assoc()) {
                                                                    ?>

                                                                    <td style="font-size:12px; padding:4px;" colspan="4"  class="<?php echo("K" . $rowq["id"]); ?>_<?php echo($row["id"]); ?>"   >
                                                                        <?php
                                                                        if ($row["ORNYDATE"] == $rowq["ORNYDATE"]) {
                                                                            echo($row["TT"]);
                                                                            $r = $row["TT"];
                                                                              $ORNYDATE=$rowq["ORNYDATE"];
                                                                              $dec_patt=$rowq["dec_patt"];
                                                                                                    $dec_curve=$rowq["dec_curve"];
                                                                               echo("<input  type='hidden' class='form-control'  name='dec[]' id='dec[]' value='$dec_patt'  />");
                                                                                              echo("<input  type='hidden' class='form-control'  name='curve[]' id='curve[]' value='$dec_curve'  />");
                                                                               
                                                                            echo("<input  type='hidden' class='form-control'  name='qty[][]' id='qty[][]' value='$r'  />");
                                                                            echo("<input  type='hidden' class='form-control'  name='ORNYDATE[][]' id='ORNYDATE[][]' value='$ORNYDATE'  />");
                                                                              echo("<input  type='hidden' class='form-control'  name=ORDEST[][]' id='ORDEST[][]' value='$ORDEST'  />");
                                                                            
                                                                        } else {
                                                                            echo("0");
                                                                        }
                                                                        ?>

                                                                    </td>									

            <?php
        }
        ?>

                                                            </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>


                                                    </tbody>                            
                                                </table>
                                        </form>










                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn purple" onClick="return form_submit_new();"  > <i class="fa fa-check"></i> Submit </button>
                                            <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                                        </div>







                                        </form>

                                        <div  id="insert_response" style="color: #FF0000;  font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >

                                            <h3></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">						

                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->


                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php
include_once '../tpl/footer.php';
?>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
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

        <script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../nassets/admin/pages/scripts/table-editable.js"></script>



        <script src="../ajax_post/save_post.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script type="text/javascript">


                                                $('#checkbox-table input:checkbox').click(function () {

                                                    var checked = $(this).is(":checked"); // if the checkbox is ticked or not
                                                    var columnId = $(this).attr('id');


                                                    $('#checkbox-table tbody tr').each(function (index, tr) {
                                                        var rowId = $(tr).attr('id');
                                                        var value = parseInt($('.' + columnId + '_' + rowId).html());
                                                        //var total = parseInt($('.total_' + rowId).html());
                                                        var total = parseInt($('#total_' + rowId).val());

                                                        if (isNaN(total)) {
                                                            total = 0;
                                                        }
                                                        console.log(parseInt(total));
                                                        if (checked) {
                                                            total = total + value;
                                                            //$('.total_' + rowId).html(total);
                                                            $('#total_' + rowId).val(total);



                                                        } else {
                                                            total = total - value;
                                                            $('.total_' + rowId).html(total);
                                                        }
                                                    });
                                                });


        </script>

        <script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../nassets/admin/pages/scripts/table-editable.js"></script>
        <script>
                                                jQuery(document).ready(function () {
                                                    Metronic.init(); // init metronic core components
                                                    Layout.init(); // init current layout
                                                    QuickSidebar.init(); // init quick sidebar
                                                    Demo.init(); // init demo features
                                                    TableEditable.init();
                                                });
        </script>

    </body>




    <!-- END BODY -->
</html>