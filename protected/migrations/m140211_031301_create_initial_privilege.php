<?php

class m140211_031301_create_initial_privilege extends CDbMigration
{
	public function up()
	{
		$auth = Yii::app()->authManager;
		
		/**
		 * System Log.
		 */
		$auth->createOperation('SystemLog_View', 'View system log.');
		$auth->assign('SystemLog_View', 1);
		
		/**
		 * User.
		 */
		$auth->createOperation('User_View', 'View users.');
		$auth->createOperation('User_Create', 'Create user.');
		$auth->createOperation('User_Update', 'Update user.');
		$auth->createOperation('User_Delete', 'Delete user.');
		$auth->assign('User_View', 1);
		$auth->assign('User_Create', 1);
		$auth->assign('User_Update', 1);
		$auth->assign('User_Delete', 1);
	}

	public function down()
	{
		$auth = Yii::app()->authManager;
		
		$auth->revoke('SystemLog_View', 1);
		$auth->removeAuthItem('SystemLog_View');
		
		$auth->revoke('User_View', 1);
		$auth->removeAuthItem('User_View');
		$auth->revoke('User_Create', 1);
		$auth->removeAuthItem('User_Create');
		$auth->revoke('User_Update', 1);
		$auth->removeAuthItem('User_Update');
		$auth->revoke('User_Delete', 1);
		$auth->removeAuthItem('User_Delete', 1);
	}

}