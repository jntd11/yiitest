<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>' ',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.components.dataproviders.*',
			'application.modules.rights.*',
			'application.modules.rights.components.*',
			'application.modules.user.models.*',
			'application.modules.user.components.*',
			'application.modules.rights.*',
			'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
			
			'user'=>array(
					'tableUsers' => 'users',
					'tableProfiles' => 'profiles',
					'tableProfileFields' => 'profiles_fields',
					# encrypting method (php hash function)
					'hash' => 'md5',
			
					# send activation email
					'sendActivationMail' => true,
			
					# allow access for non-activated users
					'loginNotActiv' => false,
			
					# activate user on registration (only sendActivationMail = false)
					'activeAfterRegister' => false,
			
			# automatically login from registration
							'autoLogin' => true,
			
							# registration path
			'registrationUrl' => array('/user/registration'),
			
					# recovery password path
					'recoveryUrl' => array('/user/recovery'),
			
			# login form path
			'loginUrl' => array('/user/login'),
			
			# page after login
							'returnUrl' => array('/user/profile'),
			
									# page after logout
									'returnLogoutUrl' => array('/user/login'),
									),
			
			//Modules Rights
			'rights'=>array(
			
					'superuserName'=>'Admin', // Name of the role with super user privileges.
					'authenticatedName'=>'Authenticated',  // Name of the authenticated user role.
					'userIdColumn'=>'id', // Name of the user id column in the database.
											'userNameColumn'=>'username',  // Name of the user name column in the database.
											'enableBizRule'=>true,  // Whether to enable authorization item business rules.
											'enableBizRuleData'=>true,   // Whether to enable data for business rules.
											'displayDescription'=>true,  // Whether to use item description instead of name.
											'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
											'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
			
					'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
					'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights.
					'appLayout'=>'application.views.layouts.main', // Application layout.
											'cssFile'=>'/css/default.css', // Style sheet file to use for Rights.
											'install'=>false,  // Whether to enable installer.
					'debug'=>false,
			),
												
	),
	
	
	// application components
	'components'=>array(
		/*'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),*/
		'user'=>array(
					'class'=>'RWebUser',
					// enable cookie-based authentication
					'allowAutoLogin'=>true,
					'loginUrl'=>array('/user/login'),
			),
			'authManager'=>array(
					'class'=>'RDbAuthManager',
					'connectionID'=>'db',
					'defaultRoles'=>array('Authenticated', 'Guest'),
			),
			'tablePrefix' => '',
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		/** server **/
		/* 'db'=>array(
			'connectionString' => 'mysql:host=mysql51-015.wc2.dfw1.stabletransit.com;dbname=512368_pigs',
			'emulatePrepare' => true,
			'username' => '512368_pigs',
			'password' => '098765Po',
			'charset' => 'utf8',
		), */
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);