<?php
    session_start();
    error_reporting(0);
    include("database_connections.php");

    $where = "a.pro_no_vpft !=''";

    if (isset($_POST['filter'])) {
        $hasFilters = false;
        if ($_POST['design'] != NULL) {
            $where .= " AND a.design_vpft='" . $_POST['design'] . "'";
            $hasFilters = true;
        }
        if ($_POST['pro_no'] != NULL) {
            $where .= " AND a.pro_no_vpft='" . $_POST['pro_no'] . "'";
            $hasFilters = true;
        }
        if ($_POST['lot'] != NULL) {
            $where .= " AND a.lot_vpft='" . $_POST['lot'] . "'";
            $hasFilters = true;
        }

        if (!$hasFilters) {
            echo "<script>alert('Cannot process without filter (High Volume Of Data)');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Printing Yield Report Curve</title>
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
	
	<style>
    .table-container {
        margin-bottom: 20px;
    }

    .table-container table {
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-collapse: collapse;
    }

    .table-container th, .table-container td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .table-container th {
        background-color: #f2f2f2;
    }
</style>

<style>
    #tblData2 {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    #tblData2 th,
    #tblData2 td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #tblData2 th {
        background-color: #f2f2f2;
    }

    #tblData2 tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #tblData2 tr:hover {
        background-color: #84DFC1;
    }
</style>

    <script>
        $(function() {
            $("#from").datepicker({
                dateFormat: 'yy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                onClose: function(selectedDate) {
                    $("#to").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#to").datepicker({
                dateFormat: 'yy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                onClose: function(selectedDate) {
                    $("#from").datepicker("option", "maxDate", selectedDate);
                }
            });
        });

        function validateForm() {
            var design = document.getElementById("design").value;
            var lot = document.getElementById("lot").value;
            var pro_no = document.getElementById("pro_no").value;

            if (design === "" && lot === "" && pro_no === "") {
                alert('Cannot process without filter (High Volume Of Data)');
                return false;
            }
            return true;
        }

        function exportTableToExcel(tableID, filename = '') {
            var table = document.getElementById("tblData");
            var rows = [];
            for (var i = 0, row; row = table.rows[i]; i++) {
                var columns = Array.from(row.cells).map(cell => cell.innerText);
                rows.push(columns);
            }
            var csvContent = "data:text/csv;charset=utf-8,";
            rows.forEach(function(rowArray) {
                var row = rowArray.join(",");
                csvContent += row + "\r\n";
            });
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", filename || "Printing_WIP.csv");
            document.body.appendChild(link);
            link.click();
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="/PMSDev/view/index.php" class="btn btn-primary btn-home">
            <img src="images/home.png" width="40" height="40" /> Home
        </a>
        <h2 class="text-center"><u>Printing Yeild Report With Curve Wise</u></h2>
        <div class="form-container">
            <form id="form1" name="form1" method="post" onsubmit="return validateForm()">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="design">Design</label>
                        <input type="text" name="design" id="design" class="form-control" value="<?php if (isset($_POST['design'])) echo $_POST['design']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lot">Lot</label>
                        <input type="text" name="lot" id="lot" class="form-control" value="<?php if (isset($_POST['lot'])) echo $_POST['lot']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pro_no">Production No</label>
                        <input type="text" name="pro_no" id="pro_no" class="form-control" value="<?php if (isset($_POST['pro_no'])) echo $_POST['pro_no']; ?>">
                    </div>
                </div>
                <button type="submit" name="filter" id="filter" class="btn btn-primary">Search</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='Yield_report_curve_with_defects.php'">Reset</button>
            </form>
        </div>

        <?php if (isset($_POST['filter']) && $hasFilters): ?>
            <center>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tblData1">
    <thead class="thead-dark">
        <tr>
            <th>Plan date</th>
            <th>Production No</th>
            <th>Design</th>
            <th>Lot</th>
            <th>Machine</th>
            <th>Planned Sheets</th>
            <th>Planned Impact Sheets</th>
            <th>Actual Impact Sheets</th>
            <th>1st</th>
            <th>Inspected Qty</th>
            <th>1st Yield</th>
            <th>Curve Data</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result1 = mysqli_query($con, "SELECT aa.*,bb.no_of_sheets_pln,bb.no_of_curves_lpt,cc.1st,cc.2nd,dd.ins_qty FROM (SELECT MIN(a.date_vpft) AS first_date, a.pro_no_vpft,
        a.design_vpft, a.machine_no_vpft, a.num_colors_vpft, a.lot_vpft, a.imp_plan_vpft, a.imp_actual_vpft FROM virtual_planner_final_tbl a WHERE $where 
        GROUP BY a.pro_no_vpft ORDER BY a.date_vpft) aa 
        LEFT JOIN (SELECT b.pro_no_lpt, b.lot_no_lpt, MIN(b.no_of_sheets_lpt) AS no_of_sheets_pln,b.no_of_curves_lpt FROM layout_plans_tbl b GROUP BY b.pro_no_lpt) bb 
        ON aa.pro_no_vpft = bb.pro_no_lpt LEFT JOIN (SELECT c.pro_no, SUM(c.1st) AS 1st, SUM(c.2nd) AS 2nd FROM tbl_cut_ins_plan_ins_data_with_2nd c GROUP BY c.pro_no) cc 
ON aa.pro_no_vpft = cc.pro_no LEFT JOIN (SELECT d.pro_no, SUM(d.qty) AS ins_qty FROM tbl_cut_ins_plan_ins_data d GROUP BY d.pro_no) dd ON aa.pro_no_vpft = dd.pro_no");

        while ($a2 = mysqli_fetch_array($result1)) {
            $first_date = $a2['first_date'];
            $pro_no = $a2['pro_no_vpft'];
            $design = $a2['design_vpft'];
            $lot = $a2['lot_vpft'];
            $machine_no = $a2['machine_no_vpft'];
            $no_of_sheets_pln = $a2['no_of_sheets_pln'];
            $imp_plan = $a2['imp_plan_vpft'];
            $imp_actual = $a2['imp_actual_vpft'];
            $first = $a2['1st'];
            $ins_qty = $a2['ins_qty'];
            $first_yield = round($a2['1st'] / $a2['no_of_sheets_pln'] * 100, 2);
        ?>
            <tr>
                <td><?= $first_date ?></td>
                <td><?= $pro_no ?></td>
                <td><?= $design ?></td>
                <td><?= $lot ?></td>
                <td><?= $machine_no ?></td>
                <td><?= $no_of_sheets_pln ?></td>
                <td><?= $imp_plan ?></td>
                <td><?= $imp_actual ?></td>
                <td><?= $first ?></td>
                <td><?= $ins_qty ?></td>
                <td><?= $first_yield ?></td>

                <td valign="middle" class="tdinfo">
                    <table class="table table-bordered table-hover" id="tblData2">
    <tr>
        <td width="61">Curve</td>
        <td width="61">No of curves per sheet</td>
        <td width="61">Plan Qty</td>
        <td width="61">Good</td>
        <td width="61">Register</td>
        <td width="61">Top</td>
        <td width="64">Dust</td>
        <td width="64">Line</td>
        <td width="64">Embose</td>
        <td width="64">Pin</td>
        <td width="61">Others</td>
        <td width="61">Curve Yeild</td>
    </tr>
<?php
$result_curve = mysqli_query($con, "SELECT b.pro_no_lpt, b.curve_no_lpt, b.no_of_curves_lpt, b.planned_qty_lpt,
SUM(c.Good) AS Good, SUM(c.Register) AS Register, SUM(c.Top) AS Top, SUM(c.Dust) AS Dust,
SUM(c.Line) AS Line, SUM(c.Embose) AS Embose, SUM(c.Pin) AS Pin, SUM(c.Others) AS Others 
FROM layout_plans_tbl b 
LEFT JOIN tbl_cut_ins_defect_data c ON b.pro_no_lpt = c.pro_no_dt AND b.curve_no_lpt = c.curve_no_dt  
WHERE b.pro_no_lpt = '" . $pro_no . "' 
GROUP BY b.pro_no_lpt, b.curve_no_lpt");

$planned_qty_lpt_t = 0; // Initialize total planned quantity

while ($a2_curve = mysqli_fetch_array($result_curve)) {
    ?>
    <tr>
        <td><?= $curve_no_lpt = $a2_curve['curve_no_lpt'] ?></td>
        <td><?= $no_of_curves_lpt = $a2_curve['no_of_curves_lpt'] ?></td>
        <td>
            <?php 
            $planned_qty_lpt_t += $a2_curve['planned_qty_lpt']; 
            $planned_qty_lpt = $a2_curve['planned_qty_lpt'];
            echo $planned_qty_lpt;
            ?>
        </td>
        <td>
            <?php 
            $Good_t += $a2_curve['Good']; 
            $Good = $a2_curve['planned_qty_lpt'];
            echo $Good;
            ?>
        </td>
       
        <td><?= $Register = $a2_curve['Register'] ?></td>
        <td><?= $Top = $a2_curve['Top'] ?></td>
        <td><?= $Dust = $a2_curve['Dust'] ?></td>
        <td><?= $Line = $a2_curve['Line'] ?></td>
        <td><?= $Embose = $a2_curve['Embose'] ?></td>
        <td><?= $Pin = $a2_curve['Pin'] ?></td>
        <td><?= $Others = $a2_curve['Others'] ?></td>
        <td><?= round($a2_curve['Good'] * 100 / $a2_curve['planned_qty_lpt'], 2) . "%" ?></td>
    </tr>
    <?php
}
?>
<tr>
    <td>Total</td>
    <td></td>
    <td><?= $planned_qty_lpt_t ?></td>
     <td><?= $Good_t ?></td>
    <td colspan="7"></td>
    <td><?= round($Good_t * 100 / $planned_qty_lpt_t, 2) . "%" ?></td>
</tr>

</table>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

                </div>
                <button hidden class="btn btn-success" onclick="exportTableToExcel('tblData', 'Printing_WIP.csv')">Export Table Data To Excel File</button>
            </center>
        <?php endif; ?>
    </div>
</body>
</html>
