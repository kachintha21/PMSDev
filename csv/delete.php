<?php
 error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server="localhost";
$username="root";
$password="";
$db = "nlpl";
 $con=mysqli_connect($server,$username,$password,$db); 
 

  
 
                            
									
									
									
									
									
									 $res = "SELECT id FROM colours_tbl WHERE pigment_name_ct=''  AND  qty_ct='' ORDER BY id DESC";
									
		if ($rest = $con->query($res)) {
												if(mysqli_num_rows($rest)>0){
                                           while($row = $rest->fetch_assoc()) {
											   // echo($row['id']."<br>");
											       $id=$row['id'];
	
	   
	       $query = "DELETE FROM colours_tbl WHERE id='".$id."'   ";
	   
	   
	     $result2 = mysqli_query($con,$query);
		
	   
									 
												}}
		}
				  
   
?>
 
 