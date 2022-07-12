<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */

$this->breadcrumbs=array(
	'Trade Enter Logs'=>array('index'),
	'Create',
);

?>
<h1>Create TradeEnterLog</h1>
<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>