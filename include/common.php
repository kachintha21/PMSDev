<?php

session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
date_default_timezone_set("Asia/Colombo");

function getCurrentSessionUser() {
    ob_start();    
    if (isset($_SESSION['logged_usr_id'])) {
        return ($_SESSION['logged_usr_id']);
    } else {

        header("location:../index.php");
    }
}

function AddPlayTime($oldPlayTime, $PlayTimeToAdd) {
    $old = explode(":", $oldPlayTime);
    $play = explode(":", $PlayTimeToAdd);

    $hours = $old[0] + $play[0];
    $minutes = $old[1] + $play[1];

    if ($minutes > 59) {
        $minutes = $minutes - 60;
        $hours++;
    }

    if ($minutes < 10) {
        $minutes = "0" . $minutes;
    }

    if ($minutes == 0) {
        $minutes = "00";
    }

    $sum = $hours . ":" . $minutes;
    return $sum;
}



function appendTime($time="", $duration=0){
    return date("Y-m-d H:i:s", strtotime($time . " + $duration minutes"));
}

function dayPrint($c=1){
    switch($c){
        case 1: return "Today";
        case 2: return "Tomorrow";
        case 3: return "Day After Tomorrow";    
    }
}

   function getShift($hour){
		   //$hour =date("H");
		   if($hour>=06 && $hour<=13.59){
		   return "Shift 06.00 -2.00";
		   }
		   if($hour>12 && $hour<22){
		   return "Shift 02.00 -10.00";
		   }
		   if($hour<06 && $hour>22){
		      return "Shift 10.00 -06.00";
		   }
           return "Shift 10.00 -06.00";
		   
		   }
function appendDdTime($time1, $time2){
    
  $datetime1 = new DateTime("2000-01-01 $time1:00");
$datetime2 = new DateTime("2000-01-01 $time2:00");
$interval = $datetime1->diff($datetime2);
  
     return $interval->format('%i');
//$hours = intval($dateDiff/60);
//$minutes = $dateDiff%60;

//$hours = intval($dateDiff/60);
//$minutes = $dateDiff%60;
}

function getServerDate() {
    $today = date("Y-m-d");
    return $today;
}




function getServerNewDate() {
    $today = date("Ymd");
    return substr($today, 2, 9);
}

function getServerPformatDate() {
    $today = date("Ymd");
    return substr($today, 2, 9);
}

function getServerY() {
    $today = date("Y");
    return substr($today, 2, 3);
}

function getServerTime() {
    $time = date("H:i:s");
    return $time;
}

function getServerHM() {
    $time = date("H:i");
    return $time;
}

function Layout_simulation() {
    return 10;
}

function StylesColor($judgment) {
    switch ($judgment) {
        case "OK":
            $color = "#0000FF";
            echo("<label style=\"color: $color\"> $judgment </label>");
            break;

        case "NG":
            $color = "#FF0000";
            echo("<label  style=\"color: $color\"><b> $judgment </b></label>");
            break;


        default:
            $color = "#FF0000";
            echo("<label    style=\"color: $color\">$judgment</label>");
    }
}

?>
