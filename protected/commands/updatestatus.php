<?php

ini_alter('date.timezone', 'Asia/Calcutta');

class updatestatusCommand extends CConsoleCommand {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function updatestatus($status_settlement, $accoundid) {

        if (isset($status_settlement) && isset($accoundid)) {
            $accountid = AccountAction::model()->find(array('condition' => '"account_id"=' . "'" . $accoundid . "'"));
            $accountid->stage_id = $status_settlement;
            if($accountid->save()){
                return $status_settlement;
            }
        }
        return false;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function delrow($accoundid) {
        $accountid = SettlementStatuscron::model()->find(array('condition' => '"account_id"=' . "'" . $accoundid . "'"));
        if ($accountid->delete()) {
            return true;
        }
        return false;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function checkstatus($number, $accoundid) {
        return ($number == 0) ? $this->updatestatus(Yii::app()->params['close_id'], $accoundid) : $this->updatestatus(Yii::app()->params['broken_id'], $accoundid);
    }

    public function run($args) {
        $SettlementStatuscronArr = array();
        $time = time();
        $day = 24 * 3600; //seconds in day
        $toDay = date('d-M-y');

        $r = 0;
        $SettlementStatuscronArr = SettlementStatuscron ::model()->findAll(array('condition' => '"expiry_date"=' . "'" . $toDay . "' or" . '"received_payment"=' . "'" . $r . "'"));

        try {
            foreach ($SettlementStatuscronArr as $key => $value) {
                $account_id = $SettlementStatuscronArr[$key]->account_id;
                if (!$account_id){
                    continue;
                }
                $settlementamount   = $SettlementStatuscronArr[$key]->received_payment;
                $status_settlement  = $this->checkstatus($settlementamount, $account_id);

                if($status_settlement != false)
                {
                    $this->delrow($account_id);
                    if($status_settlement=102)
                    {
                      $subject = "account id ".$account_id.""." settlement case broken today";
                      $subject.="<br>";
                      MasterEmails::email("Axisbank","axis@admin.com","@admin.com" ,"statlement status", $subject);
                    
                     
                    }
                    elseif($status_settlement=104)
                    {
                      $subject = "account id ".$account_id.""." settlement case  close today";
                      $subject.="<br>";   
                      MasterEmails::email("Axisbank","axis@admin.com","@admin.com" ,"statlement status",$subject);
                    
                     
                    }
                    
                     
                    }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            
        }
    }

}

?>
