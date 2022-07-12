<?php
/* @var $this TwitterController */
/* @var $model Twitter */

$this->breadcrumbs=array(
	'Twitters'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#twitter-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Twitters</h1>

<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="<?php echo Yii::app()->createUrl('/Twitter/create'); ?>" class="btn-primary btn createBtn">
            <i class="icon-fa icon-fa-plus"></i> Create Twitter </a>
    </div>
 </div>
    
<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'users-grid',
        'dataProvider' => $model->search(),
        'type' => 'striped bordered condensed',
        'filter' => $model,
        'columns' => array(

		   		'id',
		'username',
		'fullname',
		'tweetimg',
		'tweettext',
		'sonytweettext',
		/*
		'sonytweetimg',
		'date',
		*/

            array(
                'header' => 'Action',
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => array(

                ),
            ),
        ),
    ));


  ?>
</div>

</div>
