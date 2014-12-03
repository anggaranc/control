<?php

class m141109_134855_tbl_room_b extends CDbMigration{
	public function up(){
            $this->createTable('{{room_b}}',
			array(
				'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
				'lampB1' => 'VARCHAR(128) NOT NULL',
				'lampB2' => 'VARCHAR(128) NOT NULL',
				'ldrB1' => 'VARCHAR(128) NOT NULL',
				'ldrB2' => 'VARCHAR(128) NOT NULL',
                                'lampB1TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampB1TimerStart' => 'TIME NOT NULL',
                                'lampB1TimerStop' => 'TIME NOT NULL',
                                'lampB2TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampB2TimerStart' => 'TIME NOT NULL',
                                'lampB2TimerStop' => 'TIME NOT NULL',
                                'PRIMARY KEY(id)',
			),
			'ENGINE=InnoDB');
	}

	public function down(){
            $this->execute("DROP TABLE IF EXISTS {{room_b}}");
	}
}