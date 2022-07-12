<?php
/* @var $this TradeEnterLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trade Enter Logs',
);

$this->menu=array(
	array('label'=>'Create TradeEnterLog', 'url'=>array('create')),
	array('label'=>'Manage TradeEnterLog', 'url'=>array('admin')),
);
?>

<h1>Trade Enter Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
