<!--<div class="content-wrapper">
 <div id="master-account-product-grid-message" class="grid_message_container"></div>
    <div id="users-grid" class="grid-view">
        <h1>Wraped Api </h1>
    </div>

</div>-->

<h1> Wrapped API</h1>
<div class="content-wrapper">



<div class="row-fluid form-view">
    


<!-- Start Accordion -->

<div  class="form-Accordion">
  <div class="accordion" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            Email API 
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
        <div class="row-fluid form-view">
     

      <div class="form-horizontal" id="div003">
          <h2> Url :https://www.wrapped.in/api/1/?app_id="a"& </h2> 
          <hr>
          <h3> basic Parameters (require)</h3>
          <div style="padding:10px;">
                  <span> -Webservice_id</span><br>
                  <span>  -App_id </span><br>
                  <span>  -Token_id</span><br>
                  <span>  -Imi_Number</span><br>
          </div>
           <h3> Other Parameters (require)</h3> <br>
           
           <h2> Method </h2> <br>
             <div style="padding:10px;">
                <span> _POST</span><br>
                <span> _GET</span><br>
           </div>    
             
      </div>   
  </div>

        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          Collapsible Group Item #2
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
        	
