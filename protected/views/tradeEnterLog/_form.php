<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */
/* @var $form CActiveForm */
?>

<div class="form updates_form_center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trade-enter-log-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'trade_temp_unique_key'); ?>
		<?php echo $form->textField($model,'trade_temp_unique_key',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'trade_temp_unique_key'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'raw_data_id'); ?>
		<?php echo $form->textField($model,'raw_data_id'); ?>
		<?php echo $form->error($model,'raw_data_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'trade_insert_timestamp'); ?>
		<?php echo $form->textField($model,'trade_insert_timestamp'); ?>
		<?php echo $form->error($model,'trade_insert_timestamp'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'trade_insert_date'); ?>
		<?php echo $form->textField($model,'trade_insert_date'); ?>
		<?php echo $form->error($model,'trade_insert_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'future_price_in_raw_data'); ?>
		<?php echo $form->textField($model,'future_price_in_raw_data'); ?>
		<?php echo $form->error($model,'future_price_in_raw_data'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sin_comming_timestamp'); ?>
		<?php echo $form->textField($model,'sin_comming_timestamp'); ?>
		<?php echo $form->error($model,'sin_comming_timestamp'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fut_current_contract'); ?>
		<?php echo $form->textField($model,'fut_current_contract',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'fut_current_contract'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'future_current_contrac_expiry_remaning_days'); ?>
		<?php echo $form->textField($model,'future_current_contrac_expiry_remaning_days'); ?>
		<?php echo $form->error($model,'future_current_contrac_expiry_remaning_days'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_current_contract'); ?>
		<?php echo $form->textField($model,'o_current_contract'); ?>
		<?php echo $form->error($model,'o_current_contract'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_cu_con_exp_rem_days'); ?>
		<?php echo $form->textField($model,'o_cu_con_exp_rem_days'); ?>
		<?php echo $form->error($model,'o_cu_con_exp_rem_days'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_strike_price'); ?>
		<?php echo $form->textField($model,'o_strike_price'); ?>
		<?php echo $form->error($model,'o_strike_price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_enter_action'); ?>
		<?php echo $form->textField($model,'o_enter_action',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'o_enter_action'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_enter_price'); ?>
		<?php echo $form->textField($model,'o_enter_price'); ?>
		<?php echo $form->error($model,'o_enter_price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_ce_or_pe'); ?>
		<?php echo $form->textField($model,'o_ce_or_pe',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'o_ce_or_pe'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'o_orader_status'); ?>
		<?php echo $form->textField($model,'o_orader_status',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'o_orader_status'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->