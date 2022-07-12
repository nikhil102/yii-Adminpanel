<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

 <?php include 'header.php'; ?>

</head>

<body>
    
<?php 
//if (!Yii::app()->user->guestName == 'Guest') { 
//    include 'menu.php';
// }
    ?>
<?php if (!Yii::app()->user->isGuest) {
    include 'menu.php';
    ?>

<!-- PAGE WRAPPER -->
  <div class="page-wrapper">

        <!-- 	<?php if(isset($this->breadcrumbs)):?>
        		
                <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        			'links'=>$this->breadcrumbs,
        		)); ?> -->    

        	<?php endif?>

        	<?php echo $content; ?>

        	<div class="clear"></div>

      
    </div>    <!-- / Page wrpper->
 <!-- page -->
  <?php include 'footer.php'; 
        } elseif(Yii::app()->controller->action->id == 'login') {
            echo $content; 
        }else{
            $this->redirect(Yii::app()->createUrl('site/login'));
        } ?>    
</body>
</html>
