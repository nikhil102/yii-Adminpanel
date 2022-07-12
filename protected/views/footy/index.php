<?php
/* @var $this FootyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Footies',
);

$this->menu=array(
	array('label'=>'Create Footy', 'url'=>array('create')),
	array('label'=>'Manage Footy', 'url'=>array('admin')),
);
?>

<h1>Footies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
