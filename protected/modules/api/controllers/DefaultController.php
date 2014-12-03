<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','data', 'receive','roomA','roomB','roomC','roomD','ldr'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
         public function actionData() {
            $sql='SELECT a.lampA1, a.lampA2, b.lampB1, b.lampB2, c.lampC1, c.lampC2, d.lampD1, d.lampD2
                FROM tbl_room_a a
                JOIN tbl_room_b b on b.id=a.id
                JOIN tbl_room_c c on c.id=b.id
                JOIN tbl_room_d d on d.id=c.id
                WHERE a.`id`=1';
            $data=Yii::app()->db->createCommand($sql)->queryAll();
            $return = array();

            foreach ($data as $dt) {
                $return = array(
                    "lampA1" => $dt['lampA1'],
                    "lampA2" => $dt['lampA2'],
                    "lampB1" => $dt['lampB1'],
                    "lampB2" => $dt['lampB2'],
                    "lampC1" => $dt['lampC1'],
                    "lampC2" => $dt['lampC2'],
                    "lampD1" => $dt['lampD1'],
                    "lampD2" => $dt['lampD2'],
                );
            }

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionReceive() {
            $sql='SELECT a.lampA1, a.lampA2, b.lampB1, b.lampB2, c.lampC1, c.lampC2, d.lampD1, d.lampD2
                FROM tbl_room_a a
                JOIN tbl_room_b b on b.id=a.id
                JOIN tbl_room_c c on c.id=b.id
                JOIN tbl_room_d d on d.id=c.id
                WHERE a.`id`=1';
            $data=Yii::app()->db->createCommand($sql)->queryAll();
            $return = array();

            foreach ($data as $dt) {
                $return = array(
                    "lampA1" => $dt['lampA1'],
                    "lampA2" => $dt['lampA2'],
                    "lampB1" => $dt['lampB1'],
                    "lampB2" => $dt['lampB2'],
                    "lampC1" => $dt['lampC1'],
                    "lampC2" => $dt['lampC2'],
                    "lampD1" => $dt['lampD1'],
                    "lampD2" => $dt['lampD2'],
                );
            }

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
         public function actionRoomA() {
            $ldrA1 = $_GET['ldrA1'];
            $ldrA2 = $_GET['ldrA2'];
            Yii::app()->db->createCommand()->update('tbl_room_a', array(
                        'ldrA1'=>$ldrA1,
                        'ldrA2'=>$ldrA2
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'ldrA1'=>$ldrA1,
                    'ldrA2'=>$ldrA2
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionRoomB() {
            $ldrB1 = $_GET['ldrB1'];
            $ldrB2 = $_GET['ldrB2'];
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'ldrB1'=>$ldrB1,
                        'ldrB2'=>$ldrB2
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'ldrB1'=>$ldrB1,
                    'ldrB2'=>$ldrB2
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionRoomC() {
            $ldrC1 = $_GET['ldrC1'];
            $ldrC2 = $_GET['ldrC2'];
            Yii::app()->db->createCommand()->update('tbl_room_c', array(
                        'ldrC1'=>$ldrC1,
                        'ldrC2'=>$ldrC2
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'ldrC1'=>$ldrC1,
                    'ldrC2'=>$ldrC2
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionRoomD() {
            $ldrD1 = $_GET['ldrD1'];
            $ldrD2 = $_GET['ldrD2'];
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'ldrD1'=>$ldrD1,
                        'ldrD2'=>$ldrD2
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'ldrD1'=>$ldrD1,
                    'ldrD2'=>$ldrD2
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionLdr() {
            $ldrA1 = $_GET['ldrA1'];
            $ldrA2 = $_GET['ldrA2'];
            $ldrB1 = $_GET['ldrB1'];
            $ldrB2 = $_GET['ldrB2'];
            $ldrC1 = $_GET['ldrC1'];
            $ldrC2 = $_GET['ldrC2'];
            $ldrD1 = $_GET['ldrD1'];
            $ldrD2 = $_GET['ldrD2'];
            
            Yii::app()->db->createCommand()->update('tbl_room_a', array(
                        'ldrA1'=>$ldrA1,
                        'ldrA2'=>$ldrA2
                        ), 'id=:id', array(':id'=>1));
            
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'ldrB1'=>$ldrB1,
                        'ldrB2'=>$ldrB2
                        ), 'id=:id', array(':id'=>1));
            
            Yii::app()->db->createCommand()->update('tbl_room_c', array(
                        'ldrC1'=>$ldrC1,
                        'ldrC2'=>$ldrC2
                        ), 'id=:id', array(':id'=>1));
            
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'ldrD1'=>$ldrD1,
                        'ldrD2'=>$ldrD2
                        ), 'id=:id', array(':id'=>1));
            
            $return = array();
            $return = array(
                    'ldrA1'=>$ldrA1,
                    'ldrA2'=>$ldrA2,
                    'ldrB1'=>$ldrB1,
                    'ldrB2'=>$ldrB2,
                    'ldrC1'=>$ldrC1,
                    'ldrC2'=>$ldrC2,
                    'ldrD1'=>$ldrD1,
                    'ldrD2'=>$ldrD2,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
}