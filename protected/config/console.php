<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Repair Module',

	// preloading 'log' component
	'preload'=>array('log'),

	'import' => array(
		'application.modules.user.models.*',
                'application.modules.roomA.models.*',
                'application.modules.roomB.models.*',
                'application.modules.roomC.models.*',
                'application.modules.roomD.models.*',
	),
	
	'modules' => array(
		'user',
                'roomA',
                'roomB',
                'roomC',
                'roomD',
                'admin',
	),
	// application components
	'components'=>array(
		
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
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);