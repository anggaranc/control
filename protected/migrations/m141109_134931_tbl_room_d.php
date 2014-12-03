<?php

class m141109_134931_tbl_room_d extends CDbMigration{
	public function up(){
            $this->createTable('{{room_d}}',
			array(
				'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
				'lampD1' => 'VARCHAR(128) NOT NULL',
				'lampD2' => 'VARCHAR(128) NOT NULL',
				'ldrD1' => 'VARCHAR(128) NOT NULL',
				'ldrD2' => 'VARCHAR(128) NOT NULL',
                                'lampD1TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampD1TimerStart' => 'TIME NOT NULL',
                                'lampD1TimerStop' => 'TIME NOT NULL',
                                'lampD2TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampD2TimerStart' => 'TIME NOT NULL',
                                'lampD2TimerStop' => 'TIME NOT NULL',
                                'PRIMARY KEY(id)',
			),
			'ENGINE=InnoDB');
	}

	public function down(){
            $this->execute("DROP TABLE IF EXISTS {{room_d}}");
	}
}