<?php
/* @var $this TradingviewAlertDataController */
/* @var $model TradingviewAlertData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raw_data_id'); ?>
		<?php echo $form->textField($model,'raw_data_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'script_name'); ?>
		<?php echo $form->textField($model,'script_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_month'); ?>
		<?php echo $form->textField($model,'contract_month',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_year'); ?>
		<?php echo $form->textField($model,'contract_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_price'); ?>
		<?php echo $form->textField($model,'current_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_candle_open'); ?>
		<?php echo $form->textField($model,'current_candle_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_candle_high'); ?>
		<?php echo $form->textField($model,'current_candle_high'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_candle_low'); ?>
		<?php echo $form->textField($model,'current_candle_low'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_candle_volume'); ?>
		<?php echo $form->textField($model,'current_candle_volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_name'); ?>
		<?php echo $form->textField($model,'str_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_timeframe_number'); ?>
		<?php echo $form->textField($model,'str_timeframe_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_timeframe_unit'); ?>
		<?php echo $form->textField($model,'str_timeframe_unit',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_enter'); ?>
		<?php echo $form->textField($model,'action_enter',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_exit'); ?>
		<?php echo $form->textField($model,'action_exit',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_fut_cont_sl'); ?>
		<?php echo $form->textField($model,'str_fut_cont_sl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_fut_cont_tar'); ?>
		<?php echo $form->textField($model,'str_fut_cont_tar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_opt_cont_sl'); ?>
		<?php echo $form->textField($model,'str_opt_cont_sl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'str_opt_cont_tar'); ?>
		<?php echo $form->textField($model,'str_opt_cont_tar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trading_type'); ?>
		<?php echo $form->textField($model,'trading_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mysql_time_stamp'); ?>
		<?php echo $form->textField($model,'mysql_time_stamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raw_data'); ?>
		<?php echo $form->textArea($model,'raw_data',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alert_time'); ?>
		<?php echo $form->textField($model,'alert_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_hour'); ?>
		<?php echo $form->textField($model,'time_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_min'); ?>
		<?php echo $form->textField($model,'time_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_seconds'); ?>
		<?php echo $form->textField($model,'time_seconds'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->