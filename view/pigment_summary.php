
<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/DInspection.class.php");
include("../model/LayoutPlans.class.php");



$ndi = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Noritake|Pigment Summary </title>
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
    var table = document.getElementById("sample_editable_1");
 
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
                column10
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
                                <a href="#">Pigment Summary </a>

                            </li>

                            
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
								
								<?php
                                        if (isset($_POST["status"])) {
											
                                            //$lp->updateVirtualPlannerFinalByID($_POST["id"], $_POST["hre"]);
                                        }
                                        ?>
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

                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table  class="table table-striped table-hover table-bordered" id="sample_editable_1" >
                                        <thead>
                                            <tr>
                                                <th>
                                                    Design 
                                                </th>

                                                <th>
                                                    Colour<br/> Code
                                                </th>
                                                <th>
                                                    Colour <br/>Name
                                                </th>
                                                <th>
                                                    Mesh 
                                                </th>
												  

                                                <th>    
                                                    Pigmant<br/> Name 
                                                </th>    

                                                <th>    

                                                    Pigmant <br/>Ratio
                                                </th> 
                                                
                                                
                                                <th>    
													Temprerature 1
                                                </th> 
												
												<th>    
													Temprerature 2
                                                </th> 
												
												<th>    
													Temprerature 3
                                                </th> 
                                               


                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $query = "SELECT *,GROUP_CONCAT(pigment_name_ct) as pigmant_name,GROUP_CONCAT(qty_ct) as ratio FROM pigment_master_tbl a
LEFT JOIN colours_tbl b 
ON a.pattern_pm=b.pattern_no_ct
AND a.colours_pm =b.colours_code_ct
GROUP BY a.ref_no_pm,colours_pm
ORDER BY a.pattern_pm,a.colours_pm ";
                                            ?>  

                                            <?php
                                            if ($result = $conn->query($query)) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>    



                                                    <tr>

                                                        <td>
                                                            <?php echo($row["pattern_pm"]); ?> 
                                                        </td>
                                                        <td>
                                                            <?php echo($row["colours_pm"]); ?> 
                                                        </td>


                                                        <td>

                                                            <?php echo($row["colours_name_pm"]); ?> 
                                                        </td>




                                                        <td>

                                                            <?php echo($row["screen_mesh_pm"]); ?> 
                                                        </td>
														
														<td>

                                                            <?php echo($row["pigmant_name"]); ?> 
                                                        </td>


                                                        <td>

                                                            <?php echo($row["ratio"]); ?> 
                                                        </td>






                                                        <td>      
                                                            <?php echo($row["item01_pm"]); ?> 
                                                        </td>  
														
														 <td>      
                                                            <?php echo($row["item02_pm"]); ?> 
                                                        </td> 
														
														 <td>      
                                                            <?php echo($row["item03_pm"]); ?> 
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