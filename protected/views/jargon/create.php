<?php
/* @var $this JargonController */
/* @var $model Jargon */

$this->breadcrumbs=array(
	'Jargons'=>array('index'),
	'Create',
);

?>
<h1>Create Jargon</h1>
<div class="content-wrapper button-wrapper">
            <a href="<?php echo Yii::app()->createUrl('/Jargon/admin'); ?>" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php $this->renderPartial('create_form', array('model'=>$model)); ?></div>