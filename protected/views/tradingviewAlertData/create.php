<?php
/* @var $this TradingviewAlertDataController */
/* @var $model TradingviewAlertData */

$this->breadcrumbs=array(
	'Tradingview Alert Datas'=>array('index'),
	'Create',
);

?>
<h1>Create TradingviewAlertData</h1>
<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Back </a>       
</div>
<div class="content-wrapper updates-wrapper">
   <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>