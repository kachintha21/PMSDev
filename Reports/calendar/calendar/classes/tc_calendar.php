<?php
//*********************************************************
// The php calendar component 
// written by TJ @triconsole
//
// version 3.53 (16 April 2011)


//fixed: Incorrect next month display show on 'February 2008'
//	- thanks Neeraj Jain for bug report
//
//fixed: Incorrect month comparable on calendar_form.php line 113
// - thanks Djenan Ganic, Ian Parsons, Jesse Davis for bug report
//
//add on: date on calendar form change upon textbox in datepicker mode
//add on: validate date enter from dropdown and textbox
//
//fixed: Calendar path not valid when select date from dropdown
// - thanks yamba for bug report
//
//adjust: add new function setWidth and deprecate getDayNum function
//
//fixed: year combo box display not correct when extend its value
//	- thanks Luiz Augusto for bug report
//
//fixed on date and month value return that is not leading by '0'
//
//adjust: change php short open tag (<?=) to normal tag (<?php)
//  - thanks Michael Lynch
//
//add on: getMonthNames() function to make custom month names on each language
//  - thanks Jean-Francois Harrington
//
//add on: button close on datepicker on the top-right corner of calendar
//  - thanks denis
//
//fixed: hide javascript alert when default date not defined
//	- thanks jon-b
//
//fixed: incorrect layout when select part of date
//	- thanks simonzebu (I just got what you said  :) )
//
//fixed: not support date('N') for php version lower 5.0.1 so change to date('w') instead
//  - thanks simonzebu, Kamil, greensilver for bug report
//  - thanks Paul for the solution
//
//add on: setHeight() function to set the height of iframe container of calendar
//	- thanks Nolochemcial
//
//add on: startMonday() function to set calendar display first day of week on Monday
//
//fixed: don't display year when not in year interval
//
//fixed: day combobox not update when select date from calendar
//	- thanks ciprianmp
//
//add on: disabledDay() function to let the calendar disabled on specified day
//  - thanks Jim R.
//
//bug fixed: total number of days startup incorrect
//  - thanks Francois du Toit, ciprianmp
//
//add on: setAlignment() and setDatePair() function
//  - thanks ciprianmp and many guys guiding this :)
//
//fixed: the header of calendar looks tight when day's header more than 2 characters, this can be adjusted by increasing width on calendar.css [#calendar-body td div { width: 15px; }]
//	- thanks ciprianmp
//
//add on: setSpecificDate() to enable or disable specific date
//	- thanks ciprianmp, phillip, and Steve to suggest this
//
//utilizing and cleaning up some codes on tc_calendar.php, calendar_form.php, and calendar.js
//	- thanks Peter
//
//added: 2 functions for php version that does not support json
//	- thanks Steve
//
//fixed: javascript error on datepair function on v3.50 and 3.51
//	- thanks ciprianmp
//
//fixed: writeYear bug from $date_allow1 & 2 must be changed to $time_allow1 & 2
//	- thanks ciprianmp again :(
//********************************************************

class tc_calendar{
	var $icon;
	var $objname;
	var $txt = "Select"; //display when no calendar icon found or set up
	var $date_format = 'd-M-Y'; //format of date show in panel if $show_input is false
	var $year_display_from_current = 30;
	
	var $date_picker;
	var $path = '';
	
	var $day = 00;
	var $month = 00;
	var $year = 0000;	
	
	var $width = 150;
	var $height = 205;
	
	var $year_start;
	var $year_end;
	
	var $startMonday = false;
	
	//var $date_allow1;
	//var $date_allow2;
	var $time_allow1 = false;
	var $time_allow2 = false;
	var $show_not_allow = false;
	
	var $auto_submit = false;
	var $form_container;
	var $target_url;
	
	var $show_input = true;
	
	var $dsb_days = array(); //collection of days to disabled
	
	var $zindex = 1;
	
	var $v_align = "bottom";
	var $h_align = "right";
	var $line_height = 18; //for vertical align offset
	
	var $date_pair1 = "";
	var $date_pair2 = "";
	var $date_pair_value = "";
	
	//specific date
	var $sp_dates = array();
	var $sp_type = 0; //0=disabled specify date, 1=enabled only specify date
	var $sp_recursive = ''; //''(blank) = no recursive, 'month'=recursive on month, or 'year'=recursive on year
	
	//calendar constructor
	function tc_calendar($objname, $date_picker = false, $show_input = true){
		$this->objname = $objname;
		//$this->year_display_from_current = 50;
		$this->date_picker = $date_picker;
		
		//set default year display from current year
		$thisyear = date('Y');
		$this->year_start = $thisyear-$this->year_display_from_current;
		$this->year_end = $thisyear+$this->year_display_from_current;
		
		$this->show_input = $show_input;
	}
	
	//check for leapyear
	function is_leapyear($year){
    	return ($year % 4 == 0) ?
    		!($year % 100 == 0 && $year % 400 <> 0)	: false;
    }
	
	//get the total day of each month in year
    function total_days($month,$year){
    	$days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		if($month > 0 && $year > 0){
	    	return ($month == 2 && $this->is_leapYear($year)) ? 29 : $days[$month-1];
		}else return 31;
    }
	
	//Deprecate since v1.6
	function getDayNum($day){
		$headers = $this->getDayHeaders();
		return isset($headers[$day]) ? $headers[$day] : 0;
	}
	
	//get the day headers start from sunday till saturday
	function getDayHeaders(){
		if($this->startMonday)
			return array("1"=>"Mo", "2"=>"Tu", "3"=>"We", "4"=>"Th", "5"=>"Fr", "6"=>"Sa","7"=>"Su");
		else
			return array("7"=>"Su", "1"=>"Mo", "2"=>"Tu", "3"=>"We", "4"=>"Th", "5"=>"Fr", "6"=>"Sa");
	}
	
	function setIcon($icon){
		$this->icon = $icon;
	}
	
	function setText($txt){
		$this->txt = $txt;
	}
	
	//-----------------------------------------------------------
	//input the date format according to php date format
	// for example: 'd F y' or 'Y-m-d'
	//-----------------------------------------------------------
	function setDateFormat($format){
		$this->date_format = $format;
	}

	//set default selected date
	function setDate($day, $month, $year){
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
	}
	
	function setDateYMD($date){
		list($year, $month, $day) = explode("-", $date, 3);
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
	}
	
	//specified location of the calendar_form.php 
	function setPath($path){
		$last_char = substr($path, strlen($path)-1, strlen($path));
		if($last_char != "/") $path .= "/";
		$this->path = $path;
	}
	
	function writeScript(){
		//check valid default date
		if(!$this->checkDefaultDateValid()){
			//unset default date
			$this->day = 0;
			$this->month = 0;
			$this->year = 0;
		}		
		
		$this->writeHidden();

		//check whether it is a date picker
		if($this->date_picker){
			echo("<div style=\"position: relative; z-index: $this->zindex; float: left;\">");
			
			if($this->show_input){
				$this->writeDay();
				$this->writeMonth();
				$this->writeYear();
			}else{
				echo(" <a href=\"javascript:toggleCalendar('".$this->objname."');\">");
				$this->writeDateContainer();
				echo("</a>");
			}			
			
			echo(" <a href=\"javascript:toggleCalendar('".$this->objname."');\">");						
			if(is_file($this->icon)){
				echo("<img src=\"".$this->icon."\" id=\"tcbtn_".$this->objname."\" name=\"tcbtn_".$this->objname."\" border=\"0\" align=\"absmiddle\" />");
			}else echo($this->txt);				
			echo("</a>");
			
			$this->writeCalendarContainer();
			
			echo("</div>");
		}else{
			$this->writeCalendarContainer();
		}			
	}

	function writeCalendarContainer(){
		$params = array();
		$params[] = "objname=".$this->objname;
		$params[] = "selected_day=".$this->day;
		$params[] = "selected_month=".$this->month;
		$params[] = "selected_year=".$this->year;
		$params[] = "year_start=".$this->year_start;
		$params[] = "year_end=".$this->year_end;
		$params[] = "dp=".(($this->date_picker) ? 1 : 0);
		$params[] = "mon=".$this->startMonday;
		$params[] = "da1=".$this->time_allow1;
		$params[] = "da2=".$this->time_allow2;
		$params[] = "sna=".$this->show_not_allow;
		
		$params[] = "aut=".$this->auto_submit;
		$params[] = "frm=".$this->form_container;
		$params[] = "tar=".$this->target_url;
		
		$params[] = "inp=".$this->show_input;
		$params[] = "fmt=".$this->date_format;
		$params[] = "dis=".implode(",", $this->dsb_days);
		
		$params[] = "pr1=".$this->date_pair1;
		$params[] = "pr2=".$this->date_pair2;
		$params[] = "prv=".$this->date_pair_value;
		$params[] = "pth=".$this->path;
		
		$params[] = "spd=".$this->check_json_encode($this->sp_dates);
		$params[] = "spt=".$this->sp_type;
		$params[] = "spr=".$this->sp_recursive;
		
		
		$paramStr = (sizeof($params)>0) ? "?".implode("&", $params) : "";
		
		if($this->date_picker){
			$div_display = "hidden";
			$div_position = "absolute";
			
			$line_height = $this->line_height;
			
			if(is_file($this->icon)){
				$img_attribs = getimagesize($this->icon);
				$line_height = $img_attribs[1]+2;
			}
			
			$div_align = "";
			
			//adjust alignment
			switch($this->v_align){
				case "top":
					$div_align .= "bottom:".$line_height."px;";
					break;
				case "bottom":
				default:
					$div_align .= "top:".$line_height."px;";
					
			}
			
			switch($this->h_align){
				case "left":
					$div_align .= "left:0px;";
					break;
				case "right":
				default:
					$div_align .= "right:0px;";
					
			}
			
		}else{
			$div_display = "visible";
			$div_position = "relative";
			$div_align = "";
		}
		
		//write the calendar container
		echo("<div id=\"div_".$this->objname."\" style=\"position:".$div_position.";visibility:".$div_display.";z-index:100;".$div_align."\" class=\"div_calendar calendar-border\">");
		echo("<IFRAME id=\"".$this->objname."_frame\" src=\"".$this->path."calendar_form.php".$paramStr."\" frameBorder=\"0\" scrolling=\"no\" allowtransparency=\"true\" width=\"100%\" height=\"100%\" style=\"z-index: 100;\"></IFRAME>");

		echo("</div>");
		
	}
	
	//write the select box of days
	function writeDay(){
		$total_days = $this->total_days($this->month, $this->year);
		
		echo("<select name=\"".$this->objname."_day\" id=\"".$this->objname."_day\" onChange=\"javascript:tc_setDay('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcday\">");
		echo("<option value=\"00\">Day</option>");
		for($i=1; $i<=$total_days; $i++){
			$selected = ((int)$this->day == $i) ? " selected" : "";
			echo("<option value=\"".str_pad($i, 2 , "0", STR_PAD_LEFT)."\"$selected>$i</option>");
		}
		echo("</select> ");
	}
	
	//write the select box of months
	function writeMonth(){
		echo("<select name=\"".$this->objname."_month\" id=\"".$this->objname."_month\" onChange=\"javascript:tc_setMonth('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcmonth\">");
		echo("<option value=\"00\">Month</option>");
		
		$monthnames = $this->getMonthNames();		
		for($i=1; $i<=sizeof($monthnames); $i++){
			$selected = ((int)$this->month == $i) ? " selected" : "";
			echo("<option value=\"".str_pad($i, 2, "0", STR_PAD_LEFT)."\"$selected>".$monthnames[$i-1]."</option>");
		}
		echo("</select> ");
	}
	
	//write the year textbox
	function writeYear(){
		//echo("<input type=\"textbox\" name=\"".$this->objname."_year\" id=\"".$this->objname."_year\" value=\"$this->year\" maxlength=4 size=5 onBlur=\"javascript:tc_setYear('".$this->objname."', this.value, '$this->path');\" onKeyPress=\"javascript:if(yearEnter(event)){ tc_setYear('".$this->objname."', this.value, '$this->path'); return false; }\"> ");
		echo("<select name=\"".$this->objname."_year\" id=\"".$this->objname."_year\" onChange=\"javascript:tc_setYear('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcyear\">");
		echo("<option value=\"0000\">Year</option>");
		
		
		$year_start = $this->year_start;
		$year_end = $this->year_end;
		
		//check year to be select in case of date_allow is set
		  if(!$this->show_not_allow && ($this->time_allow1 || $this->time_allow2)){
			if($this->time_allow1 && $this->time_allow2){
				$da1Time = strtotime($this->time_allow1);
				$da2Time = strtotime($this->time_allow2);
				
				if($da1Time < $da2Time){
					$year_start = date('Y', $da1Time);
					$year_end = date('Y', $da2Time);
				}else{
					$year_start = date('Y', $da2Time);
					$year_end = date('Y', $da1Time);
				}
			}elseif($this->time_allow1){
				//only date 1 specified
				$da1Time = strtotime($this->time_allow1);
				$year_start = date('Y', $da1Time);
			}elseif($this->time_allow2){
				//only date 2 specified
				$da2Time = strtotime($this->time_allow2);
				$year_end = date('Y', $da2Time);
			}
		  }
		
		for($i=$year_end; $i>=$year_start; $i--){
			$selected = ((int)$this->year == $i) ? " selected" : "";
			echo("<option value=\"$i\"$selected>$i</option>");
		}
		echo("</select> ");
	}
	
	function eHidden($suffix, $value) {
		if($suffix) $suffix = "_".$suffix;
		echo("<input type=\"hidden\" name=\"".$this->objname.$suffix."\" id=\"".$this->objname.$suffix."\" value=\"".$value."\" />");
	}

	//write hidden components
	function writeHidden(){
		$this->eHidden('', $this->getDate());
		$this->eHidden('dp', $this->date_picker);
		$this->eHidden('year_start', $this->year_start);
		$this->eHidden('year_end', $this->year_end);
		$this->eHidden('mon', $this->startMonday);
		$this->eHidden('da1', $this->time_allow1);
		$this->eHidden('da2', $this->time_allow2);
		$this->eHidden('sna', $this->show_not_allow);
		$this->eHidden('aut', $this->auto_submit);
		$this->eHidden('frm', $this->form_container);
		$this->eHidden('tar', $this->target_url);
		$this->eHidden('inp', $this->show_input);
		$this->eHidden('fmt', $this->date_format);
		$this->eHidden('dis', implode(",", $this->dsb_days));
		$this->eHidden('pr1', $this->date_pair1);
		$this->eHidden('pr2', $this->date_pair2);
		$this->eHidden('prv', $this->date_pair_value);
		$this->eHidden('pth', $this->path);
		
		$this->eHidden('spd', $this->check_json_encode($this->sp_dates));
		$this->eHidden('spt', $this->sp_type);
		$this->eHidden('spr', $this->sp_recursive);
	}

	//set width of calendar
	//---------------------------
	// Deprecated since version 2.9
	// Auto sizing is applied
	//---------------------------
	function setWidth($width){
		if($width) $this->width = $width;
	}
	
	//set height of calendar
	//---------------------------
	// Deprecated since version 2.9
	// Auto sizing is applied
	//---------------------------
	function setHeight($height){
		if($height) $this->height = $height;
	}
	
	function setYearInterval($start, $end){
		if($start < $end){
			$this->year_start = $start;
			$this->year_end = $end;
		}else{
			$this->year_start = $end;
			$this->year_end = $start;
		}
	}
	
	function getMonthNames(){
		return array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");		
	}
	
	function startMonday($flag){
		$this->startMonday = $flag;
	}
	
	function dateAllow($from = "", $to = "", $show_not_allow = true){
		$time_from = strtotime($from);
		$time_to = strtotime($to);
		// prior to version 5.1 strtotime returns -1 for bad input
        if (version_compare('5.1.0', phpversion()) == 1) {
			if ($time_from == -1) $time_from = false;
			if ($time_to == -1) $time_to = false;
		}

		// sanity check, ensure time_from earlier than time_to
		if(is_int($time_from) && is_int($time_to) && $time_from > $time_to){
			$tmp = $time_from;
			$time_from = $time_to;
			$time_to = $tmp;
		}

		if (is_int($time_from)) {
			$this->time_allow1 = $time_from;
			$y = date('Y', $time_from);
			if($this->year_start && $y < $this->year_start) $this->year_start = $y;

			//setup year end from year start
			if(!is_int($time_to) && !$this->year_end) $this->year_end = $this->year_start + $this->year_display_from_current;
		}

		if (is_int($time_to)) {
			$this->time_allow2 = $time_to;
			$y = date('Y', $time_to);
			if($this->year_end && $y < $this->year_end) $this->year_end = $y;

			//setup year start from year end
			if(!is_int($time_from) && !$this->year_start) $this->year_start = $this->year_end - $this->year_display_from_current;
		}

		$this->show_not_allow = $show_not_allow;
	}

	function autoSubmit($auto, $form_name, $target = ""){
		$this->auto_submit = $auto;
		$this->form_container = $form_name;
		$this->target_url = $target;
	}
	
	function getDate(){
		return str_pad($this->year, 4, "0", STR_PAD_LEFT)."-".str_pad($this->month, 2, "0", STR_PAD_LEFT)."-".str_pad($this->day, 2, "0", STR_PAD_LEFT);
	}
	
	function showInput($flag){
		$this->show_input = $flag;
	}
	
	function writeDateContainer(){
		if($this->day && $this->month && $this->year)
			$dd = date($this->date_format, mktime(0,0,0,$this->month,$this->day,$this->year));
		else $dd = "<font size='1px'>Select Date</font>";
		
		echo("<font size='1px'><span id=\"divCalendar_".$this->objname."_lbl\" class=\"date-tccontainer\">$dd</span></font>");
	}
	
	
	//------------------------------------------------------
	// This function disable day column as specified value
	// day values : Sun, Mon, Tue, Wed, Thu, Fri, Sat
	//------------------------------------------------------
	function disabledDay($day){
		$day = strtolower($day); //make it not case-sensitive
		if(in_array($day, $this->dsb_days) === false)
			$this->dsb_days[] = $day;
	}
	
	function setAlignment($h_align, $v_align){
		$this->h_align = $h_align;
		$this->v_align = $v_align;
	}
	
	function setDatePair($calendar_name1, $calendar_name2, $pair_value = "0000-00-00 00:00:00"){
		if($calendar_name1 != $this->objname){
			$this->date_pair1 = $calendar_name1;
			if($pair_value != "0000-00-00 00:00:00")
				$this->date_pair_value = $pair_value;
		}elseif($calendar_name2 != $this->objname){
			$this->date_pair2 = $calendar_name2;
			if($pair_value != "0000-00-00 00:00:00")
				$this->date_pair_value = $pair_value;
		}		
	}
	
	
	function setSpecificDate($dates, $type=0, $recursive=""){
		if(is_array($dates)){
			//change specific date to time
			foreach($dates as $sp_date){
				$sp_time = strtotime($sp_date);
				
				if($sp_time > 0) $this->sp_dates[] = $sp_time;
			}
			
			$this->sp_type = ($type == 1) ? 1 : 0; //control data type for $type
			
			$recursive = strtolower($recursive);
			$this->sp_recursive = ($recursive == 'month' || $recursive == 'year') ? $recursive : ""; //control data type for $recursive
		}
	}
	
	function checkDefaultDateValid(){
		$default_datetime = mktime(0,0,0,$this->month,$this->day,$this->year);
		$valid = true;
		
		//check with allow date
		if($this->time_allow1 && $this->time_allow2){
			if($default_datetime < $this->time_allow1 || $default_datetime > $this->time_allow2) $valid = false;
		}elseif($this->time_allow1){
			if($default_datetime < $this->time_allow1) $valid = false;
		}elseif($this->time_allow2){
			if($default_datetime > $this->time_allow2) $valid = false;
		}
		
		//check with specific date
		if(is_array($this->sp_dates) && sizeof($this->sp_dates) > 0){
			//check if it is current date
			$sp_found = false;
			
			switch($this->sp_recursive){
				case 'month': //recursive every month, check on day
					foreach($this->sp_dates as $sp_time){
						$sp_time_d = date('d', $sp_time);
						if($sp_time_d == $this->day){
							$sp_found = true;
							break;
						}
					}
					break;
				case 'year': //recursive every year, check on month and day
					foreach($this->sp_dates as $sp_time){
						$sp_time_md = date('md', $sp_time);	
						$this_md = date('md', $default_datetime); 
						if($sp_time_md == $this_md){
							$sp_found = true;
							break;
						}
					}
					break;
				default: //no recursive
					//check exact date
					$sp_found = in_array($default_datetime, $this->sp_dates);
			}
			
			switch($this->sp_type){
				case 0:
				default:
					//disabled specific and enabled others
					if($sp_found) $valid = false;
					break;
				case 1:
					//enabled specific and disabled others
					if(!$sp_found) $valid = false;
					break;
			}					
		}
		
		return $valid;
	}
	
	function check_json_encode($obj){
		//try customize to get it work, should replace with better solution in the future
		
		if(function_exists("json_encode")){
			return json_encode($obj);
		}else{			
			//only array is assume for now			
			if(is_array($obj)){
				return "[".implode(",", $obj)."]";	
			}else return "";
		}
	}
	
	function &check_json_decode($str){
		//should replace with better solution in the future
		
		if(function_exists("json_decode")){
			return json_decode($str);
		}else{			
			//only array is assume for now
			$str = trim($str);
			if($str && strlen($str) > 2){
				$str = substr($str, 1, strlen($str)-2);
				return explode(",", $str);
			}else return array();
		}
	}

}
?>