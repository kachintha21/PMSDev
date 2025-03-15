<?php
 
	
	
	$serverName = "kikerp.database.windows.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"BC140", "UID"=>"erpadmn", "PWD"=>"Nk#AJ9@z!");
$conn = sqlsrv_connect( $serverName, $connectionInfo);




if( $conn ) {
	//print(1234);exit;
     //echo "Connection established.<br />";
}else{
	//print(123);exit;
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>