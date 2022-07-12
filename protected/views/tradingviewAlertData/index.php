<?php
/* @var $this TradingviewAlertDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tradingview Alert Datas',
);

$this->menu=array(
	array('label'=>'Create TradingviewAlertData', 'url'=>array('create')),
	array('label'=>'Manage TradingviewAlertData', 'url'=>array('admin')),
);
?>

<h1>Tradingview Alert Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
