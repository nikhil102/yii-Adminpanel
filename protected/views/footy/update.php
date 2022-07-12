<?php
/* @var $this FootyController */
/* @var $model Footy */

$this->breadcrumbs=array(
	'Footies'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);


?>

<h1>Update Footy <?php echo $model->id; ?></h1>
<div class="content-wrapper button-wrapper">
            <a href="<?php echo Yii::app()->createUrl('/Footy/admin'); ?>" class="btn-primary btn"> Back </a>    
</div>
<div class="content-wrapper updates-wrapper">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>