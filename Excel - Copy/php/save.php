<?php
 

try {
  //open the database
 // $db = new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
$dsn = 'mysql:dbname=decsys;host=127.0.0.1';
$user = 'root';
$password = '';
$db  = new PDO($dsn, $user, $password);


  //create the database if does not exist
  $db->exec("CREATE TABLE IF NOT EXISTS today_plan (id INTEGER PRIMARY KEY, manufacturer TEXT, year INTEGER, price INTEGER)");
  
  $colMap = array(
    0 => 'belt',
    1 => 'distant',
    2 => 'pjtno',
	3 => 'pattern',
    4 => 'itemno',
    5 => 'pro_qty',
	6 => 'act_qty',
    7 => 'yeild',
    8 => 'remark',
	9 => 'shipment',
	10 => 'temp', 
	11 => 'fire_date',
    12 => 'kiln',
	13 => 'kiln_plan',
    14 => 'kiln_act',
    15 => 'ins_date',
	16 => 'ins_act',
    17 => 'plandate',
    18 => 'ship_date' 
 
 
    
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

      $select = $db->prepare('SELECT id FROM today_plan WHERE id=? LIMIT 1');
      $select->execute(array(
        $rowId
      ));
      
      if ($row = $select->fetch()) {
        $query = $db->prepare('UPDATE today_plan SET `' . $colMap[$colId] . '` = :newVal WHERE id = :id');
      } else {
        $query = $db->prepare('INSERT INTO today_plan (id, `' . $colMap[$colId] . '`) VALUES(:id, :newVal)');
      }
      $query->bindValue(':id', $rowId, PDO::PARAM_INT);
      $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
      $query->execute();
    }
  } elseif ($_POST['data']) {
    $select = $db->prepare('DELETE FROM today_plan');
    $select->execute();
    
    for ($r = 0, $rlen = count($_POST['data']); $r < $rlen; $r++) {
      $rowId = $r + 1;
      for ($c = 0, $clen = count($_POST['data'][$r]); $c < $clen; $c++) {
        if (!isset($colMap[$c])) {
          continue;
        }
        
        $newVal = $_POST['data'][$r][$c];
        
        $select = $db->prepare('SELECT id FROM today_plan WHERE id=? LIMIT 1');
        $select->execute(array(
          $rowId
        ));
        
        if ($row = $select->fetch()) {
          $query = $db->prepare('UPDATE today_plan SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
        } else {
          $query = $db->prepare('INSERT INTO today_plan (id, `' . $colMap[$c] . '`) VALUES(:id, :newVal)');
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