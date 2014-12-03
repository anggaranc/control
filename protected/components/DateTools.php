<?php

class DateTools {
	/**
	 * ex.: generateMonthsNameSerial('05-09-2012', '25-02-2013', '&');
	 * will generate: string(70) ", September, Oktober, November, Desember 2012 & Januari, Februari 2013"
	 */
	public static function generateMonthsNameSerial($start, $end, $andDelimiter) {
		$result = array();
		$_str = '';
		$months[] = 'Januari'; $months[] = 'Februari'; $months[] = 'Maret';
		$months[] = 'April'; $months[] = 'Mei'; $months[] = 'Juni';
		$months[] = 'Juli'; $months[] = 'Agustus'; $months[] = 'September';
		$months[] = 'Oktober'; $months[] = 'November'; $months[] = 'Desember';
		$lastMonth = -1; $lastYear = -1;
		
		while (true) {
			$month = date('m', strtotime($start));
			$year = date('Y', strtotime($start));
			$start = date('d-m-Y', strtotime('+1 month', strtotime($start)));
			$stop = false;
			
			if ($month >= date('m', strtotime($end)) &&
				$year >= date('Y', strtotime($end))) {
				$stop = true;
			}
			
			if ($month > $lastMonth)
				$_str .= ', ' . $months[intval($month) - 1];
			else if ($lastMonth > $month)
				$_str .= ' ' . $lastYear . (!$stop? ' ' . $andDelimiter . ' ' : '') .
					$months[intval($month) - 1];
			
			if ($stop) {
				$_str .= ' ' . $year;
				break;
			}
			
			$lastMonth = $month;
			$lastYear = $year;
		}
		
		return $_str;
	}
			
	public static function toDMY($s){
		$t = strtotime($s);
		$d = date("d-m-Y", $t);
		
		return $d;
	}

	public static function toYMD($s){
		$t = strtotime($s);
		$d = date("Y-m-d", $t);

		return $d;
	}

	public static function toHMS($s) {
		$t = strtotime($s);
		$d = date("H:i:s", $t);

		return $d;
	}
	
	public static function toDMYHMS($s){
		$t = strtotime($s);
		$d = date("d-m-Y H:i:s", $t);

		return $d;
	}

	public static function toYMDHMS($s){
		$t = strtotime($s);
		$d = date("Y-m-d H:i:s", $t);

		return $d;
	}
	
	public static function getDay($s) {
		$t = strtotime($s);

		return date("d", $t);
	}
	
	public static function getMonth($s){
		$t = strtotime($s);

		return date("m", $t);	
	}
	
	public static function getYear($s, $isoFormat=true){
		$yearPattern = ($isoFormat? "Y": "y");
		
		$t = strtotime($s);

		return date($yearPattern, $t);	
	}
	
	public static function monthToRomeFormat($month){
		$rome = array("I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");

		return $rome[intval($month) - 1];
	}
	
	public static function currentISODate(){
		return date("Y-m-d");
	}
	
	public static function currentISODatetime(){
		return date("Y-m-d H:i:s");
	}
	
	public static function dateDiff($dateExpr1, $dateExpr2){
		$ret = array();
		
		$diff = abs(strtotime($dateExpr1) - strtotime($dateExpr2));
		$years = floor($diff / (365*60*60*24)); 
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
			
		$ret["years"] = $years;
		$ret["months"] = $months;
		$ret["days"] = $days;
		$ret["hours"] = $hours;
		$ret["minutes"] = $minutes;
		$ret["seconds"] = $seconds;
		
		return $ret;
	}
	
	public static function dateDiffInDays($d1, $d2) {
		return round(abs(strtotime($d1)-strtotime($d2))/86400);
	}

	public static function dateDiffInMonth($dateExpr1, $dateExpr2) {
		$month = array();
		$result = DateTools::dateDiff($dateExpr1, $dateExpr2);
		
		$month["months"] = ($result["years"] * 12) + $result["months"];
		$month["days"] = $result["days"];
		
		/**
		 * String representative.
		 */
		$srep = "";
		
		if($month["months"]==0)
			$srep .= "";
		else if($month["months"]==1)
			$srep .= $month["months"]." month";
		else if($month["months"]>1)
			$srep .= $month["months"]." months";
		
		if($month["days"]==0)
			$srep .= "";
		else if($month["days"]==1)
			$srep .= ($month["months"]>0? " " : "").$month["days"]." day";
		else if($month["days"]>1)
			$srep .= ($month["months"]>0? " " : "").$month["days"]." days";
		
		$month["srep"] = $srep;
		
		return $month;
	}
	
	public static function toIndonesianFormat($s){
		$t = strtotime($s);
		$day = date("d", $t);
		$month = date("n", $t);
		$year = date("Y", $t);

		$months = array("Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September", "Oktober", "November",
			"Desember");
		
		$d = $day." ".$months[$month - 1]." ".$year;

		return $d;
    }
    
	public static function generateMonthList() {
		return array(
			array('num' => 1, 'month' => 'January'),
			array('num' => 2, 'month' => 'February'),
			array('num' => 3, 'month' => 'March'),
			array('num' => 4, 'month' => 'April'),
			array('num' => 5, 'month' => 'May'),
			array('num' => 6, 'month' => 'June'),
			array('num' => 7, 'month' => 'July'),
			array('num' => 8, 'month' => 'August'),
			array('num' => 9, 'month' => 'September'),
			array('num' => 10, 'month' => 'October'),
			array('num' => 11, 'month' => 'November'),
			array('num' => 12, 'month' => 'December'),
		);
	}
}

?>
