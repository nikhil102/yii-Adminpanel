<?php
/* @var $this TradingviewAlertDataController */
/* @var $model TradingviewAlertData */

$this->breadcrumbs=array(
	'Tradingview Alert Datas'=>array('index'),
	$model->id,
);


?>

<h1>View -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create </a>   
            <a href="" class="btn-primary btn"> Update </a>  
            <a href="" class="btn-primary btn"> Delete </a>  
            <a href="" class="btn-primary btn"> Manage </a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'raw_data_id',
		'script_name',
		'contract_month',
		'contract_year',
		'current_price',
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
	),
)); ?>
</div>