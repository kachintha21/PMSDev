<?php
 error_reporting(E_PARSE | E_WARNING | E_ERROR);
 include("update.php");
 include("index.php");
 include("index_oil.php");
 include("delete.php");
 include("delete_oil.php");
 include("insert.php");
 include("insert_mode.php");   
 header("location:../view/pigment_csv_upload_view.php");
  
?>


