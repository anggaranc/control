<?php

class ECHtml {
	public static function dropDownList($id, $name = '', $selectedValue = '', $options, $htmlOptions = array()) {
		$html = "<select id='{$id}' name='{$name}' ";
		
		foreach ($htmlOptions as $key => $val) {
			$html .= $key . "='" . $val . "' ";
		}

		$html .= "><option value=''>" . $options['emptyLabel'] . "</option>";
		
		$dbConnection = Yii::app()->db;
		$command = $dbConnection->createCommand($options['query']);
		
		$dataReader = $command->query();
		
		while (($row = $dataReader->read()) !== false) {
			$html .= "<option value='" . $row[$options['value']] . 
				"'" . ($selectedValue == $row[$options['value']]? " selected" : "") . ">";
			
			foreach ($options['label'] as $item) {
				$html .= $item[1] . $row[$item[0]] . $item[2];	
			}
			
			$html .= "</option>";	
		}
		
		$html .= "</select>";
		
		return $html;
	}
	
	public static function arrayDropDownList($id, $name, $selectedValue, $list) {
		$html = "<select id='{$id}' name='{$name}'>";
		
		foreach ($list as $item) {
			$html .= "<option value='" . $item[0] . 
				"'" . ($item[0] == $selectedValue? " selected" : "") . ">" . $item[1] . "</option>";
		}
		
		$html .= "</select>";
		
		return $html;
	}
}
