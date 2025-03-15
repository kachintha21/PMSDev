<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$con = mysqli_connect($server, $username, $password, $db);
$res = "SELECT id FROM oil_data_tbl WHERE oil_name_odt	=''  ORDER BY id DESC";
if ($rest = $con->query($res)) {
    if (mysqli_num_rows($rest) > 0) {
        while ($row = $rest->fetch_assoc()) {
            $id = $row['id'];
            $query = "DELETE FROM oil_data_tbl WHERE id='" . $id . "'   ";
            $result2 = mysqli_query($con, $query);
        }
    }
}
?>
 
