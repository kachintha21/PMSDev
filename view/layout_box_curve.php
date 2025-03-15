<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('background_image.jpg'); /* Replace 'background_image.jpg' with your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; /* Use a modern font */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the transparency as needed */
            padding: 20px;
            border-radius: 10px;
            text-align: center; /* Center the form content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow for depth */
        }

        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            max-width: 200px;
            box-sizing: border-box; /* Ensure padding and border are included in width */
            appearance: none; /* Remove default dropdown arrow */
            background-image: linear-gradient(45deg, transparent 50%, #aaa 50%),
                              linear-gradient(135deg, #aaa 50%, transparent 50%);
            background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
            background-size: 5px 5px, 5px 5px;
            background-repeat: no-repeat;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Blue color for button */
            color: #fff; /* White text color */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <?php
        error_reporting(E_PARSE | E_WARNING | E_ERROR);
        include("../include/common.php");
        include("../include/db_config.php");
        include("../include/conn.php");
        include("../model/DInspection.class.php");
        
        $di = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $pro_no = $_GET['pro_no'];
    ?>
    
    <form method="post" action="destination_page.php?pro_no=<?php echo $pro_no; ?>">
        <h2>Select Curve Location</h2>
        <table>
            <?php
                // Fetch options from the database
                // Assuming $conn is your database connection object
                $query = "SELECT curve_no_lpt, no_of_curves_lpt FROM layout_plans_tbl WHERE pro_no_lpt ='" . $pro_no . "'";
                $options = array("Select"); // Initialize options array with a default "Select" option
                
                if ($result = $conn->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $options[] = $row['curve_no_lpt'] . "-" . $row['no_of_curves_lpt']; // Add each option fetched from the database to the options array
                    }
                }
                
                // Loop to create a 5x5 table
                for ($i = 0; $i < 5; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 5; $j++) {
                        echo "<td>";
                        // Generate the dropdown box
                        echo "<select name='dropdown[$i][$j]'>";
                        foreach ($options as $option) {
                            echo "<option value='$option'>$option</option>";
                        }
                        echo "</select>";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
