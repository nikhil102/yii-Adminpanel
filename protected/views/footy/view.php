<?php
/* @var $this FootyController */
/* @var $model Footy */

$this->breadcrumbs=array(
	'Footies'=>array('index'),
	$model->title,
);


?>

<h1>View Footy -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create Footy</a>   
            <a href="" class="btn-primary btn"> Update Footy</a>  
            <a href="" class="btn-primary btn"> Delete Footy</a>  
            <a href="" class="btn-primary btn"> Manage Footy</a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'img',
		'description',
		'date',
	),
)); ?>
</div>