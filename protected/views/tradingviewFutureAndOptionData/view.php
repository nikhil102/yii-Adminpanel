<?php
/* @var $this TradingviewFutureAndOptionDataController */
/* @var $model TradingviewFutureAndOptionData */

$this->breadcrumbs=array(
	'Tradingview Future And Option Datas'=>array('index'),
	$model->id,
);


?>

<h1>View -- <?php echo $model->id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create</a>   
            <a href="" class="btn-primary btn"> Update</a>  
            <a href="" class="btn-primary btn"> Delete</a>  
            <a href="" class="btn-primary btn"> Manage</a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'raw_data_id',
		'future_current_contract_end_date',
		'option_current_contract_end_date',
		'day_require_for_option_weekly_expiry',
		'day_require_for_future_monthly_expiry',
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