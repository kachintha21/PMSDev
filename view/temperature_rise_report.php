<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
session_start();
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
?> 


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Calculation for a single enclosure</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Preview page of Metronic Admin Theme #1 for invoice sample" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../tnassets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../tnassets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../tnassets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../tnassets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../tnassets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../tnassets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../tnassets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../tnassets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../tnassets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" 

src="https://www.gstatic.com/charts/loader.js"></script>
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
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


</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <div class="page-header navbar navbar-fixed-top">
<?php
include_once '../tpl/header.php';
?>
        </div>
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
<?php
include_once '../tpl/menu.php';
?>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Report</span>
                            </li>
                        </ul>

                    </div>

                    <div class="invoice">



                        <div class="row">
                            <div class="col-xs-12">



                                <table style="width:100%">
                                    <tr>
                                        <th rowspan="" >Calculation of temperature air of air inside enclosure</th>

                                    </tr>
                                    <tr>
                                        <td rowspan="1" >Customer Name/Plan</td>

                                    </tr>

                                    <tr>
                                        <td rowspan="1" >Project No:<?php //echo($ref_no);  ?></td>

                                    </tr>

                                    <tr>
                                        <td rowspan="1" >Project Name:<?php //echo($dproject_name_pdt);  ?></td>

                                    </tr>




                                    <tr>
                                        <td rowspan="1" >Type Enclosure:<?php ?></td>

                                    </tr>





                                </table>                                                                             

                                <table style="width:100%">



                                    <tr>
                                        <th rowspan="3">Relevant dimension for temperature-rise<br>
                                            With:<?php //echo($height . "mm");  ?><br>
                                            Hight:<?php //echo($width . "mm");  ?><br>
                                            Depth :<?php //echo($depth . "mm");  ?><br>

                                        </th>
                                        <td>Type Of Installation:<?php //echo($installation_type_pdt);  ?></td>

                                    </tr>
                                    <tr>
                                        <td>Ventilation opening:<?php ?></td>
                                    </tr>
                                    <tr>
                                        <td>Number of Horizontal Separation:<?php echo($hs); ?></td>
                                    </tr>

                                </table>






                                <table style="width:100%">
                                    <tr>
                                        <th rowspan="" >with effective cooling surface</th>

                                    </tr>






                                </table>




                                <table style="width:100%">


                                    <tr>
                                        <td>Cooling System</td>
                                        <td><?php ?></td>
                                    </tr>

                                    <tr>
                                        <td rowspan="">Raw Power Loss (W)</td>
                                        <td><?php
?> </td>
                                    </tr>

                                    <tr>
                                        <td rowspan="">Actual Power Loss(W)</td>
                                        <td><?php ?> </td>
                                    </tr>





                                    <tr>
                                        <td rowspan="">Δt0.5&#8451;</td>
                                        <td><?php
                                            echo(round($res[0], 2));
                                            ?> </td>
                                    </tr>



                                    <tr>
                                        <td rowspan="">Δt1&#8451;</td>
                                        <td><?php
                                            //echo(round($res[1], 2));
                                            ?> </td>
                                    </tr>





                                    <tr>
                                        <td rowspan="">Temp. of Max. Height&#8451;</td>
                                        <td> <?php //echo(round($res[1] + $amb_temp, 2));  ?> </td>
                                    </tr>











                                    <tr>
                                        <td rowspan="">Fan Capacity (m3/h)</td>
                                        <td>   <?php ?> </td>
                                    </tr>



                                           <!-- <tr>
                                                <td rowspan="">Fan Qty</td>
                                                <td>   <?php
                                            echo("1");
                                            ?> </td>
                                            </tr>

    --->



                                    <tr>
                                        <td rowspan="">Target Temp&#8451;</td>
                                        <td>   <?php
                                            echo("1");
                                            ?> </td>
                                    </tr>


                                    <tr>
                                        <td rowspan="">Max. Temp&#8451;</td>
                                        <td>   <?php
                                            echo("1");
                                            ?> </td>
                                    </tr>







                                </table> 






                            </div>






                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="well"  id="curve_chart">
                                    <address >



                                    </address>
                                </div>
                            </div>
                            <div class="col-xs-8 invoice-block">

                                <br/>
                                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                    <i class="fa fa-print"></i>
                                </a>
                                <a class="btn btn-lg green hidden-print margin-bottom-5" onclick="window.location.href = 'project_definition_data.php'">Cancel
                                    <i></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- END QUICK SIDEBAR -->
                </div>
                <!-- END CONTAINER -->
<?php include("../tpl/footer.php"); ?>

                <!-- BEGIN CORE PLUGINS -->
                <script src="../tnassets/global/plugins/jquery.min.js" type="text/javascript"></script>
                <script src="../tnassets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../tnassets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="../tnassets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="../tnassets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="../tnassets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="../tnassets/global/scripts/app.min.js" type="text/javascript"></script>
                <!-- END THEME GLOBAL SCRIPTS -->
                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                <script src="../tnassets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
                <script src="../tnassets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
                <script src="../tnassets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
                <script src="../tnassets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
                <!-- END THEME LAYOUT SCRIPTS -->
                <!-- Google Code for Universal Analytics -->

                <!-- End -->
                </body>




                </html>