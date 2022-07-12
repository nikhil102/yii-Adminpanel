<header class="header-nav">


    <?php
//    this variable for get permission_level of admin
        $permission_level =    Yii::app()->user->getState("permission_level");
    
    $this->widget('bootstrap.widgets.TbNavbar', array(
        'type' => 'inverse', // null or 'inverse'
        'brand' => 'Project name',
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                  
                  
                  
                    
                     array('label' => 'Tradingview', 'url' => '#', 'items' => array(
                         
                          array('label' => 'Trade Log', 'url' => array('/TradeEnterLog/admin')),
                          array('label' => ' Alert Data', 'url' => array('/TradingviewAlertData/admin')),
                          array('label' => ' Alert RawData', 'url' => array('/TradingviewAlertRawData/admin')),
                          array('label' => ' Future Data', 'url' => array('/TradingviewFutureAndOptionData/admin')),
                         
                        )),

                    

                ),
            ),
            '',
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    //     array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),  
                    //   array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array(
                    //     'class' => 'topNavRightChild user-icon' 
                    //   )), 
                    array('label' => 'Welcome ' . Yii::app()->user->getState("username") . '', 'url' => '#'),
                    array('label' => '', 'url' => '#', 'items' => array(
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array(
                                    'class' => ''
                                )),
                        )),
                ),
            ),
        ), 'brand' => 'MMM',
    ));
    ?>




</header>

