<?php

class m141109_134916_tbl_room_c extends CDbMigration{
	public function up(){
            $this->createTable('{{room_c}}',
			array(
				'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
				'lampC1' => 'VARCHAR(128) NOT NULL',
				'lampC2' => 'VARCHAR(128) NOT NULL',
				'ldrC1' => 'VARCHAR(128) NOT NULL',
				'ldrC2' => 'VARCHAR(128) NOT NULL',
                                'lampC1TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampC1TimerStart' => 'TIME NOT NULL',
                                'lampC1TimerStop' => 'TIME NOT NULL',
                                'lampC2TimerStatus' => 'VARCHAR(128) NOT NULL',
                                'lampC2TimerStart' => 'TIME NOT NULL',
                                'lampC2TimerStop' => 'TIME NOT NULL',
                                'PRIMARY KEY(id)',
			),
			'ENGINE=InnoDB');
	}

	public function down(){
            $this->execute("DROP TABLE IF EXISTS {{room_c}}");
	}
}