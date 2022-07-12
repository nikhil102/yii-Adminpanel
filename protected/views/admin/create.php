<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);

?>
<h1>Create Admin</h1>
<div class="content-wrapper button-wrapper">
            <a href="<?php echo Yii::app()->createUrl('Admin/admin');?>" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>