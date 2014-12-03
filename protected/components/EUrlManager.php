<?php

class EUrlManager extends CUrlManager {
	public $showScriptName = false;
	public $appendParams = false;
	
	/**
	 * Do not use $userStringParsing & $urlSuffix otherwise url will
	 * be executed incorrectly.
	 */
//	public $useStrictParsing = true;
//	public $urlSuffix = '/';

	public function createUrl($route, $params = array(), $ampersand = '&') {
		$route = preg_replace_callback('/(?<![A-Z])[A-Z]/', array($this, 'replace'), $route);
		
		return parent::createUrl($route, $params, $ampersand);
	}
	
	private function replace($matches) {
		return '-' . $this->lowerCaseFirst($matches[0]);
	}
	
	private function lowerCaseFirst($str) {
		if (strlen($str))
			$str[0] = strtolower($str[0]);
		
        return $str;
	}
	
	public function parseUrl($request) {
		$route = parent::parseUrl($request);
		
		return $this->lowerCaseFirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $route))));
	}
}
