<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="<?php echo Yii::app()->baseUrl.'/index.php/'.$this->modelClass.'/create'; ?>" class="btn-primary btn createBtn">
            <i class="icon-fa icon-fa-plus"></i> Create <?php echo $this->modelClass; ?> </a>
    </div>
 </div>
    
<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'users-grid',
        'dataProvider' => $model->search(),
        'type' => 'striped bordered condensed',
        'filter' => $model,
        'columns' => array(

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
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => array(

                ),
            ),
        ),
    ));


  ?>
</div>

</div>
