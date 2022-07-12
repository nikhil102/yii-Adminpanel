<?php
/* @var $this TradingviewAlertRawDataController */
/* @var $model TradingviewAlertRawData */
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