<?php

class DefaultController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters() {
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
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index', 'view', 'subView', 'privilegeInfo'),
				'users' => array('@'),
				'roles' => array('User_View'),
			),
			array('allow',
				'actions' => array('create'),
				'users' => array('@'),
				'roles' => array('User_Create'),
			),
			array('allow',
				'actions' => array('update'),
				'users' => array('@'),
				'roles' => array('User_Update'),
			),
			array('allow',
				'actions' => array('delete'),
				'users' => array('@'),
				'roles' => array('User_Delete'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
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

	public function actionSubView($id) {
		$manageHeaderVisible = Yii::app()->user->checkAccess('User_View') ||
			Yii::app()->user->checkAccess('User_Update') ||
			Yii::app()->user->checkAccess('User_Delete');
		
		$models = AuthAssignment::model()->with('authItem')
			->findAll('userid=:userid', array(
				':userid' => $id,
			));
		
		$this->renderPartial('subview', array(
			'id' => $id,
			'models' => $models,
			'colspan' => $manageHeaderVisible ? 5 : 4,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new User;
		$privileges = array();
		
		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			
			/**
			 * Collect previous privileges.
			 */
			if (isset($_POST['UserPrivilege'])) {
				foreach ($_POST['UserPrivilege'] as $key => $value) {
					$privileges[] = array(
						'privilege' => $value['privilege'],
						'description' => $value['description'],
					);
				}
			}
			
			$transaction = Yii::app()->db->beginTransaction();
			
			try {
				if($model->save()) {
                    
                    $model->password = crypt($model->password, $model->password);
                    $model->save();
                    
					if (isset($_POST['UserPrivilege'])) {
						$auth = Yii::app()->authManager;

						foreach ($privileges as $privilege)
							$auth->assign($privilege['privilege'], $model->id);
					}

					Yii::log(Yii::app()->user->name . ": Create user " . $model->username, CLogger::LEVEL_INFO);
					Yii::app()->user->setFlash('success', Yii::t('User', "User <span class='highlight'>{{user}}</span> successfully created!", array(
						'{{user}}' => $model->username,
					)));
					
					$transaction->commit();
					
					$this->redirect(Yii::app()->createUrl('user/create'));
				}
				else {
					$transaction->rollback();
					
					Yii::log(Yii::app()->user->name . ": Create user username={$model->username} failed!", CLogger::LEVEL_ERROR);
					Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', "Can't create user! Please contact Administrator!")));
				}
			}
			catch(CDbException $exception) {
				$transaction->rollback();
				
				Yii::log(Yii::app()->user->name . ": Create user username={$model->username} failed!\nerror=" . $exception->getMessage(), CLogger::LEVEL_ERROR);
				//Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', "Can't create user! Please contact Administrator!")));
                Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', $exception)));
			}
		}

		$this->render('create',array(
			'model' => $model,
			'privileges' => $privileges,
		));
	}

	/**
	 * Load user's privileges.
	 * 
	 * @param integer $id the ID of user.
     * @return mixed
	 */
	public function loadPrivileges($id) {
		$result = array();
		$privileges = AuthAssignment::model()->findAll('userid=:userid', array(
			':userid' => $id,
		));

		foreach ($privileges as $privilege) {
			$description = AuthItem::model()->find('name=:name', array(
				':name' => $privilege->itemname,
			));
		
			$result[] = array(
				'privilege' => $privilege->itemname,
				'description' => $description->description,
			);
		}
		
		return $result;
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);
		$privileges = $this->loadPrivileges($id);
		
		if(isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			
			/**
			 * Collect previous privileges.
			 */
			if (isset($_POST['UserPrivilege'])) {
				$privileges = array();
				
				foreach ($_POST['UserPrivilege'] as $key => $value) {
					$privileges[] = array(
						'privilege' => $value['privilege'],
						'description' => $value['description'],
					);
				}
			}
			
			$transaction = Yii::app()->db->beginTransaction();
			
			try {
				if ($model->save()) {
					/**
					 * Remove all privileges.
					 */
					AuthAssignment::model()->deleteAll('userid=:userid', array(
						':userid' => $id,
					));
					
					/**
					 * Insert & re-insert privileges.
					 */
					$auth = Yii::app()->authManager;
					
					foreach ($privileges as $privilege)
						$auth->assign($privilege['privilege'], $id);
						
					Yii::log(Yii::app()->user->name . ": Update user username={$model->username}", CLogger::LEVEL_INFO);
					Yii::app()->user->setFlash('success', Yii::t('User', "User <span class='highlight'>{{user}}</span> successfully updated!", array(
						'{{user}}' => $model->username,
					)));
					
					$transaction->commit();

					$this->redirect(Yii::app()->createUrl('user'));
				}
				else {
					$transaction->rollback();
				
					Yii::log(Yii::app()->user->name . ": Update user username={$model->username} failed!", CLogger::LEVEL_ERROR);
					Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', "Can't update user! Please contact Administrator!")));
				}
			}
			catch(CDbException $exception) {
				$transaction->rollback();
				
				Yii::log(Yii::app()->user->name . ": Update user username={$model->username} failed!\nerror=" . $exception->getMessage(), CLogger::LEVEL_ERROR);
				Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', "Can't update user! Please contact Administrator!")));
			}
		}

		$this->render('update',array(
			'model' => $model,
			'privileges' => $privileges,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$result = array();
		$user = $this->loadModel($id);
		$username = $user->username;
		
		$privileges = AuthAssignment::model()->findAll('userid=:userid', array(
			':userid' => $id,
		));
		
		$transaction = Yii::app()->db->beginTransaction();
		
		try {
			foreach ($privileges as $privilege)
				$privilege->delete();
            
			if ($user->delete()) {
				Yii::log(Yii::app()->user->name . ": Delete user id={$id}; username={$username}", CLogger::LEVEL_INFO);
				$transaction->commit();
				
				if (!isset($_GET['ajax'])) {
					/**
					 * TODO: handle if request is not ajax.
					 */
					Yii::app()->user->setFlash("success","User <span class='highlight'>$username</span> successfully removed!");
				
				}
				else {
					$result['error'] = 0;
					$result['message'] = Yii::t('User', "User <span class='highlight'>{user}</span> successfully removed!", array(
						'{user}' => $username,
					));

					echo json_encode($result);
				}
			}
			else {
				$transaction->rollback();
				Yii::log(Yii::app()->user->name . ": Delete user id={$id}; username={$username} failed!", CLogger::LEVEL_ERROR);
			}
		}
		catch(CDbException $exception) {
			$transaction->rollback();
			if(!isset($_GET['ajax'])){
				Yii::app()->user->setFlash('error', Yii::t('User', Yii::t('User', "Can't remove user!")));
			}
			Yii::log(Yii::app()->user->name . ": Delete user id={$id}; username={$username} failed!\nerror=" . $exception->getMessage(), CLogger::LEVEL_ERROR);
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		
		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = User::model()->findByPk($id);
		
		if ($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionPrivilegeInfo($name) {
		$result = array();
		$privilege = AuthItem::model()->find('name=:name', array(
			':name' => $name,
		));
		
		if ($privilege) {
			$result = array(
				'name' => $privilege->name,
				'description' => $privilege->description,
			);
		}
		
		echo CJSON::encode($result);
	}
}
