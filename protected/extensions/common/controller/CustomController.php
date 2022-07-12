<?php

// in protected/components/MyController.php

class CustomController extends CController {

    public $breadcrumbs = array();
    public $menu = array();
    public $layout = '//layouts/column1';

    function __construct($id,$module=null) {
        $pid = Yii::app()->request->getParam('pid');
        if (is_numeric($pid)) {
            $className      = str_replace('Controller','',get_class($this));
            $_GET[$className . '_page'] = $pid;
            unset($_GET['pid']);
        }
        parent::__construct($id,$module);
    }
}
