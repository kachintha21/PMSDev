<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/PigmentModel.class.php");
include("../model/PigmentMaster.class.php");
include("../model/OilData.class.php");
include("../model/Colours.class.php");

include("../model/PigmentConsumptionMaster.class.php");



$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$oil = new OilData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pcm = new PigmentConsumptionMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
 $od = $pl->getPreparingLayoutByNo($_GET['id']);

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
?>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>NLPL |<?php echo($od[2]); ?>-Decal Printing -Invoice</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
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
        </style>

        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
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
                        Decal Printing - Invoice
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Decal Printing - Invoice </a>

                            </li>

                        </ul>


                        <?php
                       
                        ?>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="invoice">

                        <div class="row">
                            <div class="col-xs-12">
                                <table style="width:100%">

                                    <tr>
                                        <td style="width:25%">Production No</td>
                                        <td style="width:25%"><font style="font-size:15;"><b><?php echo($od[2]); ?></b></font></td>
                                        <td style="width:25%">Lot No</td>
                                        <td style="width:25%"><font style="font-size:15;"><b><?php echo($od[3]); ?></b></font></td>
                                    </tr>
                                    <tr >
                                        <td style="width:25%">  Printing Pattern </td>
                                        <td style="width:25%"><b><?php echo($od[4]); ?></b></td>

                                        <td style="width:25%">Printing lines</td>
                                        <td style="width:25%"><b><?php echo($od[6]); ?></b></td>

                                    </tr>





                                    <tr >
                                        <td style="width:25%">  Shipment Request</td>
                                        <td style="width:25%"><b><?php echo($od[5]); ?></b></td>

                                        <td style="width:25%">Shipment Schedule </td>
                                        <td style="width:25%"><b><?php echo($od[17]); ?></b></td>

                                    </tr>






                                    <tr >
                                        <td style="width:25%"> Date</td>
                                        <td style="width:25%"><b><?php echo($od[7]); ?></b></td>

                                        <td style="width:25%">Printing Way  </td>
                                        <td style="width:25%"><b><?php echo($od[8]); ?></b></td>

                                    </tr>





                                    <tr >
                                        <td style="width:25%"> Paper Size</td>
                                        <td style="width:25%"><b><?php echo($od[9]); ?></b></td>

                                        <td style="width:25%">Body   </td>
                                        <td style="width:25%"><b><?php echo($od[10]); ?></b></td>

                                    </tr>



                                    <tr >
                                        <td style="width:25%"> Market</td>
                                        <td style="width:25%"><b><?php echo($od[12]); ?></b></td>

                                        <td style="width:25%">Factory  </td>
                                        <td style="width:25%"><b><?php echo($od[11]); ?></b></td>

                                    </tr>






                                    <tr   >
                                        <td style="width:25%" > Decoration </td>
                                        <td style="width:25%"><b><?php echo($od[13]); ?></b></td>

                                        <td style="width:25%">Firing Temperature</td>
                                        <td style="width:25%"><b><?php echo ($Cusumpation[0] = $pigm->getTempature($od[4]));
                                             ?></b></td>

                                    </tr>


                                    <tr >
                                        <td style="width:15%"> Order</td>
                                        <td style="width:15%"><b><?php echo($od[14]); ?></b></td>

                                        <td style="width:15%">Printing </td>
                                        <td style="width:15%"><b><?php echo($od[15]); ?></b></td>                                       


                                    </tr>

                                    <tr >
                                        <td style="width:100%" colspan="4"><?php echo($od[16]); ?></td>
                                    </tr>                                    
                                </table> 




                                <table style="width:100%"  valign="top">
                                    <tr>
                                      <td>Printing Pattern </td>     <td>Curve No</td>  <td>FG Pattern </td>      <td>Plan Pcs</td><td>Pcs per sheet</td> <td>Close Curve</td>  <td>Actual</td><td>(+or-)</td>

                                    </tr>


                                    <?php
                                    $query = "SELECT * FROM  layout_plans_tbl WHERE pro_no_lpt='" . $od[2] . "' AND  lot_no_lpt='" . $od[3] . "'  ORDER BY id DESC";


                                    if ($result = $conn->query($query)) {
                                        while ($row = $result->fetch_assoc()) {

                                            $del_no = $row["decal_no_lpt"];
                                            $printing_pattern = $row["desing_no_lpt"];
                                           
                                            ?>  



                                            <tr>
                                                <td><b><?php echo($row["desing_no_lpt"]); ?></b></td>     <td><b><?php echo($row["curve_no_lpt"]); ?></b></td>  <td><b><?php echo($row["decal_no_lpt"]); ?></b></td>     <td><b><?php echo($row["planned_qty_lpt"]); ?></b></td>   <td><b><?php echo($row["no_of_curves_lpt"]); ?></b></td> <td><b><?php echo($row["close_curve_after_lpt"]); ?></b></td>   <td><b><?php //echo($row["total_sheets_needed_lpt"]);   ?></b></td>   <td><b>  </b></td>

                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td> &nbsp;</td>     <td>&nbsp;</td>     <td>&nbsp;</td>   <td>&nbsp;</td> <td>&nbsp;</td>   <td>&nbsp;</td>   <td>&nbsp;</td>

                                    </tr>

                                </table>





                                <table style="width:100%">
                                    <tr>
                                        <th rowspan="1" >LAYOUT INSPECTION CHECK LIST -LAYOUT SECTION</th>

                                    </tr>
                                </table>


                                <table style="width:100%">
                                    <tr>
                                        <td >No</td>     <td >Check Point</td>     <td style="width:10%">Check Yes</td> <td style="width:10%">Check No </td> <td>Remarks</td>

                                    </tr>


                                    <tr>
                                        <td>1</td><td>No of curves Qty compare with the production</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>

                                    <tr>
                                        <td>2</td><td>Film Density</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>



                                    <tr>
                                        <td>3</td><td>Tone Angle(Same As Data List)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>




                                    <tr>
                                        <td>4</td><td>Register Marks(Colour By Colour)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>



                                    <tr>
                                        <td>5</td><td>Colour Name & Dots(Same As production Ship)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>




                                    <tr>
                                        <td>6</td><td>Comparison Pattern(Before & New Layout)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>



                                    <tr>
                                        <td>7</td><td>Screen mash(Same As production Ship)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>


                                    <tr>
                                        <td>8</td><td>Layout Area(80% or 60%)</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>

                                    <tr>
                                        <td>9</td><td>if AA lot QC Check sample</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>

                                    <tr>
                                        <td>10</td><td>Lot number is same production ship,layout box & upper right corner of the layout</td>     <td><b></b></td> <td><b></b></td> <td><b></b></td>

                                    </tr>
                                    <tr>
                                        <td colspan="6">Information.................................................................................</td>

                                    </tr>


                                    <tr>
                                        <td colspan="2">Checked:                 </td>
                                        <td colspan="2">Date:                 </td>
                                        <td colspan="2">Approved by:                </td>

                                    </tr>
                                </table>






                                <table style="width:100%">
                                    <tr>
                                        <th rowspan="1" >Pigment Preparation</th>

                                    </tr>
                                </table>



                                <table style="width:100%">
                                    <tr>
                                        <td>Plan

                                        </td>     <td>Actual</td>   <td>Color</td>   <td>Screen mesh</td>
                                        <td>Pigment Name+Contents(%) </td><td>Quantity(g)</td>
                                        <td>Kind </td><td>Contents(%)</td><td>Quantity(g)</td>


                                        <td>Total amount</td><td>Consumpation</td><td>Size</td><td>Brush</td><td>Pc./Sh</td>
                                        <td>Disable</td>
                                        <td>Enable</td>
                                    </tr>


                                    <?php
                                    $query = "SELECT * FROM  printing_status_tbl WHERE ref_no_pst='" . $_GET['id'] . "' ORDER BY colour_index_pst ASC    ";

                                    $i = 2;
                                    if ($result = $conn->query($query)) {
                                        while ($row = $result->fetch_assoc()) {

                                            $Cusumpation = $cl->getColoursCusumpationPatternNo($row["pattern_no_pst"], $row["colour_index_pst"]);
                                            $OillCusumpation = $oil->getOilDataCusumpationPatternNo($row["pattern_no_pst"], $row["colour_index_pst"]);
                                            $pigmentConsumption = $pcm->getPigmentConsumptionMasterCodeByPatternNo($row["pattern_no_pst"], $row["colour_index_pst"]);
                                            $totalConsumption = $pigmentConsumption[6] + $pigmentConsumption[5];
                                            $i++;

                                            $date = strtotime("+$i day");

                                            $ndate = date("Y-m-d", $date);
                                            ?>  



                                            <tr>
                                                <td><b><?php echo($ndate); ?></b></td>     <td><b><?php echo($row["curve_no_pdt"]); ?></b></td> 
                                                <td style="<?php
                                                if ($row["is_edit_pst"] > 0) {
                                                    echo 'background-color: yellow;';
                                                }
                                                ?>"  ><b><?php
                                                            echo($row["colour_index_pst"] . "<br>");
                                                            echo($row["colour_name_pst"]);
                                                            ?></b></td>
                                                <td><b><?php echo($row["screen_mesh_pst"]); ?></b></td>  

                                                <td><b><?php
                                                        $sql_color = "SELECT * FROM  colours_tbl WHERE pattern_no_ct='" . $printing_pattern . "' AND  colours_code_ct='" . $row["colour_index_pst"] . "' group by  pigment_name_ct";

                                                        // $sql_color ="SELECT * FROM  colours_tbl WHERE pattern_no_ct='" . $del_no . "'  group by  pigment_name_ct";  

                                                        $total_price = 0;
                                                        if ($res_color = $conn->query($sql_color)) {
                                                            while ($rowc = $res_color->fetch_assoc()) {

                                                                $pigsum = ($od[15] * $Cusumpation[8] * $rowc["qty_ct"] / 100) + $totalConsumption;
                                                                $total_price += $pigsum;

                                                                echo($rowc["pigment_name_ct"] . "       :    " . $rowc["qty_ct"] . " : " . $pigsum . "<br>");
                                                            }
                                                        }
                                                        ?> 
                                                    </b></td>  










                                                <td><b><?php echo($total_price); ?></b></td><td><b><?php echo($OillCusumpation[5]); ?></b></td>
                                                <td><b><?php echo("-"); ?></b></td>





                                                <td><b><?php echo("-"); ?></b></td><td><b><?php echo($total_price); ?></b></td>

                                                <td><b><?php echo($Cusumpation[8]); ?></b></td><td><b><?php echo($Cusumpation[9]); ?></b></td>
                                                <td><b><?php echo("0"); ?></b></td>
                                                <td><b><?php echo("0"); ?></b></td>

                                                <td><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" style="cursor:pointer"
                                                          onclick="DisableEntity('<?php echo($row['id']); ?>', 'decal_printing_delete.php?id=<?php echo($row['id']); ?>',
                                                                          '<?php echo($row['id']); ?>')"; 
                                                          ></span></td>

                                                <td><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" style="cursor:pointer"
                                                          onclick="EnableEntity('<?php echo($row['id']); ?>', 'decal_printing_enable.php?id=<?php echo($row['id']); ?>',
                                                                          '<?php echo($row['id']); ?>')"; 
                                                          ></span></td>


                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>


                                </table>





                            </div>






                        </div>


                        <div class="row">
                            <!-- <div class="col-xs-4">
                                <div class="well">
                                    <address>
                                        <strong>Noritake (PVT) LTD
                                            <br>
                                            <?php
                                          //  echo(getServerDate().getServerTime());
                                            ?>
                                        </strong><br/>

                                    </address>
                                </div>
                            </div> -->
                            <div class="col-xs-8 invoice-block">

                                <br/>
                                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
                                    Print <i class="fa fa-print"></i>
                                </a>
                                <a class="btn btn-lg green hidden-print margin-bottom-5" onclick="window.location.href = 'printing_order_details.php'">
                                    Cancel <i class="fa fa-check"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
            <div class="page-quick-sidebar-wrapper">
                <div class="page-quick-sidebar">
                    <div class="nav-justified">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#quick_sidebar_tab_1" data-toggle="tab">
                                    Users <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#quick_sidebar_tab_2" data-toggle="tab">
                                    Alerts <span class="badge badge-success">7</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    More<i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-bell"></i> Alerts </a>
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-info"></i> Notifications </a>
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-settings"></i> Settings </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                    <h3 class="list-heading">Staff</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">8</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar3.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Bob Nilson</h4>
                                                <div class="media-heading-sub">
                                                    Project Manager
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar1.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nick Larson</h4>
                                                <div class="media-heading-sub">
                                                    Art Director
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">3</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar4.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Hubert</h4>
                                                <div class="media-heading-sub">
                                                    CTO
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar2.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Wong</h4>
                                                <div class="media-heading-sub">
                                                    CEO
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">Customers</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">2</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar6.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lara Kunis</h4>
                                                <div class="media-heading-sub">
                                                    CEO, Loop Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 03:10 AM
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="label label-sm label-success">new</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar7.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                                <div class="media-heading-sub">
                                                    Project Manager,<br>
                                                    SmartBizz PTL
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar8.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lisa Stone</h4>
                                                <div class="media-heading-sub">
                                                    CTO, Keort Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 13:10 PM
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">7</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar9.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Portalatin</h4>
                                                <div class="media-heading-sub">
                                                    CFO, H&D LTD
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="../assets/admin/layout/img/avatar10.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Irina Savikova</h4>
                                                <div class="media-heading-sub">
                                                    CEO, Tizda Motors Inc
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">4</span>
                                            </div>
                                            <img class="media-object" src="../assets/admin/layout/img/avatar11.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Maria Gomez</h4>
                                                <div class="media-heading-sub">
                                                    Manager, Infomatic Inc
                                                </div>
                                                <div class="media-heading-small">
                                                    Last seen 03:10 AM
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="page-quick-sidebar-item">
                                    <div class="page-quick-sidebar-chat-user">
                                        <div class="page-quick-sidebar-nav">
                                            <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-messages">
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        When could you send me the report ? </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        Its almost done. I will be sending it shortly </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body">
                                                        Alright. Thanks! :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:16</span>
                                                    <span class="body">
                                                        You are most welcome. Sorry for the delay. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        No probs. Just take your time :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body">
                                                        Alright. I just emailed it to you. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        Great! Thanks. Will check it right away. </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar2.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body">
                                                        Please let me know if you have any comment. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="../assets/admin/layout/img/avatar3.jpg"/>
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body">
                                                        Sure. I will check and buzz you if anything needs to be corrected. </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message here...">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                                <div class="page-quick-sidebar-alerts-list">
                                    <h3 class="list-heading">General</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                                Take action <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                Finance Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New order received with <span class="label label-sm label-success">
                                                                Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    30 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
                                                                Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    2 hours
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                IPO Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">System</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                                Take action <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                Finance Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New order received with <span class="label label-sm label-success">
                                                                Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    30 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            You have 5 pending membership that requires a quick review.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    24 mins
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                                Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    2 hours
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                IPO Report for year 2013 has been released.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
                                                        20 mins
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                                <div class="page-quick-sidebar-settings-list">
                                    <h3 class="list-heading">General Settings</h3>
                                    <ul class="list-items borderless">
                                        <li>
                                            Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">System Settings</h3>
                                    <ul class="list-items borderless">
                                        <li>
                                            Security Level
                                            <select class="form-control input-inline input-sm input-small">
                                                <option value="1">Normal</option>
                                                <option value="2" selected>Medium</option>
                                                <option value="e">High</option>
                                            </select>
                                        </li>
                                        <li>
                                            Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
                                        </li>
                                        <li>
                                            Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
                                        </li>
                                        <li>
                                            Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>
                                            Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                    </ul>
                                    <div class="inner-content">
                                        <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN FOOTER -->
        <?php
        include_once '../tpl/footer.php';
        ?>
        >
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
        <script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../js/script.js"></script>
        <script>
                                    jQuery(document).ready(function () {
                                        Metronic.init(); // init metronic core components
                                        Layout.init(); // init current layout
                                        QuickSidebar.init(); // init quick sidebar
                                        Demo.init(); // init demo features
                                    });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>