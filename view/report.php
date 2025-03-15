
<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
 include("../include/db_config.php");
 include("../include/conn.php");
 
 include("../include/common.php");
include("../model/Tickets.class.php");
include("../model/TicketsApproved.class.php");
include("../model/TicketsResponse.class.php");
 $ti =new Tickets(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 
 
  if($_SESSION['logged_usr_id']){
    $loge_user= $_SESSION['logged_usr_id'];
       $loge_depart= $_SESSION['logged_usr_depat'];
    
   
    }

    else{
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
<title>Noritake|New Tickets</title>
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
		
			
			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Report</a>
						<i ></i>
					</li>
				
				</ul>
				<div class="page-toolbar">
			
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="invoice">
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						
					</div>
					<div class="col-xs-6">
						<p>
							 <?php
                                                         echo($_GET['ID']);
                                                         ?> <span class="muted">
                                                             Tickets No

							 </span>
						</p>
					</div>
				</div>
				<hr/>
			
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>	#
							</th>
						
							<th class="hidden-480">
								 Subject
							</th>
							<th class="hidden-480">
								PC Number 
							</th>
                                                        	<th class="hidden-480">
								Department 
							</th>
                                                        
							<th class="hidden-480">
								Description 
							</th>
							<th>
								 Request person
							</th>
                                                        <th>
								 Date
							</th>
						</tr>
						</thead>
						<tbody>
                                                        <?php
                                                        $query = "SELECT * FROM tickets_tbl WHERE tickets_ref_no_tt='".$_GET['ID']."'";
                                                          
                                                          ?>  
                                                            
                                                            <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
                                                    
						<tr>
							<td>
								 1
							</td>
						
							<td class="hidden-480">
								 	<?php echo($row["subject_tt"]);?> 
							</td>
							<td class="hidden-480">
									<?php echo($row["pc_number_tt"]);?> 
							</td>
                                                        
                                                        <td class="hidden-480">
									<?php echo($row["depart_tt"]);?> 
							</td>
                                                        
							<td class="hidden-480">
									<?php echo($row["description_tt"]);?> 
							</td>
							<td>
									<?php echo($row["org_name_tt"]);?> 
							</td>
                                                        
                                                        	<td>
									<?php echo($row["request_date_tt"]);?> 
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
                                
                                
                                <div class="row">
                                    
                                    <b> Tickets Details</b>
                                </div>
                                
                                
                                
                                	<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>	#
							</th>
						
							<th class="hidden-480">
								Response Date

							</th>
							<th class="hidden-480">
							   Response Time(#days)
							</th>
                                                        <th class="hidden-480">
								Tickets Status 
							</th>
                                                        
						
						</tr>
						</thead>
						<tbody>
                                                        <?php
                                                        $query = "SELECT * FROM tickets_response_tbl WHERE tickets_no_trt='".$_GET['ID']."'";
                                                   
                                                          ?>  
                                                            
                                                            <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
                                                    
						<tr>
							<td>
								 1
							</td>
							
							<td class="hidden-480">
								 	<?php echo($row["response_date_trt"]);?> 
							</td>
							<td class="hidden-480">
									<?php echo($row["required_time_trt"]);?> 
							</td>
                                                        <td class="hidden-480">
									<?php echo($row["tickets_status_trt"]);?> 
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
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
				<div class="row">
					<div class="col-xs-4">
						<!--<div class="well">
							<address>
							<strong>Tickets Approved </strong><br/>
							795 Park Ave, Suite 120<br/>
							San Francisco, CA 94107<br/>
							<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
							<address>
							<strong>Full Name</strong><br/>
							<a href="mailto:#">
							first.last@email.com </a>
							</address>
						</div>-->
					</div>
					<div class="col-xs-8 invoice-block">
					
						<br/>
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						</a>
						<a class="btn btn-lg green hidden-print margin-bottom-5">
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
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
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