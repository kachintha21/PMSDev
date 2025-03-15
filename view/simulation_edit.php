<?php
 error_reporting(E_PARSE|E_WARNING|E_ERROR);
 include("../include/db_config.php");
 include("../include/conn.php"); 
   include("../include/common.php"); 
 include("../model/CurveMaster.class.php"); 
   $cm=new CurveMaster(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 
?>
<DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Noritake|Planning Data</title>
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
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Planning data </h4>
						</div>
						<div class="modal-body">
						Planning data
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
                            Planning data
                            <small>
                                
                            </small>
			</h3>
			<div class="page-bar">
				   <ul class="page-breadcrumb">
					<li>
                                            <i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
                                        <a href="#"> Planning data

                                        </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
                                       <a href="#">Planning data </a>
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
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i ></i>Planning data
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
											<button id="sample_editable_1_new" class="btn green" onclick="window.location='planning_tools.php';"> 
											Planning data											<?php
											
											?>
                                                                                        <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
                                                    
                                                    
							<table class="table table-striped table-bordered table-hover" >
							<thead>
							<tr>
								<th class="table-checkbox">
								  <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
							       </th>

								<th>
                                                                  Max Area
 								</th>  
                                                               <th>
						               Curve No
								</th>
                                                                
                                                               </th>  
                                                                 <th>
							         Plan Qty
								</th>      
								</th>
                                                                    <th>                                                                 
                                                                 No of Curves
                                                                    </th>

                                                                    <th>
                                                                    Curve Area
                                                                     </th> 

                                                                    <th>
                                                                    Total area
                                                                   </th>  
                                              
                                                                
                                                                <th>
                                                             No of sheets
								</th>                                                                                                                               
								<th>                                                         
                                                             Close curve after
								</th>  
                                                                                 
                                                       
                                                               
								
                                                 
                                                                </tr>
                                                                </thead>
							<tbody>
                                                            
                                              
                                                            
                                     
                                                              <?php    
                                                                  
                                                              
                                                              $total=2310*80/100;
                                                               $design=array('4166L','4166L','4166L');
                                                               $curve=array('801','805','806','52');
                                                               $qty=array(612,512,500,1624);
                                                               $area=array(707.56,349.68,406.9,3.5);
                                                               
                                                               
                                                               
                                                               
                                                               
                                                               $get_max=max($area);
                                                               $sheet=$total%$get_max;
                                                               $sheet_value=$total/$get_max;
                                                               $curve_value = (int)$sheet_value; 
                                                               $requid_sheet=$qty[0]/$curve_value;



                                                              ?>  

                                                              <?php
                                                                   /* if ($result = $conn->query($query)) {
                                                                     while ($row = $result->fetch_assoc()) {*/

                                                               ?>
                                                            
                                                            
                                                            
                                                            
							       <tr class="odd gradeX">
                                                                   
                                                                   
                                                                   <?php                                                                   
                                                                   $curve_value = (int)$sheet_value; 
                                                                    $requid_sheet=$qty[0]/$curve_value;
                                                                   
                                                                   ?>
                                                                   
								<td>
								   <input type="checkbox" class="checkboxes" value="1"/>
								</td>

								<td>
								<?php
                                                                
                                                                 echo($total);
                                                                
                                                                
                                                                ?> 
								</td>
                                                                
                                                                         <td>
								<?php
                                                                
                                                                    echo($curve[0]);
                                                                
                                                                
                                                                ?> 
								</td>
                                                                
                                                                
                                                                <td>
								<?php
                                                                
                                                                     echo($qty[0]);
                                                                
                                                                
                                                                ?> 
								</td>
                                                                
                                                                
                                        
								<td>
								<?php echo($curve_value);?> 
								</td>
                                                         
								<td>									
							      <?php echo($area[0]);?> 
								</td>

                                                                
                                                                <td>
				                              <?php echo($sheet);?> 
								</td>
                                                       
							       
                                                                
                                                                
                                                                <td>
							    <?php echo($requid_sheet);?> 
								</td>
                                                                
                                                                
                                                                <td>
                                                                <?php echo($requid_sheet);?> 
                                                                
								</td>
								
                                                      
							</tr>
                                                        
                                                        
                                                        
                                                        
                                                
                                                        
							
                                                        
                                                  
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="row">
						
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
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/table-managed.js"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   TableManaged.init();
});
</script>
</body>
<!-- END BODY -->
</html>