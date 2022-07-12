<?php
/* @var $this TradingviewAlertRawDataController */
/* @var $data TradingviewAlertRawData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('time_seconds')); ?>:</b>
	<?php echo CHtml::encode($data->time_seconds); ?>
	<br />

	*/ ?>

</div>