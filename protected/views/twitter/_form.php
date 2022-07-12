<?php
/* @var $this TwitterController */
/* @var $model Twitter */
/* @var $form CActiveForm */
?>

<div class="form updates_form_center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'twitter-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tweetimg'); ?>
		<?php echo $form->textField($model,'tweetimg',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'tweetimg'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tweettext'); ?>
		<?php echo $form->textArea($model,'tweettext',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'tweettext'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sonytweettext'); ?>
		<?php echo $form->textArea($model,'sonytweettext',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'sonytweettext'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sonytweetimg'); ?>
		<?php echo $form->textField($model,'sonytweetimg',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'sonytweetimg'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date',array('size'=>60,'maxlength'=>100)); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'date',
                            'htmlOptions' => array(
                                'size' => '20',         // textField size
                                'maxlength' => '20',    // textField maxlength
                            ),
                        ));
                ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->