<?php
/* @var $this JargonController */
/* @var $model Jargon */

$this->breadcrumbs=array(
	'Jargons'=>array('index'),
	$model->title,
);


?>

<h1>View Jargon -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create Jargon</a>   
            <a href="" class="btn-primary btn"> Update Jargon</a>  
            <a href="" class="btn-primary btn"> Delete Jargon</a>  
            <a href="" class="btn-primary btn"> Manage Jargon</a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'img',
		'date',
	),
)); ?>
</div>