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
//				'actions'=>array('index','view','lampD1','lampD2','json','lampD1TimerStatus','lampD2TimerStatus','lampD1Timer','lampD2Timer'),
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
				'actions' => array('index','view','lampD1','lampD2','json','lampD1TimerStatus','lampD2TimerStatus','lampD1Timer','lampD2Timer'),
				'users' => array('@'),
				'roles' => array('Room_D'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

        
        public function actionLampD1() {
            $lampD1 = $_GET['data'];
            Yii::app()->db->createCommand()
                    ->update('tbl_room_d', array(
                        'lampD1'=>$lampD1,
                    ), 'id=:id', array(':id'=>1));

            $return = array();
            $return = array(
                    'data'=>$lampD1,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionLampD2() {
            $lampD2 = $_GET['data'];
            Yii::app()->db->createCommand()
                    ->update('tbl_room_d', array(
                        'lampD2'=>$lampD2,
                    ), 'id=:id', array(':id'=>1));

            $return = array();
            $return = array(
                    'data'=>$lampD2,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionLampD1TimerStatus() {
            $lampD1TimerStatus = $_GET['data'];
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'lampD1TimerStatus'=>$lampD1TimerStatus,
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'data'=>$lampD1TimerStatus,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionLampD2TimerStatus() {
            $lampD2TimerStatus = $_GET['data'];
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'lampD2TimerStatus'=>$lampD2TimerStatus,
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'data'=>$lampD2TimerStatus,
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        public function actionLampD1Timer() {
            $lampD1TimerStart = $_GET['start'];
            $lampD1TimerStop = $_GET['stop'];
            
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'lampD1TimerStart'=>$lampD1TimerStart,
                        'lampD1TimerStop'=>$lampD1TimerStop
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'lampD1TimerStart'=>$lampD1TimerStart,
                    'lampD1TimerStop'=> $lampD1TimerStop
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        public function actionLampD2Timer() {
            $lampD2TimerStart = $_GET['start'];
            $lampD2TimerStop = $_GET['stop'];
            
            Yii::app()->db->createCommand()->update('tbl_room_d', array(
                        'lampD2TimerStart'=>$lampD2TimerStart,
                        'lampD2TimerStop'=>$lampD2TimerStop
                        ), 'id=:id', array(':id'=>1));
            $return = array();
            $return = array(
                    'lampD2TimerStart'=>$lampD2TimerStart,
                    'lampD2TimerStop'=> $lampD2TimerStop
            );

            header('Content-type: text/json');
            header('Content-type: application/json');

            echo CJSON::encode($return);
        }
        
        
        public function actionJson() {
            $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_room_d a')
		->where('id=:id', array(':id'=>1,))
                ->queryAll();
            $return = array();

            foreach ($data as $dt) {
                $return = array(
                    'lampA1' => $dt['lampD1'],
                    'lampA2' => $dt['lampD2'],
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
		$model=new RoomD;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RoomD']))
		{
			$model->attributes=$_POST['RoomD'];
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

		if(isset($_POST['RoomD']))
		{
			$model->attributes=$_POST['RoomD'];
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
//		$model=new RoomD('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['RoomD']))
//			$model->attributes=$_GET['RoomD'];

                $model = RoomD::model()->find('id=:id', array(
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
	 * @return RoomD the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RoomD::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RoomD $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-d-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
