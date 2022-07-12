<?php
/* @var $this TradingviewAlertDataController */
/* @var $data TradingviewAlertData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raw_data_id')); ?>:</b>
	<?php echo CHtml::encode($data->raw_data_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('script_name')); ?>:</b>
	<?php echo CHtml::encode($data->script_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_month')); ?>:</b>
	<?php echo CHtml::encode($data->contract_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_year')); ?>:</b>
	<?php echo CHtml::encode($data->contract_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_price')); ?>:</b>
	<?php echo CHtml::encode($data->current_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_candle_open')); ?>:</b>
	<?php echo CHtml::encode($data->current_candle_open); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('current_candle_high')); ?>:</b>
	<?php echo CHtml::encode($data->current_candle_high); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_candle_low')); ?>:</b>
	<?php echo CHtml::encode($data->current_candle_low); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_candle_volume')); ?>:</b>
	<?php echo CHtml::encode($data->current_candle_volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_name')); ?>:</b>
	<?php echo CHtml::encode($data->str_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_timeframe_number')); ?>:</b>
	<?php echo CHtml::encode($data->str_timeframe_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_timeframe_unit')); ?>:</b>
	<?php echo CHtml::encode($data->str_timeframe_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_enter')); ?>:</b>
	<?php echo CHtml::encode($data->action_enter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_exit')); ?>:</b>
	<?php echo CHtml::encode($data->action_exit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_fut_cont_sl')); ?>:</b>
	<?php echo CHtml::encode($data->str_fut_cont_sl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_fut_cont_tar')); ?>:</b>
	<?php echo CHtml::encode($data->str_fut_cont_tar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_opt_cont_sl')); ?>:</b>
	<?php echo CHtml::encode($data->str_opt_cont_sl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_opt_cont_tar')); ?>:</b>
	<?php echo CHtml::encode($data->str_opt_cont_tar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trading_type')); ?>:</b>
	<?php echo CHtml::encode($data->trading_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mysql_time_stamp')); ?>:</b>
	<?php echo CHtml::encode($data->mysql_time_stamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raw_data')); ?>:</b>
	<?php echo CHtml::encode($data->raw_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_time')); ?>:</b>
	<?php echo CHtml::encode($data->alert_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_hour')); ?>:</b>
	<?php echo CHtml::encode($data->time_hour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_min')); ?>:</b>
	<?php echo CHtml::encode($data->time_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_seconds')); ?>:</b>
	<?php echo CHtml::encode($data->time_seconds); ?>
	<br />

	*/ ?>

</div>