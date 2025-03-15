<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$conn = mysqli_connect($server, $username, $password, $db);

function getname($id, $server, $username, $password, $db) {
    $conn = mysqli_connect($server, $username, $password, $db);
    $query = "SELECT color_name_cct FROM color_code_tbl Where color_code_cct='" . $id . "' ORDER BY id DESC";
    if ($result = $conn->query($query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {

                return $row['color_name_cct'];
            }
        } else {

            return 'no-color';
        }
    }
}

$res = "SELECT id, IMIRCD FROM pigment_csv_tbl ORDER BY id DESC";

if ($rest = $conn->query($res)) {
    if (mysqli_num_rows($rest) > 0) {
        while ($row = $rest->fetch_assoc()) {
  // echo($row['IMIRCD']."<br>");
            $res_update = "UPDATE pigment_csv_tbl SET  			
           CCCC='" . getname($row['IMIRCD'], $server, $username, $password, $db) . "'		             
           WHERE id='" . $row['id'] . "' ";
           $result2 = mysqli_query($conn, $res_update);
        }
    }
}
?>
 
