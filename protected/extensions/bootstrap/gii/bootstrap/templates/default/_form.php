<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
        'type'=>'horizontal',
        'htmlOptions' => array(
            'autocomplete' => 'off',
            'class' => 'tipsy-form',
        )
)); ?>\n"; ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo "<?php //echo \$form->errorSummary(\$model); ?>\n"; ?>
<?php echo "<?php \$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, 
    'fade' => true,
    'closeText' => false,
    'alerts' => array(
        'success' => array('block' => true, 'fade' => true),
        'error' => array('block' => true, 'fade' => true), 
        'info' => array('block' => true, 'fade' => true), 
        'warning' => array('block' => true, 'fade' => true),),
        'htmlOptions' => array(
            'id' => '" . $this->class2id($this->modelClass) ."_form_alert',
         )
        )
); ?>\n"; ?>
<?php echo "<?php echo COMMONFUNCTION::_getTokenFormField('".$this->class2id($this->modelClass)."-form');; ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

    <?php
}
?>
<div class="form-actions">
    <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Create' : 'Save',
                        'htmlOptions' => array(
                            'onClick' => 'submitForm(this);'
                        )
		)); ?>\n"; ?>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

<?php echo '<script type="text/javascript">
            $j(document).ready(function() {
                disableFormEnter("' . $this->class2id($this->modelClass) . '-form");
                hideAlertDiv("' . $this->class2id($this->modelClass) . '_form_alert");
            });
</script>'; ?>
