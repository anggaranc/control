<?php

class m141118_134943_room_privilege extends CDbMigration{
	public function up(){
            $auth = Yii::app()->authManager;
            $auth->createOperation('Room_A', 'Access user for Room A.');
            $auth->createOperation('Room_B', 'Access user for Room B.');
            $auth->createOperation('Room_C', 'Access user for Room C.');
            $auth->createOperation('Room_D', 'Access user for Room D.');
            $auth->assign('Room_A', 1);
            $auth->assign('Room_B', 1);
            $auth->assign('Room_C', 1);
            $auth->assign('Room_D', 1);
	}

	public function down(){
            $auth = Yii::app()->authManager;
            $auth->revoke('Room_A', 1);
            $auth->removeAuthItem('Room_A');
            $auth->revoke('Room_B', 1);
            $auth->removeAuthItem('Room_B');
            $auth->revoke('Room_C', 1);
            $auth->removeAuthItem('Room_C');
            $auth->revoke('Room_D', 1);
            $auth->removeAuthItem('Room_D');
	}
}