<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/remote_conn.php");
include("../include/common.php");
include("../model/Planning.class.php");
include("../model/PlanningAuto.class.php");
include("../model/PlanedQty.class.php");
include("../model/MinusReport.class.php");
include("../model/YieldMaster.class.php");



$pl = new Planning(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pa = new PlanningAuto(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pqt = new PlanedQty(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$minis = new MinusReport(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ym = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$smin_date = "SELECT MIN(ORNYDATE)AS mdate FROM tbl_minus_report_dec_final";
$resmdate = $conn->query($smin_date);

//$data_min = $resmdate->num_rows;
$rowdmin = $resmdate->fetch_assoc();





$date01 = date_create($_POST['date1']);
$getdate01 = date_format($date01, "Ymd");
$date02 = date_create($_POST['date2']);
$getdate02 = date_format($date02, "Ymd");



if (isset($_POST['SubmitButton'])) {
    $qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final  WHERE (ORNYDATE BETWEEN  '" . $getdate01 . "' AND '" . $getdate02 . "'   )  AND (dec_patt LIKE '" . $_POST['dec_patt'] . '%' . "' OR  dec_curve='" . $_POST['dec_curve'] . "'  OR    item='" . $_POST['item'] . "')  group by dec_patt,dec_curve	 ORDER BY dec_patt ASC	 		 
 
";
    $qcolumn = "SELECT * FROM tbl_minus_report_dec_final  WHERE (ORNYDATE  BETWEEN  '" . $getdate01 . "' AND '" . $getdate02 . "'  )  
AND (dec_patt LIKE '" . $_POST['dec_patt'] . '%' . "'  OR  dec_curve='" . $_POST['dec_curve'] . "'  OR    item='" . $_POST['item'] . "')
GROUP BY ORNYDATE,ORDEST ORDER BY ORNYDATE ASC			 
 
";
    $redata = $conn->query($qdata);
    $datacount = $redata->num_rows;
    $recolumndate = $conn->query($qcolumn);
    $recolumnship = $conn->query($qcolumn);
    $columncount = $recolumn->num_rows;
} else {

    $qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final  group by dec_patt,dec_curve ORDER BY dec_curve ASC	LIMIT 30		 
 	";

    /* $qdata = "SELECT  id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT  FROM tbl_minus_report_dec_final  WHERE ORNYDATE BETWEEN   '20200101' AND '20200831'   group by dec_patt,dec_curve	 ORDER BY dec_curve ASC	"; */


    $qcolumn = "SELECT * FROM tbl_minus_report_dec_final GROUP BY ORNYDATE,ORDEST ORDER BY ORNYDATE ASC  LIMIT 30	";
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

                                                <input type="text" list="dec_patt"  type="text" class="form-control" name="dec_patt"  placeholder='Design No' onkeyup="return form_submit();"   id="dec_patt"  />
                                                <datalist id="dec_patt">
                                                    <option value="Z9804">Z9804</option>
                                                    <option>Z9802</option>
                                                    <option>Z9601</option>
                                                    <option>Z3786</option>
                                                    <option>Z3481</option>
                                                    <option>Z1214</option>
                                                    <option>Z1213</option>
                                                    <option>Z1211</option>
                                                    <option>Z0302</option>
                                                    <option>SLARMY</option>
                                                    <option>S/UNMORA</option>
                                                    <option>S/UNKELA</option>
                                                    <option>S/TOYOTG</option>
                                                    <option>S/SRIMAH</option>
                                                    <option>S/PERAHA</option>
                                                    <option>S/PERABL</option>
                                                    <option>S/KIDNEY</option>
                                                    <option>S/JRINTR</option>
                                                    <option>S/ELS</option>
                                                    <option>S/AKBAR</option>
                                                    <option>S/2020DT</option>
                                                    <option>S/202001</option>
                                                    <option>R3556</option>
                                                    <option>R3554</option>
                                                    <option>R3553</option>
                                                    <option>R3552</option>
                                                    <option>R3551</option>
                                                    <option>R3550</option>
                                                    <option>R16008</option>
                                                    <option>R16007</option>
                                                    <option>R16002</option>
                                                    <option>PASTEL</option>
                                                    <option>ORANGE</option>
                                                    <option>MYALBATI</option>
                                                    <option>MTEA</option>
                                                    <option>MSEMPLAT</option>
                                                    <option>MRED</option>
                                                    <option>MPURBATI</option>
                                                    <option>MPOT</option>
                                                    <option>MORABATI</option>
                                                    <option>MNEWPOT</option>
                                                    <option>MMLESLOG</option>
                                                    <option>MLESNA</option>
                                                    <option>MGREEN</option>
                                                    <option>MGBORDER</option>
                                                    <option>MFULPLAT</option>
                                                    <option>MFULGOLD</option>
                                                    <option>MDBLUE</option>
                                                    <option>MCUP</option>
                                                    <option>MCHECKYE</option>
                                                    <option>MCHECKMR</option>
                                                    <option>MCHECKGR</option>
                                                    <option>MBRDRED</option>
                                                    <option>MBLUELN</option>
                                                    <option>MBLUE</option>
                                                    <option>MBLUBAND</option>
                                                    <option>MBLAGREY</option>
                                                    <option>MBATIK</option>
                                                    <option>L553</option>
                                                    <option>H/UNION</option>
                                                    <option>H/TEAFAC</option>
                                                    <option>H/MRHYEL</option>
                                                    <option>H/MRHRED</option>
                                                    <option>H/MRHMER</option>
                                                    <option>H/MAHAWE</option>
                                                    <option>GREEN</option>
                                                    <option>DOGEYE</option>
                                                    <option>BYNOR</option>
                                                    <option>BLUE</option>
                                                    <option>A/VIJAYA</option>
                                                    <option>A/SLAFSL</option>
                                                    <option>A/SLAFGL</option>
                                                    <option>A/SLAFBL</option>
                                                    <option>A/ARMYSF</option>
                                                    <option>A/6ARTIL</option>
                                                    <option>A/4SINHA</option>
                                                    <option>9940V</option>
                                                    <option>9661L</option>
                                                    <option>9460L</option>
                                                    <option>4807L</option>
                                                    <option>4796L</option>
                                                    <option>4796001L</option>
                                                    <option>4795L</option>
                                                    <option>4620L</option>
                                                    <option>4613L</option>
                                                    <option>4562L</option>
                                                    <option>4519L</option>
                                                    <option>4409L</option>
                                                    <option>4409006L</option>
                                                    <option>4276E</option>
                                                    <option>4171L</option>
                                                    <option>4170L</option>
                                                    <option>4167L</option>
                                                    <option>4166L</option>
                                                    <option>1654005L</option>
                                                    <option>1654003L</option>
                                                    <option>1654001L</option>
                                                    <option>1645L</option>
                                                    <option>1643L</option>
                                                    <option>1620L</option>
                                                    <option>1620005L</option>
                                                    <option>1620004L</option>
                                                    <option>1620003L</option>
                                                    <option>1620002L</option>
                                                    <option>1620001L</option>
                                                    <option>1609L</option>
                                                    <option>1507L</option>
                                                    <option>1507004L</option>
                                                    <option>1470L</option>
                                                    <option>0010680L</option>
                                                    <option>0010678L</option>
                                                    <option>0010677L</option>
                                                    <option>0010674L</option>
                                                    <option>0010672L</option>
                                                    <option>0010570L</option>
                                                    <option>0010567L</option>
                                                    <option>0010561L</option>
                                                    <option>0010558L</option>
                                                    <option>0010544L</option>
                                                    <option>0010294L</option>
                                                    <option>0010263L</option>
                                                    <option>000N192L</option>
                                                    <option>000N191L</option>
                                                    <option>000N190L</option>
                                                    <option>000N151L</option>
                                                    <option>000N145L</option>
                                                    <option>000N144L</option>
                                                    <option>000N143L</option>
                                                    <option>000N142L</option>
                                                    <option>000N141L</option>
                                                    <option>000N140L</option>
                                                    <option>000N137L</option>
                                                    <option>000N134L</option>
                                                    <option>000N133L</option>
                                                    <option>000N119L</option>
                                                    <option>000N118L</option>
                                                    <option>000N116L</option>
                                                    <option>000N108L</option>
                                                    <option>000N104L</option>
                                                    <option>000N100L</option>
                                                    <option>000N046L</option>
                                                    <option>000N045L</option>
                                                    <option>000N040L</option>
                                                    <option>000N039L</option>
                                                    <option>000N038L</option>
                                                    <option>000M657E</option>
                                                    <option>000M657</option>
                                                    <option>000M656E</option>
                                                    <option>000M656</option>
                                                    <option>000M655E</option>
                                                    <option>000M655</option>
                                                    <option>000M654E</option>
                                                    <option>000M654</option>
                                                    <option>000M639</option>
                                                    <option>000M590</option>
                                                    <option>000M483</option>
                                                    <option>000M253</option>
                                                    <option>000M252</option>
                                                    <option>000M250</option>
                                                    <option>000M186</option>
                                                    <option>000M168</option>
                                                    <option>000M166</option>
                                                    <option>000M165</option>
                                                    <option>000M164</option>
                                                    <option>000M163</option>
                                                    <option>000M042</option>
                                                    <option>000M041</option>
                                                    <option>000M008</option>
                                                    <option>000M005</option>
                                                    <option>000H976L</option>
                                                    <option>000H948L</option>
                                                    <option>000H947L</option>
                                                    <option>000H946L</option>
                                                    <option>000H742L</option>
                                                    <option>000H740L</option>
                                                    <option>000H689L</option>
                                                    <option>000H686L</option>
                                                    <option>000H668L</option>
                                                    <option>000H667L</option>
                                                    <option>000H613L</option>
                                                    <option>000H612L</option>
                                                    <option>000H158L</option>
                                                    <option>000A783L</option>
                                                    <option>0007242L</option>
                                                    <option>0004865L</option>
                                                    <option>0002552L</option>
                                                    <option>0002235L</option>
                                                    <option>9353005</option>
                                                    <option>9353004</option>
                                                    <option>9353003</option>
                                                    <option>9353002</option>
                                                    <option>9353001</option>
                                                    <option>4966001</option>
                                                    <option>4962001</option>
                                                    <option>4942002</option>
                                                    <option>4941002</option>
                                                    <option>4941001</option>
                                                    <option>4924011</option>
                                                    <option>4924010</option>
                                                    <option>4924008</option>
                                                    <option>4924007</option>
                                                    <option>4924003</option>
                                                    <option>4923001</option>
                                                    <option>4911002</option>
                                                    <option>4911001</option>
                                                    <option>4874001</option>
                                                    <option>1720007</option>
                                                    <option>1720006</option>
                                                    <option>1720005</option>
                                                    <option>1720004</option>
                                                    <option>1720003</option>
                                                    <option>1705001</option>
                                                    <option>1704004</option>
                                                    <option>1702001</option>
                                                    <option>1507002</option>
                                                    <option>9353</option>
                                                    <option>9352</option>
                                                    <option>9349</option>
                                                    <option>9317</option>
                                                    <option>9316</option>
                                                    <option>4969</option>
                                                    <option>4968</option>
                                                    <option>4967</option>
                                                    <option>4966</option>
                                                    <option>4965</option>
                                                    <option>4964</option>
                                                    <option>4963</option>
                                                    <option>4960</option>
                                                    <option>4959</option>
                                                    <option>4957</option>
                                                    <option>4956</option>
                                                    <option>4955</option>
                                                    <option>4954</option>
                                                    <option>4953</option>
                                                    <option>4950</option>
                                                    <option>4945</option>
                                                    <option>4944</option>
                                                    <option>4942</option>
                                                    <option>4941</option>
                                                    <option>4929</option>
                                                    <option>4923</option>
                                                    <option>4922</option>
                                                    <option>4919</option>
                                                    <option>4918</option>
                                                    <option>4917</option>
                                                    <option>4913</option>
                                                    <option>4912</option>
                                                    <option>4911</option>
                                                    <option>4910</option>
                                                    <option>4909</option>
                                                    <option>4899</option>
                                                    <option>4887</option>
                                                    <option>4886</option>
                                                    <option>4875</option>
                                                    <option>4874</option>
                                                    <option>4863</option>
                                                    <option>4861</option>
                                                    <option>4861</option>
                                                    <option>4834</option>
                                                    <option>4830</option>
                                                    <option>4830</option>
                                                    <option>4399</option>
                                                    <option>4388</option>
                                                    <option>4383</option>
                                                    <option>4383</option>
                                                    <option>4364</option>
                                                    <option>4364</option>
                                                    <option>4363</option>
                                                    <option>4363</option>
                                                    <option>4360</option>
                                                    <option>4358</option>
                                                    <option>4357</option>
                                                    <option>4356</option>
                                                    <option>4356</option>
                                                    <option>4341</option>
                                                    <option>4336</option>
                                                    <option>4336</option>
                                                    <option>4335</option>
                                                    <option>4335</option>
                                                    <option>4333</option>
                                                    <option>4333</option>
                                                    <option>4332</option>
                                                    <option>4332</option>
                                                    <option>4324</option>
                                                    <option>4324</option>
                                                    <option>4284</option>
                                                    <option>4284</option>
                                                    <option>4278</option>
                                                    <option>4277</option>
                                                    <option>4277</option>
                                                    <option>4276</option>
                                                    <option>4267</option>
                                                    <option>4267</option>
                                                    <option>4257</option>
                                                    <option>4257</option>
                                                    <option>4256</option>
                                                    <option>4256</option>
                                                    <option>3482</option>
                                                    <option>2983</option>
                                                    <option>2585</option>
                                                    <option>1728</option>
                                                    <option>1726</option>
                                                    <option>1725</option>
                                                    <option>1724</option>
                                                    <option>1719</option>
                                                    <option>1717</option>
                                                    <option>1716</option>
                                                    <option>1714</option>
                                                    <option>1713</option>
                                                    <option>1712</option>
                                                    <option>1711</option>
                                                    <option>1710</option>
                                                    <option>1705</option>
                                                    <option>1703</option>
                                                    <option>1702</option>
                                                    <option>1701</option>
                                                    <option>1683</option>
                                                    <option>1681</option>
                                                    <option>1675</option>
                                                    <option>1668</option>
                                                    <option>1664</option>
                                                    <option>1660</option>
                                                    <option>1655</option>
                                                    <option>1642</option>
                                                    <option>1642</option>


                                                </datalist>

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
                                                            <td rowspan="2" style="font-size:12px; padding:4px;">Total

                                                            </td>


                                                            <?php
                                                            while ($rowc = $recolumndate->fetch_assoc()) {
                                                                ?>

                                                                <td style="font-size:12px; padding:4px;" colspan="4" >

                                                                    <?php echo($rowc["ORNYDATE"]); ?>
                                                                    <input type="checkbox" id="K<?php echo($rowc["id"]); ?>" name="checkboxt[]" value='<?php echo(1); ?>' />



                                                                    <input  type="hidden" class="form-control"  name="ORNYDATE[]" id="ORNYDATE[]" value="<?php echo($rowc["ORNYDATE"]); ?>" />

                                                                    <input  type="hidden" class="form-control"  name="ORDEST[]" id="ORDEST[]" value="<?php echo($rowc["ORDEST"]); ?>" />
                                                                </td> 	

                                                            <?php } ?>
                                                        </tr>
                                                        <tr>


                                                            <?php
                                                            while ($rows = $recolumnship->fetch_assoc()) {
                                                                ?>
                                                            <td style="font-size:12px; padding:4px;" colspan="4" ><?php echo($rows["ORDEST"]); ?>
                                                                </td>	
                                                            <?php } ?>								
                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        while ($row = $redata->fetch_assoc()) {
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

                                                                $ship_qty = $minis->getMinusReportByUnique($row["dec_patt"], $row["dec_curve"], $row["item"], $rowq["ORNYDATE"], $rowq["ORDEST"]);
                                                                
                                                                   $ship_qty=$ym->getYieldByRefNo($row["dec_patt"],$row["dec_curve"],$ship_qty);
                                                                     //$ship_qty= $ship_qty+10;
                                                                 
                                                                $planed_qty = $pqt->getPlanedQtyByUnique($row["dec_patt"], $row["dec_curve"], $rowq["ORNYDATE"], $rowq["ORDEST"]);
                                                                ?>

                                                                <td style="font-size:12px; padding:4px;" colspan="4"  class="<?php echo("K" . $rowq["id"]); ?>_<?php echo($row["id"]); ?>"   >


                                                                    <?php
                                                                    echo($ship_qty - $planed_qty);
                                                                    $r = $ship_qty - $planed_qty;
                                                                    echo("<input  type='hidden' class='form-control'  name='qty[]' id='qty[]' value='$r'  />");
                                                                    ?>

                                                                </td>									

                                                                <?php
                                                            }
                                                            ?>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>


                                                    </tbody>                            
                                                </table>
                                        </form>










                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn purple" onClick="return form_submit_new();"  > <i class="fa fa-check"></i> Submit </button>
                                            <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                                            <button id="unchk">Uncheck</button>

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
    
    <script src="../nassets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="../nassets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../nassets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="../nassets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="../nassets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../nassets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../nassets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../nassets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="../nassets/admin/pages/scripts/table-editable.js"></script>
        <script src="../ajax_post/save_post.js"></script>


        <script src="../ajax_post/tool.js"></script>

      
      
      <script  type="text/javascript">
     $('#unchk').click(function () {
              $('input[type="checkbox"]').each(function () {
                  $(this).attr("checked", false);
              });
          })
      </script>

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