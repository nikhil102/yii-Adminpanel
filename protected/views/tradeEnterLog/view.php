<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */

$this->breadcrumbs=array(
	'Trade Enter Logs'=>array('index'),
	$model->trade_id,
);


?>

<h1>View  -- <?php echo $model->trade_id; ?></h1>

<div class="content-wrapper button-wrapper">
            <a href="" class="btn-primary btn"> Create </a>   
            <a href="" class="btn-primary btn"> Update </a>  
            <a href="" class="btn-primary btn"> Delete </a>  
            <a href="" class="btn-primary btn"> Manage </a>       
</div>
<div class="content-wrapper">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'trade_id',
		'trade_temp_unique_key',
		'raw_data_id',
		'trade_insert_timestamp',
		'trade_insert_date',
		'future_price_in_raw_data',
		'sin_comming_timestamp',
		'fut_current_contract',
		'future_current_contrac_expiry_remaning_days',
		'o_current_contract',
		'o_cu_con_exp_rem_days',
		'o_strike_price',
		'o_enter_action',
		'o_enter_price',
		'o_ce_or_pe',
		'o_orader_status',
	),
)); ?>
</div>