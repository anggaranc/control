<?php

class m140211_030923_fk_user_auth_assignment extends CDbMigration
{
	public function up()
	{
		$this->execute("ALTER TABLE {{AuthAssignment}} ADD CONSTRAINT FK_AuthItem_itemname FOREIGN KEY(itemname) REFERENCES {{AuthItem}}(name)");
        $this->execute("ALTER TABLE {{AuthAssignment}} CHANGE COLUMN userid userid INT(10) UNSIGNED NOT NULL");
        $this->execute("ALTER TABLE {{AuthAssignment}} ADD CONSTRAINT FK_User_userid FOREIGN KEY(userid) REFERENCES {{user}}(id)");
	}

	public function down()
	{
	}

}