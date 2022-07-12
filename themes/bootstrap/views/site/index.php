<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<style>
    .firstrow{
        
        
        
    }
    .secondrow{
        
        margin-top:50px;
       
        
    }
    .boxmainrow
    {
        width:23%;
       
        float: left;
       
        box-shadow: 10px 10px 5px #888888;
        margin-left: 20px;
        background-color: #fff;
        border-radius: 5px;
        
    }
    .boxfooter
    {
        height:40px;
        color: #fff;
        font-size: 12pt;
        font-weight: 600;
        
    }
    .boxtitle
    {
        width:100%;
        text-align: center;
        margin:10px 0px 10px 0px;
       
        font-size: 15px;
        font-weight: 600;
    }
    .boxbody
    {
        padding: 22px;
        
    }
    .mt0{
            
        margin-top:10px;
        
    }
    .mb0{
        
        padding-top:5px; 
    }
    .left{
        margin-left:10px;
        float: left;
    }
    
    .righttext
    {
      float: right;  
    }
</style>

<!--<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
    <div id="users-grid" class="grid-view">
        <h1>Wraped Api </h1>
    </div>

</div>-->

<h1> FMF DASHBORD</h1>
<div class="content-wrapper">



<div class="row-fluid form-view">
    


<!-- Start Accordion -->

<div  class="form-Accordion">
  <div class="accordion" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            <h2> LIVE TRADING </h2> 
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
        <div class="row-fluid form-view">
     

      <div class="form-horizontal" id="div003">
<!--          <h2> Url :https://www.wrapped.in/api/1/?app_id="a"& </h2> 
          <hr>-->
            <div class="accordion-inner">
          Anim pariatur cliche...
        </div>
       
             
      </div>   
  </div>

        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
            <h2> PAPER TRADING </h2>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse in">
        <div class="accordion-inner">
          Anim pariatur cliche...
        </div>
      </div>
    </div>
      
   
     <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
            <h2> BACK TESTING </h2>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse in">
        <div class="accordion-inner">
          Anim pariatur cliche...
        </div>
      </div>
    </div>  
      
  </div>
</div>  <!-- End Accordion -->

</div>
        

</div>
 <!-- CONTENT-WRAPPER-END  -->

 
<script>

// to toogle div

    $(function () {
        $('#img001').live('click', function () {
            $('#Data-div').toggle(100);
        });

        $('#img002').live('click', function () {
                $('#div002').toggle(100);
       });
        $('#img003').live('click', function () {
                $('#div003').toggle(100);
       });

 });

    $(".collapse").collapse()

</script>
        	


