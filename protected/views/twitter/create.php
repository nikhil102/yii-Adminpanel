<?php
/* @var $this TwitterController */
/* @var $model Twitter */

$this->breadcrumbs=array(
	'Twitters'=>array('index'),
	'Create',
);

?>
<h1>Create Twitter</h1>
<div class="content-wrapper button-wrapper">
            <a href="<?php echo Yii::app()->createUrl('/Twitter/admin'); ?>" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>