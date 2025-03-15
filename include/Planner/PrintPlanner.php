<?php
namespace Planner;
require_once 'Perm.php';
use Exception;

class PrintPlanner{
    
    protected $sheetArea;
    protected $printableAreaPercentage;
    protected $printableArea;
    protected $curveData;
    protected $curveDataQtyWise;
    protected $decimalPlaces = 2;
    protected $rangeBreaker;
    public $plans = [];
    protected $qtyList;
    protected $maxQty;
    protected $design;
    protected $data = [];
    
    public function __construct(float $sheetArea, float $printableAreaPercentage, int $rangeBreaker=null, array $curveData, $maxQty,$design=null){
        $this->sheetArea = $sheetArea;
        $this->printableAreaPercentage = $printableAreaPercentage;      
        $this->curveData = $curveData;        
        $this->rangeBreaker = $rangeBreaker;
        $this->maxQty = $maxQty;
        $this->design= $design;
        $this->qtyList = [$this->maxQty];
    }
    
    public function validateCurveData(){
        try {
            if(!is_array($this->curveData) || count($this->curveData) == 0){
                throw new Exception("Calculation has been failed. Empty curve information given.");
            }            
            
            foreach ($this->curveData as $row => $curve) {
                if(!isset($curve['id']) || trim($curve['id']) == ""){
                    throw new Exception("Missing curve Id in row no ".($row + 1).".");
                }
                if(!isset($curve['area']) || floatval($curve['area']) <= 0){
                    throw new Exception("Missing curve area in row no ".($row + 1).".");
                }
                if(!isset($curve['qty']) || intval($curve['qty']) <= 0){
                    throw new Exception("Missing curve quantity in row no ".($row + 1).".");
                }
            }     
            
            usort($this->curveData, function($a, $b) {
                //return $a['area'] <=> $b['area'];
                
                if($a['area'] == $b['area']) return 0;
                return $a['area'] < $b['area']? -1 : 1;
            });
    
            $swapArray = [];
            foreach ($this->curveData as $curve) {
                $swapArray[$curve['id']] = $curve;
            }
            $this->curveData = $this->curveDataQtyWise = $swapArray;            
            
            usort($this->curveDataQtyWise, function($a, $b) {                
                if($a['qty'] == $b['qty']) return 0;
                return $a['qty'] < $b['qty']? 1 : -1;
            });   
            $swapArray = [];
            foreach ($this->curveDataQtyWise as $curve) {
                $swapArray[$curve['id']] = $curve;
            }
            $this->curveDataQtyWise = $swapArray;             
        } 
        catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function validatePrintableSheetArea(){
        try {
            if(!isset($this->sheetArea) || floatval($this->sheetArea) <= 0){
                throw new Exception("Missing sheet area.");
            }
            if(!isset($this->printableAreaPercentage) || floatval($this->printableAreaPercentage) <= 0){
                throw new Exception("Missing printable area percentage.");
            }
            if(!isset($this->printableAreaPercentage) || floatval($this->printableAreaPercentage) > 100){
                throw new Exception("Printable area percentage is greater than 100.");
            }
            
            $this->printableArea = number_format($this->sheetArea * ($this->printableAreaPercentage) / 100, $this->decimalPoints, '.', '');

        } 
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
 
    public function generatePlans(){
        try {
            $this->validateCurveData();
            $this->validatePrintableSheetArea();     

            //$this->applySingletonMethod();
            
            $groups = $this->groupQuantities([$this->rangeBreaker]);                        
            $res = $this->getRefinedSets($groups);
            
            //header('Content-Type: application/json');
            //echo json_encode($res); exit();
            
            return $this->getHTML($res, false); 
            
        } 
        catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function getHTML($rangesSet=[], $returnArray = false) {
        $html = [];
        $colspan = 9;
        //echo "<h3>Sheet Area:&emsp;".$this->sheetArea."</h3>";
        //echo "<h3>Printable % :&emsp; ".$this->printableAreaPercentage."</h3>";
        //echo "<h3>Quantity Range Divider: &emsp;".$this->rangeBreaker."</h3>";
        //echo "<h3>Input Curves</h3><table><tr>";
        /*foreach ($this->curveData as $value) {
            echo "<td><pre>";
            print_r($value);
            echo "</pre></td>";
        }
        echo "</tr></table>";*/
      
        $htmlText = "<style>label{ font-weight: bold; font-size: 16px;} th, td{ font-family: 'Arial'; font-size: 12px;border-top: 1px solid #aaa;border-left: 1px solid #aaa;} td:last-child, th:last-child{border-right: 1px solid #aaa;} td, th{padding:8px;}</style>"
                . "<table width=80% border=0 cellpadding=0 cellspacing=0>";
        $htmlText .= "<tr>" . 
                "<th>Curve No</th>" .
                "<th>Planned Qty</th>" .
                "<th>Curve Area</th>" .
                "<th>No of Curves (Per Sheet)</th>" .
                
                "<th>Total Area (Per Sheet)</th>" .
                "<th>No of Sheets</th>" .
                "<th>Close Curve After</th>" .
                "</th>";
        $prevRange = 0;
        $layoutId = 'AA';
        $this->plans = [];
        $planKey = 0;
        foreach ($rangesSet as $ranges) {
            foreach ($ranges as $key => $range) {
                foreach ($range as $results) {
                    $html[$key] = $results;
                    
                    foreach ($results as $k => $result) {
                        
                        if($k == 'curves'){
                            $htmlText .= "<tr>"
                                    . "<td colspan=$colspan>"
                                    . "<h2>Qty Range: (".($key - $this->rangeBreaker) . " - " . $key . ") "
                                    . "&ensp;Curves: " . $result."</h2>"
                                    . "</td>"
                                    . "</tr>";
                            $prevRange = $key;
                        }
                        if($k == 'results'){
                            $op = 0;
                            foreach ($result as $c => $rows) {
                                                            
                                $op++;
                                if(count($result) > 1){
                                    $htmlText .= "<tr><td colspan=$colspan><label><input type=checkbox name='plans[]' value=$planKey> Option ". ($op) . " </label></td></tr>"; 
                                }
                                else{
                                    $htmlText .= "<tr><td colspan=$colspan><label><input type=checkbox name='plans[]' checked  value=$planKey> Option ". ($op) ." </label></td></tr>"; 
                                }
                                
                                $this->plans[$planKey] = $rows;
                                $planKey++;
                                if(is_array($rows) && count($rows) > 0){
                                    foreach ($rows as $row) {
                                        $htmlText .= "<tr><td colspan=$colspan>"
                                                . "<strong>Total Sheets Needed:</strong> " . $row['total_no_of_sheets'] . ""
                                                . "&emsp;<strong>Area Unused:</strong> " . $row['leftover_per_sheet'] . ""
                                                . "&emsp;<span style='float:right;'><strong>Sheet Area:</strong> " . $this->sheetArea . " (". $this->printableAreaPercentage . "%)</span>"                                                
                                                . "</td></tr>"; 
                                        if(is_array($row['curves_sets'])){
                                            foreach ($row['curves_sets'] as $v) { 
                                                $htmlText .= "<tr>";
                                                $htmlText .= "<td>" . $v['curve_no'] . "</td>";
                                                $htmlText .= "<td>" . $v['planned_qty'] . "</td>";
                                                $htmlText .= "<td>" . $v['curve_area'] . "</td>";
                                                $htmlText .= "<td>" . $v['curves_per_sheet'] . "</td>";                                       
                                                $htmlText .= "<td>" . $v['occupied_area'] . "</td>";
                                                $htmlText .= "<td>" . $v['no_of_sheets'] . "</td>";
                                                $htmlText .= "<td>" . $v['close_curve_after'] . "</td>";
                                                $htmlText .= "</tr>";
                                            }
                                        }
                                        $layoutId++;

                                    } 
                                }
                                else{
                                    $htmlText .= "<tr><td colspan=$colspan>Too much waste so ignored the plan. Please change the Quality Grouper Value.</td></tr>";
                                }
                                
                                
                                $htmlText .= "<tr><td colspan=$colspan><hr></td></tr>";
                                
                                
                            }
                        }
                        
                    }                    
                }                
            }
        }
        $htmlText .= "</table>";
        return ($returnArray)? $html : $htmlText;
    }
    
    public function displayHTML($plansSet=[], $layoutId='AA') {
        $html = [];
        $colspan = 9;
        ?>
        <style>label{ font-weight: bold; font-size: 16px;} th, td{ font-family: 'Arial'; font-size: 12px;border-top: 1px solid #aaa;border-left: 1px solid #aaa;} td:last-child, th:last-child{border-right: 1px solid #aaa;} td, th{padding:8px;}</style>
        <h2>Selected Plan(s)</h2>
        <form action="" method="post">
            <input type="submit" name='save_plans' class="btn btn-primary" value='Save Plans'>
            <br><br>
        <table width=80% border=0 cellpadding=0 cellspacing=0>
        <tr>
            <th>Layout</th>
            <th>Design</th>
            <th>Curve No</th>
            <th>Planned Qty</th>
            <th>Curve Area</th>
            <th>No of Curves (Per Sheet)</th>
            <th>Total Area (Per Sheet)</th>
            <th>No of Sheets</th>
            <th>Close Curve After</th>
            </th> <?php
        $prevRange = 0;
        $this->plans = [];
        $planKey = 0;
        if(is_array($plansSet) && count($plansSet) > 0){
            foreach ($plansSet as $plans) {
                if(is_array($plans) && count($plans) > 0){
                    foreach ($plans as $plan) {  
                                                
                        ?><tr>
                            <td colspan=<?php echo $colspan; ?>>
                                <h2>Curves: <?php echo $plan['curves'] ?></h2>
                            </td>
                        </tr> <?php
                        $prevRange = $key;
                        ?>
                        <tr>
                            <td colspan=<?php echo $colspan; ?>>
                                <strong>Total Sheets Needed:</strong><?php echo $plan['total_no_of_sheets']; ?> 
                                &emsp;<strong>Area Unused:</strong><?php echo $plan['leftover_per_sheet']; ?>
                                &emsp;<span style='float:right;'>
                                    <strong>Sheet Area:</strong> <?php echo $this->sheetArea . " (". $this->printableAreaPercentage . "%)"; ?>
                                </span>
                            </td>
                        </tr><?php 

                        if(is_array($plan['curves_sets'])){
                            foreach ($plan['curves_sets'] as $v) { 
                               ?><tr>
                                   <td><?php echo $layoutId; ?></td>
                                    <td><?php echo $this->design; ?></td>
                                   <td><?php echo $v['curve_no']; ?></td>
                                  
                                   <td><?php echo $v['planned_qty']; ?></td>
                                   <td><?php echo  $v['curve_area']; ?></td>
                                   <td><?php echo $v['curves_per_sheet']; ?></td>
                                   <td><?php echo $v['occupied_area']; ?></td>
                                   <td><?php echo $v['no_of_sheets']; ?></td>
                                   <td><?php echo $v['close_curve_after']; ?></td>
                               </tr><?php
                            }
                        }
                        $layoutId++;

                    }
                }
            }
        }
        
        ?></table></form><?php
        return ($returnArray)? $html : $htmlText;
    }
    
    public function getRefinedSets($groups){
        $results = [];
        if(count($groups) > 0){
                      
            foreach ($groups as $groupKey => $group) {
                
                $this->planId = 'AA';
                foreach ($group as $range => $crvIds) {

                    usort($crvIds, function($a, $b) {
                        if($a['area'] == $b['area']) return 0;
                        return $a['area'] < $b['area']? -1 : 1;
                    });                         
                            
                    $recursiveResult = $this->getCombinations(array_column($crvIds, 'id'), $this->qtyList, 2);
                             
                    usort($crvIds, function($a, $b) {
                        if($a['area'] == $b['area']) return 0;
                        return $a['area'] < $b['area']? 1 : -1;
                    }); 
                    
                    $recursiveResult2 = $this->getCombinations(array_column($crvIds, 'id'), $this->qtyList, 2);
                    
                    usort($crvIds, function($a, $b) {
                        if($a['area'] == $b['area']) return 0;
                        return $a['area'] < $b['area']? -1 : 1;
                    });
                    
                    $recursiveResult3 = $this->getCombinations(array_column($crvIds, 'id'), [25], 2);
                           
                    $mergedResults = $this->mergeCombinations(array_merge(array_values($recursiveResult), array_values($recursiveResult2), array_values($recursiveResult3)));   
                              
                    if(count($mergedResults) > 0){                                                
                        $results[$groupKey][$range][] = [
                            'curves' => implode(", ", array_column($crvIds, 'id')),
                            'results' => $this->formatPlans($mergedResults, $crvIds, $this->planId)
                        ];
                    }
                    else if(count($crvIds) == 1 && isset($crvIds[0]['id'])){
   
                        $recursiveResult = $this->getCombinations([$crvIds[0]['id']], [0], 1);
                             
                        $mergedResults = $this->mergeCombinations($recursiveResult);

                        $results[$groupKey][$range][] = [
                            'curves' => implode(", ", array_column($crvIds, 'id')),
                            //'results' => $this->getSingleCurvePlan($this->curveData[$crvIds[0]['id']]),
                            'results' => $this->formatPlans($mergedResults, [$crvIds[0]['id']], $this->planId)
                        ]; 
                    }
                    else{
                        $results[$groupKey][$range][] = [
                            'curves' => implode(", ", array_column($crvIds, 'id')),
                            'results' => $this->getSingleCurvePlan($this->curveDataQtyWise[$crvIds[0]['id']]) 
                        ]; 
                    }
                }
            }
        }
        return $results;
    }
    
    private function appendArray($res){
        $newArray = [];

        array_walk_recursive($res, function($val, $key) use(&$newArray) {
   
            if ($key == 'results') {
                $newArray[$key] = $val;
            }
        });
        header('Content-Type: application/json');
        echo json_encode($newArray); exit();
        
    }
    
    public function formatPlans($plans, $crvIds, $planId){
        
        $formattedPlans = [];
                
        if(is_array($plans) && count($plans) > 0){
            foreach ($plans as $p => $plan) {
              
                if(is_array($plan) && count($plan) > 0){
                    foreach ($plan as $s => $set) {
                         
                        $formattedPlans[$p][$s] = [
                            'layout' => $this->planId,
                            'design' => ''             
                        ];
                        $formattedPlans[$p][$s]['curves'] = implode(", ", array_keys($set['curves']));
                        $formattedPlans[$p][$s]['total_area_per_sheet'] = $set['total_area_per_sheet'];
                        $formattedPlans[$p][$s]['total_area_occupied_per_sheet'] = $set['total_occupied_area_per_sheet'];
                        $formattedPlans[$p][$s]['leftover_per_sheet'] = $set['leftover_per_sheet'];
                        $formattedPlans[$p][$s]['total_no_of_sheets'] = $set['total_no_of_sheets'];
                        $formattedPlans[$p][$s]['total_no_of_curves'] = count($set['curves']);
                        foreach ($set['curves'] as $crvId => $curve) {
                            $maxNo = max(array_column($set['curves'], 'no_of_sheets'));
                            $formattedPlans[$p][$s]['curves_sets'][] = [
                                'curve_no' => $crvId,
                                'curve_area' => $curve['curve']['area'],
                                'planned_qty' => $curve['curve']['qty'],
                                'occupied_area' => $curve['occupied_area'],
                                'curves_per_sheet' => $curve['qty_per_sheet'],
                                'no_of_sheets' => $curve['no_of_sheets'],
                                'close_curve_after' => ($maxNo != $curve['no_of_sheets'])? ($curve['no_of_sheets'] + 1) : ""               
                            ];
                        }
                        
                        $this->planId++;
                    }
                    
                }
                
            }           
        }
        
        
        /*usort($formattedPlans, function($a, $b) {
            if($a['no_of_sheets'] == $b['no_of_sheets']) return 0;
            return $a['no_of_sheets'] < $b['no_of_sheets']? 1 : -1;
        }); */ 
        
        
        $mergedArray = [];
        $prevCurvesCount = "";
        foreach ($formattedPlans as $r1) {
            if(is_array($r1) && count($r1) > 0){  
                $sheetsCount = implode("|",array_column($r1, 'leftover_per_sheet'));
                if(
                    array_sum(array_column($r1, 'total_no_of_curves')) != count($crvIds) ||
                    $sheetsCount == $prevCurvesCount  
                ){
                    continue;
                }
                $prevCurvesCount = $sheetsCount;
                $mergedArray[] = $r1;
            }
            else{
                $prevCurvesCount = 0;
                $mergedArray[] = $r1;
            }
        }        
        //return $mergedArray;
        $oneOption = [];
        foreach ($mergedArray as $key => $values) {
            $countCurves = 0;
            foreach ($values as $value) {
                if(count($value['curves_sets']) == count($crvIds)){
                    $oneOption[] = $values;
                }
            }
            
        }
        if(count($oneOption) > 0){
            
            $curvs = $this->curveData;
            usort($curvs, function($a, $b) {
                if($a['area'] == $b['area']) return 0;
                return $a['area'] < $b['area']? 1 : -1;
            }); 
            $lastItem = end($curvs);
 
            foreach ($oneOption[0] as $k => $result) {    
 
                if($result['leftover_per_sheet'] > $lastItem['area']){  
                    $printableQty = floor($result['leftover_per_sheet'] / $lastItem['area']);
                    $printableArea = $result['leftover_per_sheet'] - (double)number_format(($printableQty * $lastItem['area']), 2, '.', '');
                  
                    foreach ($result['curves_sets'] as $ck => $curve) {
                        if($curve['curve_no'] == $lastItem['id']){
                            $result['curves_sets'][$ck]['curves_per_sheet'] += $printableQty;
                            $result['curves_sets'][$ck]['occupied_area'] = $result['curves_sets'][$ck]['curves_per_sheet'] * $lastItem['area'];
                            $result['curves_sets'][$ck]['no_of_sheets'] = self::getNoOfSheetsPerCurve($result['curves_sets'][$ck]['planned_qty'], $result['curves_sets'][$ck]['curves_per_sheet']);
                            $result['curves_sets'][$ck]['close_curve_after'] = ($result['curves_sets'][$ck]['no_of_sheets'] + 1);
                            
                            $oneOption[0][0]['curves_sets'] = $result['curves_sets'];
                            $oneOption[0][0]['leftover_per_sheet'] = $printableArea;
                            $oneOption[0][0]['total_area_occupied_per_sheet'] = $oneOption[0][0]['total_area_per_sheet'] - $printableArea;
                        }
                    }
                }
            }
            
            return [$oneOption[0]];
        }
        return array_splice($mergedArray, 0, 6);
    }
    
    public function mergeCombinations(array $results = []) {     
        
        $finalResults = [];        
        if(count($results) > 0){
            foreach ($results as $a1) { 
                
                if(isset($a1['sub'])){     
                    $a2 = $a1['sub'];
                    unset($a1['sub']);
                    if(isset($a2['sub'])){  
                        $a3 = $a2['sub'];
                        unset($a2['sub']);
                        if(isset($a3['sub'])){    
                            $a4 = $a3['sub'];
                            unset($a3['sub']);
                            if(isset($a4['sub'])){
                                $a5 = $a4['sub'];
                                unset($a4['sub']);
                                if(isset($a5['sub'])){  
                                    $a6 = $a5['sub'];
                                    unset($a5['sub']);
                                    if(isset($a6['sub'])){   
                                        $a7 = $a6['sub'];
                                        unset($a6['sub']);
                                        if(isset($a7['sub'])){   
                                            $a8 = $a7['sub'];
                                            unset($a7['sub']);
                                            if(isset($a8['sub'])){ 
                                                $a9 = $a8['sub'];
                                                unset($a8['sub']);
                                                if(isset($a9['sub'])){  
                                                    $a10 = $a9['sub'];
                                                    unset($a9['sub']);
                                                    if(isset($a10['sub'])){                   
                    
                                                    }
                                                    else{
                                                        $finalResults[] = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10];
                                                    }
                                                }
                                                else{
                                                    $finalResults[] = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9];
                                                }
                                            }
                                            else{
                                                $finalResults[] = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8];
                                            }
                                        }
                                        else{
                                            $finalResults[] = [$a1, $a2, $a3, $a4, $a5, $a6, $a7];
                                        }
                                    }
                                    else{
                                        $finalResults[] = [$a1, $a2, $a3, $a4, $a5, $a6];
                                    }
                                }
                                else{
                                    $finalResults[] = [$a1, $a2, $a3, $a4, $a5];
                                }
                            }
                            else{
                                $finalResults[] = [$a1, $a2, $a3, $a4];
                            }
                        }
                        else{
                            unset($a1['sub']);
                            $finalResults[] = [$a1, $a2, $a3];
                        }
                    }
                    else{                        
                        $finalResults[] = [$a1, $a2];
                    }
                }
                else{
                    $finalResults[] = [$a1];
                }
            }
        }
        return $finalResults;
    }
    
    public function applySingletonMethod() {     
        $this->singleton = [];
        foreach ($this->curveData as $curve) {
            $this->singleton[$curve['id']] = [
                'curve' => $curve,
                'printable_qty' => floor($this->printableArea / $curve['area']),
                'leftover' => $this->printableArea - (floor($this->printableArea / $curve['area']) * $curve['area'])
            ];
        }
        $lastItem = end(array_values($this->curveData));
        foreach ($this->singleton as $curvId => $printData) {            
            if($printData['leftover'] < $lastItem['area']){                
                
                $noOfSheets = self::getNoOfSheetsPerCurve($this->singleton[$curve['id']]['curve']['qty'], $this->singleton[$curve['id']]['printable_qty']);
                $this->plans[] = (object) [
                    'curves' => [
                        'curve' => $this->singleton[$curve['id']]['curve'],
                        'curves_per_sheet' => $this->singleton[$curve['id']]['printable_qty'],
                        'leftover_per_sheet' => $this->singleton[$curve['id']]['leftover']
                    ], 
                    'no_of_sheets' => $noOfSheets,
                    'total_printing_area' => ($noOfSheets * $this->singleton[$curve['id']]['curve']['area'] * $this->singleton[$curve['id']]['printable_qty'])
                ];
                unset($this->curveData[$curvId]);
                //unset($this->curveDataQtyWise[$curvId]);
            }               
        }        
    }
    
    public function getSingleCurvePlan($curve) {     
                
        $planData[] = [
            'curve' => $curve,
            'printable_qty' => floor($this->printableArea / $curve['area']),
            'leftover' => $this->printableArea - (floor($this->printableArea / $curve['area']) * $curve['area'])
        ];
           
        $plan = [];
        foreach ($planData as $planDatum) {                 
                
            $noOfSheets = self::getNoOfSheetsPerCurve($planDatum['curve']['qty'], $planDatum['printable_qty']);
            $plan = [ 
                'curve' => $planDatum['curve'],
                'qty_per_sheet' => $planDatum['printable_qty'],
                'occupied_area' => (double)number_format($planDatum['printable_qty'] * $curve['area'], 2, '.', ''),
                'no_of_sheets' => $noOfSheets                 
            ];
            $plan = [
                /*'comb' => $curve,
                'max' => 0,*/
                
                'curveIds' => $planDatum['curve']['id'],
                'curves' => [$planDatum['curve']['id'] => $plan],
                'curveIdCount' => count([$planDatum['curve']['id']]),
                'total_area_per_sheet' =>  (double)$this->printableArea,
                'leftover_per_sheet' => (double)number_format($planDatum['leftover'], 2, '.', ''),  
                'total_no_of_sheets' => $noOfSheets,
                'total_occupied_area_per_sheet' => (double)number_format($plan['occupied_area'] * $noOfSheets, 2, '.', '')
            ];
            
            //unset($this->curveData[$curve['id']]);
            //unset($this->curveDataQtyWise[$curve['id']]);
                          
        }  
        
        return $plan;
    }
    
    private static function getNoOfSheetsPerCurve(int $totalQty=0, int $curvesPerSheet=0){
        return ($curvesPerSheet > 0)? ceil($totalQty / $curvesPerSheet) : 0;
    }
    
    private function getCombinations(array $curvesArray, array $max = [], int $minLength = 2, $level = 1){
        
        if($level > 2){
            $max = [$this->maxQty];
        }
        
        $allCombinations = (Perm::power_perms($curvesArray, count($curvesArray)));
        
        $allCombinationsChunks = array_chunk($allCombinations, 10);

//        if($level != 1){
//            $max = [1];
//        }
        
        // run for all combinations
        $results = [];
        if(count($allCombinationsChunks) > 0){
            foreach ($allCombinationsChunks as $chunk) {            
                
                if(count($chunk) > 0){

                    foreach ($chunk as $key => $crvComb) {            
            
                        for ($i = 0; $i < count($max); $i++) {
                            $printableArea = $this->printableArea;
                            $crvQty = [];

                            foreach ($crvComb as $crvId) {
                                
                                $curve = $this->curveData[$crvId];
                                if($curve){
                                    $printableQty = floor($printableArea / $curve['area']);
                              
                                    if($max[$i] != 0 && $printableQty > $max[$i]){
                                        $printableQty = $max[$i];                     
                                    }                    

                                    if($printableQty == 0){      
                                        //$crvQty = [];
                                        continue;
                                    }          
                                    $printableArea -= (double)number_format(($printableQty * $curve['area']), 2, '.', '');

                                    $noOfSheets = self::getNoOfSheetsPerCurve($curve['qty'], $printableQty);
                                    $crvQty[$crvId] = [
                                        'curve' => $curve,
                                        'qty_per_sheet' => $printableQty,// . "|". $printableArea . "|".($printableQty * $curve['area']) . "|".$this->printableArea,
                                        'occupied_area' => (double)number_format($printableQty * $curve['area'], 2, '.', ''),
                                        'no_of_sheets' => $noOfSheets                        
                                    ];
                                }               
                            }

                            if(count($crvQty) > 0){
                                $crvKeys = array_keys($crvQty);
                                //asort($crvKeys);                  

                                $results[$key."-".$max[$i]] = [
                                    /*'comb' => $crvComb,
                                    'max' => $max[$i],*/ 
                                    'curveIdCount' => count($crvKeys),
                                    'level' => $level,
                                    'curveIds' => $crvKeys,
                                    'curves' => $crvQty,                            
                                    'total_area_per_sheet' =>  (double)$this->printableArea,
                                    'leftover_per_sheet' => (double)number_format($printableArea, 2, '.', ''),  
                                    'total_no_of_sheets' => max(array_column($crvQty, 'no_of_sheets')),
                                    'total_occupied_area_per_sheet' => (double)number_format(array_sum(array_column($crvQty, 'occupied_area')), 2, '.', '')
                                ]; 
                                
                            }
                                                     
                            /*else{
                                $printableArea += (double)number_format(array_sum(array_column($crvQty, 'occupied_area')), 2, '.', '');
                            } */  

                            
                          
                        }
                    }  
                }
            }
            
            $filteredCurves = array_filter(
                $this->curveData,
                function ($key) use ($curvesArray) {
                    return in_array($key, $curvesArray);
                },
                ARRAY_FILTER_USE_KEY
            );

            $lastItem = end(array_values($filteredCurves));
            
            foreach ($results as $k => $result) {          
                if($result['leftover_per_sheet'] > $lastItem['area'] && $level == 1){  
                    unset($results[$k]);                
                }
            }
               
            $refinedResults = $results; //self::refindresults($curvesArray, $results);        
 
            if(is_array($refinedResults) && count($refinedResults) > 0){
                
                foreach ($refinedResults as $k => $refinedResult) {
                    if($level == 1){
                        $crvsLeft = array_reverse(array_diff($curvesArray, array_keys($refinedResult['curves']))); 
                    }
                    else{
                        $crvsLeft = array_diff($curvesArray, array_keys($refinedResult['curves'])); 
                    }
                                      
                    if(is_array($crvsLeft) && count($crvsLeft) > 0){ 
                        
                        $result2 = $this->getCombinations(
                            array_values($crvsLeft), $max, (($minLength > count($crvsLeft))? count($crvsLeft) : $minLength), ($level + 1)
                        );
                        
                        if(is_array($result2) && count($result2) > 0){            
                            $refinedResults[$k]['sub'] = array_values($result2)[0];
                        } 
                    }
                    else{
                        $refinedResults[$k] = $refinedResults[$k];
                    }
                }
            }
            
        }
        else if(count($allCombinations) == 1){                       
            $refinedResults["0-".time()] = $this->getSingleCurvePlan($this->curveData[$allCombinations[0][0]]);
        }   
        else{  
            $refinedResults = [];
        }
     
        return $refinedResults;
                
    }
    
    public static function refindresults($curvesSet=[], $results=[]){
        $refinedResults = [];
        $calcResults = $results;
        
        uasort($calcResults, function($a, $b) {                
            if($a['curveIdCount'] == $b['curveIdCount']) return 0;
            return $a['curveIdCount'] < $b['curveIdCount']? 1 : -1;
        });    
        
        for ($index = 0; $index <= 10; $index++) {
            if(count($refinedResults) == 0){
                foreach ($calcResults as $key => $calcResult) {
                    if(in_array(count(array_diff($curvesSet, (array)$calcResult['curveIds'])), range($index, $index))){
                        $refinedResults[$key] = $calcResult;
                    }
                    /*if(count($curvesSet) == count($calcResult['curveIds'])){
                        $refinedResults[$key] = $calcResult;
                    }*/
                }
            }
        }
        
        
        $calcResults = self::super_unique($calcResults);
        
        uasort($refinedResults, function($a, $b) {                
            if($a['curveIdCount'] == $b['curveIdCount']) return 0;
            return $a['curveIdCount'] < $b['curveIdCount']? 1 : -1;
        });
        
        $newRes = [];
        foreach ($refinedResults as $k => $refinedResult) {
            if(isset($refinedResult['total_occupied_area_per_sheet'])){
                $isIn = false;
                foreach ($newRes as $e) {
                    if($e['total_occupied_area_per_sheet'] == $refinedResult['total_occupied_area_per_sheet']){
                        $isIn = true;
                        break;
                    }
                }
                if($isIn){
                    continue;
                }
                $newRes[$k] = $refinedResult;
            }  
        }
        
        
        return array_slice($newRes, 0, 5);
    }
    
    public static function super_unique($array)
    {
      $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

      foreach ($result as $key => $value)
      {
        if ( is_array($value) )
        {
          $result[$key] = self::super_unique($value);
        }
      }

      return $result;
    }
    
    public static function colsFromArray(array $array, $keys)
    {
        if (!is_array($keys)) $keys = [$keys];
        return array_map(function ($el) use ($keys) {
            $o = [];
            foreach($keys as $key){
                //  if(isset($el[$key]))$o[$key] = $el[$key]; //you can do it this way if you don't want to set a default for missing keys.
                $o[$key] = isset($el[$key])?$el[$key]:false;
            }
            return $o;
        }, $array);
    }
    
    public function groupQuantities($ranges) {
        $maxQty = array_shift(array_values($this->curveDataQtyWise))['qty'];
        $minQty = 0; //end(array_values($this->curveDataQtyWise))['qty'];
 
        $groupedCurves = [];        
        foreach ($ranges as $step) {           
            $prevInc = 0;
            $qtyArray = $this->curveDataQtyWise;
            foreach (range($minQty, ($maxQty + $step), $step) as $inc) {                    
                foreach ($qtyArray as $crvKey => $curve) {                   
                    if($prevInc < $curve['qty'] && $curve['qty'] <= $inc){
                        $groupedCurves[$step][$inc][] = [
                            'id' => $crvKey,
                            'area' => $curve['area']
                        ];
                        //unset($qtyArray[$crvKey]);
                    }
                }
                $prevInc = $inc;
            }            
        }
       
        return $groupedCurves;
    }
}