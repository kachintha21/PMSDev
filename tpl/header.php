
<?php

include("../model/Status.class.php");
$st =new Status(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="../assets/admin/layout/img/logo.png" alt="logo" width="175"  hight="42" />
			</a>
			<div class="menu-toggler sidebar-toggler hide">
                         
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
                	<font color="FFFFFF" size="5" >
                    <B>Noritake Printing Management System</b></font>
                
                
                
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                    <a href="javascript:;" class="dropdown-toggle" title="HOD" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default"><?php echo($st->getStatusCounty());?></span>
					</a>
					<ul class="dropdown-menu">
                                            <?php if($st->getStatusCounty()>0 ){ ?>
						<li class="external">
							<h3><span class="bold">New Tickets(<?php echo($st->getStatusCounty()); ?>)</span> </h3>
							<a href="tickets_view.php">view all</a>
						</li>
                                            <?php }?>
						<li>
							 <ul class="dropdown-menu-list scroller" style="height: 50px;" data-handle-color="#637283">
								                                                           <?php
                                                              
                                                        $sql = "SELECT * FROM status_tbl where st01_st='1'";
                                                          ?>
                                                       <?php
                                                            if ($result = $conn->query($sql)) {
                                                             while ($mm = $result->fetch_assoc()) {
                                                                                                                        ?>                                                
                                                                      <li>
									<a href="javascript:;">
                                                                            <span class="time" title="<?php echo($mm["org_date_st"]."".$mm["org_time_st"]);?>">just now</span>
									<span class="details">
									<span class="label label-sm label-icon label-success">
                                                                         <i class="fa fa-plus" onclick="window.location.href='tickets_approved.php?id=<?php echo($mm["tickets_no_st"]);?>'"  ></i>
									</span><?php echo($mm["tickets_no_st"]);?>  </span>
									</a>
								     </li>
                                                  
                                                                 <?php
                                                              
                                                             }
                                                            }
                                                          
                                                          ?>
								
							 </ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default"><?php echo($st->getStatusTwo()); ?></span>
					</a>
					<ul class="dropdown-menu">
						  <?php if($st->getStatusTwo()>0 ){ ?>
						<li class="external">
							<h3><span class="bold">Approved Tickets(<?php echo($st->getStatusTwo()); ?>)</span></h3>
							<a href="tickets_response.php">view all</a>
						</li>
                                            <?php }?>
						<li>
							 <ul class="dropdown-menu-list scroller" style="height: 150px;" data-handle-color="#637283">
								                                                           <?php
                                                              
                                                        $sql = "SELECT * FROM status_tbl where st02_st='1'";
                                                          ?>
                                                       <?php
                                                            if ($result = $conn->query($sql)) {
                                                             while ($mm = $result->fetch_assoc()) {
                                                                                                                        ?>                                                
                                                                     <li>
									<a href="javascript:;">
																	<span class="details">
									<span class="label label-sm label-icon label-success">
                                                                          <i class="fa fa-plus" onclick="window.location.href='tickets_approved.php?id=<?php echo($mm["tickets_no_st"]);?>'"  ></i>
									</span><?php echo($mm["tickets_no_st"]);?></span>
									</a>
								     </li>
                                                  
                                                                 <?php
                                                              
                                                             }
                                                            }
                                                          
                                                          ?>
								
							 </ul>
						</li>
					</ul>
				</li>-->
				
                                
                                
                                
                                
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					                    
                                                       <?php
                                      
                                     echo(getCurrentSessionUser());
                                  
                                      
                                    ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>
					
					
					
						<li class="divider">
						</li>
						
						<li>
							<a href="../index.php">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
