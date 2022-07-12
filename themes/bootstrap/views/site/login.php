<div class="loginholder">
    <div class="logoholder">
         <h2>Money Making Machine</h2>
      
    </div>
    <div class='form'>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'focus' => array($model, 'login'),
            'id' => 'login-form',
            'htmlOptions' => array(
                'autocomplete' => 'off',
                'class' => 'tipsy-form'
            )
                ))
        ?>
        <div style = 'padding-left:20px;'>
            <?php echo $form->label($model, 'username') ?>
            <?php echo $form->textField($model, 'username', array('class'=>'login-txt-width','rel' => 'tipsy', 'original-title' => $model->getError('username'), 'autocomplete' => 'off')) ?>
        </div>

        <div style = 'padding-left:20px;'>
            <?php echo $form->label($model, 'password') ?>
            <?php echo $form->passwordField($model, 'password', array('class'=>'login-txt-width','rel' => 'tipsy', 'original-title' => $model->getError('password'), 'autocomplete' => 'off')) ?>
        </div>
        <br /> 
        <div style = 'padding-left:50px;'>
            <?php echo CHtml::submitButton(Yii::t("UserAdminModule.LoginForm", "Login"), array('class' => 'btn btn-primary', 'id' => 'LoginForm_submit')) ?>
            &nbsp;
            <input class="btn btn-danger" id="" type="reset" name="" value="Reset">
            <br /> 
        </div>

        <?php $this->endWidget() ?>
    </div>
</div>
<div id="footer">
    <div class="container" style="text-align:center;" >
        <div class="container">
            <span class="footer_small">Copyright &copy; <?php echo date("Y") ?> COMAPANY NAME </span><br />
            <span class="footer_small2">Powered By : <a href="" target="_blank">NICK</a>.</span>
        </div>
    </div>
</div>