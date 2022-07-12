<?php
/* @var $this TradeEnterLogController */
/* @var $data TradeEnterLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->trade_id), array('view', 'id'=>$data->trade_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_temp_unique_key')); ?>:</b>
	<?php echo CHtml::encode($data->trade_temp_unique_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raw_data_id')); ?>:</b>
	<?php echo CHtml::encode($data->raw_data_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_insert_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->trade_insert_timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->trade_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('future_price_in_raw_data')); ?>:</b>
	<?php echo CHtml::encode($data->future_price_in_raw_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sin_comming_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->sin_comming_timestamp); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fut_current_contract')); ?>:</b>
	<?php echo CHtml::encode($data->fut_current_contract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('future_current_contrac_expiry_remaning_days')); ?>:</b>
	<?php echo CHtml::encode($data->future_current_contrac_expiry_remaning_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_current_contract')); ?>:</b>
	<?php echo CHtml::encode($data->o_current_contract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_cu_con_exp_rem_days')); ?>:</b>
	<?php echo CHtml::encode($data->o_cu_con_exp_rem_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_strike_price')); ?>:</b>
	<?php echo CHtml::encode($data->o_strike_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_enter_action')); ?>:</b>
	<?php echo CHtml::encode($data->o_enter_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_enter_price')); ?>:</b>
	<?php echo CHtml::encode($data->o_enter_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_ce_or_pe')); ?>:</b>
	<?php echo CHtml::encode($data->o_ce_or_pe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('o_orader_status')); ?>:</b>
	<?php echo CHtml::encode($data->o_orader_status); ?>
	<br />

	*/ ?>

</div>