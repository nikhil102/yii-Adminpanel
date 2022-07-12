<?php
/* @var $this JargonController */
/* @var $model Jargon */

$this->breadcrumbs=array(
	'Jargons'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jargon-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jargons</h1>

<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="<?php echo Yii::app()->createUrl('/Jargon/create'); ?>" class="btn-primary btn createBtn">
            <i class="icon-fa icon-fa-plus"></i> Create Jargon </a>
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
		'title',
		'description',
		'img',
		'date',

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
