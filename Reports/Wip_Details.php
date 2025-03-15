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
            $s_date = $_POST['from'];
            $hasFilters = true;
        }
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WIP Detail Report</title>
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
            <h2 class="text-center"><u>WIP Detail Report</u></h2>
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
                                <th colspan=4 align='center'>Lot register - Not Planned</th>
                            </tr>
                            <tr>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT COUNT(c.id) as unplanned_count FROM (SELECT aa.*,bb.id AS b_id FROM (SELECT * FROM preparing_layout_tbl a GROUP BY a.ref_no_plt) aa 
                                LEFT join (SELECT * FROM virtual_planner_final_tbl b GROUP BY b.pro_no_vpft) bb
                                ON aa.ref_no_plt = bb.pro_no_vpft ) c WHERE c.b_id IS NULL AND c.id > 5000
                                ");
                                
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $unplanned_count = $a2['unplanned_count'];
                                    $p_count = $a2['p_count'];  // Corresponds to the "pl_im" column
                                    $a_count = $a2['a_count']; // Corresponds to the "act_im" column
                                    $per = $a2['per']; // Corresponds to the "pp_time" column
                                    
                                    // If you need to calculate any new values, you can do so here
                                    
                                ?>
                                <tr>
                                    <td><?php echo $unplanned_count; ?></td>
                                </tr>
                                <?php
                                }
                                
                            ?>
                        </tbody>
                    </table>
                    
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th colspan=4 align='center'>Machine Details</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Machine Planned Count</th>
                                <th>Machine Actual Count</th>
                                <th>Machine Actual Per</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT  a.date_vpft,p.machine_no_vpft AS mc_no,p.p_count,a.a_count,ROUND((a.a_count * 100 /p.p_count), 2) as per FROM  
                                (SELECT machine_no_vpft,COUNT(a.id) AS p_count FROM virtual_planner_final_tbl a WHERE a.date_vpft = '$s_date'
                                AND a.plan_colors_vpft !='S00' ) p
                                LEFT JOIN (SELECT machine_no_vpft,COUNT(a.id) AS a_count,date_vpft FROM virtual_planner_final_tbl a WHERE a.date_vpft = '$s_date'
                                AND a.plan_colors_vpft !='S00'  AND a.imp_actual_vpft !='' ) a
                                ON p.machine_no_vpft = a.machine_no_vpft 
                                ");
                                
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $date_vpft = $a2['date_vpft'];
                                    $p_count = $a2['p_count'];  // Corresponds to the "pl_im" column
                                    $a_count = $a2['a_count']; // Corresponds to the "act_im" column
                                    $per = $a2['per']; // Corresponds to the "pp_time" column
                                    
                                    // If you need to calculate any new values, you can do so here
                                    
                                ?>
                                <tr>
                                    <td><?php echo $date_vpft; ?></td>
                                    <td><?php echo $p_count; ?></td>
                                    <td><?php echo $a_count; ?></td>
                                    <td><?php echo $per."%"; ?></td>
                                </tr>
                                <?php
                                }
                                
                            ?>
                        </tbody>
                    </table>
                    
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th colspan=4 align='center'>Printing Approval</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Late Count</th>
                                <th>On Time Count</th>
                                <th>Total Count</th>
                                <th>On Time Per</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT * FROM (select pro_no_lpt as production_no_pst,desing_no_lpt AS pattern_no_pst,lot_no_lpt AS lot_no_pst FROM 
                                (select *,(case when (aa.t is null) then aa.plan_n else aa.plan_n- aa.t - aa.def  end) AS `rem2` from (SELECT *, 
                                (case when (t is null) then planned_qty_lpt else `planned_qty_lpt`- t - def end) AS `rem`,
                                (case when (close_curve_after_lpt > '0') then close_curve_after_lpt else planned_qty_lpt end) AS `plan_n` 
                                FROM layout_plans_tbl a left join (SELECT SUM(c.item01_dt)As t ,SUM(c.register_dt)As def ,c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt 
                                FROM dinspection_tbl c  group by c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt ) b 
                                on a.pro_no_lpt=b.pro_no_dt and a.curve_no_lpt = b.curve_no_dt and a.decal_no_lpt = b.decal_pattern_dt
                                where a.item05_lpt != '1') aa) aaa 
                                left join (SELECT `ref_no_plt`,`item01_plt` FROM `preparing_layout_tbl` group by `ref_no_plt`) bbb
                                on aaa.`pro_no_lpt` =bbb.ref_no_plt
                                LEFT JOIN (SELECT * FROM  printing_status_tbl d GROUP BY d.ref_no_pst) ccc
                                ON aaa.pro_no_lpt= ccc.ref_no_pst
                                where aaa.rem2>0  AND ccc.pro06_pst !='1'   AND ccc.pro08_pst !='1'   AND ccc.pro10_pst !='1'
                                AND aaa.pro_no_lpt  IN (SELECT b.pro_no_vpft FROM virtual_planner_final_tbl b 
                                WHERE b.id IN (SELECT MAX(a.id) FROM virtual_planner_final_tbl a GROUP BY a.pro_no_vpft)
                                AND b.item01_vpft !='' AND b.item01_vpft >= DATE_SUB(NOW(), INTERVAL 100 DAY) AND b.status_vpft !='3')
                                group BY aaa.pro_no_lpt ORDER BY `aaa`.`pro_no_lpt`) ppp
                                LEFT JOIN (SELECT MAX(a.date_vpft)AS l_date , a.pro_no_vpft FROM virtual_planner_final_tbl a
                                GROUP BY a.pro_no_vpft) qqq
                                ON ppp.production_no_pst = qqq.pro_no_vpft 
                                ");
                                
                                $val_late=0;
                                $val_late_n=0;
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $date_vpft = $s_date;
                                    $l_date = $a2['l_date'];
                                    
                                    
                                    
                                    $datetime1 = new DateTime($date_vpft);  // Create a DateTime object from the first date
                                    $datetime2 = new DateTime($l_date);    // Create a DateTime object from the second date
                                    
                                    if ($datetime1 > $datetime2) {
                                        $val_late++; 
                                        $total++;
                                    } 
                                    else {
                                        $val_late_n++; 
                                        $total++;
                                    }
                                    
                                    
                                }
                                
                            ?>
                            <tr>
                                <td><?php echo $date_vpft; ?></td>
                                <td><?php echo $val_late; ?></td>
                                <td><?php echo $val_late_n; ?></td>
                                <td><?php echo $total ?></td>
                                <td><?php echo round(($val_late_n * 100) / $total, 2)."%"; ?></td>
                            </tr>
                            <?php
                                
                            ?>
                        </tbody>
                    </table>
                    
                    
                    
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th colspan=5 align='center'>Top Coat Details</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Late Count</th>
                                <th>On Time Count</th>
                                <th>Total Count</th>
                                <th>On Time Per</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT aa.p_date,aa.late,COUNT(aa.id) val_L FROM (SELECT a.*,'late'
                                FROM tbl_top_coat_plan a 
                                LEFT JOIN top_coat_printing_tbl b
                                ON a.pro_no=b.pro_no_tcpt
                                WHERE b.pro_no_tcpt IS NULL and a.p_date !='$s_date' GROUP BY a.pro_no
                                
                                UNION 
                                
                                SELECT *,'New' from tbl_top_coat_plan a where p_date ='$s_date' order by ABS(order_no),pro_no) aa
                                GROUP BY aa.late
                                ORDER BY aa.p_date,aa.order_no 
                                ");
                                $total=0;
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $date_vpft = $s_date;
                                    $late = $a2['late'];
                                    
                                    if($late == 'New'){
                                        $val_New = $a2['val_L']; 
                                        $total += $val_New;
                                    }
                                    if($late == 'late'){
                                        $val_late = $a2['val_L']; 
                                        $total += $val_late;
                                    }
                                    
                                    
                                    
                                }
                                
                            ?>
                            <tr>
                                <td><?php echo $date_vpft; ?></td>
                                <td><?php echo $val_late; ?></td>
                                <td><?php echo $val_New; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo round(($val_New * 100) / $total, 2)."%"; ?></td>
                            </tr>
                            <?php
                                
                            ?>
                        </tbody>
                    </table>
                    
                    
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th colspan=5 align='center'>QC Details</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>Late Count</th>
                                <th>On Time Count</th>
                                <th>Total Count</th>
                                <th>On Time Per</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT aaa.*,bbb.org_date_tcpt FROM (SELECT * FROM (SELECT ref_no_pst as pro_no_qc,pattern_no_pst,lot_no_pst FROM printing_status_tbl 
                                WHERE pro08_pst='1'  GROUP BY production_no_pst
                                
                                
                                UNION ALL
                                
                                SELECT b.pro_no_qc AS pro_no_qc,b.pattern_no_qc AS pattern_no_pst,b.lot_no_qc AS lot_no_pst FROM qc_qc_approval_tbl b 
                                WHERE b.id IN (SELECT MAX(a.id) FROM qc_qc_approval_tbl a GROUP BY a.pro_no_qc,a.item01_qc)
                                AND b.reject_items_qc = 'Pending') aa
                                GROUP BY aa.pro_no_qc) aaa
                                LEFT JOIN top_coat_printing_tbl bbb
                                ON aaa.pro_no_qc =bbb.pro_no_tcpt
                                GROUP BY aaa.pro_no_qc
                                ");
                                $count_late=0;
                                $count_new=0;
                                $total=0;
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $date_vpft = $s_date;
                                    $org_date_tcpt = $a2['org_date_tcpt'];
                                    
                                    $org_date_tcpt_plus_10 = date('Y-m-d', strtotime($org_date_tcpt . ' +1 days'));
                                    
                                    if ($s_date >= $org_date_tcpt_plus_10) {
                                        $count_late++;
                                        
                                    }
                                    else{
                                        $count_new++;
                                        
                                    }
                                    
                                    $total++;
                                    
                                }
                                
                            ?>
                            <tr>
                                <td><?php echo $date_vpft; ?></td>
                            <td><?php echo $count_late; ?></td>
                            <td><?php echo $count_new; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo round(($count_new * 100) / $total, 2)."%"; ?></td>
                            </tr>
                            <?php
                            
                            ?>
                            </tbody>
                            </table>
                    
                    
                    <table class="table table-bordered table-hover" id="tblData">
                        <thead>
                            <tr>
                                <th colspan=5 align='center'>Decal Cut & Ins</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>More than 10 Days Late Count</th>
                                <th>On Time Count</th>
                                <th>Total Count</th>
                                <th>On Time Per</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetch data based on the date range filter
                                $result1 = mysqli_query($con, "SELECT * FROM (SELECT aa.*,bb.ins_date FROM (SELECT * FROM tbl_cut_ins_plan_finalize a WHERE a.plan_status =1
GROUP BY a.pro_no,a.p_date) aa 
LEFT JOIN (SELECT * FROM tbl_cut_ins_plan_ins_data a 
GROUP BY a.pro_no,a.p_date) bb
ON aa.pro_no=bb.pro_no AND aa.p_date=bb.p_date
WHERE aa.plan_status=1) aaa
WHERE aaa.ins_date IS null
                                ");
                                $count_late=0;
                                $count_new=0;
                                $total=0;
                                while ($a2 = mysqli_fetch_array($result1)) {
                                    $date_vpft = $s_date;
                                    $p_date = $a2['p_date'];
                                    
                                    $p_date_plus_10 = date('Y-m-d', strtotime($p_date . ' +10 days'));
                                    
                                    if ($s_date >= $p_date_plus_10) {
                                        $count_late++;
                                        
                                    }
                                    else{
                                        $count_new++;
                                        
                                    }
                                    
                                    $total++;
                                    
                                }
                                
                            ?>
                            <tr>
                                <td><?php echo $date_vpft; ?></td>
                            <td><?php echo $count_late; ?></td>
                            <td><?php echo $count_new; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo round(($count_new * 100) / $total, 2)."%"; ?></td>
                            </tr>
                            <?php
                            
                            ?>
                            </tbody>
                            </table>
                    
                            
                            </div>
                            </center>
                            
                            
                            <?php endif; ?>
                            </div>
                            </body>
                            </html>
                                                        