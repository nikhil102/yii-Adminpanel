<?php
/* @var $this TradingviewAlertRawDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tradingview Alert Raw Datas',
);

$this->menu=array(
	array('label'=>'Create TradingviewAlertRawData', 'url'=>array('create')),
	array('label'=>'Manage TradingviewAlertRawData', 'url'=>array('admin')),
);
?>

<h1>Tradingview Alert Raw Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
