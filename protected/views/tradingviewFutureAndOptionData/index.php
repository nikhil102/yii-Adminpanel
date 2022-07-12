<?php
/* @var $this TradingviewFutureAndOptionDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tradingview Future And Option Datas',
);

$this->menu=array(
	array('label'=>'Create TradingviewFutureAndOptionData', 'url'=>array('create')),
	array('label'=>'Manage TradingviewFutureAndOptionData', 'url'=>array('admin')),
);
?>

<h1>Tradingview Future And Option Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
