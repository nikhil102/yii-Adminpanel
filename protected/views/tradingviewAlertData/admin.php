<?php
/* @var $this TradingviewAlertDataController */
/* @var $model TradingviewAlertData */

$this->breadcrumbs=array(
	'Tradingview Alert Datas'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tradingview-alert-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tradingview Alert Datas</h1>

<!--<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="/sonyadmin/index.php/TradingviewAlertData/create" class="btn-primary btn createBtn">
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
		'script_name',
		'contract_month',
		'contract_year',
		'current_price',
		/*
		'current_candle_open',
		'current_candle_high',
		'current_candle_low',
		'current_candle_volume',
		'str_name',
		'str_timeframe_number',
		'str_timeframe_unit',
		'action_enter',
		'action_exit',
		'str_fut_cont_sl',
		'str_fut_cont_tar',
		'str_opt_cont_sl',
		'str_opt_cont_tar',
		'trading_type',
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
