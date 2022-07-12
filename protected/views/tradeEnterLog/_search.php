<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'trade_id'); ?>
		<?php echo $form->textField($model,'trade_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trade_temp_unique_key'); ?>
		<?php echo $form->textField($model,'trade_temp_unique_key',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raw_data_id'); ?>
		<?php echo $form->textField($model,'raw_data_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trade_insert_timestamp'); ?>
		<?php echo $form->textField($model,'trade_insert_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trade_insert_date'); ?>
		<?php echo $form->textField($model,'trade_insert_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'future_price_in_raw_data'); ?>
		<?php echo $form->textField($model,'future_price_in_raw_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sin_comming_timestamp'); ?>
		<?php echo $form->textField($model,'sin_comming_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fut_current_contract'); ?>
		<?php echo $form->textField($model,'fut_current_contract',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'future_current_contrac_expiry_remaning_days'); ?>
		<?php echo $form->textField($model,'future_current_contrac_expiry_remaning_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_current_contract'); ?>
		<?php echo $form->textField($model,'o_current_contract'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_cu_con_exp_rem_days'); ?>
		<?php echo $form->textField($model,'o_cu_con_exp_rem_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_strike_price'); ?>
		<?php echo $form->textField($model,'o_strike_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_enter_action'); ?>
		<?php echo $form->textField($model,'o_enter_action',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_enter_price'); ?>
		<?php echo $form->textField($model,'o_enter_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_ce_or_pe'); ?>
		<?php echo $form->textField($model,'o_ce_or_pe',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_orader_status'); ?>
		<?php echo $form->textField($model,'o_orader_status',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->