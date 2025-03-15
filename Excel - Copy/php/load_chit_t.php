<?php
	session_start();
	$sdate=$_SESSION['sdate'];
	$type=$_SESSION['type'];
	$table="virtua_time_store_tbl_temp";
	
	
	
	
	try {
		
		
		
		$dsn = 'mysql:dbname=nlpl;host=localhost';
		$user = 'root';
		$password = '';
		$db  = new PDO($dsn, $user, $password);
		
		$today=date("n/j/Y");
		
		//print($today);exit;
		//select all data from the table
		
		$select = $db->prepare("SELECT * FROM virtua_time_store_tbl_temp ORDER BY $type ASC ");
		$select->execute();
		
		$out = array(
		'daily_plan' => $select->fetchAll(PDO::FETCH_ASSOC)
		);
		echo json_encode($out);
		
		// close the database connection
		$db = NULL;
	}
	catch (PDOException $e) {
		print 'Exception : ' . $e->getMessage();
	}
?>