<?php
// Include your database connection file
include("database_connections.php");

// Error reporting (adjust as needed)
error_reporting(E_ALL);

// Retrieve the plan date and shift type from the URL parameters
$plan_date = $_GET['p_date'];
$shift_type = $_GET['shift']; // Assuming 'shift' is passed as a parameter, adjust as per your actual implementation

// Query to fetch inspector and plan type for the given plan date
$sql_final_plan = mysqli_query($con, "SELECT a.planner AS ins, a.p_type FROM tbl_cut_ins_planner_time a WHERE a.p_date = '$plan_date'");

// Start HTML output
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cutting & Ins Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
        .mark {
            background-color: yellow; /* Adjust the color as needed */
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">';
    
// Check if there are records for the given plan date
if (mysqli_num_rows($sql_final_plan) > 0) {
    // Loop through each record
    while ($row = mysqli_fetch_array($sql_final_plan)) {
        $inspector = $row['ins'];
        $plan_type = $row['p_type'];
        
        // Output inspector, plan type, and plan date
        echo '
        <table>
            <tr>
                <td colspan="8" class="center"><strong>Inspector:</strong> ' . $inspector . '</td>
            </tr>
            <tr>
                <td colspan="8" class="center"><strong>Work Time:</strong> ' . $plan_type . '</td>
            </tr>
            <tr>
                <td colspan="8" class="center"><strong>Plan Date:</strong> ' . $plan_date . '</td>
            </tr>
            <tr>
                <th>No</th>
                <th>Pro No</th>
                <th>Design</th>
                <th>Lot</th>
                <th>Plan Qty</th>
                <th>Plan Time (Min:Sec)</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>';
        
        // Query to fetch detailed data for the inspector and plan date
        $query_detail = mysqli_query($con, "SELECT * FROM tbl_cut_ins_planner_wise_data WHERE p_date = '$plan_date' AND ins = '$inspector'");
        
        // Counter variable for row number
        $count = 0;
        
        // Check if there are detailed records
        if (mysqli_num_rows($query_detail) > 0) {
            // Initialize start time based on shift type or default to 7:30
            if ($plan_type == 'General') {
                $current_time = strtotime('07:30:00');
            } elseif ($plan_type == 'Shift') {
                $current_time = strtotime('06:00:00');
            }
             elseif ($plan_type == 'Shift_Sat') {
                $current_time = strtotime('06:00:00');
            }
             elseif ($plan_type == 'General_Sat') {
                $current_time = strtotime('07:30:00');
            }else {
                $current_time = strtotime('07:30:00'); // Default to 7:30 if no specific shift type is provided
            }
            
            // Flags to track if breaks have been added
            $morning_tea_added = false;
            $lunch_time_added = false;
            $evening_tea_added = false;
            
            // Loop through each detailed record
            while ($detail_row = mysqli_fetch_array($query_detail)) {
                $count++;
                $pro_no = $detail_row['pro_no'];
                $design = $detail_row['design'];
                $lot = $detail_row['lot'];
                $qty = $detail_row['qty'];
                $req_time = $detail_row['req_time'];
                
                // Calculate minutes and seconds from required time
                $min = floor($req_time / 60);
                $sec = $req_time % 60;
                
                // Calculate end time based on current time + required time
                $start_time = $current_time;
                $end_time = $current_time + $req_time;
                
                // Format start and end times
                $formatted_start_time = date("H:i:s", $start_time);
                $formatted_end_time = date("H:i:s", $end_time);
                
                // Check if end_time is after 9:00 and add a morning tea break row if needed
                if (date("H:i", $end_time) > "09:00" && !$morning_tea_added) {
                    // Calculate remaining time to add to the next row
                    $remaining_time = $end_time - strtotime('09:00:00');
                    $remaining_min = floor($remaining_time / 60);
                    $remaining_sec = $remaining_time % 60;
                    
                    // Adjust plan quantity for the task before 9:00
                    $qty_before_tea = $qty * (($req_time - $remaining_time) / $req_time);
                    $req_time_before_tea = $remaining_time;
                    
                    // Output current row up to 9:00
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . round($qty_before_tea, 2) . '</td>
                        <td>' . sprintf('%02d:%02d', floor(($req_time - $remaining_time) / 60), ($req_time - $remaining_time) % 60) . '</td>
                        <td>' . $formatted_start_time . '</td>
                        <td>' . date("H:i:s", strtotime('09:00:00')) . '</td>
                    </tr>';
                    
                    // Output morning tea break row
                    echo '
                    <tr class="mark">
                        <td colspan="8" class="center"><strong>Morning Tea</strong></td>
                    </tr>';
                    
                    // Adjust plan quantity for the task after morning tea break
                    $qty_before_tea = $qty * ($remaining_time / $req_time);
                    $req_time_before_tea = $remaining_time;
                    
                    
                    if($plan_type == 'Shift_Sat' || $plan_type == 'General_Sat'){
                        // Output remaining part of the task starting from 9:20
                        echo '
                        <tr>
                            <td>' . $count . '</td>
                            <td>' . $pro_no . '</td>
                            <td>' . $design . '</td>
                            <td>' . $lot . '</td>
                            <td>' . round($qty_before_tea, 2) . '</td>
                            <td>' . sprintf('%02d:%02d', $remaining_min, $remaining_sec) . '</td>
                            <td>' . date("H:i:s", strtotime('09:30:00')) . '</td>
                            <td>' . date("H:i:s", strtotime('09:30:00') + $remaining_time) . '</td>
                        </tr>';
                    }
                    else{
                        // Output remaining part of the task starting from 9:20
                        echo '
                        <tr>
                            <td>' . $count . '</td>
                            <td>' . $pro_no . '</td>
                            <td>' . $design . '</td>
                            <td>' . $lot . '</td>
                            <td>' . round($qty_before_tea, 2) . '</td>
                            <td>' . sprintf('%02d:%02d', $remaining_min, $remaining_sec) . '</td>
                            <td>' . date("H:i:s", strtotime('09:20:00')) . '</td>
                            <td>' . date("H:i:s", strtotime('09:20:00') + $remaining_time) . '</td>
                        </tr>';
                    }
                    
                    
                    
                    // Set the flag to true indicating morning tea row has been added
                    $morning_tea_added = true;
                    
                    // Update current_time for the remaining time after the break
                    
                    if($plan_type == 'Shift_Sat' || $plan_type == 'General_Sat'){
                        $current_time = strtotime('09:30:00') + $remaining_time;
                    }
                    else{
                        $current_time = strtotime('09:20:00') + $remaining_time;
                    }
                } elseif ($plan_type == 'General' && date("H:i", $end_time) >= "12:00" && !$lunch_time_added) {
                    // Calculate remaining time to add to the next row after lunch break
                    $remaining_time = $end_time - strtotime('12:00:00');
                    $remaining_min = floor($remaining_time / 60);
                    $remaining_sec = $remaining_time % 60;
                    
                    // Adjust plan quantity for the task before lunch
                    $qty_before_lunch = $qty * (($req_time - $remaining_time) / $req_time);
                    
                    // Output current row up to 12:00
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . round($qty_before_lunch) . '</td>
                        <td>' . sprintf('%02d:%02d', floor(($req_time - $remaining_time) / 60), ($req_time - $remaining_time) % 60) . '</td>
                        <td>' . $formatted_start_time . '</td>
                        <td>' . date("H:i:s", strtotime('12:00:00')) . '</td>
                    </tr>';
                    
                    // Output lunch break row
                    echo '
                    <tr class="mark">
                        <td colspan="8" class="center"><strong>Lunch Break</strong></td>
                    </tr>';
                    
                    // Output remaining part of the task starting from 12:45
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . round($qty - $qty_before_lunch) . '</td>
                        <td>' . sprintf('%02d:%02d', $remaining_min, $remaining_sec) . '</td>
                        <td>' . date("H:i:s", strtotime('12:45:00')) . '</td>
                        <td>' . date("H:i:s", strtotime('12:45:00') + $remaining_time) . '</td>
                    </tr>';
                    
                    // Set the flag to true indicating lunch break row has been added
                    $lunch_time_added = true;
                    
                    // Update current_time for the remaining time after the break
                    $current_time = strtotime('12:45:00') + $remaining_time;
                } elseif ($plan_type == 'General' && date("H:i", $end_time) >= "15:00" && !$evening_tea_added) {
                    // Calculate remaining time to add to the next row after evening tea break
                    $remaining_time = $end_time - strtotime('15:00:00');
                    $remaining_min = floor($remaining_time / 60);
                    $remaining_sec = $remaining_time % 60;
                    
                    // Adjust plan quantity for the task before evening tea
                    $qty_before_tea = $qty * (($req_time - $remaining_time) / $req_time);
                    
                    // Output current row up to 3:00 PM
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . round($qty_before_tea, 2) . '</td>
                        <td>' . sprintf('%02d:%02d', floor(($req_time - $remaining_time) / 60), ($req_time - $remaining_time) % 60) . '</td>
                        <td>' . $formatted_start_time . '</td>
                        <td>' . date("H:i:s", strtotime('15:00:00')) . '</td>
                    </tr>';
                    
                    // Output evening tea break row
                    echo '
                    <tr class="mark">
                        <td colspan="8" class="center"><strong>Evening Tea Break</strong></td>
                    </tr>';
                    
                    // Output remaining part of the task starting from 3:15 PM
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . round($qty - $qty_before_tea, 2) . '</td>
                        <td>' . sprintf('%02d:%02d', $remaining_min, $remaining_sec) . '</td>
                        <td>' . date("H:i:s", strtotime('15:15:00')) . '</td>
                        <td>' . date("H:i:s", strtotime('15:15:00') + $remaining_time) . '</td>
                    </tr>';
                    
                    // Set the flag to true indicating evening tea row has been added
                    $evening_tea_added = true;
                    
                    // Update current_time for the remaining time after the break
                    $current_time = strtotime('15:15:00') + $remaining_time;
                } else {
                    // Output regular row
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $pro_no . '</td>
                        <td>' . $design . '</td>
                        <td>' . $lot . '</td>
                        <td>' . $qty . '</td>
                        <td>' . sprintf('%02d:%02d', $min, $sec) . '</td>
                        <td>' . $formatted_start_time . '</td>
                        <td>' . $formatted_end_time . '</td>
                    </tr>';
                    
                    // Update current_time for the next record
                    $current_time = $end_time;
                }
            }
        } else {
            // If no detailed records found
            echo '
            <tr>
                <td colspan="8" class="center">No records found</td>
            </tr>';
        }
        
        echo '</table>';
    }
} else {
    // If no records found for the given plan date
    echo '
    <div class="center">
        <p>No records found for the selected date.</p>
    </div>';
}

// End of HTML body and PHP script
echo '
</body>
</html>';

// Close the database connection
mysqli_close($con);
?>
