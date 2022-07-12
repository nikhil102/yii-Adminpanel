<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Admin', 'url'=>array('index')),
	//array('label'=>'Create Admin', 'url'=>array('create')),
	//array('label'=>'View Admin', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Admin', 'url'=>array('admin')),
);
?>

<h1>Update Admin <?php echo $model->id; ?></h1>
<div class="content-wrapper button-wrapper">
            <a href="<?php echo Yii::app()->createUrl('Admin/admin');?>" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>