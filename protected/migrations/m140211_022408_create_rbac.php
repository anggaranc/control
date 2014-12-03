<?php

class m140211_022408_create_rbac extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{AuthItem}}',
			array(
				'name' => 'VARCHAR(64) NOT NULL',
				'type' => 'INTEGER NOT NULL',
				'description' => 'TEXT',
				'bizrule' => 'TEXT',
				'data' => 'TEXT',
				'PRIMARY KEY(name)',
			),
			'ENGINE=InnoDB');
		
		$this->createTable('{{AuthItemChild}}',
			array(
				'parent' => 'VARCHAR(64) NOT NULL',
				'child' => 'VARCHAR(64) NOT NULL',
				'PRIMARY KEY(parent, child)',
				'FOREIGN KEY(parent) REFERENCES {{AuthItem}}(name) ON DELETE CASCADE ON UPDATE CASCADE',
				'FOREIGN KEY(child) REFERENCES {{AuthItem}}(name) ON DELETE CASCADE ON UPDATE CASCADE',
			),
			'ENGINE=InnoDB');
		
		$this->createTable('{{AuthAssignment}}',
			array(
				'itemname' => 'VARCHAR(64) NOT NULL',
				'userid' => 'VARCHAR(64) NOT NULL',
				'bizrule' => 'TEXT',
				'data' => 'TEXT',
				'PRIMARY KEY(itemname, userid)',
				'FOREIGN KEY(itemname) REFERENCES {{AuthItem}}(name) ON DELETE CASCADE ON UPDATE CASCADE',
			),
			'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->execute('DROP TABLE IF EXISTS {{AuthAssignment}}');
		$this->execute('DROP TABLE IF EXISTS {{AuthItemChild}}');
		$this->execute('DROP TABLE IF EXISTS {{AuthItem}}');
	}
}