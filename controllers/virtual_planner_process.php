<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/MachineCalendar.class.php");
include("../model/PrintingMachineMaster.class.php");
include("../model/PreparingLayout.class.php");
include("../model/PrintingSpeedMaster.class.php");


$cl = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mm = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_POST) > 0) {


    // if errors
    if ($error != "") {
        echo $error;
    } else {
        $query = "SELECT * FROM printing_status_tbl  group BY ref_no_pst LIMIT 1";
        if ($result = $conn->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $ref_no = $row["production_no_pst"];
                $lot_no_pst = $row["lot_no_pst"];
                $res_array = $pl->getPreparingLayoutByNo($ref_no);

                $pattern_no_pst = $row["pattern_no_pst"];
                $sql_ms = "SELECT * FROM printing_machine_master_tbl WHERE pattern_no_pmmt='" . $pattern_no_pst . "'  ";
                if ($result_ms = $conn->query($sql_ms)) {
                    while ($row = $result_ms->fetch_assoc()) {
                        $machine = $row['machine_no_pmmt'];
                        $sql_mc = "SELECT * FROM machine_calendar_tbl WHERE date_mlt='" . $_POST['date_vt'] . "' AND machine_no_mlt='" . $machine . "'  ";
                        if ($result_mc = $conn->query($sql_mc)) {
                            while ($row_mc = $result_mc->fetch_assoc()) {
                                $sql_ct = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_pst . "' group BY colours_code_ct LIMIT 2  ";
                                ?>

                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                        <tr>
                                            <th>
                                                Machine number
                                            </th>


                                            <th>
                                                <?php
                                                echo($machine);
                                                ?>
                                            </th>





                                        </tr>


                                        <tr>
                                            <th>
                                                No
                                            </th>


                                            <th>
                                                Time(AM/PM)
                                            </th>


                                            <th>
                                                Printing Process
                                            </th>



                                            <th>
                                                Start Date
                                            </th>


                                            <th>
                                                Start Date
                                            </th>

                                            <th>    
                                                Pattern Finish Date
                                            </th>    


                                            <th>    
                                                Pro:No
                                            </th> 

                                            <th>    

                                                Design
                                            </th> 




                                            <th>    

                                                Lot 
                                            </th> 





                                            <th>    

                                                Duration(Mints)
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                MP
                                            </td>

                                            <td>
                                                6:30
                                            </td>

                                            <td>
                                                M/C Prepare Time
                                            </td>


                                            <td>
                                                -
                                            </td>

                                            <td>  
                                                -
                                            </td>  

                                            <td>  
                                                -
                                            </td>  

                                            <td>  
                                                -
                                            </td>  



                                            <td>  
                                                -
                                            </td>  


                                            <td>  
                                                -
                                            </td>  


                                            <td>  
                                                15:00
                                            </td>  

                                        </tr>


                                        <tr>

                                            <td>
                                                FP
                                            </td>

                                            <td>


                                                <?php
                                                $o = "6:30";
                                                $first_pp = "0:15";

                                                echo AddPlayTime($o, $first_pp);
                                                ?> 
                                            </td>


                                            <td>


                                                F/P
                                            </td>


                                            <td>
                                                -
                                            </td>

                                            <td>  
                                                -
                                            </td>  

                                            <td>  
                                                -
                                            </td>  

                                            <td>  
                                                -
                                            </td>  



                                            <td>  
                                                -
                                            </td>  
                                            <td>  
                                                -
                                            </td>  

                                            <td>  
                                                40:00
                                                <?php
                                                $now_time = AddPlayTime($o, $first_pp);

                                                $text_time = AddPlayTime($now_time, "00:40");
                                                ?>
                                            </td>  

                                        </tr>    

                                        <?php
                                        $i = 0;
                                        if ($result_ct = $conn->query($sql_ct)) {
                                            while ($row_ct = $result_ct->fetch_assoc()) {
                                                $i++;
                                                ?>






                                                <tr>

                                                    <td>


                                                        <?php
                                                        echo($i);
                                                        ?>

                                                    </td>



                                                    <td>



                                                        <?php
                                                        if ($row_ct['colours_code_ct'] == "S01") {
                                                            echo($text_time);
                                                        } else {


                                                            $get_time_11 = $ps->getPrintingSpeedMasterByColorIndex($pattern_no_pst, $row_ct['colours_code_ct'], $res_array[15]);
                                                            //echo($get_time_11);
                                                            $change_over_time = 23;
                                                            $total_time = $get_time_11 + $change_over_time;

                                                            $new = "0:" . $total_time;

                                                            echo(AddPlayTime($text_time, $new));

                                                            /// echo($new);
                                                        }
                                                        ?>
                                                    </td> 

                                                    <td>
                                                        <?php
                                                        echo($row_ct['colours_code_ct']);
                                                        ?>
                                                    </td>


                                                    <td>

                                                        -
                                                    </td>


                                                    <td>
                                                        -
                                                    </td>

                                                    <td>  
                                                        -
                                                    </td>  

                                                    <td>  

                                        <?php
                                        echo($ref_no);
                                        ?>
                                                    </td>  

                                                    <td>  
                                                        <?php
                                                        echo($pattern_no_pst);
                                                        ?>
                                                    </td>  

                                                    <td>  


                                                        <?php
                                                        echo($ref_no);
                                                        ?>
                                                    </td>  
                                                    <td>  
                                        <?php
                                        echo($ps->getPrintingSpeedMasterByColorIndex($pattern_no_pst, $row_ct['colours_code_ct'], $res_array[15]));
                                        ?>
                                                    </td>  

                                                </tr> 

















                                        <?php
                                        //echo($row_ct['colours_code_ct']."<br>");
                                    }
                                }
                                ?>



                                    </tbody>
                                </table>                    


                                        <?php
                                    }
                                }
                            }    //($ref_no . "_" . $row_mc['date_mlt'] . "-" . $machine . "" . $row_mc['work_time_mlt'] . "<br>");
                        }
                    }
                }
            }
        } else {
            echo(false);
        }
        ?>