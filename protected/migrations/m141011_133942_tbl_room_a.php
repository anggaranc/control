<?php

class m141011_133942_tbl_room_a extends CDbMigration
{
	public function up(){
             $this->createTable('{{room_a}}',
			array(
				'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
				'lampA1' => 'VARCHAR(128) NOT NULL',
				'lampA2' => 'VARCHAR(128) NOT NULL',
				'ldrA1' => 'VARCHAR(128) NOT NULL',
				'ldrA2' => 'VARCHAR(128) NOT NULL',
                                'lampA1TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampA1TimerStart' => 'TIME NOT NULL',
                                'lampA1TimerStop' => 'TIME NOT NULL',
                                'lampA2TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampA2TimerStart' => 'TIME NOT NULL',
                                'lampA2TimerStop' => 'TIME NOT NULL',
                                'PRIMARY KEY(id)',
			),
			'ENGINE=InnoDB');
	}

	public function down(){
		$this->execute("DROP TABLE IF EXISTS {{room_a}}");
	}
}