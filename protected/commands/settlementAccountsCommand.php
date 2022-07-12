<?php
class settlementAccountsCommand extends CConsoleCommand {
    public $jobID = 6;
    
    public function run($args) {
        $lockCron   = Cron::lock($this->jobID);
        if($lockCron===false) exit;
        
        $criteria = new CDbCriteria();
        $criteria->condition = '"done" = 3';
        $criteria->limit = 1;
        $items = MasterData::model()->findAll($criteria);
        $totalEntries = count($items);
        if ($totalEntries <= 0) {
            echo "\nNo data to process.";
            Cron::free($this->jobID);
            exit;
        }        
        try {
            $connection     = Yii::app()->db;
            $transaction    = $connection->beginTransaction();
            
            $dataIDs        = array();
            for ($i=0; $i<$totalEntries; $i++) {
                
                $item       = $items[$i];

                ## Settlement AccountAction 
                $accountActionObj = AccountAction::model()->findByAttributes(array('account_id' => $item['account_id']));
                if(!$accountActionObj){
                    $accountActionObj = new AccountAction;
                    $accountActionObj->account_id    = $item['account_id'];
                    $accountActionObj->stage_id      = ($item['sub_product_id'] > 0) ? 1.1 : 0;
                    $accountActionObj->city_id       = $item['city_id'];
                    $accountActionObj->bm_user_id    = $this->getBMID($item['city_id'],$item['bucket_id']);
                    $accountActionObj->info_initiator_order_id       = 0;

                    if(!$accountActionObj->save()){
                        print_r($accountActionObj->errors);
                        throw new Exception('Failed to save accountAction data.');
                    }
                }                
                $connection->createCommand()->update('master_data',array('done'=>4),'"data_id" = :dataID',array(':dataID'=>$item['data_id']));
            }
//            MasterData::model()->updateByPk($dataIDs,array('"done"'=>4));

            $transaction->commit();
        } catch (Exception $exc) {
            echo "\nError- ".$exc->getMessage()."\n\n";
//            echo $exc->getTraceAsString();
            $transaction->rollback();
        }
        Cron::free($this->jobID);
    }
    protected function getBMID($cityID, $bracketID){
        $data   = UsersCity::model()->findByAttributes(array('city_id'=>$cityID, 'dpd_bracket_id'=>$bracketID));
        print_r($data);
        if($data){
            return $data['user_id'];
        }
        return 0;
    }
}
?>