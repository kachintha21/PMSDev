<?php
 session_start();
 
try {
	
	 $sdate=$_SESSION['sdate'];
     $stable ="plan_".$sdate;

  //open the database
 // $db = new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
$dsn = 'mysql:dbname=decsys;host=127.0.0.1';
$user = 'root';
$password = '';
$db  = new PDO($dsn, $user, $password);


  //create the database if does not exist
  //$db->exec("CREATE TABLE IF NOT EXISTS `' .$stable . '` (id INTEGER PRIMARY KEY, manufacturer TEXT, year INTEGER, price INTEGER)");
  
  $colMap = array(
    0 => 'plandate',
	1 => 'belt',
    2 => 'distant',
    3 => 'pjtno',
	4 => 'pattern',
    5 => 'itemno',
    6 => 'pro_qty',
	 
    8 => 'priority',
    9 => 'remark',
	10 => 'shipment',
 
   
    11 => 'ship_date' 
 
 
    
  );
  
  if ($_POST['changes']) {
    foreach ($_POST['changes'] as $change) {
      $rowId  = $change[0] + 1;
      $colId  = $change[1];
      $newVal = strtoupper($change[3]);
      
      if (!isset($colMap[$colId])) {
        echo "\n spadam";
        continue;
      }

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