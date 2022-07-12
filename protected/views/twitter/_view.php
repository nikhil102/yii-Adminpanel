<?php
/* @var $this TwitterController */
/* @var $data Twitter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tweetimg')); ?>:</b>
	<?php echo CHtml::encode($data->tweetimg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tweettext')); ?>:</b>
	<?php echo CHtml::encode($data->tweettext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sonytweettext')); ?>:</b>
	<?php echo CHtml::encode($data->sonytweettext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sonytweetimg')); ?>:</b>
	<?php echo CHtml::encode($data->sonytweetimg); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	*/ ?>

</div>