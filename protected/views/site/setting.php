<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Setting',
);

Yii::app()->clientScript->registerScript('search', "
$('#truncatealltable').click(function(){

     alert('sdfsdf');
     
       $.ajax({
        
   	url: '".Yii::app()->createAbsoluteUrl('site/Truncateall')."',
   	type: 'GET',      	 
   	'success': function(data){          	 
         	alert(data);
            }
      
        });

	
});

");




?>


<h1>Setting</h1>



<div class="content-wrapper clearfix">
    <div class="">
       
        <p class="note" style="padding: 29px 0px 1px 18px;width: 50%;display: inline;">
             If you press following Button Then It will truncate all table in this application. 
         </p>
        <a id="truncatealltable" class="btn-primary btn">
            <i class="icon-fa icon-fa-trash-o"></i> Truncate all table </a>
    </div>
 </div>



<div class="content-wrapper">
    
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
</div>