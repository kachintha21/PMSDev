<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Tickets.class.php");
include("../model/Status.class.php");
include("../include/conn.php");
$ti =new Tickets(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$st =new Status(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$date01=date_create('20190201');
$getdate01=date_format($date01,"Ymd");
$date02=date_create('20200701');
$getdate02=date_format($date02,"Ymd");


$query = "SELECT id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT FROM tbl_minus_report_dec_final    WHERE ORNYDATE  BETWEEN  '".$getdate01."' AND '".$getdate02."'   
					
	group by dec_patt,dec_curve	 ORDER BY dec_curve ASC	 
						
	";



$sql = "SELECT * FROM tbl_minus_report_dec_final  WHERE ORNYDATE  BETWEEN  '".$getdate01."' AND '".$getdate02."'  
			
			GROUP BY ORNYDATE	ORDER BY ORNYDATE ASC			 
			 
";

$result = $conn->query($sql);
$resultn = $conn->query($query);
$results = $conn->query($sql);
$resultq = $conn->query($sql);
$resultt = $conn->query($sql);	 
$count = $result->num_rows;





$error = "";
$is_admin=0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;

if(count($_POST) > 0){
	$date01=date_create($_POST['date1']);
	$getdate01=date_format($date01,"Ymd");
	$date02=date_create($_POST['date2']);
	$getdate02=date_format($date02,"Ymd");
 
	$query = "SELECT id,dec_patt,dec_curve,item,ORDEST,ORNYDATE,qty,qty As T,sum(qty) as TT FROM tbl_minus_report_dec_final     WHERE (ORNYDATE  BETWEEN  '".$getdate01."' AND '".$getdate02."'  )  
	AND (dec_patt='".$_POST['dec_patt']."' OR  dec_curve='".$_POST['dec_curve']."'  OR    item='".$_POST['item']."')						
	group by dec_patt,dec_curve	 ORDER BY dec_curve ASC	 
						
	";



			$sql = "SELECT * FROM tbl_minus_report_dec_final  WHERE (ORNYDATE  BETWEEN  '".$getdate01."' AND '".$getdate02."'  )  
			AND (dec_patt='".$_POST['dec_patt']."' OR  dec_curve='".$_POST['dec_curve']."'  OR    item='".$_POST['item']."')
			GROUP BY ORNYDATE	ORDER BY ORNYDATE ASC			 
			 
";

$result = $conn->query($sql);
$resultn = $conn->query($query);
$results = $conn->query($sql);
$resultq = $conn->query($sql);
$resultt = $conn->query($sql);	 
$count = $result->num_rows;




	

}

	else{
		$date01=date_create('20190201');
		$getdate01=date_format($date01,"Ymd");
		$date02=date_create('20201201');
		$getdate02=date_format($date02,"Ymd");
          echo("455646445");

          




	}




 
        

			
?>

                               <div>Time Duration:<b><?php echo ($getdate01." To ".$getdate02);    ?></b>

							 
							   </div>



							   


						

                                <div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover">
								 <table class="table table-striped table-bordered table-hover table-checkable order-column"  id="checkbox-table">

                              <thead style="background-color: lightgray; text-align:center;">
						



                            <tr>
                         <td rowspan="2" style="font-size:11px; padding:0px;">Design <?php echo($datt);?></td>
						 <td rowspan="2" style="font-size:12px; padding:4px;">Curve</td>	
						 <td rowspan="2" style="font-size:12px; padding:4px;">Item</td>	
						 <td rowspan="2" style="font-size:12px; padding:4px;">Total</td>	
											
               

						  <?php
                                                  
                                        	  while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>

													<td style="font-size:12px; padding:4px;" colspan="4" ><a href="#"     ><?php echo($row["ORNYDATE"]); ?><a></td> 	
													
												  <?php } ?>
												  

												  
													<td style="font-size:15px; padding:4px;"   rowspan="2" >ADD Inform
												
												     </td>


                           							</tr>
												
								
												    <tr>



													<?php 
												       while ($rowa = $results->fetch_assoc()) {								 
												     ?>
														<td style="font-size:12px; padding:4px;" colspan="4" ><?php echo($rowa["ORDEST"]); ?>
												<input type="checkbox" id="K<?php echo($rowa['id']);?>"/>


														</td>
														
														
														<?php 
													}
													
													?>	
													
													
													</tr>
												
                                            </thead>
                                            
                                            
			       
                                            
                                            
                                            <tbody>


								          
											<?php
 
                             
                                                          
                                                          ?>  
                                                            
                                         <?php
                                            if ($resultn) {
                                            while ($row = $resultn ->fetch_assoc()) {
                                                            
                                        ?>
								    

												 <tr id="<?php echo($row["id"]);?>">
												 <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_patt"]);?></td>                                                                            
												 <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_curve"]);?></td>	
												 <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo(($row["item"]));?></td>									 
											     <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;" id="text" >
												 
									<?php
									    $res=$conn->query($sql);
								        while ($rows=$res->fetch_assoc()) {	
										if($row["ORNYDATE"]==$rows["ORNYDATE"]){
										$sumT=$row["TT"]++;   
									                                             
										}
										else{
											//echo($row["qty"]);

										}
									     }

								    //$sumTT=$sumT+1;
									echo(

										"<input type='text'  value='$sumT'  />"


									);


										
									 ?>
									 	
												
									</td>	



									 <?php 
                                      $resultqty = $conn->query($sql);
								      while ($rowat = $resultqty->fetch_assoc()) {								 
								     ?>
															 		  
									 <td style="font-size:12px; padding:4px;" colspan="4" ><?php 									 
									 if($row["ORNYDATE"]==$rowat["ORNYDATE"]){
									 echo($row["TT"]-1);
																		  
																	
									}
									 else{
										echo("0");
									 }
									 
									 
									 ?></td>
				
						
					  			 <?php
					   				}

					 			  ?>
           					 
									 
									 <td style="font-size:12px; padding:4px;" colspan="2"  >
									<?php echo("-");?>
				                    </td>
           						     </tr>


									<?php
						
												}
											}	   
									 ?>
															  
	


                                    </tbody>
                                        </table>
								
							</div>



 



<?php
                 
 
 
?>