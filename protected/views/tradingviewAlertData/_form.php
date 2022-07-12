<?php
/* @var $this TradingviewAlertDataController */
/* @var $model TradingviewAlertData */
/* @var $form CActiveForm */
?>

<div class="form updates_form_center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tradingview-alert-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'raw_data_id'); ?>
		<?php echo $form->textField($model,'raw_data_id'); ?>
		<?php echo $form->error($model,'raw_data_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'script_name'); ?>
		<?php echo $form->textField($model,'script_name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'script_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contract_month'); ?>
		<?php echo $form->textField($model,'contract_month',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'contract_month'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contract_year'); ?>
		<?php echo $form->textField($model,'contract_year'); ?>
		<?php echo $form->error($model,'contract_year'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_price'); ?>
		<?php echo $form->textField($model,'current_price'); ?>
		<?php echo $form->error($model,'current_price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_candle_open'); ?>
		<?php echo $form->textField($model,'current_candle_open'); ?>
		<?php echo $form->error($model,'current_candle_open'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_candle_high'); ?>
		<?php echo $form->textField($model,'current_candle_high'); ?>
		<?php echo $form->error($model,'current_candle_high'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_candle_low'); ?>
		<?php echo $form->textField($model,'current_candle_low'); ?>
		<?php echo $form->error($model,'current_candle_low'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'current_candle_volume'); ?>
		<?php echo $form->textField($model,'current_candle_volume'); ?>
		<?php echo $form->error($model,'current_candle_volume'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_name'); ?>
		<?php echo $form->textField($model,'str_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'str_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_timeframe_number'); ?>
		<?php echo $form->textField($model,'str_timeframe_number'); ?>
		<?php echo $form->error($model,'str_timeframe_number'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_timeframe_unit'); ?>
		<?php echo $form->textField($model,'str_timeframe_unit',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'str_timeframe_unit'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'action_enter'); ?>
		<?php echo $form->textField($model,'action_enter',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'action_enter'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'action_exit'); ?>
		<?php echo $form->textField($model,'action_exit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'action_exit'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_fut_cont_sl'); ?>
		<?php echo $form->textField($model,'str_fut_cont_sl'); ?>
		<?php echo $form->error($model,'str_fut_cont_sl'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_fut_cont_tar'); ?>
		<?php echo $form->textField($model,'str_fut_cont_tar'); ?>
		<?php echo $form->error($model,'str_fut_cont_tar'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_opt_cont_sl'); ?>
		<?php echo $form->textField($model,'str_opt_cont_sl'); ?>
		<?php echo $form->error($model,'str_opt_cont_sl'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'str_opt_cont_tar'); ?>
		<?php echo $form->textField($model,'str_opt_cont_tar'); ?>
		<?php echo $form->error($model,'str_opt_cont_tar'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'trading_type'); ?>
		<?php echo $form->textField($model,'trading_type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'trading_type'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mysql_time_stamp'); ?>
		<?php echo $form->textField($model,'mysql_time_stamp'); ?>
		<?php echo $form->error($model,'mysql_time_stamp'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'raw_data'); ?>
		<?php echo $form->textArea($model,'raw_data',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'raw_data'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'alert_time'); ?>
		<?php echo $form->textField($model,'alert_time'); ?>
		<?php echo $form->error($model,'alert_time'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_hour'); ?>
		<?php echo $form->textField($model,'time_hour'); ?>
		<?php echo $form->error($model,'time_hour'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_min'); ?>
		<?php echo $form->textField($model,'time_min'); ?>
		<?php echo $form->error($model,'time_min'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_seconds'); ?>
		<?php echo $form->textField($model,'time_seconds'); ?>
		<?php echo $form->error($model,'time_seconds'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->