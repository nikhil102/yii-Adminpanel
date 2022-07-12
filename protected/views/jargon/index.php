<?php
/* @var $this JargonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jargons',
);

$this->menu=array(
	array('label'=>'Create Jargon', 'url'=>array('create')),
	array('label'=>'Manage Jargon', 'url'=>array('admin')),
);
?>

<h1>Jargons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
