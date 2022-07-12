<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../extensions/common/controller/CustomController.php');
require_once( dirname(__FILE__) . '/../extensions/common/model/CustomActiveRecord.php');
return array(
    
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
        'import' => array(
            'application.models.*',
            'application.components.*',
        ),
	// application components
	'components'=>array(
		'Smtpmail' => array(
                    'class' => 'ext.smtpmail.PHPMailer',
                    'Host' => "ssl://smtp.gmail.com",
                    'Username' => ' tattoo13886@gmail.com',
                    'Password' => 'rtengines',
                    'Mailer' => 'smtp',
                    'Port' => 465,
                    'SMTPAuth' => true,
                ),
                // Local
		// 'db' => array(
  //                   'class' => 'ext.oci8Pdo.OciDbConnection',
  //                   'connectionString' => 'oci:dbname=172.16.2.67:1521/orcl;charset=UTF8',
  //                   'username' => 'AXIS_COLLECTION',
  //                   'password' => 'AXIS_COLLECTION',
  //               ),
		// uncomment the following to use a MySQL database
		
		 'db'=>array(
              'connectionString' => 'mysql:host=localhost;dbname=tradingview_alert',
              'emulatePrepare' => true,
              'username' => 'root',
              'password' => 'root@123',
              'charset' => 'utf8',
          ),
		
            
           
              // 'db' => array
              //    (
              //           /* 'class'=>'CDbConnection', */
              //           'class' => 'ext.oci8Pdo.OciDbConnection',
              //           'connectionString' => 'oci:dbname=172.16.2.67:1521/orcl;charset=UTF8',
              //           'username' => 'AXIS_COLLECTION',
              //           'password' => 'AXIS_COLLECTION',
              //    ),


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
    
      'params' => array(
// this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'web_code' => 'settlement',
        'attachment_upload_path' => dirname(__FILE__) . '/../../../uploads/',
        'registry_upload_bg_img' => dirname(__FILE__) . '/../../../uploads/registry/bg/', 
        'registry_upload_p_img' => dirname(__FILE__) . '/../../../uploads/registry/p/',    
        'notice_upload_path' => '/var/www/axissettlement/uploads/settlement/',
        'pdfwatermark' => '/var/www/axissettlement/app/protected/extensions/vendor/pdfwatermark/',
        'token_key' => 'aXiSeTtLlMeNt',
        'approve_stage_id' => 100,
        'reject_stage_id' => 101,
        'initiate_stage_id' => 1,
        'recommend_stage_id' => 2,
        'nmi_stage_id' => 3,
        'query_resolve_id' => 4,
        'broken_id' => 102,
        'cancel_id' => 103,
        'close_id' => 104,
        'download_id' => 105,
        'reopen_id' => 106
    ),
);
