<?php

class m141109_142252_insert_room_b_c_d extends CDbMigration{
	public function up(){
            $roomB = new RoomB;
            $roomB->id = 1;
            $roomB->lampB1 = "off";
            $roomB->lampB2 = "off";
            $roomB->ldrB1 = "off";
            $roomB->ldrB2 = "off";
            $roomB->lampB1TimerStatus = "off";
            $roomB->lampB1TimerStart = "00:00:00";
            $roomB->lampB1TimerStop = "00:00:00";
            $roomB->lampB2TimerStatus = "off";
            $roomB->lampB2TimerStart = "00:00:00";
            $roomB->lampB2TimerStop = "00:00:00";
            $roomB->save();
            
            $roomC = new RoomC;
            $roomC->id = 1;
            $roomC->lampC1 = "off";
            $roomC->lampC2 = "off";
            $roomC->ldrC1 = "off";
            $roomC->ldrC2 = "off";
            $roomC->lampC1TimerStatus = "off";
            $roomC->lampC1TimerStart = "00:00:00";
            $roomC->lampC1TimerStop = "00:00:00";
            $roomC->lampC2TimerStatus = "off";
            $roomC->lampC2TimerStart = "00:00:00";
            $roomC->lampC2TimerStop = "00:00:00";
            $roomC->save();
            
            $roomD = new RoomD;
            $roomD->id = 1;
            $roomD->lampD1 = "off";
            $roomD->lampD2 = "off";
            $roomD->ldrD1 = "off";
            $roomD->ldrD2 = "off";
            $roomD->lampD1TimerStatus = "off";
            $roomD->lampD1TimerStart = "00:00:00";
            $roomD->lampD1TimerStop = "00:00:00";
            $roomD->lampD2TimerStatus = "off";
            $roomD->lampD2TimerStart = "00:00:00";
            $roomD->lampD2TimerStop = "00:00:00";
            $roomD->save();
	}

	public function down(){
            RoomD::model()->findByPk(1)->delete();
            RoomC::model()->findByPk(1)->delete();
            RoomB::model()->findByPk(1)->delete();
	}
}