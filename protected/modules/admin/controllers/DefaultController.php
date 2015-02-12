<?php

class DefaultController extends Controller
{
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
        
	public function actionIndex()
	{
		$this->actionAdmin();
	}
        	public function actionAdmin()
	{
                $modelA = RoomA::model()->find('id=:id', array(
                    ':id'=> 1
                ));
                $modelB = RoomB::model()->find('id=:id', array(
                    ':id'=> 1
                ));
                $modelC = RoomC::model()->find('id=:id', array(
                    ':id'=> 1
                ));
                $modelD = RoomD::model()->find('id=:id', array(
                    ':id'=> 1
                ));
		$this->render('admin',array(
                    'modelA'=>$modelA,
                    'modelB'=>$modelB,
                    'modelC'=>$modelC,
                    'modelD'=>$modelD,
                    
		));
	}
}