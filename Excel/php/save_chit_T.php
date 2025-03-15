<?php
	session_start();
	
	try {
		
		$sdate=$_SESSION['sdate'];
		$type=$_SESSION['type'];
		$stable ="virtual_planner_final_tbl_excel_f";
		
		//open the database
		// $db = new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
		$dsn = 'mysql:dbname=nlpl;host=127.0.0.1';
		$user = 'root';
		$password = '';
		$db  = new PDO($dsn, $user, $password);
		
		
		
		
		
		$conn = new mysqli( 'localhost', 'root', '', 'nlpl' );
		
		
		//create the database if does not exist
		//$db->exec("CREATE TABLE IF NOT EXISTS `' .$stable . '` (id INTEGER PRIMARY KEY, manufacturer TEXT, year INTEGER, price INTEGER)");
		
		$colMap = array(
		0 => 'Time',
		1 => 'Start_date',
		2 => 'End_date',
		3 => 'Pro_no',
		4 => 'Design',
		5 => 'Lot',
		6 => 'No_of_colour',
		7 => 'Qty',
		8 => 'Remark',
		9 => 'Plan_colour',
		10 => 'Close',
		11 => 'Time_t',
		12 => 'Change_over',
		13 => 'Plan_print',
		14 => 'Plan_date',
		15 => 'M_no',
		
		);
		
		if ($_POST['changes']) {
			foreach ($_POST['changes'] as $change) {
				$rowId  = $change[0] ;
				$colId  = $change[1];
				$newVal = strtoupper($change[3]);
				
				if (!isset($colMap[$colId])) {
					echo "\n spadam";
					continue;
				}
				
				$sql = "SELECT id FROM virtual_planner_final_tbl_excel_f ORDER BY $type ASC limit 1";
				
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						$rowId3  = $row["id"];
						
						
					}
					} else {
					$rowId3  = 1;
				}
				
				$rowId=$rowId +$rowId3;
				
				 
					
					
					
					
					
					
					
					
					
					$select = $db->prepare('SELECT id FROM `' .$stable . '` WHERE id=? LIMIT 1');
					$select->execute(array(
					$rowId
					));
					
					if ($row = $select->fetch()) {
						$query = $db->prepare('UPDATE `' .$stable . '` SET `' . $colMap[$colId] . '` = :newVal WHERE id = :id');
						} else {
						$query = $db->prepare('INSERT INTO `' .$stable . '` (id, `' . $colMap[$colId] . '`) VALUES(:id, :newVal)');
					}
					$query->bindValue(':id', $rowId, PDO::PARAM_INT);
					$query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					$query->execute();
				}
				} elseif ($_POST['data']) {
				$select = $db->prepare('DELETE FROM `' .$stable . '`');
				$select->execute();
				
				for ($r = 0, $rlen = count($_POST['data']); $r < $rlen; $r++) {
					$rowId = $r + 1;
					for ($c = 0, $clen = count($_POST['data'][$r]); $c < $clen; $c++) {
						if (!isset($colMap[$c])) {
							continue;
						}
						
						$newVal = $_POST['data'][$r][$c];
						
						$select = $db->prepare('SELECT id FROM `' .$stable . '` WHERE id=? LIMIT 1');
						$select->execute(array(
						$rowId
						));
						
						if ($row = $select->fetch()) {
							$query = $db->prepare('UPDATE `' .$stable . '`  SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
							} else {
							$query = $db->prepare('INSERT INTO `' .$stable . '` (id, `' . $colMap[$c] . '`) VALUES(:id, :newVal)');
						}
						$query->bindValue(':id', $rowId, PDO::PARAM_INT);
						$query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
						$query->execute();
					}
				}
			}
			
			$out = array(
			'result' => 'ok'
			);
			echo json_encode($out);
			
			// close the database connection
			$db = NULL;
		}
		catch (PDOException $e) {
			print 'Exception : ' . $e->getMessage();
		}
	?>	