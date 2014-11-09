<?php

class EDateFormat {
	public static function formatTimestampToDate($timestamp) {
		return date('d-m-Y', $timestamp);
	}
	
	public static function formatTimestampToDateTime($timestamp) {
		return date('d-m-Y H:i:s', $timestamp);
	}
	
	public static function formatDate($date) {
		return date('d-m-Y', strtotime($date));
	}
	
	public static function formatISO($date) {
		return date('Y-m-d', strtotime($date));
	}
	
	public static function getYear($date, $iso = true) {
		if ($iso)
			return date('Y', strtotime(self::formatISO ($date)));
		else
			return date('y', strtotime(self::formatISO ($date)));
	}
	
	public static function getMonth($date) {
		$isoDate = explode('-', self::formatISO($date));
		
		return $isoDate[1];
	}
	
	public static function monthToRomeFormat($month) {
		$month = intval($month);
		$romeMonth = '';
		
		switch ($month) {
			case 1:
				$romeMonth = 'I';
				break;
			case 2:
				$romeMonth = 'II';
				break;
			case 3:
				$romeMonth = 'III';
				break;
			case 4:
				$romeMonth = 'IV';
				break;
			case 5:
				$romeMonth = 'V';
				break;
			case 6:
				$romeMonth = 'VI';
				break;
			case 7:
				$romeMonth = 'VII';
				break;
			case 8:
				$romeMonth = 'VIII';
				break;
			case 9:
				$romeMonth = 'IX';
				break;
			case 10:
				$romeMonth = 'X';
				break;
			case 11:
				$romeMonth = 'XI';
				break;
			case 12:
				$romeMonth = 'XII';
				break;
		}
		
		return $romeMonth;
	}
}
