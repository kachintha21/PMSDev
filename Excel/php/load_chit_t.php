<?php
	session_start();
	$sdate=$_SESSION['sdate'];
	$type=$_SESSION['type'];
	$table="virtual_planner_final_tbl_excel_f";
	
	
	
	
	try {
		
		
		
		$dsn = 'mysql:dbname=nlpl;host=localhost';
		$user = 'root';
		$password = '';
		$db  = new PDO($dsn, $user, $password);
		
		$today=date("n/j/Y");
		
		//print($today);exit;
		//select all data from the table
		
		$select = $db->prepare("SELECT * FROM virtual_planner_final_tbl_excel_f ORDER BY $type ASC ");
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