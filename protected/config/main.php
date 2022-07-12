<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../extensions/common/commonfunction.php');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
require_once( dirname(__FILE__) . '/../extensions/common/controller/CustomController.php');
require_once( dirname(__FILE__) . '/../extensions/common/model/CustomActiveRecord.php');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'MMM',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.easyimage.EasyImage',
        'ext.EExcelView',
        'ext.TaskExcelView',
    ),
    'theme' => 'bootstrap', // requires you to copy the theme under your themes directory
    'modules' => array(
// uncomment the following to enable the Gii tool
        'gii' => array(
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
   //'ipFilters' => array('127.0.0.1', '124.155.247.223'),
    'ipFilters'=>array('192.168.0.101','127.0.0.1','::1'),         
            
        ),
    ),
    // application components
    'components' => array(
        'easyImage' => array(
            'class' => 'application.extensions.easyimage.EasyImage',
            //'driver' => 'GD',
            //'quality' => 100,
            //'cachePath' => '/assets/easyimage/',
            //'cacheTime' => 2592000,
            //'retinaSupport' => false,
          ),
        'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    'cssFile' => false,
                    'header' => false
                )
            )
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
         'booster' => array(
            'class' => 'booster.components.Booster',
        ),
        'user' => array(
// enable cookie-based authentication
            'allowAutoLogin' => false,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),/*
          // uncomment the following to use a MySQL database 166.62.8.18
        */
		
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=tradingview_alert',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => 'root@123',
          'charset' => 'utf8',
          ),
         

        
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
//                array(
//                    'class' => 'CFileLogRoute',
//                    'levels' => 'error, warning',
//                ),
                 'file'=>array(
                      'class'=>'CFileLogRoute',
                      'levels'=>'error, warning, watch',
                      'categories'=>'system.*',
                      'enabled'=> true,
                      ),
               'profile'=>array(
                   'class'=>'CProfileLogRoute',
                   'enabled'=> true,
               ),
                
    // for session in db 
//        'session' => array(
//            'class' => 'ext.mySession.DbHttpSession',
//            'connectionID' => 'db',
//            'sessionTableName' => 'myt_session',
//            'autoCreateSessionTable' => false,
//            'timeout' => 3600
//        ),
//        'format' => array(
//            'class' => 'ELocalizedFormatter',
//        ),
//        'easyImage' => array(
//            'class' => 'application.extensions.easyimage.EasyImage'
//        ),
//        'mega' => array(
//            'class' => 'application.extensions.yii-mega-api.Mega'
//        ),
//        'messages' => array(
//            'class' => 'CPhpMessageSource',
//            'forceTranslation' => true,
//            'language' => 'en',
//            'cachingDuration' => 604800, // 1 week
//        ),
//                
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
    //$_SERVER['SERVER_NAME']
    'params' => array(
        // this is used in contact page
        'maindir' => MAIN_DIR,
        'adminEmail' => 'webmaster@example.com',
        'web_code' => 'settlement',
        'attachment_upload_path' => dirname(__FILE__) . '/../../../uploads/',
        
        /////////////////////////////////root path //////////////////////////////////
        'registry_upload_bg_img' => dirname(__FILE__) . '/../../../uploads/registry/bg/', 
        'registry_upload_p_img' => dirname(__FILE__) . '/../../../uploads/registry/p/', 
        'product_upload_p_img' => dirname(__FILE__) . '/../../../uploads/product/p/',
        'product_upload_o_img' => dirname(__FILE__) . '/../../../uploads/product/o/',
          ///////////////////////////////////////////////////////////////////
        
          //////////////////////////////////http path/////////////////////////////////
        'http_registry_upload_bg_img' => 'http://localhost/wrappdadmin/'. 'uploads/registry/bg/', 
        'http_registry_upload_p_img' => 'http://localhost/wrappdadmin/' . 'uploads/registry/p/', 
        'http_product_upload_p_img' =>  'http://localhost/wrappdadmin/'. 'uploads/product/p/',
        'http_product_upload_o_img' =>  'http://localhost/wrappdadmin/'. 'uploads/product/o/',
          ////////////////////////////////////////////////////////////////////////////
        
        
        'notice_upload_path' => $_SERVER['DOCUMENT_ROOT'].'axissettlement/uploads/settlement/',
        'pdfwatermark' => $_SERVER['DOCUMENT_ROOT'].'axissettlement/app/protected/extensions/vendor/pdfwatermark/',
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