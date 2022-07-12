<?php
/* @var $this TradingviewAlertRawDataController */
/* @var $model TradingviewAlertRawData */

$this->breadcrumbs=array(
	'Tradingview Alert Raw Datas'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tradingview-alert-raw-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tradingview Alert Raw Datas</h1>

<!--<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="/sonyadmin/index.php/TradingviewAlertRawData/create" class="btn-primary btn createBtn">
            <i class="icon-fa icon-fa-plus"></i> Create </a>
    </div>
 </div>-->
    
<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'users-grid',
        'dataProvider' => $model->search(),
        'type' => 'striped bordered condensed',
        'filter' => $model,
        'columns' => array(

		   		'id',
		'mysql_time_stamp',
		'raw_data',
		'alert_time',
		'date',
		'time_hour',
		/*
		'time_min',
		'time_seconds',
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
