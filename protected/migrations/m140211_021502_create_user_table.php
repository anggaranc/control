<?php

class m140211_021502_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{user}}',
			array(
				'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
				'username' => 'VARCHAR(128) NOT NULL',
				'password' => 'VARCHAR(128) NOT NULL',
				'email' => 'VARCHAR(128) NOT NULL',
				'enable' => "ENUM('Yes', 'No') DEFAULT 'No'",
				'userType' => "ENUM('admin', 'regular') NOT NULL",
				'PRIMARY KEY(id)',
				'UNIQUE(username)',
				'UNIQUE(email)',
			),
			'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->execute("DROP TABLE IF EXISTS {{user}}");
	}

}