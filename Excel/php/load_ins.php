<?php
 

try {
  
  
  
$dsn = 'mysql:dbname=decsys;host=127.0.0.1';
$user = 'root';
$password = '';
$db  = new PDO($dsn, $user, $password);

   $today=date("n/j/Y");
 
 
  //select all data from the table
   
  $select = $db->prepare("SELECT * FROM today_plan  ORDER BY id ASC  ");
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