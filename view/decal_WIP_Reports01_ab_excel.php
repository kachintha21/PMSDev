
<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/DInspection.class.php");



$ndi = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Decal WIP Reports-01 </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="../nassets/global/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="../nassets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="../nassets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="../nassets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="../nassets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
        <link href="../nassets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>

        <script type="text/javascript">

            function exportTableToExcel(tableID, filename = '') {
				
                /* Get the HTML data using Element by Id */
    var table = document.getElementById("tblData");
 
    /* Declaring array variable */
    var rows =[];
 
      //iterate through rows of table
    for(var i=0,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
        column5 = row.cells[4].innerText;
		column6 = row.cells[5].innerText;
        column7 = row.cells[6].innerText;
        column8 = row.cells[7].innerText;
        column9 = row.cells[8].innerText;
        column10 = row.cells[9].innerText;
		column11 = row.cells[10].innerText;
		
		
		
 
    /* add a new records in the array */
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5,
				column6,
                column7,
                column8,
                column9,
                column10,
				column11
            ]
        );
 
        }
        csvContent = "data:text/csv;charset=utf-8,";
         /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });
 
        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "DECAL_WIP.csv");
        document.body.appendChild(link);
         /* download the data file named "Stock_Price_Report.csv" */
        link.click();
            }
        </script>
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


                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Decal WIP Reports-01 </a>

                            </li>

                            <button onclick="exportTableToExcel('tblData')">Export To Excel </button>
                            <li>

                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i ></i>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">

                                                        <li>
                                                            <a href="javascript:;" onclick="exportTableToExcel('tblData')">
                                                                Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
									
									
									<table  class="table table-striped table-hover table-bordered" id="tblData"   >
                                        <thead>
                                            <tr>
                                                <th>
                                                    Estimated Finish Date 
                                                </th>

                                                <th>
                                                    Production number
                                                </th>
                                                <th>
                                                    FG Design
                                                </th>
                                                <th>
                                                    Printing Pattern
                                                </th>
												<th>
                                                    Curve
                                                </th>
                                                <th>    
                                                    Lot
                                                </th>   

                                                <th>    
                                                    Planned qty 
                                                </th>    

                                                <th>    

                                                    Actual inspected  qty
                                                </th> 
                                                
                                                
                                                <th>    
													Decal Stores  In qty
                                                </th> 
                                                <th>    

                                                    WIP qty
                                                </th> 
												
												<th>    

                                                    No Of Days  late
                                                </th> 


                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $query = "SELECT *,DATEDIFF(CURDATE(),qqq.finish_date_vpft) as ldate from (select *,(case when (aa.t is null) then aa.plan_n else aa.plan_n- aa.t - aa.def  end) AS `rem2` from (SELECT *, 
(case when (t is null) then planned_qty_lpt else `planned_qty_lpt`- t - def end) AS `rem`,
(case when (close_curve_after_lpt > '0') then close_curve_after_lpt else planned_qty_lpt end) AS `plan_n` 

											FROM layout_plans_tbl a left join (SELECT SUM(c.item01_dt)As t ,SUM(c.register_dt)As def ,c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt 
											FROM dinspection_tbl c  group by c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt ) b 
											on a.pro_no_lpt=b.pro_no_dt and a.curve_no_lpt = b.curve_no_dt and a.decal_no_lpt = b.decal_pattern_dt
											where a.item05_lpt != '1') aa) aaa 
                                            left join (SELECT `ref_no_plt`,`item01_plt` FROM `preparing_layout_tbl` group by `ref_no_plt`) bbb
                                            on aaa.`pro_no_lpt` =bbb.ref_no_plt  
                                            LEFT JOIN qc_qc_approval_tbl ccc
ON aaa.`pro_no_lpt` =ccc.pro_no_qc  AND aaa.curve_no_lpt = ccc.item01_qc
														  LEFT JOIN (SELECT qq.pro_no_vpft,qq.finish_date_vpft FROM virtual_planner_final_tbl qq GROUP BY qq.pro_no_vpft)  qqq
														  ON aaa.pro_no_lpt = qqq. pro_no_vpft                                    
                                            where aaa.rem2>0   AND qqq.finish_date_vpft < CURDATE() AND (ccc.item02_qc != 'Rejected' || ccc.item02_qc IS null)
ORDER BY qqq.finish_date_vpft desc";
                                            ?>  

                                            <?php
                                            if ($result = $conn->query($query)) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>    



                                                    <tr>

                                                        <td>
                                                            <?php echo($row["finish_date_vpft"]); ?> 
                                                        </td>
                                                        <td>
                                                            <?php echo($row["pro_no_lpt"]); ?> 
                                                        </td>


                                                        <td>

                                                            <?php echo($row["decal_no_lpt"]); ?> 
                                                        </td>




                                                        <td>

                                                            <?php echo($row["desing_no_lpt"]); ?> 
                                                        </td>
														
														<td>

                                                            <?php echo($row["curve_no_lpt"]); ?> 
                                                        </td>


                                                        <td>

                                                            <?php echo($row["lot_no_lpt"]); ?> 
                                                        </td>






                                                        <td>      
                                                            <?php echo($row["plan_n"]); ?> 
                                                        </td>  


                                                        <td>      
                                                            <?php echo($ndi->getDInspectionQtyByCurveNo($row["pro_no_lpt"], $row["curve_no_lpt"],$row["decal_no_lpt"])); ?>
                                                        </td>  

                                                       <td>      
                                                            <?php echo($ndi->getDecalInQtyByCurveNo($row["pro_no_lpt"], $row["curve_no_lpt"],$row["decal_no_lpt"])); ?>
                                                        </td> 



                                                        <td>      
                                                            <?php echo($row["rem2"]); ?>
                                                        </td>  



 <td>      
                                                            <?php echo($row["ldate"]); ?>
                                                        </td> 														


                                                    </tr>


                                                    <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT -->
                </div>
            </div>


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
        <script src="../nassets/global/plugins/respond.min.js"></script>
        <script src="../nassets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
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
        <script src="../js/script.js"></script>

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