<?php
 

 
  
  
$dsn = 'mysql:dbname=decsys;host=127.0.0.1';
$user = 'root';
$password = '';
$db  = new PDO($dsn, $user, $password);

     $today=date("Y-m-d");
 
$sth = $db->prepare("SELECT * FROM today_plan");
$sth->execute();

/* Exercise PDOStatement::fetch styles */
print("PDO::FETCH_ASSOC: ");
print("Return next row as an array indexed by column name\n");
$result = $sth->fetch(PDO::FETCH_ASSOC);
print_r($result)."<p>";
print("\n");
print("<P>");
print("PDO::FETCH_BOTH: ");
print("Return next row as an array indexed by both column name and number\n");
$result = $sth->fetch(PDO::FETCH_BOTH);
print_r($result);
print("\n");
print("<P>");
print("PDO::FETCH_LAZY: ");
print("Return next row as an anonymous object with column names as properties\n");
$result = $sth->fetch(PDO::FETCH_LAZY);
print_r($result);
print("\n");
print("<P>");
print("PDO::FETCH_OBJ: ");
print("Return next row as an anonymous object with column names as properties\n");
$result = $sth->fetch(PDO::FETCH_OBJ);
print $result->NAME;
print("\n"); 
print("<P>");
?>
 