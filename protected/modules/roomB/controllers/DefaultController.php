<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view','lampB1','lampB2','json','lampB1TimerStatus','lampB2TimerStatus','lampB1Timer','lampB2Timer'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
                return array(
			array('allow',
				'actions' => array('index','view','lampB1','lampB2','json','lampB1TimerStatus','lampB2TimerStatus','lampB1Timer','lampB2Timer'),
				'users' => array('@'),
				'roles' => array('Room_B'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


        public function actionLampB1() {
            $lampB1 = $_GET['data'];
            Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()
                    ->update('tbl_room_b', array(
                        'lampB1'=>$lampB1,
                    ), 'id=:id', array(':id'=>1));
            
            if($lampB1=="off"){
                Yii::app()->db->createCommand()
                    ->update('tbl_room_b', array(
                        'ldrB1'=>$lampB1,
                    ), 'id=:id', array(':id'=>1));
            }
            Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'data'=>$lampB1,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }

        public function actionLampB2() {
            $lampB2 = $_GET['data'];
            Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()
                    ->update('tbl_room_b', array(
                        'lampB2'=>$lampB2,
                    ), 'id=:id', array(':id'=>1));
            if($lampB2=="off"){
                Yii::app()->db->createCommand()
                    ->update('tbl_room_b', array(
                        'ldrB2'=>$lampB2,
                    ), 'id=:id', array(':id'=>1));
            }
            Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'data'=>$lampB2,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }

        public function actionLampB1TimerStatus() {
            $lampB1TimerStatus = $_GET['data'];
            Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'lampB1TimerStatus'=>$lampB1TimerStatus,
                        ), 'id=:id', array(':id'=>1));
            Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'data'=>$lampB1TimerStatus,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }

        public function actionLampB2TimerStatus() {
            $lampB2TimerStatus = $_GET['data'];
            Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'lampB2TimerStatus'=>$lampB2TimerStatus,
                        ), 'id=:id', array(':id'=>1));
            Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'data'=>$lampB2TimerStatus,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        public function actionLampB1Timer() {
            $lampB1TimerStart = $_GET['start'];
            $lampB1TimerStop = $_GET['stop'];
						Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'lampB1TimerStart'=>$lampB1TimerStart,
                        'lampB1TimerStop'=>$lampB1TimerStop
                        ), 'id=:id', array(':id'=>1));
						Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'lampB1TimerStart'=>$lampB1TimerStart,
                    'lampB1TimerStop'=> $lampB1TimerStop
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }

        public function actionLampB2Timer() {
            $lampB2TimerStart = $_GET['start'];
            $lampB2TimerStop = $_GET['stop'];
						Yii::app()->db->createCommand("LOCK TABLES {{room_b}} WRITE")->execute();
            Yii::app()->db->createCommand()->update('tbl_room_b', array(
                        'lampB2TimerStart'=>$lampB2TimerStart,
                        'lampB2TimerStop'=>$lampB2TimerStop
                        ), 'id=:id', array(':id'=>1));
						Yii::app()->db->createCommand("UNLOCK TABLES")->execute();
            $return = array();
            $return = array(
                    'lampB2TimerStart'=>$lampB2TimerStart,
                    'lampB2TimerStop'=> $lampB2TimerStop
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }


        public function actionJson() {
            $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_room_b a')
		->where('id=:id', array(':id'=>1,))
                ->queryAll();
            $return = array();

            foreach ($data as $dt) {
                $return = array(
                    'lampB1' => $dt['lampB1'],
                    'lampB2' => $dt['lampB2'],
                    'ldrB1' => $dt["ldrB1"],
                    'ldrB2' => $dt["ldrB2"]
                );
            }

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RoomB;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomB']))
		{
			$model->attributes=$_POST['RoomB'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomB']))
		{
			$model->attributes=$_POST['RoomB'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
//		$model=new RoomB('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['RoomB']))
//			$model->attributes=$_GET['RoomB'];

                $model = RoomB::model()->find('id=:id', array(
                    ':id'=> 1
                ));
		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RoomB the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomB::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomB $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-b-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
