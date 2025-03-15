<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Include configuration files
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$pl_im = $_POST['pl_im'];
$act_im = $_POST['act_im'];
$pp_time = $_POST['pp_time'];
$unload_time = $_POST['unload_time'];
$shift1_op = $_POST['shift1_op'];
$shift1_helper = $_POST['shift1_helper'];
$shift2_op = $_POST['shift2_op'];
$shift2_helper = $_POST['shift2_helper'];
$data_uploader = $_POST['data_uploader'];
$mc_no = $_POST['mc_no'];
$p_date = $_POST['p_date'];

// Check if record exists
$query = "SELECT COUNT(*) as count FROM tbl_impressions_data WHERE mc_no = ? AND p_date = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $mc_no, $p_date);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    // Record exists, update it
    $stmt = $conn->prepare("UPDATE tbl_impressions_data SET pl_im = ?, act_im = ?, pp_time = ?, unload_time = ?, shift1_op = ?, shift1_helper = ?, shift2_op = ?, shift2_helper = ?, data_uploader = ? WHERE mc_no = ? AND p_date = ?");
    $stmt->bind_param("sssssssssss", $pl_im, $act_im, $pp_time, $unload_time, $shift1_op, $shift1_helper, $shift2_op, $shift2_helper, $data_uploader, $mc_no, $p_date);
    if ($stmt->execute()) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $stmt->error;
    }
} else {
    // Record doesn't exist, insert it
    $stmt = $conn->prepare("INSERT INTO tbl_impressions_data (pl_im, act_im, pp_time, unload_time, shift1_op, shift1_helper, shift2_op, shift2_helper, data_uploader, mc_no, p_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $pl_im, $act_im, $pp_time, $unload_time, $shift1_op, $shift1_helper, $shift2_op, $shift2_helper, $data_uploader, $mc_no, $p_date);
    if ($stmt->execute()) {
        echo "Data saved successfully!";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }
}

// Close connection
$stmt->close();
$conn->close();
?>
