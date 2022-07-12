<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl . "/images/favicon.ico"; ?>" type="image/x-icon" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<?php Yii::app()->bootstrap->register(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tipsy.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wrappedmain.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wrapped.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/project_design.css" />
<!--[if IE 8]>
       <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js" ></script>
<![endif]-->
<script type="text/javascript">
    var $j = jQuery;
    var true_status = <?php echo COMMONCONSTANT::TRUE_STATUS; ?>;
    var false_status = <?php echo COMMONCONSTANT::FALSE_STATUS; ?>;
    var delete_confirmation = "<?php echo Yii::t('app', 'Are you sure you want to delete this?'); ?>";
    var grid_ajax_message = "<?php echo Yii::t('app', 'Deleted Successfully'); ?>";
    var plz_select = "<?php echo Yii::t('html', 'plz.select'); ?>";
    var process_error = "<?php echo Yii::t('app', 'process.error'); ?>";
    var web_app_url = "<?php echo Yii::app()->getBaseUrl(true) . '/index.php/'; ?>";
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js" ></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/project_script.js"></script>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/legal-ie.css" />
<![endif]-->
