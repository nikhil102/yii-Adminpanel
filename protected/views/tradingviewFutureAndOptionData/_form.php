<?php
/* @var $this TradingviewFutureAndOptionDataController */
/* @var $model TradingviewFutureAndOptionData */
/* @var $form CActiveForm */
?>

<div class="form updates_form_center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tradingview-future-and-option-data-form',
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
		<?php echo $form->labelEx($model,'future_current_contract_end_date'); ?>
		<?php echo $form->textField($model,'future_current_contract_end_date'); ?>
		<?php echo $form->error($model,'future_current_contract_end_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'option_current_contract_end_date'); ?>
		<?php echo $form->textField($model,'option_current_contract_end_date'); ?>
		<?php echo $form->error($model,'option_current_contract_end_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'day_require_for_option_weekly_expiry'); ?>
		<?php echo $form->textField($model,'day_require_for_option_weekly_expiry'); ?>
		<?php echo $form->error($model,'day_require_for_option_weekly_expiry'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'day_require_for_future_monthly_expiry'); ?>
		<?php echo $form->textField($model,'day_require_for_future_monthly_expiry'); ?>
		<?php echo $form->error($model,'day_require_for_future_monthly_expiry'); ?>
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