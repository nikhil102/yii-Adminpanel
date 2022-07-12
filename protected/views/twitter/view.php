<?php
/* @var $this TwitterController */
/* @var $model Twitter */

$this->breadcrumbs=array(
	'Twitters'=>array('index'),
	$model->id,
);


?>

<h1>View Twitter -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create Twitter</a>   
            <a href="" class="btn-primary btn"> Update Twitter</a>  
            <a href="" class="btn-primary btn"> Delete Twitter</a>  
            <a href="" class="btn-primary btn"> Manage Twitter</a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'fullname',
		'tweetimg',
		'tweettext',
		'sonytweettext',
		'sonytweetimg',
		'date',
	),
)); ?>
</div>