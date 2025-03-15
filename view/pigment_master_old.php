<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PigmentMaster.class.php");
$ti = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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
    $ti->deletePigmentMaster($_GET['id']);
    header("location:pigment_master_data.php");
    exit();
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|New Design Registration  </title>
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


                    <h3 class="page-title">New Design Registration  

                        <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="pigment_master_data.php"> View

                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">New Design Registration  
                                </a>
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
                                    <div class="caption"> <i class="fa fa-gift"></i>New Design Registration   </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>




                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >

                                        <input  type="hidden" class="form-control"  name="org_name_pm" id="org_name_pm"  value="<?php echo($loge_user); ?>" />


                                        <div class="form-body">                   

                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pattern_pm" id="pattern_pm"   />                         
                                                </div>    

                                                <label class="control-label col-sm-2">PaperSize<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="paper_size_pm" id="paper_size_pm" value="Transfer Paper"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">StProofPaper<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="st_proof_pape_pm" id="st_proof_pape_pm"  value="Tissue-L" />                         
                                                </div>                                                       

                                            </div>




                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Printing way<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_way_pm" id="printing_way_pm"   value="S" />                         
                                                </div>    

                                                <label class="control-label col-sm-2">Body<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="body_pm" id="body_pm"   value="S"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Decoration<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="decoration_pm" id="decoration_pm"   value="NLPL" />                         
                                                </div>                                                       

                                            </div>





                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Market<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="market_pm" id="market_pm"   value="USA" />                         
                                                </div>    

                                                <label class="control-label col-sm-2">Layout<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout_pm" id="layout_pm"   value="S"  />                         
                                                </div> 


                                            </div>
                                            
                                            
                                            
                                            
       <div class="form-group form-group">
           <label class="control-label col-sm-2">1st Firing &deg;C<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="item01_pm" id="item01_pm"   value="830" />                         
                                                </div>    

                                                <label class="control-label col-sm-2">2nd Firing &deg;C<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="item02_pm" id="item02_pm"   value="830"  />                         
                                                </div> 

                                                
                                                
                                                <label class="control-label col-sm-2">3rd Firing &deg;C<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="item03_pm" id="item03_pm"   value="830"  />                         
                                                </div> 
                                            </div>
                                            






                                            <div class="container"  style="width:100%" >
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic">
                                                            <thead>
                                                                <tr>                            
                                                                    <th class="text-center" width="5%"> #</th>
                                                                    <th class="text-center" width="15%"> Printing No( Ex .S01) </th>
                                                                    <th class="text-center" width="15%"> Name </th>                                 
                                                                    <th class="text-center" width="10%">ScreenMesh</th>
                                                                    <th class="text-center" width="10%">Colour Code</th>
                                                                    <th class="text-center" width="10%">Colour Qty</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php ?>
                                                                <tr id='addr0'>
                                                                    <td>1</td>
                                                                    <td>



                                                                        <select  class="form-control" name='colours_pm[]' id='colours_pm[]'>

                                                                            <option value="S01">S01</option>
                                                                            <option value="S02">S02</option>

                                                                            <option value="S03">S03</option>

                                                                            <option value="S03">S04</option>
                                                                            <option value="S05">S05</option>
                                                                            <option value="S06">S07</option>
                                                                            <option value="S07">S07</option>
                                                                            <option value="S08">S09</option>
                                                                            <option value="S10">S10</option>
                                                                            <option value="S11">S11</option>
                                                                            <option value="S12">S12</option>

                                                                            <option value="T01">T01</option>
                                                                            <option value="T02">T02</option>
                                                                            <option value="T03">T03</option>
                                                                            <option value="T04">T04</option>

                                                                        </select> 



                                                                    </td>

                                                                    <td>


                                                                        <select  class="form-control" name='colours_name_pm[]' id='colours_name_pm[]'>

                                                                            <option value="GOLD">GOLD</option>
                                                                            <option value="GOLD UNDER MAT">GOLD UNDER MAT</option>

                                                                            <option value="GOLD BROWN">GOLD BROWN</option>

                                                                            <option value="CREAM MICA">CREAM MICA</option>
                                                                            <option value="CREAM MICA">CREAM MICA</option>
                                                                            <option value="GRAY">GRAY</option>



                                                                        </select> 


                                                                    </td>



                                                                    <td>

                                                                        <select  class="form-control" name='screen_mesh_pm[]' id='screen_mesh_pm[]'>

                                                                            <option value="T-300">T-300</option>
                                                                            <option value="T-301">T-301</option>
                                                                            <option value="T-302">T-302</option>




                                                                        </select> 


                                                                    </td>

                                                                    <td>

                                                                        <select  class="form-control" name='colour_code_pm[]' id='colour_code_pm[]'>

                                                                            <option value="100">100</option>
                                                                            <option value="200">200</option>
                                                                            <option value="201">201</option>




                                                                        </select> 

                                                                    </td>



                                                                    <td><input type="number" name='colour_qty_pm[]' id="colour_qty_pm[]" placeholder='Colour Qty'
                                                                               class="form-control price"  />
                                                                    </td>

                                                                </tr>
                                                                <tr id='addr1'></tr>
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



                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" class="btn purple" onClick="return submit_main();" > <i class="fa fa-check"></i> Sava </button>
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

        <script src="../ajax_post/preparing_layout_post.js"></script>
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
        <script src="../js/preparing_layout.js"></script>


        <script src="../ajax_post/colours_master_post.js"></script>


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