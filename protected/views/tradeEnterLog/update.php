<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */

$this->breadcrumbs=array(
	'Trade Enter Logs'=>array('index'),
	$model->trade_id=>array('view','id'=>$model->trade_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List', 'url'=>array('index')),
	array('label'=>'Create', 'url'=>array('create')),
	array('label'=>'View', 'url'=>array('view', 'id'=>$model->trade_id)),
	array('label'=>'Manage', 'url'=>array('admin')),
);
?>

<h1>Update  <?php echo $model->trade_id; ?></h1>
<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create Users</a>   
            <a href="" class="btn-primary btn"> View Users</a>   
            <a href="" class="btn-primary btn"> Manage Users</a>       
</div>
<div class="content-wrapper updates-wrapper">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>