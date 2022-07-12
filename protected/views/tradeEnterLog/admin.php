<?php
/* @var $this TradeEnterLogController */
/* @var $model TradeEnterLog */

$this->breadcrumbs=array(
	'Trade Enter Logs'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trade-enter-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Trade Enter Logs</h1>

<!--<div class="content-wrapper clearfix">
    <div class="">
        
        <a href="/sonyadmin/index.php/TradeEnterLog/create" class="btn-primary btn createBtn">
            <i class="icon-fa icon-fa-plus"></i> Create </a>
    </div>
 </div>-->
    
<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'users-grid',
        'dataProvider' => $model->search(),
        'type' => 'striped bordered condensed',
        'filter' => $model,
        'columns' => array(

		'trade_id',
		//'trade_temp_unique_key',
		//'raw_data_id',
		'trade_insert_timestamp',
		//'trade_insert_date',
		'future_price_in_raw_data',
		//'sin_comming_timestamp',
		'fut_current_contract',
		//'future_current_contrac_expiry_remaning_days',
		'o_current_contract',
		'o_cu_con_exp_rem_days',
		'o_strike_price',
		'o_enter_action',
		'o_enter_price',
		'o_ce_or_pe',
		//'o_orader_status',
		

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
