<?php
    session_start();
    error_reporting(0);
    include("database_connections.php");
    
    
    
    if (isset($_POST['filter'])) {
        //$hasFilters = false;
        if (!empty($_POST['from']) ) {
            // Add date range filtering
            $where = " a.p_date = '" . $_POST['from'] . "' ";
            $where_2 = " a.date_vpft = '" . $_POST['from'] . "' ";
            $hasFilters = true;
        }
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Common Report</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../js/jquery-1.9.1.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <style>
            body {
            padding: 0;
            margin: 0;
            background-image: url("images/bk-r.jpg");
            background-color: #cccccc;
            }
            .table-hover tbody tr:hover {
            background-color: #C7E0D9;
            }
            .form-container {
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            margin-bottom: 20px;
            }
            .btn-home {
            margin-bottom: 20px;
            }
        </style>
        <script>
            $(function() {
                // Initialize the datepickers for from and to dates
                $("#from").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function(selectedDate) {
                        $("#to").datepicker("option", "minDate", selectedDate);
                    }
                });
                $("#to").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function(selectedDate) {
                        $("#from").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });
            
            function validateForm() {
                var fromDate = document.getElementById("from").value;
                var toDate = document.getElementById("to").value;
                
                if (fromDate === "" || toDate === "") {
                    alert('Please select a valid date range.');
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <a href="/PMSDev/view/index.php" class="btn btn-primary btn-home">
                <img src="images/home.png" width="40" height="40" /> Home
            </a>
            <h2 class="text-center"><u>Common Report</u></h2>
            <div class="form-container">
                <form id="form1" name="form1" method="post" onsubmit="return validateForm()">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="from">Date</label>
                            <input type="text" name="from" id="from" class="form-control" value="<?php if (isset($_POST['from'])) echo $_POST['from']; ?>">
                        </div>
                        
                        <div class="form-group col-md-3 align-self-end">
                            <button type="submit" name="filter" id="filter" class="btn btn-primary">Search</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='Yield_report.php'">Reset</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            
            <?php if (isset($_POST['filter']) && $hasFilters): ?>
            <center>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th>MC No</th>
                                <th>Planned Impact</th>
                                <th>Actual Impact</th>
                                <th>PP Time</th>
                                <th>Unload Time</th>
                                <th>Shift 1 Operator</th>
                                <th>Shift 1 Helper</th>
                                <th>Shift 2 Operator</th>
                                <th>Shift 2 Helper</th>
                                <th>Data Uploader</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT 
                                id,
                                pl_im,
                                act_im,
                                pp_time,
                                unload_time,
                                shift1_op,
                                shift1_helper,
                                shift2_op,
                                shift2_helper,
                                data_uploader,
                                mc_no,
                                p_date
                                FROM 
                                tbl_impressions_data a
                                WHERE 
                                $where;
                                ");
                                
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $mc_no = $a2['mc_no'];
                                    $pl_im = $a2['pl_im'];  // Corresponds to the "pl_im" column
                                    $act_im = $a2['act_im']; // Corresponds to the "act_im" column
                                    $pp_time = $a2['pp_time']; // Corresponds to the "pp_time" column
                                    $unload_time = $a2['unload_time']; // Corresponds to the "unload_time" column
                                    $shift1_op = $a2['shift1_op']; // Corresponds to the "shift1_op" column
                                    $shift1_helper = $a2['shift1_helper']; // Corresponds to the "shift1_helper" column
                                    $shift2_op = $a2['shift2_op']; // Corresponds to the "shift2_op" column
                                    $shift2_helper = $a2['shift2_helper']; // Corresponds to the "shift2_helper" column
                                    $data_uploader = $a2['data_uploader']; // Corresponds to the "data_uploader" column
                                    $p_date = $a2['p_date']; // Corresponds to the "p_date" column
                                    
                                    // If you need to calculate any new values, you can do so here
                                    
                                ?>
                                <tr>
                                    <td><?php echo $mc_no; ?></td>
                                    <td><?php echo $pl_im; ?></td>
                                    <td><?php echo $act_im; ?></td>
                                    <td><?php echo $pp_time; ?></td>
                                    <td><?php echo $unload_time; ?></td>
                                    <td><?php echo $shift1_op; ?></td>
                                    <td><?php echo $shift1_helper; ?></td>
                                    <td><?php echo $shift2_op; ?></td>
                                    <td><?php echo $shift2_helper; ?></td>
                                    <td><?php echo $data_uploader; ?></td>
                                    <td><?php echo $p_date; ?></td>
                                </tr>
                                <?php
                                }
                                
                            ?>
                        </tbody>
                    </table>
                </div>
            </center>
            
            <center>
                <div class="table-responsive">
                <?php
                                // Fetch data based on the date range filter
                                $result_m = mysqli_query($con, "SELECT 
                                machine_no_vpft
                                FROM 
                                virtual_planner_final_tbl a
                                WHERE 
                                $where_2 and a.plan_colors_vpft !='S00' group BY a.machine_no_vpft;
                                ");
                                
                               
                                
                                
                                
                                while ($a_m = mysqli_fetch_array($result_m)) {
                                
                                $machine_no_vpft = $a_m['machine_no_vpft'];
                                ?>
                                <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Machine No</th>
                                <th>Production No</th>
                                <th>Lot</th>
                                <th>Plan Colour</th>
                                <th>Plan Sheet</th>
                                <th>Actual Sheet</th>
                                <th>Plan Time</th>
                                <th>Change Over Time</th>
                                <th>Loss Time</th>
                                <th>Loss Time Reason</th>
                                <th>Less Print/Skip Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result2 = mysqli_query($con, "SELECT 
                                *
                                FROM 
                                virtual_planner_final_tbl a
                                LEFT JOIN tbl_machine_extra_data b
                                ON a.id=b.vpft_id
                                WHERE 
                                $where_2  and a.plan_colors_vpft !='S00' and machine_no_vpft= '$machine_no_vpft';
                                ");
                                
                                $number=0;
                                
                                while ($a2 = mysqli_fetch_array($result2)) {
                                $number++;
                                    $pro_no_vpft = $a2['pro_no_vpft'];
                                    $machine_no_vpft = $a2['machine_no_vpft'];
                                    $lot_vpft = $a2['lot_vpft'];  // Corresponds to the "pl_im" column
                                    $plan_colors_vpft = $a2['plan_colors_vpft']; // Corresponds to the "act_im" column
                                    $imp_plan_vpft = $a2['imp_plan_vpft']; // Corresponds to the "pp_time" column
                                    $ac_sheets = $a2['ac_sheets']; // Corresponds to the "unload_time" column
                                    $pl_time = $a2['pl_time']; // Corresponds to the "shift1_op" column
                                    $co_time = $a2['co_time']; // Corresponds to the "shift1_helper" column
                                    $lo_time = $a2['lo_time']; // Corresponds to the "shift2_op" column
                                    $lt_reason = $a2['lt_reason']; // Corresponds to the "shift2_helper" column
                                    $lp_reason = $a2['lp_reason']; // Corresponds to the "data_uploader" column
                                    $p_date = $a2['p_date']; // Corresponds to the "p_date" column
                                    
                                    // If you need to calculate any new values, you can do so here
                                    
                                ?>
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    
                                    <td><?php echo $machine_no_vpft; ?></td>
                                    <td><?php echo $pro_no_vpft; ?></td>
                                    <td><?php echo $lot_vpft; ?></td>
                                    <td><?php echo $plan_colors_vpft; ?></td>
                                    <td><?php echo $imp_plan_vpft; ?></td>
                                    <td><?php echo $ac_sheets; ?></td>
                                    <td><?php echo $pl_time; ?></td>
                                    <td><?php echo $co_time; ?></td>
                                    <td><?php echo $lo_time; ?></td>
                                    <td><?php echo $lt_reason; ?></td>
                                    <td><?php echo $lp_reason; ?></td>
                                </tr>
                                <?php
                                }
                                
                            ?>
                        </tbody>
                    </table>
                                <?php
                                }?>
                
                
                
                    
                </div>
            </center>
            <?php endif; ?>
        </div>
    </body>
</html>
