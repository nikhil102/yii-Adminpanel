<?php
/* @var $this TradingviewFutureAndOptionDataController */
/* @var $model TradingviewFutureAndOptionData */

$this->breadcrumbs=array(
	'Tradingview Future And Option Datas'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tradingview-future-and-option-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tradingview Future And Option Datas</h1>

<!--<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="/sonyadmin/index.php/TradingviewFutureAndOptionData/create" class="btn-primary btn createBtn">
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
		'raw_data_id',
		'future_current_contract_end_date',
		'option_current_contract_end_date',
		'day_require_for_option_weekly_expiry',
		'day_require_for_future_monthly_expiry',
		/*
		'mysql_time_stamp',
		'raw_data',
		'alert_time',
		'date',
		'time_hour',
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
