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
	'Create',
);\n";
?>

?>
<h1>Create <?php echo $this->modelClass; ?></h1>
<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>