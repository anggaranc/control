<?php

class ENumberFormat {
	/**
	 * Format number with decimal and thousand separator.
	 * 
	 * usage:
	 * 
	 * format('23232.80', 2, '.', ',', true) will return 23,232.8
	 * format('23232.80', 2, '.', ',', false) will return 23,232.80
	 * format('23232.80450, 5, '.', ',', true) will return 23,232.8045
	 * format('23232.80450, 5, '.', ',', false) will return 23,232.80450
	 */
	public static function format($value, $decimalPlaces, $decimalSeparator, $thousandSeparator, $removeTrailingZeros = false) {
		$result = number_format($value, $decimalPlaces, $decimalSeparator, $thousandSeparator);
		
		if ($removeTrailingZeros)
			$result = rtrim(rtrim($result, "0"), $decimalSeparator);
		
		return $result;
	}
}
