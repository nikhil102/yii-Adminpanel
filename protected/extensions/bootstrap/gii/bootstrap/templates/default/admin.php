<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        trimFormValues('.search-form form');
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo "<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->
<?php echo " <?php \$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => false,
    'alerts' => array(
        'success' => array('block' => true, 'fade' => true),
        'error' => array('block' => true, 'fade' => true),
        'info' => array('block' => true, 'fade' => true),
        'warning' => array('block' => true, 'fade' => true),),
    'htmlOptions' => array(
        'id' => '".$this->class2id($this->modelClass)."_admin_alert',
        'class' => 'grid_alert'
    )
        )
); ?>\n"; ?>
<div id="<?php echo $this->class2id($this->modelClass); ?>-grid-message" class="grid_message_container"></div>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
                         'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{view}{update}{delete_dialog}',
                        'buttons' => array(
                             'delete_dialog' => array(
                                'type' => 'raw',
                                'label' => "Delete",
                                'icon' => 'trash',
                                'url' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id,"name"=>$data->id))',
                                 'click' => "function() {
                                    deleteEntryConfirm('confirm-delete-dialog','Delete <?php echo $this->modelClass; ?> ?','',$(this).attr('href'),'<?php echo $this->class2id($this->modelClass); ?>-grid');
                                    return false;
                                 }",
                            ),
                         ),
                    ),
	),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'confirm-delete-dialog',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => "",
        'autoOpen' => false,
        'modal' => true,
        'resizable' => false,
        'buttons' => array(
            'Ok' => 'js: function() {}', //<- NOTE THE js: AT THE BEGGININ
            'Cancel' => 'js: function() {$(this).dialog("close");}', //<- NOTE THE js: AT THE BEGGININ
        ),
    ),
));
$this->endWidget('zii.widgets.jui.CJuiDialog');

?>
<script type="text/javascript">
    hideAlertDiv('<?php echo $this->class2id($this->modelClass); ?>_admin_alert');
</script>

