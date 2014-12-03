<?php

class ESecurity {
	public static function getUserPrivileges($userId) {
		$privileges = array();
		
		$items = AuthAssignment::model()->findAll('userid=:userid', array(
			':userid' => $userId,
		));
		
		foreach ($items as $item)
			$privileges[$item->itemname] = true;
		
		return $privileges;
	}
}