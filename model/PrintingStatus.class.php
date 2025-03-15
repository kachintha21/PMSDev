<?php

class PrintingStatus {

    public $mysqli;
    public $data;

    public function __construct($host, $username, $password, $db_name) {

        $this->mysqli = new mysqli($host, $username, $password, $db_name);

        if (mysqli_connect_errno()) {

            echo "Error: Could not connect to database.";

            exit;
        }
    }

    public function __destruct() {
        $this->mysqli->close();
    }

    public function getPrintingStatusByPrintingIndex($production_no_pst, $colours_pm) {        
        $la = array();
        $query = "SELECT * FROM printing_status_tbl WHERE production_no_pst='" . $production_no_pst . "'   AND  colours_pm='" . $colours_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'],
                $rows['ref_no_pst'],
                $rows['pattern_no_pst'],
                $rows['production_no_pst'],
                $rows['lot_no_pst'],
                $rows['screen_mesh_pst'],
                $rows['colour_index_pst'],
                $rows['colour_name_pst'],
                $rows['pro01_pst'],
                $rows['pro02_pst'],
                $rows['pro03_pst'],
                $rows['pro04_pst'],
                $rows['pro05_pst'],
                $rows['pro06_pst'],
                $rows['pro07_pst'],
                $rows['pro08_pst'],
                $rows['pro09_pst'],
                $rows['pro10_pst'],
                $rows['is_edit_pst'],
                $rows['org_name_pst'],
                $rows['org_date_pst'],
                $rows['org_time_pst']
                
                );
            }
            return $la;
        }
    }
    
    
        public function getPrintingStatusByPrintingId($id) {        
        $la = array();
        $query = "SELECT * FROM printing_status_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'],
                $rows['ref_no_pst'],
                $rows['pattern_no_pst'],
                $rows['production_no_pst'],
                $rows['lot_no_pst'],
                $rows['screen_mesh_pst'],
                $rows['colour_index_pst'],
                $rows['colour_name_pst'],
                $rows['pro01_pst'],
                $rows['pro02_pst'],
                $rows['pro03_pst'],
                $rows['pro04_pst'],
                $rows['pro05_pst'],
                $rows['pro06_pst'],
                $rows['pro07_pst'],
                $rows['pro08_pst'],
                $rows['pro09_pst'],
                $rows['pro10_pst'],
                $rows['is_edit_pst'],
                $rows['org_name_pst'],
                $rows['org_date_pst'],
                $rows['org_time_pst']
                );
            }
            return $la;
        }
    }
    
    

    public function confirmPrintingStatusEntity($production_no_pst) {
        $res = "SELECT*FROM printing_status_tbl WHERE production_no_pst = '" . $production_no_pst . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPrintingStatus(
        $id,	
        $ref_no_pst,	
        $pattern_no_pst,	
        $production_no_pst,	
        $lot_no_pst,	
        $screen_mesh_pst,	
        $colour_index_pst,	
        $colour_name_pst,	
        $pro01_pst,	
        $pro02_pst,	
        $pro03_pst,	
        $pro04_pst,	
        $pro05_pst,	
        $pro06_pst,	
        $pro07_pst,	
        $pro08_pst,	
        $pro09_pst,	
        $pro10_pst,	
        $is_edit_pst,	
        $org_name_pst,	
        $org_date_pst,	
        $org_time_pst	
        
    ) {



        $res = "INSERT INTO printing_status_tbl  SET
            id='".$id."',			
            ref_no_pst='".$ref_no_pst."',			
            pattern_no_pst='".$pattern_no_pst."',			
            production_no_pst='".$production_no_pst."',			
            lot_no_pst='".$lot_no_pst."',			
            screen_mesh_pst='".$screen_mesh_pst."',			
            colour_index_pst='".$colour_index_pst."',			
            colour_name_pst='".$colour_name_pst."',			
            pro01_pst='".$pro01_pst."',			
            pro02_pst='".$pro02_pst."',			
            pro03_pst='".$pro03_pst."',			
            pro04_pst='".$pro04_pst."',			
            pro05_pst='".$pro05_pst."',			
            pro06_pst='".$pro06_pst."',			
            pro07_pst='".$pro07_pst."',			
            pro08_pst='".$pro08_pst."',			
            pro09_pst='".$pro09_pst."',			
            pro10_pst='".$pro10_pst."',			
            is_edit_pst='".$is_edit_pst."',			
            org_name_pst='".$org_name_pst."',			
            org_date_pst='".$org_date_pst."',			
            org_time_pst='".$org_time_pst."'			
		       ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingStatus(
        $id,	
        $ref_no_pst,	
        $pattern_no_pst,	
        $production_no_pst,	
        $lot_no_pst,	
        $screen_mesh_pst,	
        $colour_index_pst,	
        $colour_name_pst,	
        $pro01_pst,	
        $pro02_pst,	
        $pro03_pst,	
        $pro04_pst,	
        $pro05_pst,	
        $pro06_pst,	
        $pro07_pst,	
        $pro08_pst,	
        $pro09_pst,	
        $pro10_pst,	
        $is_edit_pst,	
        $org_name_pst,	
        $org_date_pst,	
        $org_time_pst
    ) {

        $res = mysql_query("UPDATE printing_status_tbl SET
                  id='".$id."',			
                ref_no_pst='".$ref_no_pst."',			
                pattern_no_pst='".$pattern_no_pst."',			
                production_no_pst='".$production_no_pst."',			
                lot_no_pst='".$lot_no_pst."',			
                screen_mesh_pst='".$screen_mesh_pst."',			
                colour_index_pst='".$colour_index_pst."',			
                colour_name_pst='".$colour_name_pst."',			
                pro01_pst='".$pro01_pst."',			
                pro02_pst='".$pro02_pst."',			
                pro03_pst='".$pro03_pst."',			
                pro04_pst='".$pro04_pst."',			
                pro05_pst='".$pro05_pst."',			
                pro06_pst='".$pro06_pst."',			
                pro07_pst='".$pro07_pst."',			
                pro08_pst='".$pro08_pst."',			
                pro09_pst='".$pro09_pst."',			
                pro10_pst='".$pro10_pst."',			
                is_edit_pst='".$is_edit_pst."',			
                org_name_pst='".$org_name_pst."',			
                org_date_pst='".$org_date_pst."',			
                org_time_pst='".$org_time_pst."'		
	        	WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }







    public function deletePrintingStatus($id) {
        $query = "DELETE FROM printing_status_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_master_data.php');
        }
    }
    
        public function deletePrintingStatusByProNo($id) {
        $query = "DELETE FROM printing_status_tbl WHERE production_no_pst='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
           return true;
        }
    }
    
    

    public function getPrintingStatusByPn($production_no_pst) {
        $la = array();
        $query = "SELECT * FROM printing_status_tbl WHERE production_no_pst='" . $production_no_pst . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pm'], $rows['production_no_pst'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return la;
        }
    }






    
    public function getPrintingStatus($pattern_no_pt,$lc) {
       
        switch ($lc) {
            
         case '0':
        $query = "SELECT production_no_pst FROM printing_status_tbl  GROUP BY production_no_pst    ";/*new*/
         break;     
            
         case '1':
        $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro01_pst='1'  GROUP BY production_no_pst    ";
         break;    
          

            case '2':
         $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro02_pst='1'  GROUP BY production_no_pst    ";
             break;    
        
    
           case '3':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro03_pst='1'  GROUP BY production_no_pst    ";
           break;  
           
           
           case '4':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro04_pst='1' AND colour_index_pst!='T01' AND colour_index_pst!='T02'	  GROUP BY production_no_pst    ";
           break; 
       
       
       
       
           
           case '5':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro05_pst='1'  GROUP BY production_no_pst    ";
           break;   
           

           case '6':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro06_pst='1'  GROUP BY production_no_pst    ";
           break;   
       
       
           case '7':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro07_pst='1'  GROUP BY production_no_pst    ";
           break;   
       
              case '8':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro08_pst='1'  GROUP BY production_no_pst    ";
           break; 

case '9':
            $query = "select pro_no_lpt as production_no_pst FROM 
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
group BY aaa.pro_no_lpt ORDER BY `aaa`.`pro_no_lpt`  ";
           break; 
       
       case '10':
            $query = "select pro_no_lpt as production_no_pst FROM 
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
where aaa.rem2>0  AND ccc.pro06_pst !='1'   AND ccc.pro08_pst !='1'   AND ccc.pro10_pst ='1'
group BY aaa.pro_no_lpt ORDER BY `aaa`.`pro_no_lpt`   ";
           break;		   
        
       
           

       }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pst'] . "' >" . $rows['production_no_pst'] . "</option>");
            }
        }



    }
	
	
	public function getPrintingStatusNew($lc) {
       
        switch ($lc) {
            
         case '0':
        $query = "SELECT a.pro_no_ppft as production_no_pst FROM pigment_planner_final_tbl a WHERE a.is_edit_ppft ='0' GROUP BY a.pro_no_ppft      ";/*new*/
         break;     
            
         case '1':
        $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro01_pst='1'  GROUP BY production_no_pst    ";
         break;    
          

            case '2':
         $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro02_pst='1'  GROUP BY production_no_pst    ";
             break;    
        
    
           case '3':
            $query = "SELECT pro_no_spft as production_no_pst  FROM screen_planner_final_tbl a 
WHERE  a.plan_colors_spft !='S00'  and a.is_edit_spft !='1'  GROUP BY a.pro_no_spft
ORDER BY a.pro_no_spft ASC ";
           break;  
           
           
           case '4':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro04_pst='1' AND colour_index_pst!='T01' AND colour_index_pst!='T02'	  GROUP BY production_no_pst    ";
           break; 
       
       
       
       
           
           case '5':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro05_pst='1'  GROUP BY production_no_pst    ";
           break;   
           

           case '6':
            $query = "SELECT a.pro_no AS production_no_pst FROM tbl_top_coat_plan a 
WHERE a.pro_no NOT IN (SELECT b.pro_no_tcpt FROM top_coat_printing_tbl b)";
           break;   
       
       
           case '7':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro07_pst='1'  GROUP BY production_no_pst    ";
           break;   
       
              case '8':
            $query = "SELECT production_no_pst FROM printing_status_tbl WHERE pro08_pst='1'  GROUP BY production_no_pst    ";
           break;  
       
       case '9':
            $query = "select pro_no_lpt as production_no_pst FROM 
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
group BY aaa.pro_no_lpt ORDER BY `aaa`.`pro_no_lpt`  ";
           break; 
       
       case '10':
            $query = "select pro_no_lpt as production_no_pst FROM 
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
where aaa.rem2>0  AND ccc.pro06_pst !='1'   AND ccc.pro08_pst !='1'   AND ccc.pro10_pst ='1'
group BY aaa.pro_no_lpt ORDER BY `aaa`.`pro_no_lpt`   ";
           break;   
        
       
           

       }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pst'] . "' >" . $rows['production_no_pst'] . "</option>");
            }
        }



    }



    public function getPrintingStatusColourIndexById($pattern_no_pt,$lc) {
        
        switch ($lc) {
      
        case '1':
        $query = "SELECT colour_index_pst FROM printing_status_tbl WHERE pro01_pst='1' AND production_no_pst='".$pattern_no_pt."'  GROUP BY colour_index_pst   ";
         break;    
       

        case '2':
         $query = "SELECT colour_index_pst FROM printing_status_tbl WHERE pro02_pst='1' AND production_no_pst='".$pattern_no_pt."' GROUP BY colour_index_pst     ";
         break;    
        

        case '3':
        $query = "SELECT colour_index_pst FROM printing_status_tbl WHERE pro03_pst='1' AND production_no_pst='".$pattern_no_pt."'   GROUP BY colour_index_pst    ";
         break;  
         
     
     
     
        case '4':
        $query = "SELECT colour_index_pst FROM printing_status_tbl WHERE pro04_pst='1' AND production_no_pst='".$pattern_no_pt."' AND colour_index_pst!='T01' AND  colour_index_pst!='T02'   GROUP BY colour_index_pst   ";
        break;  
         
    
        case '5':
        $query = "SELECT colour_index_pst FROM printing_status_tbl WHERE pro06_pst='1' AND production_no_pst='".$pattern_no_pt."' AND colour_index_pst='T01' OR  colour_index_pst='T02'   GROUP BY colour_index_pst   ";
        break;  
         
       
             

        }


        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colour_index_pst'] . "' >" . $rows['colour_index_pst'] . "</option>");
            }
        }
    }



    
    public function getPrintingStatusDisableById($id) {
                  $res = "UPDATE printing_status_tbl SET
                  is_edit_pst='1'        
                  WHERE  id='".$id."'  ";
                 $result = $this->mysqli->query($res);

                 if ($result) {
                return true;
                 }
  
    }


    
      public function getPrintingStatusEnableById($id) {
                  $res = "UPDATE printing_status_tbl SET
                  is_edit_pst='0'        
                  WHERE  id='".$id."'  ";
                  $result = $this->mysqli->query($res);

                 if ($result) {
                  return true;
                 }
  
    }



    public function getPrintingStatusScreenMeshById($pattern_no_pt,$lc) {
        
        switch ($lc) {
      
        case '1':
        $query = "SELECT screen_mesh_pst FROM printing_status_tbl WHERE pro01_pst='1' AND production_no_pst='".$pattern_no_pt."'  GROUP BY screen_mesh_pst     ";
         break;    
       

        case '2':
         $query = "SELECT screen_mesh_pst FROM printing_status_tbl WHERE pro02_pst='1' AND production_no_pst='".$pattern_no_pt."'  GROUP BY screen_mesh_pst      ";
         break;    
        

        case '3':
        $query = "SELECT screen_mesh_pst FROM printing_status_tbl WHERE  production_no_pst='".$pattern_no_pt."'   GROUP BY screen_mesh_pst     ";
         break;  
     
     
     
     
        }

       

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['screen_mesh_pst'] . "' >" . $rows['screen_mesh_pst'] . "</option>");
            }
        }
    }












    public function getNextPrintingStatusRefNo($table, $suffix) {
        $sql = "SELECT id FROM " . $table . " ORDER BY id DESC";
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['id'];

            //$previous = substr($previous, 5, strlen($previous));

            if (strlen("" . $previous + 1) == 1) {
                $previous = "000" . ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = "0" . ($previous + 1);
            }
        } else {
            $previous = "0001";
        }
        return $suffix . $previous;
    }





    public function updatePrintingStatusById(
        $production_no_pt,$pattern_no_pt,$index,$lc
        ) {
 
            switch ($lc) {
            case '1':
            $res = "UPDATE printing_status_tbl SET
            pro01_pst='0',
            pro02_pst='1'        
            WHERE production_no_pst='" . $production_no_pt . "'  AND
            pattern_no_pst='" . $pattern_no_pt . "'  AND
            colour_index_pst='".$index."'  ";
            break;


         
            case '2':
            $res = "UPDATE printing_status_tbl SET
             pro02_pst='0',
             pro03_pst='1'        
             WHERE production_no_pst='" . $production_no_pt . "'  AND
             pattern_no_pst='" . $pattern_no_pt . "'  AND
             colour_index_pst='".$index."'  ";
              break;


                case '3':
                $res = "UPDATE printing_status_tbl SET
                 pro03_pst='0',
                 pro04_pst='1'        
                 WHERE production_no_pst='" . $production_no_pt . "'  AND
                 pattern_no_pst='" . $pattern_no_pt . "'  AND
                 screen_mesh_pst='".$index."'  ";
                  break;

                 
                  
                    case '4':
                    $res = "UPDATE printing_status_tbl SET
                     pro04_pst='0',
                     pro05_pst='1'        
                     WHERE production_no_pst='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='".$index."'  ";
                      break;
                  
                  
                  
                  
                    case '6':
					
                    $res = "UPDATE printing_status_tbl SET
                     pro06_pst='0',
                     pro07_pst='1'        
                     WHERE production_no_pst='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='".$index."'  ";
                      break;
                  
    

            }



            $result = $this->mysqli->query($res);

            if ($result) {
                return true;
            }
            
            
        }






        public function updatePrintingStatusBymultiple(
            $production_no_pt,$pattern_no_pt,$index,$lc
            )                        
              {
            

                switch ($lc) {

                case '1':   
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET
                pro02_pst='0',
                pro03_pst='1'           
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;


                case '2':   
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET
                pro05_pst='0',
                pro04_pst='0',
				pro07_pst='0',
                pro06_pst='".$index."'         
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;

               case '3': 
                   
                   if($index=='0'){
                       $index2=1;                       
                   }
                   else{
                       $index2=0;
                       
                   }
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET           
                pro06_pst='".$index2."' ,
                pro07_pst='".$index."'           
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;
               
               
               
                case '4':   
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET           
                pro07_pst='0',
                pro08_pst='".$index."'           
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;
			   
			   case '5':   
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET
                pro05_pst='0',
                pro04_pst='0',
				pro06_pst='0',
                pro08_pst='0', 
				pro09_pst=	'0'	,
				pro10_pst='".$index."'				
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;
			   
			   case '6':   
                $sql = "SELECT id FROM printing_status_tbl  WHERE production_no_pst='".$production_no_pt."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET
                pro05_pst='0',
                pro04_pst='0',
				pro06_pst='0',
                pro08_pst='".$index."', 
				pro09_pst=	'0'		
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
               break;
               

               
              }
                
            }
    
    










}
