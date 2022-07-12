<?php
/* @var $this TradingviewFutureAndOptionDataController */
/* @var $model TradingviewFutureAndOptionData */

$this->breadcrumbs=array(
	'Tradingview Future And Option Datas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List', 'url'=>array('index')),
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'View', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage', 'url'=>array('admin')),
);
?>

<h1>Update  <?php echo $model->id; ?></h1>
<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create Users</a>   
            <a href="" class="btn-primary btn"> View Users</a>   
            <a href="" class="btn-primary btn"> Manage Users</a>       
</div>
<div class="content-wrapper updates-wrapper">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>