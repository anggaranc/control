<?php

class m140211_022817_insert_admin_user extends CDbMigration
{
	public function up()
	{
		$adminPassword = 'n0password';
		$admin = new User;
		$admin->id = 1;
		$admin->username = 'admin';
		$admin->password = crypt($adminPassword, $adminPassword);
		$admin->email = 'anggara.nc@gmail.com';
		$admin->enable = User::ENABLE_YES;
		$admin->userType = 'admin';
		$admin->save();
	
		$demoUserPassword = 'demo';
		$demoUser = new User;
		$demoUser->id = 2;
		$demoUser->username = 'demo';
		$demoUser->password = crypt($demoUserPassword, $demoUserPassword);
		$demoUser->email = 'demo@gmail.com';
		$demoUser->enable = User::ENABLE_YES;
		$demoUser->userType = 'regular';
		$demoUser->save();
	}

	public function down()
	{
		User::model()->findByPk(1)->delete();
		User::model()->findByPk(2)->delete();
	}

}