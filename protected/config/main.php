<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Home Control',
	'sourceLanguage' => 'en',
	'language' => 'en',
	'defaultController' => 'site',
//        'timeZone'=>'GMT',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.helpers.*',
		'application.modules.user.models.*',
		'application.modules.roomA.models.*',
                'application.modules.roomB.models.*',
                'application.modules.roomC.models.*',
                'application.modules.roomD.models.*',
                'application.modules.log.models.*',
	),

	'modules'=>array(
		'log',
		'user',
		'roomA',
                'roomB',
                'roomC',
                'roomD',
                'api',
                'admin',
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/login'),
		),
		// uncomment the following to enable URLs in path-format
		
		//session user timeout
//		'session' => array(
//			'class' => 'CDbHttpSession',
//			'timeout' => 1200,
//		 ),
		
		'urlManager'=>array(
			'class' => 'EUrlManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//				'gii/controller' => 'gii/controller',
//				'gii/crud' => 'gii/crud',
//				'gii/module' => 'gii/module',
//				'gii/model' => 'gii/model',
//				'gii/<action:\w+>' => 'gii/default/<action>',
				'login' => 'site/login',
				'logout' => 'site/logout',
                                '' => 'site/login',
//				'<action:\w+>' => 'site/<action>',
//                '/<module:\w+>' => '/<module>',
                'p/<action:[\w\-]+>' => 'site/<action>',
                'p/<module:[\w\-]+>/<action:[\w\-]+>' => 'site/<action>',
                'p/<module:[\w\-]+>/<action:[\w\-]+>/<id:[\w\-]+>' => 'site/<id>',
//				'main/<action:\w+>' => 'main/<action>',
				'<module:[\w\-]+>/<id:\d+>' => '<module>/default/view',
				'<module:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<module>/default/<action>',
				'<module:[\w\-]+>/<action:[\w\-]+>' => '<module>/default/<action>',

							
			),
		),
		
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=home',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		
		
		'authManager' => array(
			'class' => 'CDbAuthManager',
			'connectionID' => 'db',
			'itemTable' => '{{AuthItem}}',
			'itemChildTable' => '{{AuthItemChild}}',
			'assignmentTable' => '{{AuthAssignment}}',
		),
		 
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CDbLogRoute',
					'levels' => 'info, warning, error',
					'categories' => 'system.*, application.*',
					'autoCreateLogTable' => 'false',
					'connectionID' => 'db',
					'logTableName' => '{{log}}',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'anggara.nc@gmail.com',
		'company' => 'Politeknik Elektronika Negeri Surabaya',
        'decimalPlaces' => 3,
		'decimalSeparator' => ',',
		'thousandSeparator' => '.',
		'pageSize' => 10, 
	),
);