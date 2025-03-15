<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/PigmentMaster.class.php");
include("../model/PigmentModel.class.php");
include("../model/ColorCode.class.php");
include("../model/OilData.class.php");
include("../model/Colours.class.php");
include("../model/MeshMaster.class.php");
$ti = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cc = new ColoursCode(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$od = new OilData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$co = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mesh= new MeshMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

if (isset($_GET['ID'])) {
    $data = $ti->getPigmentModelById($_GET['ID']);
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
        <title>Noritake|New Pigment Registration  </title>
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
        <script src="../js/jquery.min.js"></script>
        <link href="../script/select2.min.css" rel="stylesheet" />
        <script src="../js/select2.min.js"></script>       
<!--                <script >
         $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
        </script>-->

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


                    <h3 class="page-title">New Pigment Registration 

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
                                <a href="#">New Pigment Registration 
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
                                    <div class="caption"> <i class="fa fa-gift"></i>New Pigment Registration  </div>
                                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
                                </div>
                                
                                
                                


                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >
                                            <input  type="hidden" class="form-control"  name="id" id="id"        value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[0]);
                                                }
                                                ?>" />

                                        <input  type="hidden" class="form-control"  name="is_edit_pm" id="is_edit_pm" value="<?php
                                        if ($_GET['ID']) {
                                            echo($data[16] + 1);
                                        }
                                                ?>" />

                                        <input  type="hidden" class="form-control"  name="org_name_pm" id="org_name_pm"  value="<?php echo($loge_user); ?>" />


                                        <div class="form-body">    
                                            
                                            
                                            
                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Printing Pattern<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pattern_pm" id="pattern_pm"   placeholder="Prin.No"   value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[2]);
                                                }
                                                ?>" />                         
                                                </div>    

                                                <label class="control-label col-sm-2">FG Pattern<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="ref_no_pm" id="ref_no_pm"  placeholder="Patt.No" value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[1]);
                                                }
                                                ?>" />                         
                                                </div> 

                                                                                                   

                                            </div>
                                            
                                            

                                            <div class="form-group form-group">
<!--                                                <label class="control-label col-sm-2">Pattern No<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="pattern_pm" id="pattern_pm"     value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[2]);
                                                }
                                                ?>" />                         
                                                </div>    -->

                                                <label class="control-label col-sm-2">PaperSize<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="paper_size_pm" id="paper_size_pm" value="Transfer Paper" value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[2]);
                                                }
                                                else{
                                                    
                                                    echo("Transfer Paper");
                                                }
                                                ?>" />                         
                                                </div> 

                                                <label class="control-label col-sm-2">StProofPaper<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="st_proof_pape_pm" id="st_proof_pape_pm"  
                                                            
                                                            value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[14]);
                                                }
                                                else{
                                                    
                                                    echo("st_proof_pape_pm");
                                                }
                                                ?>"/>                         
                                                </div>                                                       

                                            </div>


                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Printing way<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="printing_way_pm" id="printing_way_pm"  
                                                              value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[9]);
                                                }
                                                else{
                                                    
                                                    echo("S");
                                                }
                                                ?>"/>                         
                                                </div>    

                                                <label class="control-label col-sm-2">Body<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="body_pm" id="body_pm"                value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[10]);
                                                }
                                                else{
                                                    
                                                    echo("S");
                                                }
                                                ?>"  />                         
                                                </div> 

                                                <label class="control-label col-sm-2">Decoration<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="decoration_pm" id="decoration_pm"       value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[11]);
                                                }
                                                else{
                                                    
                                                    echo("NLPL");
                                                }
                                                ?>"/>                         
                                                </div>                                                       

                                            </div>

                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Market<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="market_pm" id="market_pm"    value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[12]);
                                                }
                                                else{
                                                    
                                                    echo("USA");
                                                }
                                                ?>" />                         
                                                </div>    

                                                <label class="control-label col-sm-2">Layout<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="text" class="form-control" name="layout_pm" id="layout_pm"     value="<?php
                                                if ($_GET['ID']) {
                                                    echo($data[1]);
                                                }
                                                else{
                                                    
                                                    echo("S");
                                                }
                                                ?>" />                         
                                                </div> 

                                              <?php
  if (empty($_GET['ID'])) {
   ?>  
                                                <label class="control-label col-sm-2"># Top Coat<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-2">
                                                    <input  type="number" class="form-control" name="item01_pmt" id="item01_pmt"   value="1"  />                         
                                                </div> 

  <?php }?>
                                            </div>



<?php
  if (empty($_GET['ID'])) {
   ?>  
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

                                            <div class="form-group form-group">
                                                <label class="control-label col-sm-2">Comment<span style="color: crimson;"> *</span></label>
                                                <div class="col-sm-6">
                                                    <textarea rows="5" cols="40" name="item04_pm" id="item04_pm" >-</textarea>

                                                </div> 



                                            </div>
                                               
                                               
                                             
     
                                            

                                            <div class="container"  style="width:100%" >

                                                <div class="row clearfix tab_logic" >
                                                    <div class="col-md-12 " >
                                                        <table class="">
                                                            <tr class='addr0' style="display: none;">
                                                                <td  style="text-align:left; font-size:12px; padding:4px; word-wrap:break-word;" ></td>
                                                                <td style="width:100%" >

                                                                    <div class="form-group form-group-sm">
                                                                        <table class="table table-bordered table-hover" >
                                                                            <thead>
                                                                                <tr>                            

                                                                                    <th class="text-center" width="15%"> Printing No( Ex .S01) </th>
                                                                                    <th class="text-center" width="15%"> Name </th>                                 
                                                                                    <th class="text-center" width="10%">ScreenMesh</th>
                                                                                    <th class="text-center" width="10%">Colour Code</th>
                                                                                    <th class="text-center" width="15%">Per Sheet Consumption</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr >

                                                                                    <td>
                                                                                        <select class="form-control"   name='rows[xxx][colours_pm]' id='rows[xxx][colours_pm]'>

<!--                                                                                            <option value="S01">S01</option>
                                                                                            <option value="S02">S02</option>
                                                                                            <option value="S03">S03</option>
                                                                                            <option value="S04">S04</option>
                                                                                            <option value="S05">S05</option>
                                                                                            <option value="S06">S06</option>
                                                                                            <option value="S07">S07</option>
                                                                                            <option value="S08">S09</option>
                                                                                            <option value="S10">S10</option>
                                                                                            <option value="S11">S11</option>
                                                                                            <option value="S12">S12</option>

                                                                                            <option value="T01">T01</option>
                                                                                            <option value="T02">T02</option>
                                                                                            <option value="T03">T03</option>
                                                                                            <option value="T04">T04</option>-->
                                                                                            
                                                                                                   <?php
//                                                                                   
                                                                                                   
                                                                                                  $cc->getColoursIndexList();
                                                                                         ?>

                                                                                        </select> 
                                                                                        
                                              
                                                                                    </td>

                                                                                    <td>


                                                                                        <select  class="form-control" name='rows[xxx][colours_name_pm]'  id='rows[xxx][colours_name_pm]'>

                            			                                         <?php
                                                                                         $cc->getColoursList();
                                                                                         ?>



                                                                                        </select> 


                                                                                    </td>

                                                                                    <td>

                                                                                        <select  class="form-control" name='rows[xxx][screen_mesh_pm]' id='rows[xxx][screen_mesh_pm]'>

                                                                                         <?php
                                                                                         //$od->getMeshList();
                                                                                         
                                                                                         $mesh->getMesh();
                                                                                         ?>
<!--                                                                                            <option value="120HD">120HD</option>
                                                                                            <option value="140T">140T</option>
                                                                                            <option value="150-12">150-12</option>
                                                                                            <option value="18T">18T</option>
                                                                                            <option value="21T">21T</option>
                                                                                            <option value="24T">24T</option>
                                                                                            <option value="48T">48T</option>
                                                                                            <option value="49HD">49HD</option>
                                                                                            <option value="70T">70T</option>
                                                                                            <option value="DS">DS</option>
                                                                                            <option value="M-100">M-100</option>
                                                                                            <option value="M-120">M-120</option>
                                                                                            <option value="M-150">M-150</option>
                                                                                            <option value="M-200">M-200</option>
                                                                                            <option value="MFT150">MFT150</option>
                                                                                            <option value="MFT200">MFT200</option>
                                                                                            <option value="MFT250">MFT250</option>
                                                                                            <option value="MFT300">MFT300</option>
                                                                                            <option value="MFT350">MFT350</option>
                                                                                            <option value="MFT-70">MFT-70</option>
                                                                                            <option value="T-110">T-110</option>
                                                                                            <option value="T-150">T-150</option>
                                                                                            <option value="T-200">T-200</option>
                                                                                            <option value="T-250">T-250</option>
                                                                                            <option value="T-280">T-280</option>
                                                                                            <option value="T-300">T-300</option>
                                                                                            <option value="T-350">T-350</option>
                                                                                            <option value="T-355">T-355</option>
                                                                                            <option value="T-420">T-420</option>
                                                                                            <option value="T-70">T-70</option>
                                                                                            <option value="ZAI001">ZAI001</option>-->

                                                                                        </select> 


                                                                                    </td>

                                                                                    <td>

                                                                                        <select  class="form-control" name='rows[xxx][colour_code_pm]' id='rows[xxx][colour_code_pm]'>
                                                                                         <?php
                                                                                         $cc->getColoursCodeList();
                                                                                         ?>                                                                                        
                                                                                        </select> 

                                                                                    </td>

                                                                                    <td><input type="number" name='rows[xxx][colour_qty_pm]' id='rows[xxx][colour_qty_pm]'  placeholder='Per Sheet Consumption'
                                                                                               class="form-control price"  />
                                                                                    </td>

                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>


                                                                    <div class="form-group form-group-sm tab_logicpm">

                                                                        <div class="row clearfix">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-hover tab_logicpm">
                                                                                    <thead>
                                                                                        <tr>                            

                                                                                            <th class="text-center" width="20%">Pigment</th>
                                                                                            <th class="text-center" width="15%">Qty</th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr class='addrpm0' style="display:none;">

                                                                                            <td>

                                                                                                <select  class="form-control" name='rows[xxx][pigment_name_ct][]' id='rows[xxx][pigment_name_ct][]'>
                                                                                                   
                                                                                                    <?php
                                                                                                    $co->getPigmentList();
                                                                                                    ?>
<!--                                                                                                    
                                                                                                    <option value="114">114</option>			
                                                                                                    <option value="115">115</option>			
                                                                                                    <option value="117">117</option>			
                                                                                                    <option value="206">206</option>			
                                                                                                    <option value="211">211</option>			
                                                                                                    <option value="236">236</option>			
                                                                                                    <option value="257">257</option>			
                                                                                                    <option value="451">451</option>			
                                                                                                    <option value="504">504</option>			
                                                                                                    <option value="679">679</option>			
                                                                                                    <option value="790">790</option>			
                                                                                                    <option value="3212">3212</option>			
                                                                                                    <option value="3243">3243</option>			
                                                                                                    <option value="3333">3333</option>			
                                                                                                    <option value="3347">3347</option>			
                                                                                                    <option value="3408">3408</option>			
                                                                                                    <option value="3409">3409</option>			
                                                                                                    <option value="3450">3450</option>			
                                                                                                    <option value="3579">3579</option>			
                                                                                                    <option value="3629">3629</option>			
                                                                                                    <option value="3637">3637</option>			
                                                                                                    <option value="3642">3642</option>			
                                                                                                    <option value="3708">3708</option>			
                                                                                                    <option value="3716">3716</option>			
                                                                                                    <option value="3720">3720</option>			
                                                                                                    <option value="3723">3723</option>			
                                                                                                    <option value="4100">4100</option>			
                                                                                                    <option value="4527">4527</option>			
                                                                                                    <option value="4530">4530</option>			
                                                                                                    <option value="4531">4531</option>			
                                                                                                    <option value="4532">4532</option>			
                                                                                                    <option value="4536">4536</option>			
                                                                                                    <option value="4537">4537</option>			
                                                                                                    <option value="4551">4551</option>			
                                                                                                    <option value="4555">4555</option>			
                                                                                                    <option value="4560">4560</option>			
                                                                                                    <option value="4564">4564</option>			
                                                                                                    <option value="4568">4568</option>			
                                                                                                    <option value="4571">4571</option>			
                                                                                                    <option value="4574">4574</option>			
                                                                                                    <option value="4577">4577</option>			
                                                                                                    <option value="4581">4581</option>			
                                                                                                    <option value="4583">4583</option>			
                                                                                                    <option value="4591">4591</option>			
                                                                                                    <option value="4598">4598</option>			
                                                                                                    <option value="5506">5506</option>			
                                                                                                    <option value="5821">5821</option>			
                                                                                                    <option value="7632">7632</option>			
                                                                                                    <option value="7730">7730</option>			
                                                                                                    <option value="7901">7901</option>			
                                                                                                    <option value="8796">8796</option>			
                                                                                                    <option value="9041">9041</option>			
                                                                                                    <option value="11295">11295</option>			
                                                                                                    <option value="11400">11400</option>			
                                                                                                    <option value="11810">11810</option>			
                                                                                                    <option value="11870">11870</option>			
                                                                                                    <option value="11871">11871</option>			
                                                                                                    <option value="12312">12312</option>			
                                                                                                    <option value="12317">12317</option>			
                                                                                                    <option value="12322">12322</option>			
                                                                                                    <option value="12324">12324</option>			
                                                                                                    <option value="12326">12326</option>			
                                                                                                    <option value="12681">12681</option>			
                                                                                                    <option value="12810">12810</option>			
                                                                                                    <option value="12811">12811</option>			
                                                                                                    <option value="12812">12812</option>			
                                                                                                    <option value="12813">12813</option>			
                                                                                                    <option value="12814">12814</option>			
                                                                                                    <option value="12815">12815</option>			
                                                                                                    <option value="12872">12872</option>			
                                                                                                    <option value="12873">12873</option>			
                                                                                                    <option value="13133">13133</option>			
                                                                                                    <option value="13250">13250</option>			
                                                                                                    <option value="13548">13548</option>			
                                                                                                    <option value="13640">13640</option>			
                                                                                                    <option value="13810">13810</option>			
                                                                                                    <option value="13870">13870</option>			
                                                                                                    <option value="13873">13873</option>			
                                                                                                    <option value="14029">14029</option>			
                                                                                                    <option value="14117">14117</option>			
                                                                                                    <option value="14209">14209</option>			
                                                                                                    <option value="15034">15034</option>			
                                                                                                    <option value="15049">15049</option>			
                                                                                                    <option value="15084">15084</option>			
                                                                                                    <option value="15087">15087</option>			
                                                                                                    <option value="15089">15089</option>			
                                                                                                    <option value="16133">16133</option>			
                                                                                                    <option value="16144">16144</option>			
                                                                                                    <option value="16150">16150</option>			
                                                                                                    <option value="16871">16871</option>			
                                                                                                    <option value="16872">16872</option>			
                                                                                                    <option value="16873">16873</option>			
                                                                                                    <option value="17228">17228</option>			
                                                                                                    <option value="17499">17499</option>			
                                                                                                    <option value="17504">17504</option>			
                                                                                                    <option value="17811">17811</option>			
                                                                                                    <option value="17813">17813</option>			
                                                                                                    <option value="17814">17814</option>			
                                                                                                    <option value="17815">17815</option>			
                                                                                                    <option value="17871">17871</option>			
                                                                                                    <option value="17872">17872</option>			
                                                                                                    <option value="17873">17873</option>			
                                                                                                    <option value="17874">17874</option>			
                                                                                                    <option value="23264">23264</option>			
                                                                                                    <option value="26029">26029</option>			
                                                                                                    <option value="26200">26200</option>			
                                                                                                    <option value="35703">35703</option>			
                                                                                                    <option value="36210">36210</option>			
                                                                                                    <option value="37810">37810</option>			
                                                                                                    <option value="37812">37812</option>			
                                                                                                    <option value="37820">37820</option>			
                                                                                                    <option value="37821">37821</option>			
                                                                                                    <option value="37822">37822</option>			
                                                                                                    <option value="37831">37831</option>			
                                                                                                    <option value="37832">37832</option>			
                                                                                                    <option value="37840">37840</option>			
                                                                                                    <option value="37841">37841</option>			
                                                                                                    <option value="37842">37842</option>			
                                                                                                    <option value="37843">37843</option>			
                                                                                                    <option value="37844">37844</option>			
                                                                                                    <option value="37845">37845</option>			
                                                                                                    <option value="37850">37850</option>			
                                                                                                    <option value="37851">37851</option>			
                                                                                                    <option value="37852">37852</option>			
                                                                                                    <option value="37860">37860</option>			
                                                                                                    <option value="37861">37861</option>			
                                                                                                    <option value="37862">37862</option>			
                                                                                                    <option value="37871">37871</option>			
                                                                                                    <option value="37872">37872</option>			
                                                                                                    <option value="37873">37873</option>			
                                                                                                    <option value="37890">37890</option>			
                                                                                                    <option value="37891">37891</option>			
                                                                                                    <option value="37892">37892</option>			
                                                                                                    <option value="38001">38001</option>			
                                                                                                    <option value="38012">38012</option>			
                                                                                                    <option value="38032">38032</option>			
                                                                                                    <option value="38041">38041</option>			
                                                                                                    <option value="38042">38042</option>			
                                                                                                    <option value="38050">38050</option>			
                                                                                                    <option value="38051">38051</option>			
                                                                                                    <option value="38080">38080</option>			
                                                                                                    <option value="38090">38090</option>			
                                                                                                    <option value="55325">55325</option>			
                                                                                                    <option value="57810">57810</option>			
                                                                                                    <option value="57821">57821</option>			
                                                                                                    <option value="57840">57840</option>			
                                                                                                    <option value="57842">57842</option>			
                                                                                                    <option value="57850">57850</option>			
                                                                                                    <option value="57860">57860</option>			
                                                                                                    <option value="57861">57861</option>			
                                                                                                    <option value="57870">57870</option>			
                                                                                                    <option value="57880">57880</option>			
                                                                                                    <option value="57890">57890</option>			
                                                                                                    <option value="59000">59000</option>			
                                                                                                    <option value="59001">59001</option>			
                                                                                                    <option value="59002">59002</option>			
                                                                                                    <option value="59020">59020</option>			
                                                                                                    <option value="59021">59021</option>			
                                                                                                    <option value="59022">59022</option>			
                                                                                                    <option value="59030">59030</option>			
                                                                                                    <option value="59031">59031</option>			
                                                                                                    <option value="59051">59051</option>			
                                                                                                    <option value="59053">59053</option>			
                                                                                                    <option value="59054">59054</option>			
                                                                                                    <option value="59071">59071</option>			
                                                                                                    <option value="59072">59072</option>			
                                                                                                    <option value="59090">59090</option>			
                                                                                                    <option value="59091">59091</option>			
                                                                                                    <option value="59100">59100</option>			
                                                                                                    <option value="59101">59101</option>			
                                                                                                    <option value="59110">59110</option>			
                                                                                                    <option value="59111">59111</option>			
                                                                                                    <option value="59112">59112</option>			
                                                                                                    <option value="59113">59113</option>			
                                                                                                    <option value="59120">59120</option>			
                                                                                                    <option value="59121">59121</option>			
                                                                                                    <option value="59123">59123</option>			
                                                                                                    <option value="59130">59130</option>			
                                                                                                    <option value="59131">59131</option>			
                                                                                                    <option value="59132">59132</option>			
                                                                                                    <option value="59140">59140</option>			
                                                                                                    <option value="59141">59141</option>			
                                                                                                    <option value="59142">59142</option>			
                                                                                                    <option value="59143">59143</option>			
                                                                                                    <option value="59150">59150</option>			
                                                                                                    <option value="59151">59151</option>			
                                                                                                    <option value="59170">59170</option>			
                                                                                                    <option value="59190">59190</option>			
                                                                                                    <option value="59191">59191</option>			
                                                                                                    <option value="71812">71812</option>			
                                                                                                    <option value="74790">74790</option>			
                                                                                                    <option value="77100">77100</option>			
                                                                                                    <option value="77482">77482</option>			
                                                                                                    <option value="77500">77500</option>			
                                                                                                    <option value="77501">77501</option>			
                                                                                                    <option value="77503">77503</option>			
                                                                                                    <option value="77908">77908</option>			
                                                                                                    <option value="77918">77918</option>			
                                                                                                    <option value="78720">78720</option>			
                                                                                                    <option value="78811">78811</option>			
                                                                                                    <option value="80431">80431</option>			
                                                                                                    <option value="93100">93100</option>			
                                                                                                    <option value="97002">97002</option>			
                                                                                                    <option value="97110">97110</option>			
                                                                                                    <option value="97240">97240</option>			
                                                                                                    <option value="97260">97260</option>			
                                                                                                    <option value="97320">97320</option>			
                                                                                                    <option value="97321">97321</option>			
                                                                                                    <option value="97401">97401</option>			
                                                                                                    <option value="97420">97420</option>			
                                                                                                    <option value="97421">97421</option>			
                                                                                                    <option value="97440">97440</option>			
                                                                                                    <option value="97441">97441</option>			
                                                                                                    <option value="97501">97501</option>			
                                                                                                    <option value="97520">97520</option>			
                                                                                                    <option value="97561">97561</option>			
                                                                                                    <option value="97740">97740</option>			
                                                                                                    <option value="97820">97820</option>			
                                                                                                    <option value="97901">97901</option>			
                                                                                                    <option value="97920">97920</option>			
                                                                                                    <option value="97940">97940</option>			
                                                                                                    <option value="121515">121515</option>			
                                                                                                    <option value="121812">121812</option>			
                                                                                                    <option value="122500">122500</option>			
                                                                                                    <option value="131802">131802</option>			
                                                                                                    <option value="132505">132505</option>			
                                                                                                    <option value="151800">151800</option>			
                                                                                                    <option value="168715">168715</option>			
                                                                                                    <option value="171202">171202</option>			
                                                                                                    <option value="171651">171651</option>			
                                                                                                    <option value="171652">171652</option>			
                                                                                                    <option value="171658">171658</option>			
                                                                                                    <option value="171716">171716</option>			
                                                                                                    <option value="240400">240400</option>			
                                                                                                    <option value="722500">722500</option>			
                                                                                                    <option value="1355325">1355325</option>			
                                                                                                    <option value="1555009">1555009</option>			
                                                                                                    <option value="104F">104F</option>			
                                                                                                    <option value="1062BLUE">1062BLUE</option>			
                                                                                                    <option value="10KONN-B">10KONN-B</option>			
                                                                                                    <option value="11C-8">11C-8</option>			
                                                                                                    <option value="11C-8">11C-8</option>			
                                                                                                    <option value="11YELLOW S">11YELLOW S</option>			
                                                                                                    <option value="11YELLOW-S">11YELLOW-S</option>			
                                                                                                    <option value="126B">126B</option>			
                                                                                                    <option value="12YELLOW">12YELLOW</option>			
                                                                                                    <option value="13654D">13654D</option>			
                                                                                                    <option value="13K454">13K454</option>			
                                                                                                    <option value="13YELLOW">13YELLOW</option>			
                                                                                                    <option value="13YELLOW-S">13YELLOW-S</option>			
                                                                                                    <option value="14A">14A</option>			
                                                                                                    <option value="14B">14B</option>			
                                                                                                    <option value="152A CREAM">152A CREAM</option>			
                                                                                                    <option value="155B">155B</option>			
                                                                                                    <option value="16B">16B</option>			
                                                                                                    <option value="16BROWN">16BROWN</option>			
                                                                                                    <option value="16BROWN">16BROWN</option>			
                                                                                                    <option value="1716 FRIT">1716 FRIT</option>			
                                                                                                    <option value="175RAISED">175RAISED</option>			
                                                                                                    <option value="175RAISED">175RAISED</option>			
                                                                                                    <option value="19233D">19233D</option>			
                                                                                                    <option value="19233D">19233D</option>			
                                                                                                    <option value="1GOSU">1GOSU</option>			
                                                                                                    <option value="1GOSU">1GOSU</option>			
                                                                                                    <option value="1GOU BLUE">1GOU BLUE</option>			
                                                                                                    <option value="1GOU BLUE">1GOU BLUE</option>			
                                                                                                    <option value="201BLUE">201BLUE</option>			
                                                                                                    <option value="201BLUE">201BLUE</option>			
                                                                                                    <option value="211LAILUCK">211LAILUCK</option>			
                                                                                                    <option value="211LAILUCK">211LAILUCK</option>			
                                                                                                    <option value="22B">22B</option>			
                                                                                                    <option value="22B">22B</option>			
                                                                                                    <option value="22GRAY">22GRAY</option>			
                                                                                                    <option value="236LAILUCK">236LAILUCK</option>			
                                                                                                    <option value="236LAILUCK">236LAILUCK</option>			
                                                                                                    <option value="245SELENE">245SELENE</option>			
                                                                                                    <option value="24S/B.BLUE">24S/B.BLUE</option>			
                                                                                                    <option value="25KAI-HEKI">25KAI-HEKI</option>			
                                                                                                    <option value="285BLACK">285BLACK</option>			
                                                                                                    <option value="285BLACK">285BLACK</option>			
                                                                                                    <option value="288PINK">288PINK</option>			
                                                                                                    <option value="288PINK">288PINK</option>			
                                                                                                    <option value="29P">29P</option>			
                                                                                                    <option value="29P">29P</option>			
                                                                                                    <option value="2BF">2BF</option>			
                                                                                                    <option value="2BF">2BF</option>			
                                                                                                    <option value="2BRS">2BRS</option>			
                                                                                                    <option value="2BRS">2BRS</option>			
                                                                                                    <option value="30GRAY">30GRAY</option>			
                                                                                                    <option value="30GRAY">30GRAY</option>			
                                                                                                    <option value="32AZUKI">32AZUKI</option>			
                                                                                                    <option value="32AZUKI">32AZUKI</option>			
                                                                                                    <option value="32AZUKI-CYA">32AZUKI-CYA</option>			
                                                                                                    <option value="32AZUKI-CYA">32AZUKI-CYA</option>			
                                                                                                    <option value="32GRAY">32GRAY</option>			
                                                                                                    <option value="32GRAY">32GRAY</option>			
                                                                                                    <option value="335HIWA">335HIWA</option>			
                                                                                                    <option value="335HIWA">335HIWA</option>			
                                                                                                    <option value="33EN2982">33EN2982</option>			
                                                                                                    <option value="33EN2982">33EN2982</option>			
                                                                                                    <option value="357BROWN">357BROWN</option>			
                                                                                                    <option value="357BROWN">357BROWN</option>			
                                                                                                    <option value="3AF">3AF</option>			
                                                                                                    <option value="3AF">3AF</option>			
                                                                                                    <option value="3BRS">3BRS</option>			
                                                                                                    <option value="3BRS">3BRS</option>			
                                                                                                    <option value="40BLUE">40BLUE</option>			
                                                                                                    <option value="40BLUE">40BLUE</option>			
                                                                                                    <option value="41S/B.BLUE">41S/B.BLUE</option>			
                                                                                                    <option value="41S/B.BLUE">41S/B.BLUE</option>			
                                                                                                    <option value="43MAT WHITE">43MAT WHITE</option>			
                                                                                                    <option value="43MAT WHITE">43MAT WHITE</option>			
                                                                                                    <option value="451(60H)">451(60H)</option>			
                                                                                                    <option value="451THICK RAISDE">451THICK RAISDE</option>			
                                                                                                    <option value="451THICK RAISDE">451THICK RAISDE</option>			
                                                                                                    <option value="50A">50A</option>			
                                                                                                    <option value="50A">50A</option>			
                                                                                                    <option value="50D">50D</option>			
                                                                                                    <option value="50D">50D</option>			
                                                                                                    <option value="50K">50K</option>			
                                                                                                    <option value="50K">50K</option>			
                                                                                                    <option value="55EN2215">55EN2215</option>			
                                                                                                    <option value="55EN2215">55EN2215</option>			
                                                                                                    <option value="55EN2216">55EN2216</option>			
                                                                                                    <option value="55EN2216">55EN2216</option>			
                                                                                                    <option value="55EN2217">55EN2217</option>			
                                                                                                    <option value="55EN2217">55EN2217</option>			
                                                                                                    <option value="55EN2218">55EN2218</option>			
                                                                                                    <option value="55EN2218">55EN2218</option>			
                                                                                                    <option value="55EN2982">55EN2982</option>			
                                                                                                    <option value="55M">55M</option>			
                                                                                                    <option value="55M">55M</option>			
                                                                                                    <option value="55P">55P</option>			
                                                                                                    <option value="55P">55P</option>			
                                                                                                    <option value="56M">56M</option>			
                                                                                                    <option value="56M">56M</option>			
                                                                                                    <option value="5BRS">5BRS</option>			
                                                                                                    <option value="5BRS">5BRS</option>			
                                                                                                    <option value="60A">60A</option>			
                                                                                                    <option value="60A GRAY">60A GRAY</option>			
                                                                                                    <option value="60A GRAY">60A GRAY</option>			
                                                                                                    <option value="628PINK">628PINK</option>			
                                                                                                    <option value="650BLUE">650BLUE</option>			
                                                                                                    <option value="650BLUE">650BLUE</option>			
                                                                                                    <option value="67 W/R">67 W/R</option>			
                                                                                                    <option value="67 W/R">67 W/R</option>			
                                                                                                    <option value="67W/R">67W/R</option>			
                                                                                                    <option value="67W/R">67W/R</option>			
                                                                                                    <option value="67WHITE RAISED">67WHITE RAISED</option>			
                                                                                                    <option value="67WHITE RAISED">67WHITE RAISED</option>			
                                                                                                    <option value="6820R">6820R</option>			
                                                                                                    <option value="6820R">6820R</option>			
                                                                                                    <option value="6820RED">6820RED</option>			
                                                                                                    <option value="6820RED">6820RED</option>			
                                                                                                    <option value="68MAT BLACK">68MAT BLACK</option>			
                                                                                                    <option value="68MAT BLACK">68MAT BLACK</option>			
                                                                                                    <option value="690N">690N</option>			
                                                                                                    <option value="690N">690N</option>			
                                                                                                    <option value="69ENAMEL">69ENAMEL</option>			
                                                                                                    <option value="704F">704F</option>			
                                                                                                    <option value="704F">704F</option>			
                                                                                                    <option value="73T">73T</option>			
                                                                                                    <option value="73T">73T</option>			
                                                                                                    <option value="740BLUE">740BLUE</option>			
                                                                                                    <option value="740BLUE">740BLUE</option>			
                                                                                                    <option value="750F">750F</option>			
                                                                                                    <option value="750F">750F</option>			
                                                                                                    <option value="760BLUE">760BLUE</option>			
                                                                                                    <option value="760BLUE">760BLUE</option>			
                                                                                                    <option value="7730YELLOW">7730YELLOW</option>			
                                                                                                    <option value="7730YELLOW">7730YELLOW</option>			
                                                                                                    <option value="77EN1428">77EN1428</option>			
                                                                                                    <option value="77EN1428">77EN1428</option>			
                                                                                                    <option value="77EN1429">77EN1429</option>			
                                                                                                    <option value="77EN1429">77EN1429</option>			
                                                                                                    <option value="77EN1461">77EN1461</option>			
                                                                                                    <option value="77EN1461">77EN1461</option>			
                                                                                                    <option value="77EN1475">77EN1475</option>			
                                                                                                    <option value="77EN1475">77EN1475</option>			
                                                                                                    <option value="7890BLACK">7890BLACK</option>			
                                                                                                    <option value="7890BLACK">7890BLACK</option>			
                                                                                                    <option value="78WHITE RAISED">78WHITE RAISED</option>			
                                                                                                    <option value="78WHITE RAISED">78WHITE RAISED</option>			
                                                                                                    <option value="790NA">790NA</option>			
                                                                                                    <option value="790RURI">790RURI</option>			
                                                                                                    <option value="790RURI">790RURI</option>			
                                                                                                    <option value="79BLUE">79BLUE</option>			
                                                                                                    <option value="79BLUE">79BLUE</option>			
                                                                                                    <option value="88EN707">88EN707</option>			
                                                                                                    <option value="88EN707">88EN707</option>			
                                                                                                    <option value="88MAT">88MAT</option>			
                                                                                                    <option value="88MAT">88MAT</option>			
                                                                                                    <option value="88MAT G.BROWN">88MAT G.BROWN</option>			
                                                                                                    <option value="88MAT G.BROWN">88MAT G.BROWN</option>			
                                                                                                    <option value="89M">89M</option>			
                                                                                                    <option value="89M">89M</option>			
                                                                                                    <option value="89WHITE RAISED">89WHITE RAISED</option>			
                                                                                                    <option value="89WHITE RAISED">89WHITE RAISED</option>			
                                                                                                    <option value="8BRS">8BRS</option>			
                                                                                                    <option value="8BRS">8BRS</option>			
                                                                                                    <option value="8C">8C</option>			
                                                                                                    <option value="915BLACK">915BLACK</option>			
                                                                                                    <option value="915BLACK">915BLACK</option>			
                                                                                                    <option value="915SUJ">915SUJ</option>			
                                                                                                    <option value="915SUJI">915SUJI</option>			
                                                                                                    <option value="915SUJI">915SUJI</option>			
                                                                                                    <option value="9207-2">9207-2</option>			
                                                                                                    <option value="94E1001">94E1001</option>			
                                                                                                    <option value="94W3001">94W3001</option>			
                                                                                                    <option value="94W3002">94W3002</option>			
                                                                                                    <option value="94W3003">94W3003</option>			
                                                                                                    <option value="94W3004">94W3004</option>			
                                                                                                    <option value="94W3005">94W3005</option>			
                                                                                                    <option value="9BRS">9BRS</option>			
                                                                                                    <option value="A131">A131</option>			
                                                                                                    <option value="AC-5715P">AC-5715P</option>			
                                                                                                    <option value="AC-5750P">AC-5750P</option>			
                                                                                                    <option value="AC-5790P">AC-5790P</option>			
                                                                                                    <option value="ACF">ACF</option>			
                                                                                                    <option value="AC-NO.7P">AC-NO.7P</option>			
                                                                                                    <option value="AFG">AFG</option>			
                                                                                                    <option value="AFG-2">AFG-2</option>			
                                                                                                    <option value="ALUMINA">ALUMINA</option>			
                                                                                                    <option value="ART">ART</option>			
                                                                                                    <option value="B/S 915 BLACK">B/S 915 BLACK</option>			
                                                                                                    <option value="B1002">B1002</option>			
                                                                                                    <option value="B1003">B1003</option>			
                                                                                                    <option value="B1007">B1007</option>			
                                                                                                    <option value="B1120">B1120</option>			
                                                                                                    <option value="B1122">B1122</option>			
                                                                                                    <option value="B1130">B1130</option>			
                                                                                                    <option value="B1140">B1140</option>			
                                                                                                    <option value="B1202">B1202</option>			
                                                                                                    <option value="B1221">B1221</option>			
                                                                                                    <option value="B1240">B1240</option>			
                                                                                                    <option value="B1261">B1261</option>			
                                                                                                    <option value="B1262">B1262</option>			
                                                                                                    <option value="B1263">B1263</option>			
                                                                                                    <option value="B1320">B1320</option>			
                                                                                                    <option value="B1321">B1321</option>			
                                                                                                    <option value="B1330">B1330</option>			
                                                                                                    <option value="B1348">B1348</option>			
                                                                                                    <option value="B1384">B1384</option>			
                                                                                                    <option value="B1401">B1401</option>			
                                                                                                    <option value="B1420">B1420</option>			
                                                                                                    <option value="B1421">B1421</option>			
                                                                                                    <option value="B1440">B1440</option>			
                                                                                                    <option value="B1441">B1441</option>			
                                                                                                    <option value="B1442">B1442</option>			
                                                                                                    <option value="B1520">B1520</option>			
                                                                                                    <option value="B1530">B1530</option>			
                                                                                                    <option value="B1540">B1540</option>			
                                                                                                    <option value="B1541">B1541</option>			
                                                                                                    <option value="B1561">B1561</option>			
                                                                                                    <option value="B1562">B1562</option>			
                                                                                                    <option value="B1700">B1700</option>			
                                                                                                    <option value="B1701">B1701</option>			
                                                                                                    <option value="B1720">B1720</option>			
                                                                                                    <option value="B1721">B1721</option>			
                                                                                                    <option value="B1741">B1741</option>			
                                                                                                    <option value="B1800">B1800</option>			
                                                                                                    <option value="B1821">B1821</option>			
                                                                                                    <option value="B1901">B1901</option>			
                                                                                                    <option value="B1920">B1920</option>			
                                                                                                    <option value="B1941">B1941</option>			
                                                                                                    <option value="B2210">B2210</option>			
                                                                                                    <option value="B2211">B2211</option>			
                                                                                                    <option value="B2701">B2701</option>			
                                                                                                    <option value="BE-170">BE-170</option>			
                                                                                                    <option value="BF-170">BF-170</option>			
                                                                                                    <option value="BISMUTH OXIDE">BISMUTH OXIDE</option>			
                                                                                                    <option value="BUTYL LACTATE">BUTYL LACTATE</option>			
                                                                                                    <option value="BUTYLE LACTATE">BUTYLE LACTATE</option>			
                                                                                                    <option value="BW-22">BW-22</option>			
                                                                                                    <option value="C0O">C0O</option>			
                                                                                                    <option value="C36">C36</option>			
                                                                                                    <option value="C45">C45</option>			
                                                                                                    <option value="CA304T">CA304T</option>			
                                                                                                    <option value="CB">CB</option>			
                                                                                                    <option value="CF">CF</option>			
                                                                                                    <option value="CG">CG</option>			
                                                                                                    <option value="CHROMIUM OXIDE">CHROMIUM OXIDE</option>			
                                                                                                    <option value="CM-2">CM-2</option>			
                                                                                                    <option value="CO36">CO36</option>			
                                                                                                    <option value="CO45">CO45</option>			
                                                                                                    <option value="COBALT OXIDE">COBALT OXIDE</option>			
                                                                                                    <option value="COO">COO</option>			
                                                                                                    <option value="CR2O3">CR2O3</option>			
                                                                                                    <option value="CT-10">CT-10</option>			
                                                                                                    <option value="CT-30">CT-30</option>			
                                                                                                    <option value="CU2S">CU2S</option>			
                                                                                                    <option value="CUO">CUO</option>			
                                                                                                    <option value="CUS">CUS</option>			
                                                                                                    <option value="CY-9">CY-9</option>			
                                                                                                    <option value="D112">D112</option>			
                                                                                                    <option value="D112A">D112A</option>			
                                                                                                    <option value="D115">D115</option>			
                                                                                                    <option value="D116">D116</option>			
                                                                                                    <option value="D117">D117</option>			
                                                                                                    <option value="D-7">D-7</option>			
                                                                                                    <option value="D-8">D-8</option>			
                                                                                                    <option value="DS">DS</option>			
                                                                                                    <option value="DT-10">DT-10</option>			
                                                                                                    <option value="DT-5">DT-5</option>			
                                                                                                    <option value="F12">F12</option>			
                                                                                                    <option value="F2A">F2A</option>			
                                                                                                    <option value="F67">F67</option>			
                                                                                                    <option value="F67WHITE RAISED">F67WHITE RAISED</option>			
                                                                                                    <option value="FA5-4000">FA5-4000</option>			
                                                                                                    <option value="FE2O3">FE2O3</option>			
                                                                                                    <option value="FNO1">FNO1</option>			
                                                                                                    <option value="FNO5">FNO5</option>			
                                                                                                    <option value="FNO7">FNO7</option>			
                                                                                                    <option value="FNR-8">FNR-8</option>			
                                                                                                    <option value="FURORENN-AC">FURORENN-AC</option>			
                                                                                                    <option value="GB-5">GB-5</option>			
                                                                                                    <option value="GF1001">GF1001</option>			
                                                                                                    <option value="GF1002">GF1002</option>			
                                                                                                    <option value="GF2001">GF2001</option>			
                                                                                                    <option value="GF-3">GF-3</option>			
                                                                                                    <option value="GF4004">GF4004</option>			
                                                                                                    <option value="GF4006">GF4006</option>			
                                                                                                    <option value="GF505">GF505</option>			
                                                                                                    <option value="GF-505">GF-505</option>			
                                                                                                    <option value="GF6001">GF6001</option>			
                                                                                                    <option value="GF70">GF70</option>			
                                                                                                    <option value="GG5566">GG5566</option>			
                                                                                                    <option value="GGP1215">GGP1215</option>			
                                                                                                    <option value="GGP2335">GGP2335</option>			
                                                                                                    <option value="GGP2531">GGP2531</option>			
                                                                                                    <option value="GGP2544">GGP2544</option>			
                                                                                                    <option value="GGP4319">GGP4319</option>			
                                                                                                    <option value="GMC-32">GMC-32</option>			
                                                                                                    <option value="GOLD BROWN">GOLD BROWN</option>			
                                                                                                    <option value="GPP1240">GPP1240</option>			
                                                                                                    <option value="GPP3020D">GPP3020D</option>			
                                                                                                    <option value="GPP4319">GPP4319</option>			
                                                                                                    <option value="GPP4516">GPP4516</option>			
                                                                                                    <option value="GPP-4520">GPP-4520</option>			
                                                                                                    <option value="GPP4522">GPP4522</option>			
                                                                                                    <option value="GPP4601">GPP4601</option>			
                                                                                                    <option value="GPP-4601">GPP-4601</option>			
                                                                                                    <option value="GRY1">GRY1</option>			
                                                                                                    <option value="GT-1">GT-1</option>			
                                                                                                    <option value="H2SNO3">H2SNO3</option>			
                                                                                                    <option value="H55009">H55009</option>			
                                                                                                    <option value="H55010">H55010</option>			
                                                                                                    <option value="H55033">H55033</option>			
                                                                                                    <option value="H55325">H55325</option>			
                                                                                                    <option value="H56055">H56055</option>			
                                                                                                    <option value="H-6">H-6</option>			
                                                                                                    <option value="H64014">H64014</option>			
                                                                                                    <option value="H64115">H64115</option>			
                                                                                                    <option value="H64124">H64124</option>			
                                                                                                    <option value="H64225">H64225</option>			
                                                                                                    <option value="H64228">H64228</option>			
                                                                                                    <option value="H64324">H64324</option>			
                                                                                                    <option value="H64604">H64604</option>			
                                                                                                    <option value="H64675">H64675</option>			
                                                                                                    <option value="H64776">H64776</option>			
                                                                                                    <option value="H64778">H64778</option>			
                                                                                                    <option value="H64804">H64804</option>			
                                                                                                    <option value="H64885">H64885</option>			
                                                                                                    <option value="H64888">H64888</option>			
                                                                                                    <option value="HONN-KURO">HONN-KURO</option>			
                                                                                                    <option value="HPP4319">HPP4319</option>			
                                                                                                    <option value="IRON OXIDE">IRON OXIDE</option>			
                                                                                                    <option value="K731">K731</option>			
                                                                                                    <option value="KDM">KDM</option>			
                                                                                                    <option value="KDN">KDN</option>			
                                                                                                    <option value="KEMIKARU-INK-C1">KEMIKARU-INK-C1</option>			
                                                                                                    <option value="KOMONN ORENGE">KOMONN ORENGE</option>			
                                                                                                    <option value="L115">L115</option>			
                                                                                                    <option value="L116">L116</option>			
                                                                                                    <option value="L117">L117</option>			
                                                                                                    <option value="L13YELLOW">L13YELLOW</option>			
                                                                                                    <option value="L406">L406</option>			
                                                                                                    <option value="L7529">L7529</option>			
                                                                                                    <option value="LEF140">LEF140</option>			
                                                                                                    <option value="LEF144">LEF144</option>			
                                                                                                    <option value="LO-541S">LO-541S</option>			
                                                                                                    <option value="LO-556">LO-556</option>			
                                                                                                    <option value="LO566">LO566</option>			
                                                                                                    <option value="LT-7">LT-7</option>			
                                                                                                    <option value="LT-8">LT-8</option>			
                                                                                                    <option value="LU1580">LU1580</option>			
                                                                                                    <option value="LU1580D">LU1580D</option>			
                                                                                                    <option value="M6000">M6000</option>			
                                                                                                    <option value="M800">M800</option>			
                                                                                                    <option value="M81">M81</option>			
                                                                                                    <option value="M8631">M8631</option>			
                                                                                                    <option value="MANDARIN YELLOW">MANDARIN YELLOW</option>			
                                                                                                    <option value="MANGANE.DIOXIDE">MANGANE.DIOXIDE</option>			
                                                                                                    <option value="MAT W/RAISED">MAT W/RAISED</option>			
                                                                                                    <option value="MAT-H-WHITE R.">MAT-H-WHITE R.</option>			
                                                                                                    <option value="MELAMINE RED">MELAMINE RED</option>			
                                                                                                    <option value="MERAMINE-BLUE">MERAMINE-BLUE</option>			
                                                                                                    <option value="MF">MF</option>			
                                                                                                    <option value="MNO2">MNO2</option>			
                                                                                                    <option value="MO-3100">MO-3100</option>			
                                                                                                    <option value="MO-3200">MO-3200</option>			
                                                                                                    <option value="MO-3201">MO-3201</option>			
                                                                                                    <option value="MO-3220">MO-3220</option>			
                                                                                                    <option value="MO-3221">MO-3221</option>			
                                                                                                    <option value="MO-3240">MO-3240</option>			
                                                                                                    <option value="MO-3241">MO-3241</option>			
                                                                                                    <option value="MO-3260">MO-3260</option>			
                                                                                                    <option value="MO-3261">MO-3261</option>			
                                                                                                    <option value="MO-3270">MO-3270</option>			
                                                                                                    <option value="MO-3320">MO-3320</option>			
                                                                                                    <option value="MO-3401">MO-3401</option>			
                                                                                                    <option value="MO-3420">MO-3420</option>			
                                                                                                    <option value="MO-3421">MO-3421</option>			
                                                                                                    <option value="MO-3440">MO-3440</option>			
                                                                                                    <option value="MO-3441">MO-3441</option>			
                                                                                                    <option value="MO-3501">MO-3501</option>			
                                                                                                    <option value="MO-3520">MO-3520</option>			
                                                                                                    <option value="MO-3521">MO-3521</option>			
                                                                                                    <option value="MO-3523">MO-3523</option>			
                                                                                                    <option value="MO-3561">MO-3561</option>			
                                                                                                    <option value="MO-3700">MO-3700</option>			
                                                                                                    <option value="MO-3701">MO-3701</option>			
                                                                                                    <option value="MO-3720">MO-3720</option>			
                                                                                                    <option value="MO-3820">MO-3820</option>			
                                                                                                    <option value="MO-3900">MO-3900</option>			
                                                                                                    <option value="MO-3901">MO-3901</option>			
                                                                                                    <option value="MO-3920">MO-3920</option>			
                                                                                                    <option value="MO-3940">MO-3940</option>			
                                                                                                    <option value="MR-1">MR-1</option>			
                                                                                                    <option value="MR-3">MR-3</option>			
                                                                                                    <option value="MRC">MRC</option>			
                                                                                                    <option value="MSNO">MSNO</option>			
                                                                                                    <option value="MUEN-F">MUEN-F</option>			
                                                                                                    <option value="MV-20">MV-20</option>			
                                                                                                    <option value="MVG">MVG</option>			
                                                                                                    <option value="MV-R">MV-R</option>			
                                                                                                    <option value="N8393">N8393</option>			
                                                                                                    <option value="N8463">N8463</option>			
                                                                                                    <option value="N8583">N8583</option>			
                                                                                                    <option value="NC-5">NC-5</option>			
                                                                                                    <option value="NIC">NIC</option>			
                                                                                                    <option value="NICHIRINBENGARA">NICHIRINBENGARA</option>			
                                                                                                    <option value="NICKEL CARBO.">NICKEL CARBO.</option>			
                                                                                                    <option value="NISSHIN FLOUR">NISSHIN FLOUR</option>			
                                                                                                    <option value="NM3">NM3</option>			
                                                                                                    <option value="NM4">NM4</option>			
                                                                                                    <option value="NM5">NM5</option>			
                                                                                                    <option value="NO PRINT">NO PRINT</option>			
                                                                                                    <option value="NO.10GLAZE">NO.10GLAZE</option>			
                                                                                                    <option value="NO.1PINK">NO.1PINK</option>			
                                                                                                    <option value="NO.2F">NO.2F</option>			
                                                                                                    <option value="NO1 PINK">NO1 PINK</option>			
                                                                                                    <option value="NO-1BLUE">NO-1BLUE</option>			
                                                                                                    <option value="NO2F">NO2F</option>			
                                                                                                    <option value="NP-4860">NP-4860</option>			
                                                                                                    <option value="NR-4">NR-4</option>			
                                                                                                    <option value="NR-6 G.U.RAISED">NR-6 G.U.RAISED</option>			
                                                                                                    <option value="NR-6 KUSURI">NR-6 KUSURI</option>			
                                                                                                    <option value="NR-9">NR-9</option>			
                                                                                                    <option value="NRG-3807">NRG-3807</option>			
                                                                                                    <option value="NRV-1">NRV-1</option>			
                                                                                                    <option value="NSM-6000B">NSM-6000B</option>			
                                                                                                    <option value="OIL BLUE">OIL BLUE</option>			
                                                                                                    <option value="OIL RED">OIL RED</option>			
                                                                                                    <option value="OLD ROSE">OLD ROSE</option>			
                                                                                                    <option value="OOKURA GLAZE">OOKURA GLAZE</option>			
                                                                                                    <option value="OR">OR</option>			
                                                                                                    <option value="OY">OY</option>			
                                                                                                    <option value="P5520">P5520</option>			
                                                                                                    <option value="PDM-5BY">PDM-5BY</option>			
                                                                                                    <option value="PN5422">PN5422</option>			
                                                                                                    <option value="PN5520">PN5520</option>			
                                                                                                    <option value="QUARTZ">QUARTZ</option>			
                                                                                                    <option value="R-1">R-1</option>			
                                                                                                    <option value="R1221">R1221</option>			
                                                                                                    <option value="R1520">R1520</option>			
                                                                                                    <option value="R-2">R-2</option>			
                                                                                                    <option value="R2001">R2001</option>			
                                                                                                    <option value="R2120">R2120</option>			
                                                                                                    <option value="R2260">R2260</option>			
                                                                                                    <option value="R2320">R2320</option>			
                                                                                                    <option value="R2321">R2321</option>			
                                                                                                    <option value="R2401">R2401</option>			
                                                                                                    <option value="R2420">R2420</option>			
                                                                                                    <option value="R2421">R2421</option>			
                                                                                                    <option value="R2440">R2440</option>			
                                                                                                    <option value="R2441">R2441</option>			
                                                                                                    <option value="R2501">R2501</option>			
                                                                                                    <option value="R2520">R2520</option>			
                                                                                                    <option value="R2540">R2540</option>			
                                                                                                    <option value="R2541">R2541</option>			
                                                                                                    <option value="R2561">R2561</option>			
                                                                                                    <option value="R2701">R2701</option>			
                                                                                                    <option value="R2720">R2720</option>			
                                                                                                    <option value="R2740">R2740</option>			
                                                                                                    <option value="R2820">R2820</option>			
                                                                                                    <option value="R2901">R2901</option>			
                                                                                                    <option value="R2920">R2920</option>			
                                                                                                    <option value="R2940">R2940</option>			
                                                                                                    <option value="R-3">R-3</option>			
                                                                                                    <option value="R3001">R3001</option>			
                                                                                                    <option value="R3101">R3101</option>			
                                                                                                    <option value="R3110">R3110</option>			
                                                                                                    <option value="R3120">R3120</option>			
                                                                                                    <option value="R3130">R3130</option>			
                                                                                                    <option value="R3140">R3140</option>			
                                                                                                    <option value="R3180">R3180</option>			
                                                                                                    <option value="R3190">R3190</option>			
                                                                                                    <option value="R3200">R3200</option>			
                                                                                                    <option value="R3220">R3220</option>			
                                                                                                    <option value="R3221">R3221</option>			
                                                                                                    <option value="R3240">R3240</option>			
                                                                                                    <option value="R3260">R3260</option>			
                                                                                                    <option value="R3261">R3261</option>			
                                                                                                    <option value="R3320">R3320</option>			
                                                                                                    <option value="R3321">R3321</option>			
                                                                                                    <option value="R3330">R3330</option>			
                                                                                                    <option value="R3380">R3380</option>			
                                                                                                    <option value="R3401">R3401</option>			
                                                                                                    <option value="R3420">R3420</option>			
                                                                                                    <option value="R3421">R3421</option>			
                                                                                                    <option value="R3440">R3440</option>			
                                                                                                    <option value="R3442">R3442</option>			
                                                                                                    <option value="R3501">R3501</option>			
                                                                                                    <option value="R3521">R3521</option>			
                                                                                                    <option value="R3540">R3540</option>			
                                                                                                    <option value="R3541">R3541</option>			
                                                                                                    <option value="R3561">R3561</option>			
                                                                                                    <option value="R3562">R3562</option>			
                                                                                                    <option value="R3701">R3701</option>			
                                                                                                    <option value="R3703">R3703</option>			
                                                                                                    <option value="R3720">R3720</option>			
                                                                                                    <option value="R3740">R3740</option>			
                                                                                                    <option value="R3800">R3800</option>			
                                                                                                    <option value="R3820">R3820</option>			
                                                                                                    <option value="R3901">R3901</option>			
                                                                                                    <option value="R3902">R3902</option>			
                                                                                                    <option value="R3903">R3903</option>			
                                                                                                    <option value="R3920">R3920</option>			
                                                                                                    <option value="R3940">R3940</option>			
                                                                                                    <option value="RETARDER">RETARDER</option>			
                                                                                                    <option value="RG">RG</option>			
                                                                                                    <option value="RHODAMINE">RHODAMINE</option>			
                                                                                                    <option value="RODAMINE">RODAMINE</option>			
                                                                                                    <option value="RSG-7911">RSG-7911</option>			
                                                                                                    <option value="S10-60">S10-60</option>			
                                                                                                    <option value="SA32">SA32</option>			
                                                                                                    <option value="SB-103">SB-103</option>			
                                                                                                    <option value="SB-66">SB-66</option>			
                                                                                                    <option value="SBM-13">SBM-13</option>			
                                                                                                    <option value="SBM-20">SBM-20</option>			
                                                                                                    <option value="SBN">SBN</option>			
                                                                                                    <option value="SBU-T">SBU-T</option>			
                                                                                                    <option value="SBU-TB">SBU-TB</option>			
                                                                                                    <option value="SERUBENN">SERUBENN</option>			
                                                                                                    <option value="SF-2">SF-2</option>			
                                                                                                    <option value="SG">SG</option>			
                                                                                                    <option value="SG-1000P">SG-1000P</option>			
                                                                                                    <option value="SG-1100">SG-1100</option>			
                                                                                                    <option value="SG-11G">SG-11G</option>			
                                                                                                    <option value="SG-2200B">SG-2200B</option>			
                                                                                                    <option value="SG22B">SG22B</option>			
                                                                                                    <option value="SG-3101N">SG-3101N</option>			
                                                                                                    <option value="SG-5601R">SG-5601R</option>			
                                                                                                    <option value="SG-5703R">SG-5703R</option>			
                                                                                                    <option value="SG-5801R">SG-5801R</option>			
                                                                                                    <option value="SG-5802R">SG-5802R</option>			
                                                                                                    <option value="SG-6701A">SG-6701A</option>			
                                                                                                    <option value="SG-6701C">SG-6701C</option>			
                                                                                                    <option value="SG-6701F">SG-6701F</option>			
                                                                                                    <option value="SG-6701G">SG-6701G</option>			
                                                                                                    <option value="SG-6703C">SG-6703C</option>			
                                                                                                    <option value="SG-7102G">SG-7102G</option>			
                                                                                                    <option value="SG-7107L">SG-7107L</option>			
                                                                                                    <option value="SG-7400K">SG-7400K</option>			
                                                                                                    <option value="SG7400M">SG7400M</option>			
                                                                                                    <option value="SG-7400M">SG-7400M</option>			
                                                                                                    <option value="SG-7400S">SG-7400S</option>			
                                                                                                    <option value="SG7800">SG7800</option>			
                                                                                                    <option value="SG7800M">SG7800M</option>			
                                                                                                    <option value="SG-7800M">SG-7800M</option>			
                                                                                                    <option value="SG-7800S">SG-7800S</option>			
                                                                                                    <option value="SG-7804R">SG-7804R</option>			
                                                                                                    <option value="SG-8600">SG-8600</option>			
                                                                                                    <option value="SG-NF">SG-NF</option>			
                                                                                                    <option value="SH-202">SH-202</option>			
                                                                                                    <option value="SHINNTA-SHIRO">SHINNTA-SHIRO</option>			
                                                                                                    <option value="SM-3010A">SM-3010A</option>			
                                                                                                    <option value="SM-302">SM-302</option>			
                                                                                                    <option value="SM4030B">SM4030B</option>			
                                                                                                    <option value="SM6100">SM6100</option>			
                                                                                                    <option value="SM-6100">SM-6100</option>			
                                                                                                    <option value="SM8030B">SM8030B</option>			
                                                                                                    <option value="SM-8030B">SM-8030B</option>			
                                                                                                    <option value="SM-8100">SM-8100</option>			
                                                                                                    <option value="SN-11">SN-11</option>			
                                                                                                    <option value="SN-4S">SN-4S</option>			
                                                                                                    <option value="SOLVENT150">SOLVENT150</option>			
                                                                                                    <option value="SOLVESSO150">SOLVESSO150</option>			
                                                                                                    <option value="SP71">SP71</option>			
                                                                                                    <option value="SP72">SP72</option>			
                                                                                                    <option value="SPA">SPA</option>			
                                                                                                    <option value="SP-CS-01">SP-CS-01</option>			
                                                                                                    <option value="SPRAY 56MARRON">SPRAY 56MARRON</option>			
                                                                                                    <option value="SPRAY BLACK">SPRAY BLACK</option>			
                                                                                                    <option value="SPRAY RED">SPRAY RED</option>			
                                                                                                    <option value="SPRAY SELENE">SPRAY SELENE</option>			
                                                                                                    <option value="SRA">SRA</option>			
                                                                                                    <option value="SS-100">SS-100</option>			
                                                                                                    <option value="SS-5">SS-5</option>			
                                                                                                    <option value="SSP">SSP</option>			
                                                                                                    <option value="SSP ULTRA RED">SSP ULTRA RED</option>			
                                                                                                    <option value="ST">ST</option>			
                                                                                                    <option value="SUSUTAKE">SUSUTAKE</option>			
                                                                                                    <option value="SUYAKI-SERUBENN">SUYAKI-SERUBENN</option>			
                                                                                                    <option value="SW-220">SW-220</option>			
                                                                                                    <option value="SW-273">SW-273</option>			
                                                                                                    <option value="SW-2S">SW-2S</option>			
                                                                                                    <option value="SW-405">SW-405</option>			
                                                                                                    <option value="SW-6F">SW-6F</option>			
                                                                                                    <option value="SW-6G">SW-6G</option>			
                                                                                                    <option value="SZ">SZ</option>			
                                                                                                    <option value="TENSYOUBENGARA">TENSYOUBENGARA</option>			
                                                                                                    <option value="TG01">TG01</option>			
                                                                                                    <option value="TG-1">TG-1</option>			
                                                                                                    <option value="THOKA-AO">THOKA-AO</option>			
                                                                                                    <option value="TIO2">TIO2</option>			
                                                                                                    <option value="TITANIUM-1KYUU">TITANIUM-1KYUU</option>			
                                                                                                    <option value="TPF">TPF</option>			
                                                                                                    <option value="UV TOP">UV TOP</option>			
                                                                                                    <option value="UVTOP">UVTOP</option>			
                                                                                                    <option value="V2O5">V2O5</option>			
                                                                                                    <option value="VF">VF</option>			
                                                                                                    <option value="VF-19">VF-19</option>			
                                                                                                    <option value="VF1993">VF1993</option>			
                                                                                                    <option value="VF-46">VF-46</option>			
                                                                                                    <option value="VF-604">VF-604</option>			
                                                                                                    <option value="WN-89">WN-89</option>			
                                                                                                    <option value="WOG-10">WOG-10</option>			
                                                                                                    <option value="WP12">WP12</option>			
                                                                                                    <option value="WP55">WP55</option>			
                                                                                                    <option value="Y3001W">Y3001W</option>			
                                                                                                    <option value="Y3002W">Y3002W</option>			
                                                                                                    <option value="Y3003W">Y3003W</option>			
                                                                                                    <option value="Y3004W">Y3004W</option>			
                                                                                                    <option value="Y3005W">Y3005W</option>			
                                                                                                    <option value="YAMABUKI">YAMABUKI</option>			
                                                                                                    <option value="YR4060">YR4060</option>			
                                                                                                    <option value="YW500">YW500</option>			
                                                                                                    <option value="Z580">Z580</option>			
                                                                                                    <option value="Z8631">Z8631</option>			
                                                                                                    <option value="ZIRCON OXIDE">ZIRCON OXIDE</option>			
                                                                                                    <option value="ZVF">ZVF</option>			-->


                                                                                                </select> 

                                                                                            </td>

                                                                                            <td><input type="text" name='rows[xxx][qty_ct][]' id='rows[xxx][qty_ct][]' placeholder='Qty'   type="text"  class="form-control name" /></td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-danger pull-left delete_rowpm" >Delete </button>
                                                                                            </td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <td>

                                                                                                <select  class="form-control" name='rows[xxx][pigment_name_ct][]' id='rows[xxx][pigment_name_ct][]'>
                                                                                                   
                                                                                                    
                                                                                                        <?php
                                                                                                    $co->getPigmentList();
                                                                                                    ?>
<!--                                                                                                    <option value="114">114</option>			
                                                                                                    <option value="115">115</option>			
                                                                                                    <option value="117">117</option>			
                                                                                                    <option value="206">206</option>			
                                                                                                    <option value="211">211</option>			
                                                                                                    <option value="236">236</option>			
                                                                                                    <option value="257">257</option>			
                                                                                                    <option value="451">451</option>			
                                                                                                    <option value="504">504</option>			
                                                                                                    <option value="679">679</option>			
                                                                                                    <option value="790">790</option>			
                                                                                                    <option value="3212">3212</option>			
                                                                                                    <option value="3243">3243</option>			
                                                                                                    <option value="3333">3333</option>			
                                                                                                    <option value="3347">3347</option>			
                                                                                                    <option value="3408">3408</option>			
                                                                                                    <option value="3409">3409</option>			
                                                                                                    <option value="3450">3450</option>			
                                                                                                    <option value="3579">3579</option>			
                                                                                                    <option value="3629">3629</option>			
                                                                                                    <option value="3637">3637</option>			
                                                                                                    <option value="3642">3642</option>			
                                                                                                    <option value="3708">3708</option>			
                                                                                                    <option value="3716">3716</option>			
                                                                                                    <option value="3720">3720</option>			
                                                                                                    <option value="3723">3723</option>			
                                                                                                    <option value="4100">4100</option>			
                                                                                                    <option value="4527">4527</option>			
                                                                                                    <option value="4530">4530</option>			
                                                                                                    <option value="4531">4531</option>			
                                                                                                    <option value="4532">4532</option>			
                                                                                                    <option value="4536">4536</option>			
                                                                                                    <option value="4537">4537</option>			
                                                                                                    <option value="4551">4551</option>			
                                                                                                    <option value="4555">4555</option>			
                                                                                                    <option value="4560">4560</option>			
                                                                                                    <option value="4564">4564</option>			
                                                                                                    <option value="4568">4568</option>			
                                                                                                    <option value="4571">4571</option>			
                                                                                                    <option value="4574">4574</option>			
                                                                                                    <option value="4577">4577</option>			
                                                                                                    <option value="4581">4581</option>			
                                                                                                    <option value="4583">4583</option>			
                                                                                                    <option value="4591">4591</option>			
                                                                                                    <option value="4598">4598</option>			
                                                                                                    <option value="5506">5506</option>			
                                                                                                    <option value="5821">5821</option>			
                                                                                                    <option value="7632">7632</option>			
                                                                                                    <option value="7730">7730</option>			
                                                                                                    <option value="7901">7901</option>			
                                                                                                    <option value="8796">8796</option>			
                                                                                                    <option value="9041">9041</option>			
                                                                                                    <option value="11295">11295</option>			
                                                                                                    <option value="11400">11400</option>			
                                                                                                    <option value="11810">11810</option>			
                                                                                                    <option value="11870">11870</option>			
                                                                                                    <option value="11871">11871</option>			
                                                                                                    <option value="12312">12312</option>			
                                                                                                    <option value="12317">12317</option>			
                                                                                                    <option value="12322">12322</option>			
                                                                                                    <option value="12324">12324</option>			
                                                                                                    <option value="12326">12326</option>			
                                                                                                    <option value="12681">12681</option>			
                                                                                                    <option value="12810">12810</option>			
                                                                                                    <option value="12811">12811</option>			
                                                                                                    <option value="12812">12812</option>			
                                                                                                    <option value="12813">12813</option>			
                                                                                                    <option value="12814">12814</option>			
                                                                                                    <option value="12815">12815</option>			
                                                                                                    <option value="12872">12872</option>			
                                                                                                    <option value="12873">12873</option>			
                                                                                                    <option value="13133">13133</option>			
                                                                                                    <option value="13250">13250</option>			
                                                                                                    <option value="13548">13548</option>			
                                                                                                    <option value="13640">13640</option>			
                                                                                                    <option value="13810">13810</option>			
                                                                                                    <option value="13870">13870</option>			
                                                                                                    <option value="13873">13873</option>			
                                                                                                    <option value="14029">14029</option>			
                                                                                                    <option value="14117">14117</option>			
                                                                                                    <option value="14209">14209</option>			
                                                                                                    <option value="15034">15034</option>			
                                                                                                    <option value="15049">15049</option>			
                                                                                                    <option value="15084">15084</option>			
                                                                                                    <option value="15087">15087</option>			
                                                                                                    <option value="15089">15089</option>			
                                                                                                    <option value="16133">16133</option>			
                                                                                                    <option value="16144">16144</option>			
                                                                                                    <option value="16150">16150</option>			
                                                                                                    <option value="16871">16871</option>			
                                                                                                    <option value="16872">16872</option>			
                                                                                                    <option value="16873">16873</option>			
                                                                                                    <option value="17228">17228</option>			
                                                                                                    <option value="17499">17499</option>			
                                                                                                    <option value="17504">17504</option>			
                                                                                                    <option value="17811">17811</option>			
                                                                                                    <option value="17813">17813</option>			
                                                                                                    <option value="17814">17814</option>			
                                                                                                    <option value="17815">17815</option>			
                                                                                                    <option value="17871">17871</option>			
                                                                                                    <option value="17872">17872</option>			
                                                                                                    <option value="17873">17873</option>			
                                                                                                    <option value="17874">17874</option>			
                                                                                                    <option value="23264">23264</option>			
                                                                                                    <option value="26029">26029</option>			
                                                                                                    <option value="26200">26200</option>			
                                                                                                    <option value="35703">35703</option>			
                                                                                                    <option value="36210">36210</option>			
                                                                                                    <option value="37810">37810</option>			
                                                                                                    <option value="37812">37812</option>			
                                                                                                    <option value="37820">37820</option>			
                                                                                                    <option value="37821">37821</option>			
                                                                                                    <option value="37822">37822</option>			
                                                                                                    <option value="37831">37831</option>			
                                                                                                    <option value="37832">37832</option>			
                                                                                                    <option value="37840">37840</option>			
                                                                                                    <option value="37841">37841</option>			
                                                                                                    <option value="37842">37842</option>			
                                                                                                    <option value="37843">37843</option>			
                                                                                                    <option value="37844">37844</option>			
                                                                                                    <option value="37845">37845</option>			
                                                                                                    <option value="37850">37850</option>			
                                                                                                    <option value="37851">37851</option>			
                                                                                                    <option value="37852">37852</option>			
                                                                                                    <option value="37860">37860</option>			
                                                                                                    <option value="37861">37861</option>			
                                                                                                    <option value="37862">37862</option>			
                                                                                                    <option value="37871">37871</option>			
                                                                                                    <option value="37872">37872</option>			
                                                                                                    <option value="37873">37873</option>			
                                                                                                    <option value="37890">37890</option>			
                                                                                                    <option value="37891">37891</option>			
                                                                                                    <option value="37892">37892</option>			
                                                                                                    <option value="38001">38001</option>			
                                                                                                    <option value="38012">38012</option>			
                                                                                                    <option value="38032">38032</option>			
                                                                                                    <option value="38041">38041</option>			
                                                                                                    <option value="38042">38042</option>			
                                                                                                    <option value="38050">38050</option>			
                                                                                                    <option value="38051">38051</option>			
                                                                                                    <option value="38080">38080</option>			
                                                                                                    <option value="38090">38090</option>			
                                                                                                    <option value="55325">55325</option>			
                                                                                                    <option value="57810">57810</option>			
                                                                                                    <option value="57821">57821</option>			
                                                                                                    <option value="57840">57840</option>			
                                                                                                    <option value="57842">57842</option>			
                                                                                                    <option value="57850">57850</option>			
                                                                                                    <option value="57860">57860</option>			
                                                                                                    <option value="57861">57861</option>			
                                                                                                    <option value="57870">57870</option>			
                                                                                                    <option value="57880">57880</option>			
                                                                                                    <option value="57890">57890</option>			
                                                                                                    <option value="59000">59000</option>			
                                                                                                    <option value="59001">59001</option>			
                                                                                                    <option value="59002">59002</option>			
                                                                                                    <option value="59020">59020</option>			
                                                                                                    <option value="59021">59021</option>			
                                                                                                    <option value="59022">59022</option>			
                                                                                                    <option value="59030">59030</option>			
                                                                                                    <option value="59031">59031</option>			
                                                                                                    <option value="59051">59051</option>			
                                                                                                    <option value="59053">59053</option>			
                                                                                                    <option value="59054">59054</option>			
                                                                                                    <option value="59071">59071</option>			
                                                                                                    <option value="59072">59072</option>			
                                                                                                    <option value="59090">59090</option>			
                                                                                                    <option value="59091">59091</option>			
                                                                                                    <option value="59100">59100</option>			
                                                                                                    <option value="59101">59101</option>			
                                                                                                    <option value="59110">59110</option>			
                                                                                                    <option value="59111">59111</option>			
                                                                                                    <option value="59112">59112</option>			
                                                                                                    <option value="59113">59113</option>			
                                                                                                    <option value="59120">59120</option>			
                                                                                                    <option value="59121">59121</option>			
                                                                                                    <option value="59123">59123</option>			
                                                                                                    <option value="59130">59130</option>			
                                                                                                    <option value="59131">59131</option>			
                                                                                                    <option value="59132">59132</option>			
                                                                                                    <option value="59140">59140</option>			
                                                                                                    <option value="59141">59141</option>			
                                                                                                    <option value="59142">59142</option>			
                                                                                                    <option value="59143">59143</option>			
                                                                                                    <option value="59150">59150</option>			
                                                                                                    <option value="59151">59151</option>			
                                                                                                    <option value="59170">59170</option>			
                                                                                                    <option value="59190">59190</option>			
                                                                                                    <option value="59191">59191</option>			
                                                                                                    <option value="71812">71812</option>			
                                                                                                    <option value="74790">74790</option>			
                                                                                                    <option value="77100">77100</option>			
                                                                                                    <option value="77482">77482</option>			
                                                                                                    <option value="77500">77500</option>			
                                                                                                    <option value="77501">77501</option>			
                                                                                                    <option value="77503">77503</option>			
                                                                                                    <option value="77908">77908</option>			
                                                                                                    <option value="77918">77918</option>			
                                                                                                    <option value="78720">78720</option>			
                                                                                                    <option value="78811">78811</option>			
                                                                                                    <option value="80431">80431</option>			
                                                                                                    <option value="93100">93100</option>			
                                                                                                    <option value="97002">97002</option>			
                                                                                                    <option value="97110">97110</option>			
                                                                                                    <option value="97240">97240</option>			
                                                                                                    <option value="97260">97260</option>			
                                                                                                    <option value="97320">97320</option>			
                                                                                                    <option value="97321">97321</option>			
                                                                                                    <option value="97401">97401</option>			
                                                                                                    <option value="97420">97420</option>			
                                                                                                    <option value="97421">97421</option>			
                                                                                                    <option value="97440">97440</option>			
                                                                                                    <option value="97441">97441</option>			
                                                                                                    <option value="97501">97501</option>			
                                                                                                    <option value="97520">97520</option>			
                                                                                                    <option value="97561">97561</option>			
                                                                                                    <option value="97740">97740</option>			
                                                                                                    <option value="97820">97820</option>			
                                                                                                    <option value="97901">97901</option>			
                                                                                                    <option value="97920">97920</option>			
                                                                                                    <option value="97940">97940</option>			
                                                                                                    <option value="121515">121515</option>			
                                                                                                    <option value="121812">121812</option>			
                                                                                                    <option value="122500">122500</option>			
                                                                                                    <option value="131802">131802</option>			
                                                                                                    <option value="132505">132505</option>			
                                                                                                    <option value="151800">151800</option>			
                                                                                                    <option value="168715">168715</option>			
                                                                                                    <option value="171202">171202</option>			
                                                                                                    <option value="171651">171651</option>			
                                                                                                    <option value="171652">171652</option>			
                                                                                                    <option value="171658">171658</option>			
                                                                                                    <option value="171716">171716</option>			
                                                                                                    <option value="240400">240400</option>			
                                                                                                    <option value="722500">722500</option>			
                                                                                                    <option value="1355325">1355325</option>			
                                                                                                    <option value="1555009">1555009</option>			
                                                                                                    <option value="104F">104F</option>			
                                                                                                    <option value="1062BLUE">1062BLUE</option>			
                                                                                                    <option value="10KONN-B">10KONN-B</option>			
                                                                                                    <option value="11C-8">11C-8</option>			
                                                                                                    <option value="11C-8">11C-8</option>			
                                                                                                    <option value="11YELLOW S">11YELLOW S</option>			
                                                                                                    <option value="11YELLOW-S">11YELLOW-S</option>			
                                                                                                    <option value="126B">126B</option>			
                                                                                                    <option value="12YELLOW">12YELLOW</option>			
                                                                                                    <option value="13654D">13654D</option>			
                                                                                                    <option value="13K454">13K454</option>			
                                                                                                    <option value="13YELLOW">13YELLOW</option>			
                                                                                                    <option value="13YELLOW-S">13YELLOW-S</option>			
                                                                                                    <option value="14A">14A</option>			
                                                                                                    <option value="14B">14B</option>			
                                                                                                    <option value="152A CREAM">152A CREAM</option>			
                                                                                                    <option value="155B">155B</option>			
                                                                                                    <option value="16B">16B</option>			
                                                                                                    <option value="16BROWN">16BROWN</option>			
                                                                                                    <option value="16BROWN">16BROWN</option>			
                                                                                                    <option value="1716 FRIT">1716 FRIT</option>			
                                                                                                    <option value="175RAISED">175RAISED</option>			
                                                                                                    <option value="175RAISED">175RAISED</option>			
                                                                                                    <option value="19233D">19233D</option>			
                                                                                                    <option value="19233D">19233D</option>			
                                                                                                    <option value="1GOSU">1GOSU</option>			
                                                                                                    <option value="1GOSU">1GOSU</option>			
                                                                                                    <option value="1GOU BLUE">1GOU BLUE</option>			
                                                                                                    <option value="1GOU BLUE">1GOU BLUE</option>			
                                                                                                    <option value="201BLUE">201BLUE</option>			
                                                                                                    <option value="201BLUE">201BLUE</option>			
                                                                                                    <option value="211LAILUCK">211LAILUCK</option>			
                                                                                                    <option value="211LAILUCK">211LAILUCK</option>			
                                                                                                    <option value="22B">22B</option>			
                                                                                                    <option value="22B">22B</option>			
                                                                                                    <option value="22GRAY">22GRAY</option>			
                                                                                                    <option value="236LAILUCK">236LAILUCK</option>			
                                                                                                    <option value="236LAILUCK">236LAILUCK</option>			
                                                                                                    <option value="245SELENE">245SELENE</option>			
                                                                                                    <option value="24S/B.BLUE">24S/B.BLUE</option>			
                                                                                                    <option value="25KAI-HEKI">25KAI-HEKI</option>			
                                                                                                    <option value="285BLACK">285BLACK</option>			
                                                                                                    <option value="285BLACK">285BLACK</option>			
                                                                                                    <option value="288PINK">288PINK</option>			
                                                                                                    <option value="288PINK">288PINK</option>			
                                                                                                    <option value="29P">29P</option>			
                                                                                                    <option value="29P">29P</option>			
                                                                                                    <option value="2BF">2BF</option>			
                                                                                                    <option value="2BF">2BF</option>			
                                                                                                    <option value="2BRS">2BRS</option>			
                                                                                                    <option value="2BRS">2BRS</option>			
                                                                                                    <option value="30GRAY">30GRAY</option>			
                                                                                                    <option value="30GRAY">30GRAY</option>			
                                                                                                    <option value="32AZUKI">32AZUKI</option>			
                                                                                                    <option value="32AZUKI">32AZUKI</option>			
                                                                                                    <option value="32AZUKI-CYA">32AZUKI-CYA</option>			
                                                                                                    <option value="32AZUKI-CYA">32AZUKI-CYA</option>			
                                                                                                    <option value="32GRAY">32GRAY</option>			
                                                                                                    <option value="32GRAY">32GRAY</option>			
                                                                                                    <option value="335HIWA">335HIWA</option>			
                                                                                                    <option value="335HIWA">335HIWA</option>			
                                                                                                    <option value="33EN2982">33EN2982</option>			
                                                                                                    <option value="33EN2982">33EN2982</option>			
                                                                                                    <option value="357BROWN">357BROWN</option>			
                                                                                                    <option value="357BROWN">357BROWN</option>			
                                                                                                    <option value="3AF">3AF</option>			
                                                                                                    <option value="3AF">3AF</option>			
                                                                                                    <option value="3BRS">3BRS</option>			
                                                                                                    <option value="3BRS">3BRS</option>			
                                                                                                    <option value="40BLUE">40BLUE</option>			
                                                                                                    <option value="40BLUE">40BLUE</option>			
                                                                                                    <option value="41S/B.BLUE">41S/B.BLUE</option>			
                                                                                                    <option value="41S/B.BLUE">41S/B.BLUE</option>			
                                                                                                    <option value="43MAT WHITE">43MAT WHITE</option>			
                                                                                                    <option value="43MAT WHITE">43MAT WHITE</option>			
                                                                                                    <option value="451(60H)">451(60H)</option>			
                                                                                                    <option value="451THICK RAISDE">451THICK RAISDE</option>			
                                                                                                    <option value="451THICK RAISDE">451THICK RAISDE</option>			
                                                                                                    <option value="50A">50A</option>			
                                                                                                    <option value="50A">50A</option>			
                                                                                                    <option value="50D">50D</option>			
                                                                                                    <option value="50D">50D</option>			
                                                                                                    <option value="50K">50K</option>			
                                                                                                    <option value="50K">50K</option>			
                                                                                                    <option value="55EN2215">55EN2215</option>			
                                                                                                    <option value="55EN2215">55EN2215</option>			
                                                                                                    <option value="55EN2216">55EN2216</option>			
                                                                                                    <option value="55EN2216">55EN2216</option>			
                                                                                                    <option value="55EN2217">55EN2217</option>			
                                                                                                    <option value="55EN2217">55EN2217</option>			
                                                                                                    <option value="55EN2218">55EN2218</option>			
                                                                                                    <option value="55EN2218">55EN2218</option>			
                                                                                                    <option value="55EN2982">55EN2982</option>			
                                                                                                    <option value="55M">55M</option>			
                                                                                                    <option value="55M">55M</option>			
                                                                                                    <option value="55P">55P</option>			
                                                                                                    <option value="55P">55P</option>			
                                                                                                    <option value="56M">56M</option>			
                                                                                                    <option value="56M">56M</option>			
                                                                                                    <option value="5BRS">5BRS</option>			
                                                                                                    <option value="5BRS">5BRS</option>			
                                                                                                    <option value="60A">60A</option>			
                                                                                                    <option value="60A GRAY">60A GRAY</option>			
                                                                                                    <option value="60A GRAY">60A GRAY</option>			
                                                                                                    <option value="628PINK">628PINK</option>			
                                                                                                    <option value="650BLUE">650BLUE</option>			
                                                                                                    <option value="650BLUE">650BLUE</option>			
                                                                                                    <option value="67 W/R">67 W/R</option>			
                                                                                                    <option value="67 W/R">67 W/R</option>			
                                                                                                    <option value="67W/R">67W/R</option>			
                                                                                                    <option value="67W/R">67W/R</option>			
                                                                                                    <option value="67WHITE RAISED">67WHITE RAISED</option>			
                                                                                                    <option value="67WHITE RAISED">67WHITE RAISED</option>			
                                                                                                    <option value="6820R">6820R</option>			
                                                                                                    <option value="6820R">6820R</option>			
                                                                                                    <option value="6820RED">6820RED</option>			
                                                                                                    <option value="6820RED">6820RED</option>			
                                                                                                    <option value="68MAT BLACK">68MAT BLACK</option>			
                                                                                                    <option value="68MAT BLACK">68MAT BLACK</option>			
                                                                                                    <option value="690N">690N</option>			
                                                                                                    <option value="690N">690N</option>			
                                                                                                    <option value="69ENAMEL">69ENAMEL</option>			
                                                                                                    <option value="704F">704F</option>			
                                                                                                    <option value="704F">704F</option>			
                                                                                                    <option value="73T">73T</option>			
                                                                                                    <option value="73T">73T</option>			
                                                                                                    <option value="740BLUE">740BLUE</option>			
                                                                                                    <option value="740BLUE">740BLUE</option>			
                                                                                                    <option value="750F">750F</option>			
                                                                                                    <option value="750F">750F</option>			
                                                                                                    <option value="760BLUE">760BLUE</option>			
                                                                                                    <option value="760BLUE">760BLUE</option>			
                                                                                                    <option value="7730YELLOW">7730YELLOW</option>			
                                                                                                    <option value="7730YELLOW">7730YELLOW</option>			
                                                                                                    <option value="77EN1428">77EN1428</option>			
                                                                                                    <option value="77EN1428">77EN1428</option>			
                                                                                                    <option value="77EN1429">77EN1429</option>			
                                                                                                    <option value="77EN1429">77EN1429</option>			
                                                                                                    <option value="77EN1461">77EN1461</option>			
                                                                                                    <option value="77EN1461">77EN1461</option>			
                                                                                                    <option value="77EN1475">77EN1475</option>			
                                                                                                    <option value="77EN1475">77EN1475</option>			
                                                                                                    <option value="7890BLACK">7890BLACK</option>			
                                                                                                    <option value="7890BLACK">7890BLACK</option>			
                                                                                                    <option value="78WHITE RAISED">78WHITE RAISED</option>			
                                                                                                    <option value="78WHITE RAISED">78WHITE RAISED</option>			
                                                                                                    <option value="790NA">790NA</option>			
                                                                                                    <option value="790RURI">790RURI</option>			
                                                                                                    <option value="790RURI">790RURI</option>			
                                                                                                    <option value="79BLUE">79BLUE</option>			
                                                                                                    <option value="79BLUE">79BLUE</option>			
                                                                                                    <option value="88EN707">88EN707</option>			
                                                                                                    <option value="88EN707">88EN707</option>			
                                                                                                    <option value="88MAT">88MAT</option>			
                                                                                                    <option value="88MAT">88MAT</option>			
                                                                                                    <option value="88MAT G.BROWN">88MAT G.BROWN</option>			
                                                                                                    <option value="88MAT G.BROWN">88MAT G.BROWN</option>			
                                                                                                    <option value="89M">89M</option>			
                                                                                                    <option value="89M">89M</option>			
                                                                                                    <option value="89WHITE RAISED">89WHITE RAISED</option>			
                                                                                                    <option value="89WHITE RAISED">89WHITE RAISED</option>			
                                                                                                    <option value="8BRS">8BRS</option>			
                                                                                                    <option value="8BRS">8BRS</option>			
                                                                                                    <option value="8C">8C</option>			
                                                                                                    <option value="915BLACK">915BLACK</option>			
                                                                                                    <option value="915BLACK">915BLACK</option>			
                                                                                                    <option value="915SUJ">915SUJ</option>			
                                                                                                    <option value="915SUJI">915SUJI</option>			
                                                                                                    <option value="915SUJI">915SUJI</option>			
                                                                                                    <option value="9207-2">9207-2</option>			
                                                                                                    <option value="94E1001">94E1001</option>			
                                                                                                    <option value="94W3001">94W3001</option>			
                                                                                                    <option value="94W3002">94W3002</option>			
                                                                                                    <option value="94W3003">94W3003</option>			
                                                                                                    <option value="94W3004">94W3004</option>			
                                                                                                    <option value="94W3005">94W3005</option>			
                                                                                                    <option value="9BRS">9BRS</option>			
                                                                                                    <option value="A131">A131</option>			
                                                                                                    <option value="AC-5715P">AC-5715P</option>			
                                                                                                    <option value="AC-5750P">AC-5750P</option>			
                                                                                                    <option value="AC-5790P">AC-5790P</option>			
                                                                                                    <option value="ACF">ACF</option>			
                                                                                                    <option value="AC-NO.7P">AC-NO.7P</option>			
                                                                                                    <option value="AFG">AFG</option>			
                                                                                                    <option value="AFG-2">AFG-2</option>			
                                                                                                    <option value="ALUMINA">ALUMINA</option>			
                                                                                                    <option value="ART">ART</option>			
                                                                                                    <option value="B/S 915 BLACK">B/S 915 BLACK</option>			
                                                                                                    <option value="B1002">B1002</option>			
                                                                                                    <option value="B1003">B1003</option>			
                                                                                                    <option value="B1007">B1007</option>			
                                                                                                    <option value="B1120">B1120</option>			
                                                                                                    <option value="B1122">B1122</option>			
                                                                                                    <option value="B1130">B1130</option>			
                                                                                                    <option value="B1140">B1140</option>			
                                                                                                    <option value="B1202">B1202</option>			
                                                                                                    <option value="B1221">B1221</option>			
                                                                                                    <option value="B1240">B1240</option>			
                                                                                                    <option value="B1261">B1261</option>			
                                                                                                    <option value="B1262">B1262</option>			
                                                                                                    <option value="B1263">B1263</option>			
                                                                                                    <option value="B1320">B1320</option>			
                                                                                                    <option value="B1321">B1321</option>			
                                                                                                    <option value="B1330">B1330</option>			
                                                                                                    <option value="B1348">B1348</option>			
                                                                                                    <option value="B1384">B1384</option>			
                                                                                                    <option value="B1401">B1401</option>			
                                                                                                    <option value="B1420">B1420</option>			
                                                                                                    <option value="B1421">B1421</option>			
                                                                                                    <option value="B1440">B1440</option>			
                                                                                                    <option value="B1441">B1441</option>			
                                                                                                    <option value="B1442">B1442</option>			
                                                                                                    <option value="B1520">B1520</option>			
                                                                                                    <option value="B1530">B1530</option>			
                                                                                                    <option value="B1540">B1540</option>			
                                                                                                    <option value="B1541">B1541</option>			
                                                                                                    <option value="B1561">B1561</option>			
                                                                                                    <option value="B1562">B1562</option>			
                                                                                                    <option value="B1700">B1700</option>			
                                                                                                    <option value="B1701">B1701</option>			
                                                                                                    <option value="B1720">B1720</option>			
                                                                                                    <option value="B1721">B1721</option>			
                                                                                                    <option value="B1741">B1741</option>			
                                                                                                    <option value="B1800">B1800</option>			
                                                                                                    <option value="B1821">B1821</option>			
                                                                                                    <option value="B1901">B1901</option>			
                                                                                                    <option value="B1920">B1920</option>			
                                                                                                    <option value="B1941">B1941</option>			
                                                                                                    <option value="B2210">B2210</option>			
                                                                                                    <option value="B2211">B2211</option>			
                                                                                                    <option value="B2701">B2701</option>			
                                                                                                    <option value="BE-170">BE-170</option>			
                                                                                                    <option value="BF-170">BF-170</option>			
                                                                                                    <option value="BISMUTH OXIDE">BISMUTH OXIDE</option>			
                                                                                                    <option value="BUTYL LACTATE">BUTYL LACTATE</option>			
                                                                                                    <option value="BUTYLE LACTATE">BUTYLE LACTATE</option>			
                                                                                                    <option value="BW-22">BW-22</option>			
                                                                                                    <option value="C0O">C0O</option>			
                                                                                                    <option value="C36">C36</option>			
                                                                                                    <option value="C45">C45</option>			
                                                                                                    <option value="CA304T">CA304T</option>			
                                                                                                    <option value="CB">CB</option>			
                                                                                                    <option value="CF">CF</option>			
                                                                                                    <option value="CG">CG</option>			
                                                                                                    <option value="CHROMIUM OXIDE">CHROMIUM OXIDE</option>			
                                                                                                    <option value="CM-2">CM-2</option>			
                                                                                                    <option value="CO36">CO36</option>			
                                                                                                    <option value="CO45">CO45</option>			
                                                                                                    <option value="COBALT OXIDE">COBALT OXIDE</option>			
                                                                                                    <option value="COO">COO</option>			
                                                                                                    <option value="CR2O3">CR2O3</option>			
                                                                                                    <option value="CT-10">CT-10</option>			
                                                                                                    <option value="CT-30">CT-30</option>			
                                                                                                    <option value="CU2S">CU2S</option>			
                                                                                                    <option value="CUO">CUO</option>			
                                                                                                    <option value="CUS">CUS</option>			
                                                                                                    <option value="CY-9">CY-9</option>			
                                                                                                    <option value="D112">D112</option>			
                                                                                                    <option value="D112A">D112A</option>			
                                                                                                    <option value="D115">D115</option>			
                                                                                                    <option value="D116">D116</option>			
                                                                                                    <option value="D117">D117</option>			
                                                                                                    <option value="D-7">D-7</option>			
                                                                                                    <option value="D-8">D-8</option>			
                                                                                                    <option value="DS">DS</option>			
                                                                                                    <option value="DT-10">DT-10</option>			
                                                                                                    <option value="DT-5">DT-5</option>			
                                                                                                    <option value="F12">F12</option>			
                                                                                                    <option value="F2A">F2A</option>			
                                                                                                    <option value="F67">F67</option>			
                                                                                                    <option value="F67WHITE RAISED">F67WHITE RAISED</option>			
                                                                                                    <option value="FA5-4000">FA5-4000</option>			
                                                                                                    <option value="FE2O3">FE2O3</option>			
                                                                                                    <option value="FNO1">FNO1</option>			
                                                                                                    <option value="FNO5">FNO5</option>			
                                                                                                    <option value="FNO7">FNO7</option>			
                                                                                                    <option value="FNR-8">FNR-8</option>			
                                                                                                    <option value="FURORENN-AC">FURORENN-AC</option>			
                                                                                                    <option value="GB-5">GB-5</option>			
                                                                                                    <option value="GF1001">GF1001</option>			
                                                                                                    <option value="GF1002">GF1002</option>			
                                                                                                    <option value="GF2001">GF2001</option>			
                                                                                                    <option value="GF-3">GF-3</option>			
                                                                                                    <option value="GF4004">GF4004</option>			
                                                                                                    <option value="GF4006">GF4006</option>			
                                                                                                    <option value="GF505">GF505</option>			
                                                                                                    <option value="GF-505">GF-505</option>			
                                                                                                    <option value="GF6001">GF6001</option>			
                                                                                                    <option value="GF70">GF70</option>			
                                                                                                    <option value="GG5566">GG5566</option>			
                                                                                                    <option value="GGP1215">GGP1215</option>			
                                                                                                    <option value="GGP2335">GGP2335</option>			
                                                                                                    <option value="GGP2531">GGP2531</option>			
                                                                                                    <option value="GGP2544">GGP2544</option>			
                                                                                                    <option value="GGP4319">GGP4319</option>			
                                                                                                    <option value="GMC-32">GMC-32</option>			
                                                                                                    <option value="GOLD BROWN">GOLD BROWN</option>			
                                                                                                    <option value="GPP1240">GPP1240</option>			
                                                                                                    <option value="GPP3020D">GPP3020D</option>			
                                                                                                    <option value="GPP4319">GPP4319</option>			
                                                                                                    <option value="GPP4516">GPP4516</option>			
                                                                                                    <option value="GPP-4520">GPP-4520</option>			
                                                                                                    <option value="GPP4522">GPP4522</option>			
                                                                                                    <option value="GPP4601">GPP4601</option>			
                                                                                                    <option value="GPP-4601">GPP-4601</option>			
                                                                                                    <option value="GRY1">GRY1</option>			
                                                                                                    <option value="GT-1">GT-1</option>			
                                                                                                    <option value="H2SNO3">H2SNO3</option>			
                                                                                                    <option value="H55009">H55009</option>			
                                                                                                    <option value="H55010">H55010</option>			
                                                                                                    <option value="H55033">H55033</option>			
                                                                                                    <option value="H55325">H55325</option>			
                                                                                                    <option value="H56055">H56055</option>			
                                                                                                    <option value="H-6">H-6</option>			
                                                                                                    <option value="H64014">H64014</option>			
                                                                                                    <option value="H64115">H64115</option>			
                                                                                                    <option value="H64124">H64124</option>			
                                                                                                    <option value="H64225">H64225</option>			
                                                                                                    <option value="H64228">H64228</option>			
                                                                                                    <option value="H64324">H64324</option>			
                                                                                                    <option value="H64604">H64604</option>			
                                                                                                    <option value="H64675">H64675</option>			
                                                                                                    <option value="H64776">H64776</option>			
                                                                                                    <option value="H64778">H64778</option>			
                                                                                                    <option value="H64804">H64804</option>			
                                                                                                    <option value="H64885">H64885</option>			
                                                                                                    <option value="H64888">H64888</option>			
                                                                                                    <option value="HONN-KURO">HONN-KURO</option>			
                                                                                                    <option value="HPP4319">HPP4319</option>			
                                                                                                    <option value="IRON OXIDE">IRON OXIDE</option>			
                                                                                                    <option value="K731">K731</option>			
                                                                                                    <option value="KDM">KDM</option>			
                                                                                                    <option value="KDN">KDN</option>			
                                                                                                    <option value="KEMIKARU-INK-C1">KEMIKARU-INK-C1</option>			
                                                                                                    <option value="KOMONN ORENGE">KOMONN ORENGE</option>			
                                                                                                    <option value="L115">L115</option>			
                                                                                                    <option value="L116">L116</option>			
                                                                                                    <option value="L117">L117</option>			
                                                                                                    <option value="L13YELLOW">L13YELLOW</option>			
                                                                                                    <option value="L406">L406</option>			
                                                                                                    <option value="L7529">L7529</option>			
                                                                                                    <option value="LEF140">LEF140</option>			
                                                                                                    <option value="LEF144">LEF144</option>			
                                                                                                    <option value="LO-541S">LO-541S</option>			
                                                                                                    <option value="LO-556">LO-556</option>			
                                                                                                    <option value="LO566">LO566</option>			
                                                                                                    <option value="LT-7">LT-7</option>			
                                                                                                    <option value="LT-8">LT-8</option>			
                                                                                                    <option value="LU1580">LU1580</option>			
                                                                                                    <option value="LU1580D">LU1580D</option>			
                                                                                                    <option value="M6000">M6000</option>			
                                                                                                    <option value="M800">M800</option>			
                                                                                                    <option value="M81">M81</option>			
                                                                                                    <option value="M8631">M8631</option>			
                                                                                                    <option value="MANDARIN YELLOW">MANDARIN YELLOW</option>			
                                                                                                    <option value="MANGANE.DIOXIDE">MANGANE.DIOXIDE</option>			
                                                                                                    <option value="MAT W/RAISED">MAT W/RAISED</option>			
                                                                                                    <option value="MAT-H-WHITE R.">MAT-H-WHITE R.</option>			
                                                                                                    <option value="MELAMINE RED">MELAMINE RED</option>			
                                                                                                    <option value="MERAMINE-BLUE">MERAMINE-BLUE</option>			
                                                                                                    <option value="MF">MF</option>			
                                                                                                    <option value="MNO2">MNO2</option>			
                                                                                                    <option value="MO-3100">MO-3100</option>			
                                                                                                    <option value="MO-3200">MO-3200</option>			
                                                                                                    <option value="MO-3201">MO-3201</option>			
                                                                                                    <option value="MO-3220">MO-3220</option>			
                                                                                                    <option value="MO-3221">MO-3221</option>			
                                                                                                    <option value="MO-3240">MO-3240</option>			
                                                                                                    <option value="MO-3241">MO-3241</option>			
                                                                                                    <option value="MO-3260">MO-3260</option>			
                                                                                                    <option value="MO-3261">MO-3261</option>			
                                                                                                    <option value="MO-3270">MO-3270</option>			
                                                                                                    <option value="MO-3320">MO-3320</option>			
                                                                                                    <option value="MO-3401">MO-3401</option>			
                                                                                                    <option value="MO-3420">MO-3420</option>			
                                                                                                    <option value="MO-3421">MO-3421</option>			
                                                                                                    <option value="MO-3440">MO-3440</option>			
                                                                                                    <option value="MO-3441">MO-3441</option>			
                                                                                                    <option value="MO-3501">MO-3501</option>			
                                                                                                    <option value="MO-3520">MO-3520</option>			
                                                                                                    <option value="MO-3521">MO-3521</option>			
                                                                                                    <option value="MO-3523">MO-3523</option>			
                                                                                                    <option value="MO-3561">MO-3561</option>			
                                                                                                    <option value="MO-3700">MO-3700</option>			
                                                                                                    <option value="MO-3701">MO-3701</option>			
                                                                                                    <option value="MO-3720">MO-3720</option>			
                                                                                                    <option value="MO-3820">MO-3820</option>			
                                                                                                    <option value="MO-3900">MO-3900</option>			
                                                                                                    <option value="MO-3901">MO-3901</option>			
                                                                                                    <option value="MO-3920">MO-3920</option>			
                                                                                                    <option value="MO-3940">MO-3940</option>			
                                                                                                    <option value="MR-1">MR-1</option>			
                                                                                                    <option value="MR-3">MR-3</option>			
                                                                                                    <option value="MRC">MRC</option>			
                                                                                                    <option value="MSNO">MSNO</option>			
                                                                                                    <option value="MUEN-F">MUEN-F</option>			
                                                                                                    <option value="MV-20">MV-20</option>			
                                                                                                    <option value="MVG">MVG</option>			
                                                                                                    <option value="MV-R">MV-R</option>			
                                                                                                    <option value="N8393">N8393</option>			
                                                                                                    <option value="N8463">N8463</option>			
                                                                                                    <option value="N8583">N8583</option>			
                                                                                                    <option value="NC-5">NC-5</option>			
                                                                                                    <option value="NIC">NIC</option>			
                                                                                                    <option value="NICHIRINBENGARA">NICHIRINBENGARA</option>			
                                                                                                    <option value="NICKEL CARBO.">NICKEL CARBO.</option>			
                                                                                                    <option value="NISSHIN FLOUR">NISSHIN FLOUR</option>			
                                                                                                    <option value="NM3">NM3</option>			
                                                                                                    <option value="NM4">NM4</option>			
                                                                                                    <option value="NM5">NM5</option>			
                                                                                                    <option value="NO PRINT">NO PRINT</option>			
                                                                                                    <option value="NO.10GLAZE">NO.10GLAZE</option>			
                                                                                                    <option value="NO.1PINK">NO.1PINK</option>			
                                                                                                    <option value="NO.2F">NO.2F</option>			
                                                                                                    <option value="NO1 PINK">NO1 PINK</option>			
                                                                                                    <option value="NO-1BLUE">NO-1BLUE</option>			
                                                                                                    <option value="NO2F">NO2F</option>			
                                                                                                    <option value="NP-4860">NP-4860</option>			
                                                                                                    <option value="NR-4">NR-4</option>			
                                                                                                    <option value="NR-6 G.U.RAISED">NR-6 G.U.RAISED</option>			
                                                                                                    <option value="NR-6 KUSURI">NR-6 KUSURI</option>			
                                                                                                    <option value="NR-9">NR-9</option>			
                                                                                                    <option value="NRG-3807">NRG-3807</option>			
                                                                                                    <option value="NRV-1">NRV-1</option>			
                                                                                                    <option value="NSM-6000B">NSM-6000B</option>			
                                                                                                    <option value="OIL BLUE">OIL BLUE</option>			
                                                                                                    <option value="OIL RED">OIL RED</option>			
                                                                                                    <option value="OLD ROSE">OLD ROSE</option>			
                                                                                                    <option value="OOKURA GLAZE">OOKURA GLAZE</option>			
                                                                                                    <option value="OR">OR</option>			
                                                                                                    <option value="OY">OY</option>			
                                                                                                    <option value="P5520">P5520</option>			
                                                                                                    <option value="PDM-5BY">PDM-5BY</option>			
                                                                                                    <option value="PN5422">PN5422</option>			
                                                                                                    <option value="PN5520">PN5520</option>			
                                                                                                    <option value="QUARTZ">QUARTZ</option>			
                                                                                                    <option value="R-1">R-1</option>			
                                                                                                    <option value="R1221">R1221</option>			
                                                                                                    <option value="R1520">R1520</option>			
                                                                                                    <option value="R-2">R-2</option>			
                                                                                                    <option value="R2001">R2001</option>			
                                                                                                    <option value="R2120">R2120</option>			
                                                                                                    <option value="R2260">R2260</option>			
                                                                                                    <option value="R2320">R2320</option>			
                                                                                                    <option value="R2321">R2321</option>			
                                                                                                    <option value="R2401">R2401</option>			
                                                                                                    <option value="R2420">R2420</option>			
                                                                                                    <option value="R2421">R2421</option>			
                                                                                                    <option value="R2440">R2440</option>			
                                                                                                    <option value="R2441">R2441</option>			
                                                                                                    <option value="R2501">R2501</option>			
                                                                                                    <option value="R2520">R2520</option>			
                                                                                                    <option value="R2540">R2540</option>			
                                                                                                    <option value="R2541">R2541</option>			
                                                                                                    <option value="R2561">R2561</option>			
                                                                                                    <option value="R2701">R2701</option>			
                                                                                                    <option value="R2720">R2720</option>			
                                                                                                    <option value="R2740">R2740</option>			
                                                                                                    <option value="R2820">R2820</option>			
                                                                                                    <option value="R2901">R2901</option>			
                                                                                                    <option value="R2920">R2920</option>			
                                                                                                    <option value="R2940">R2940</option>			
                                                                                                    <option value="R-3">R-3</option>			
                                                                                                    <option value="R3001">R3001</option>			
                                                                                                    <option value="R3101">R3101</option>			
                                                                                                    <option value="R3110">R3110</option>			
                                                                                                    <option value="R3120">R3120</option>			
                                                                                                    <option value="R3130">R3130</option>			
                                                                                                    <option value="R3140">R3140</option>			
                                                                                                    <option value="R3180">R3180</option>			
                                                                                                    <option value="R3190">R3190</option>			
                                                                                                    <option value="R3200">R3200</option>			
                                                                                                    <option value="R3220">R3220</option>			
                                                                                                    <option value="R3221">R3221</option>			
                                                                                                    <option value="R3240">R3240</option>			
                                                                                                    <option value="R3260">R3260</option>			
                                                                                                    <option value="R3261">R3261</option>			
                                                                                                    <option value="R3320">R3320</option>			
                                                                                                    <option value="R3321">R3321</option>			
                                                                                                    <option value="R3330">R3330</option>			
                                                                                                    <option value="R3380">R3380</option>			
                                                                                                    <option value="R3401">R3401</option>			
                                                                                                    <option value="R3420">R3420</option>			
                                                                                                    <option value="R3421">R3421</option>			
                                                                                                    <option value="R3440">R3440</option>			
                                                                                                    <option value="R3442">R3442</option>			
                                                                                                    <option value="R3501">R3501</option>			
                                                                                                    <option value="R3521">R3521</option>			
                                                                                                    <option value="R3540">R3540</option>			
                                                                                                    <option value="R3541">R3541</option>			
                                                                                                    <option value="R3561">R3561</option>			
                                                                                                    <option value="R3562">R3562</option>			
                                                                                                    <option value="R3701">R3701</option>			
                                                                                                    <option value="R3703">R3703</option>			
                                                                                                    <option value="R3720">R3720</option>			
                                                                                                    <option value="R3740">R3740</option>			
                                                                                                    <option value="R3800">R3800</option>			
                                                                                                    <option value="R3820">R3820</option>			
                                                                                                    <option value="R3901">R3901</option>			
                                                                                                    <option value="R3902">R3902</option>			
                                                                                                    <option value="R3903">R3903</option>			
                                                                                                    <option value="R3920">R3920</option>			
                                                                                                    <option value="R3940">R3940</option>			
                                                                                                    <option value="RETARDER">RETARDER</option>			
                                                                                                    <option value="RG">RG</option>			
                                                                                                    <option value="RHODAMINE">RHODAMINE</option>			
                                                                                                    <option value="RODAMINE">RODAMINE</option>			
                                                                                                    <option value="RSG-7911">RSG-7911</option>			
                                                                                                    <option value="S10-60">S10-60</option>			
                                                                                                    <option value="SA32">SA32</option>			
                                                                                                    <option value="SB-103">SB-103</option>			
                                                                                                    <option value="SB-66">SB-66</option>			
                                                                                                    <option value="SBM-13">SBM-13</option>			
                                                                                                    <option value="SBM-20">SBM-20</option>			
                                                                                                    <option value="SBN">SBN</option>			
                                                                                                    <option value="SBU-T">SBU-T</option>			
                                                                                                    <option value="SBU-TB">SBU-TB</option>			
                                                                                                    <option value="SERUBENN">SERUBENN</option>			
                                                                                                    <option value="SF-2">SF-2</option>			
                                                                                                    <option value="SG">SG</option>			
                                                                                                    <option value="SG-1000P">SG-1000P</option>			
                                                                                                    <option value="SG-1100">SG-1100</option>			
                                                                                                    <option value="SG-11G">SG-11G</option>			
                                                                                                    <option value="SG-2200B">SG-2200B</option>			
                                                                                                    <option value="SG22B">SG22B</option>			
                                                                                                    <option value="SG-3101N">SG-3101N</option>			
                                                                                                    <option value="SG-5601R">SG-5601R</option>			
                                                                                                    <option value="SG-5703R">SG-5703R</option>			
                                                                                                    <option value="SG-5801R">SG-5801R</option>			
                                                                                                    <option value="SG-5802R">SG-5802R</option>			
                                                                                                    <option value="SG-6701A">SG-6701A</option>			
                                                                                                    <option value="SG-6701C">SG-6701C</option>			
                                                                                                    <option value="SG-6701F">SG-6701F</option>			
                                                                                                    <option value="SG-6701G">SG-6701G</option>			
                                                                                                    <option value="SG-6703C">SG-6703C</option>			
                                                                                                    <option value="SG-7102G">SG-7102G</option>			
                                                                                                    <option value="SG-7107L">SG-7107L</option>			
                                                                                                    <option value="SG-7400K">SG-7400K</option>			
                                                                                                    <option value="SG7400M">SG7400M</option>			
                                                                                                    <option value="SG-7400M">SG-7400M</option>			
                                                                                                    <option value="SG-7400S">SG-7400S</option>			
                                                                                                    <option value="SG7800">SG7800</option>			
                                                                                                    <option value="SG7800M">SG7800M</option>			
                                                                                                    <option value="SG-7800M">SG-7800M</option>			
                                                                                                    <option value="SG-7800S">SG-7800S</option>			
                                                                                                    <option value="SG-7804R">SG-7804R</option>			
                                                                                                    <option value="SG-8600">SG-8600</option>			
                                                                                                    <option value="SG-NF">SG-NF</option>			
                                                                                                    <option value="SH-202">SH-202</option>			
                                                                                                    <option value="SHINNTA-SHIRO">SHINNTA-SHIRO</option>			
                                                                                                    <option value="SM-3010A">SM-3010A</option>			
                                                                                                    <option value="SM-302">SM-302</option>			
                                                                                                    <option value="SM4030B">SM4030B</option>			
                                                                                                    <option value="SM6100">SM6100</option>			
                                                                                                    <option value="SM-6100">SM-6100</option>			
                                                                                                    <option value="SM8030B">SM8030B</option>			
                                                                                                    <option value="SM-8030B">SM-8030B</option>			
                                                                                                    <option value="SM-8100">SM-8100</option>			
                                                                                                    <option value="SN-11">SN-11</option>			
                                                                                                    <option value="SN-4S">SN-4S</option>			
                                                                                                    <option value="SOLVENT150">SOLVENT150</option>			
                                                                                                    <option value="SOLVESSO150">SOLVESSO150</option>			
                                                                                                    <option value="SP71">SP71</option>			
                                                                                                    <option value="SP72">SP72</option>			
                                                                                                    <option value="SPA">SPA</option>			
                                                                                                    <option value="SP-CS-01">SP-CS-01</option>			
                                                                                                    <option value="SPRAY 56MARRON">SPRAY 56MARRON</option>			
                                                                                                    <option value="SPRAY BLACK">SPRAY BLACK</option>			
                                                                                                    <option value="SPRAY RED">SPRAY RED</option>			
                                                                                                    <option value="SPRAY SELENE">SPRAY SELENE</option>			
                                                                                                    <option value="SRA">SRA</option>			
                                                                                                    <option value="SS-100">SS-100</option>			
                                                                                                    <option value="SS-5">SS-5</option>			
                                                                                                    <option value="SSP">SSP</option>			
                                                                                                    <option value="SSP ULTRA RED">SSP ULTRA RED</option>			
                                                                                                    <option value="ST">ST</option>			
                                                                                                    <option value="SUSUTAKE">SUSUTAKE</option>			
                                                                                                    <option value="SUYAKI-SERUBENN">SUYAKI-SERUBENN</option>			
                                                                                                    <option value="SW-220">SW-220</option>			
                                                                                                    <option value="SW-273">SW-273</option>			
                                                                                                    <option value="SW-2S">SW-2S</option>			
                                                                                                    <option value="SW-405">SW-405</option>			
                                                                                                    <option value="SW-6F">SW-6F</option>			
                                                                                                    <option value="SW-6G">SW-6G</option>			
                                                                                                    <option value="SZ">SZ</option>			
                                                                                                    <option value="TENSYOUBENGARA">TENSYOUBENGARA</option>			
                                                                                                    <option value="TG01">TG01</option>			
                                                                                                    <option value="TG-1">TG-1</option>			
                                                                                                    <option value="THOKA-AO">THOKA-AO</option>			
                                                                                                    <option value="TIO2">TIO2</option>			
                                                                                                    <option value="TITANIUM-1KYUU">TITANIUM-1KYUU</option>			
                                                                                                    <option value="TPF">TPF</option>			
                                                                                                    <option value="UV TOP">UV TOP</option>			
                                                                                                    <option value="UVTOP">UVTOP</option>			
                                                                                                    <option value="V2O5">V2O5</option>			
                                                                                                    <option value="VF">VF</option>			
                                                                                                    <option value="VF-19">VF-19</option>			
                                                                                                    <option value="VF1993">VF1993</option>			
                                                                                                    <option value="VF-46">VF-46</option>			
                                                                                                    <option value="VF-604">VF-604</option>			
                                                                                                    <option value="WN-89">WN-89</option>			
                                                                                                    <option value="WOG-10">WOG-10</option>			
                                                                                                    <option value="WP12">WP12</option>			
                                                                                                    <option value="WP55">WP55</option>			
                                                                                                    <option value="Y3001W">Y3001W</option>			
                                                                                                    <option value="Y3002W">Y3002W</option>			
                                                                                                    <option value="Y3003W">Y3003W</option>			
                                                                                                    <option value="Y3004W">Y3004W</option>			
                                                                                                    <option value="Y3005W">Y3005W</option>			
                                                                                                    <option value="YAMABUKI">YAMABUKI</option>			
                                                                                                    <option value="YR4060">YR4060</option>			
                                                                                                    <option value="YW500">YW500</option>			
                                                                                                    <option value="Z580">Z580</option>			
                                                                                                    <option value="Z8631">Z8631</option>			
                                                                                                    <option value="ZIRCON OXIDE">ZIRCON OXIDE</option>			
                                                                                                    <option value="ZVF">ZVF</option>			-->


                                                                                                </select> 





                                                                                            </td>

                                                                                            <td><input type="text" name='rows[xxx][qty_ct][]' id='rows[xxx][qty_ct][]'  placeholder='Qty'   type="text"  class="form-control name" /></td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-danger pull-left delete_rowpm" >Delete  </button>
                                                                                            </td>

                                                                                        </tr>







                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row clearfix">
                                                                            <div class="col-md-12">
                                                                                <button type="button" class="btn btn-info pull-left add_rowpm">Add Colours Row </button>

                                                                            </div>
                                                                        </div>

                                                                    </div>




                                                                    <div class="form-group form-group-sm tab_logicpo">

                                                                        <div class="row clearfix">
                                                                            <div class="col-md-12">
                                                                                <table class="table table-bordered table-hover tab_logicpo">
                                                                                    <thead>
                                                                                        <tr>                            

                                                                                            <th class="text-center" width="20%"> Oil Name </th>
                                                                                            <th class="text-center" width="15%">Qty</th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr class='addrpo0' style="display:none;">

                                                                                            <td>
                                                                                                
                                                                                                  <select  class="form-control" name='rows[xxx][oil_name_odt][]' id='rows[xxx][oil_name_odt][]'>
                                                                                                        <?php
                                                                                                    $od->getOillList();
                                                                                                    ?>
                                                                                                  </select>

                                                                                            </td>

                                                                                            <td>
                                                                                                <input type="text" name='rows[xxx][oil_qty_odt][]' id='rows[xxx][oil_qty_odt][]' placeholder='Qty'   type="text"  class="form-control name" />
                                                                                            </td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-danger pull-left delete_rowpo" >Delete </button>
                                                                                            </td>

                                                                                        </tr>

                                                                                        <tr>

                                                                                            <td>
                                                                                                <select  class="form-control" name='rows[xxx][oil_name_odt][]' id='rows[xxx][oil_name_odt][]'>
                                                                                                        <?php
                                                                                                    $od->getOillList();
                                                                                                    ?>
                                                                                                  </select>


                                                                                            </td>

                                                                                            <td>
                                                                                                <input type="text" name='rows[xxx][oil_qty_odt][]' id='rows[xxx][oil_qty_odt][]' placeholder='Qty'   type="text"  class="form-control name" />
                                                                                            </td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-danger pull-left delete_rowpo" >Delete </button>
                                                                                            </td>

                                                                                        </tr>







                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row clearfix">
                                                                            <div class="col-md-12">
                                                                                <button type="button" class="btn btn-info pull-left add_rowpo">Add Oil Row   </button>

                                                                            </div>
                                                                        </div>

                                                                    </div> 

                                                                </td> 
                                                                <td>
                                                                    <button type="button" class="btn btn-danger pull-left delete_rowpm" >Delete  </button>
                                                                </td>



                                                            </tr>




                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <button  type="button" class="btn btn-primary pull-left add_row">Add Main Row </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>




  <?php }?>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
<!--                                                        <button type="button" class="btn purple" 
                                                                onClick="setNameRows();  return submit_main();"

                                                                > <i class="fa fa-check"></i> Save </button>-->
                                                                
                                                                
                                                                <?php
                                                        if ($_GET['ID']) {
                                                            ?>
                                                            <button type="button" class="btn purple" onClick="return submit_main();" > <i class="fa fa-check"></i> save changes </button>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn purple"    onClick="setNameRows();  return submit_main();" > <i class="fa fa-check"></i> Save </button>

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
    <script src="../ajax_post/colours_master_post.js"></script>   
    <script src='../script/jquery-3.0.0.js' type='text/javascript'></script>
<link href='../select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='../select2/dist/js/select2.min.js'></script>
<script src="../ajax_post/get_pigment_master.js"></script>


    <script>

                                                            $(document).ready(function () {
                                                   
                                                                
                                                                let deleteAdjacentTr = function () {
                                                                    $(this).closest('tr').remove();
                                                                    console.log($(this).closest('tr'));
                                                                };
                                                                let innerBtnAction = function () {

                                                                    let newInner = $('.addrpm0').clone();
                                                                    $(newInner).css('display', '');
                                                                    $(newInner).removeClass('addrpm0');
                                                                    $(this).closest('.tab_logicpm').find('table').first().append(newInner);
                                                                    $(".delete_rowpm").unbind('click');
                                                                    $('.delete_rowpm').on('click', deleteAdjacentTr);
                                                                };
                                                                let innerBtnActionpo = function () {

                                                                    let newInner = $('.addrpo0').clone();
                                                                    $(newInner).css('display', '');
                                                                    $(newInner).removeClass('addrpo0');
                                                                    $(this).closest('.tab_logicpo').find('table').first().append(newInner);
                                                                    $(".delete_rowpo").unbind('click');
                                                                    $('.delete_rowpo').on('click', deleteAdjacentTr);
                                                                };
                                                                $('.delete_rowpm').on('click', deleteAdjacentTr);
                                                                $('.add_rowpm').on('click', innerBtnAction);
                                                                $('.add_rowpo').on('click', innerBtnActionpo);
                                                                $('.add_row').on('click', function () {
                                                                    let newMain = $('.addr0').clone();
                                                                    $(newMain).css('display', '');
                                                                    $(newMain).removeClass('addr0').addClass('row-pp');
                                                                    $(newMain).find('.addrpm0').remove();
                                                                    $(newMain).find('.addrpo0').remove();
                                                                    $(this).closest('.tab_logic').find('table').first().append(newMain);
                                                                    $(".add_rowpm").unbind('click');
                                                                    $('.add_rowpm').on('click', innerBtnAction);
                                                                    $(".delete_rowpm").unbind('click');
                                                                    $('.delete_rowpm').on('click', deleteAdjacentTr);
                                                                    $(".add_rowpo").unbind('click');
                                                                    $('.add_rowpo').on('click', innerBtnActionpo);
                                                                    $(".delete_rowpo").unbind('click');
                                                                    $('.delete_rowpo').on('click', deleteAdjacentTr);


                                                                });

                                                                setNameRows = function () {
                                                                    $(document).find(".row-pp").each(function (k, ele) {
                                                                        $(ele).prop('id', k);
                                                                        $(ele).find("[name^='rows[xxx]']").each(function (i, val) {
                                                                            $(val).prop('name', $(val).prop('name').replace('xxx', $(val).closest('.row-pp').prop('id')));
                                                                        });
                                                                    });

                                                                };
                                                            });




    </script>



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
        });</script>
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