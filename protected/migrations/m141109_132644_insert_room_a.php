<?php

class m141109_132644_insert_room_a extends CDbMigration{
	public function up(){
            $room = new RoomA;
            $room->id = 1;
            $room->lampA1 = "off";
            $room->lampA2 = "off";
            $room->ldrA1 = "off";
            $room->ldrA2 = "off";
            $room->lampA1TimerStatus = "off";
            $room->lampA1TimerStart = "00:00:00";
            $room->lampA1TimerStop = "00:00:00";
            $room->lampA2TimerStatus = "off";
            $room->lampA2TimerStart = "00:00:00";
            $room->lampA2TimerStop = "00:00:00";
            $room->save();
	}

	public function down(){
            RoomA::model()->findByPk(1)->delete();
	}
}