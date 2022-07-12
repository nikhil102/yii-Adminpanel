<?php
/* @var $this JargonController */
/* @var $model Jargon */

$this->breadcrumbs=array(
	'Jargons'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Jargon <?php echo $model->id; ?></h1>
<div class="content-wrapper button-wrapper">
         <a href="<?php echo Yii::app()->createUrl('/Jargon/admin'); ?>" class="btn-primary btn"> Back </a>     
</div>
<div class="content-wrapper updates-wrapper">
<?php $this->renderPartial('update_form', array('model'=>$model)); ?>
</div>