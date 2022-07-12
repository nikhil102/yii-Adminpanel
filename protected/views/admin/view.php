<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->id,
);


?>


<h1>View Admin -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
    <div> <a href="<?php echo Yii::app()->createUrl('admin/admin');?>" class="btn-primary btn"> Back </a>  </div>
               
    <div style="float: right;margin-top:-56px;">    
            <a href="<?php echo Yii::app()->createUrl('admin/create');?>" class="btn-primary btn"> Create Admin</a>   
            <a href="<?php echo Yii::app()->createUrl('admin/update', array('id' => $model->id));?>" class="btn-primary btn"> Update Admin</a>  
<!-- <a href="<?php //echo Yii::app()->createUrl('admin/delete', array('id' => $model->id));?>" class="btn-primary btn"> Delete Admin</a>  -->
        </div>  
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'permission_level',
		'date_added',
	),
)); ?>
</div>