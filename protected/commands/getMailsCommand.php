<?php

ini_alter('date.timezone', 'Asia/Calcutta');

class getMailsCommand extends CConsoleCommand {

    public function run($args) {
        
        $userdatas = array();
        $time = time();
        $day = 24 * 3600; //seconds in day
        $toDay = date('d-M-y'); // 18-Aug-14 format


        $modelEscDataArr = StageEscalationMail:: model()->findAll(array('condition' => '"sent_on"=' . "'" . $toDay . "'"));

        $connection = Yii::app()->db;
        foreach ($modelEscDataArr as $key => $val) {

            if (strpos($modelEscDataArr[$key]['stage_id'], ".") !== false) {
                $oraderid = ltrim(( $modelEscDataArr[$key]['stage_id'] - floor($modelEscDataArr[$key]['stage_id'])), "0.");
                $statusi = floor($modelEscDataArr[$key]['stage_id']);
                $orderarr = StageOrder::model()->findByAttributes(array('order_id' => $oraderid));
                $accountid = $modelEscDataArr[$key]['account_id'];
                $accountcity = AccountAction:: model()->find(array('condition' => '"account_id" =' . "$accountid"));
                $query = 'SELECT * FROM "smt_users" JOIN "smt_users_city" on "smt_users"."user_id" = "smt_users_city"."user_id" WHERE "smt_users_city"."city_id" = ' . "{$accountcity->city_id }" . ' And "smt_users"."role_id"=' . "{$orderarr->role_id }";
                $command = $connection->createCommand($query);
                $userdata [] = $command->queryAll($query);
                $aid[] = $modelEscDataArr[$key]['account_id'];
            }
            $findsemrowarr = StageEscalationMail:: model()->find(array('condition' => '"account_id" =' . $modelEscDataArr[$key]['account_id']));
            $finddate = MasterEscalationMail:: model()->find(array('condition' => '"stage_id" =' . $modelEscDataArr[$key]['stage_id']));
            if ($modelEscDataArr[$key]['sent_count'] == 0) {


                $mydate = $modelEscDataArr[$key]['sent_on'];
                $date = strtotime("+" . $finddate->first_escalation_days . " days", strtotime($mydate));
                $findsemrowarr->sent_on = date("d-M-y", $date);
                $findsemrowarr->sent_count = 1;
            }
            if ($modelEscDataArr[$key]['sent_count'] == 1) {


                $mydate = $modelEscDataArr[$key]['sent_on'];
                $date = strtotime("+" . $finddate->second_escalation_days . " days", strtotime($mydate));
                $findsemrowarr->sent_on = date("d-M-y", $date);
                $findsemrowarr->sent_count = 2;
            }
            if ($modelEscDataArr[$key]['sent_count'] == 2) {
                $day = 7;
                $mydate = $modelEscDataArr[$key]['sent_on'];
                $date = strtotime("+" . $day . " days", strtotime($mydate));
                $findsemrowarr->sent_on = date("d-M-y", $date);
                $findsemrowarr->sent_count = 2;
            }
            $findsemrowarr->save();
        }

        $userdata = array_map('current', $userdata);
       
        foreach ($userdata as $key => $val) {

           
            $subject = $userdata[$key]['name']."pedding case".$aid[$key];
            $toName  = CJSON::encode($userdata[$key]['name']);
            $toEmail = '['.CJSON::encode($userdata[$key]['email_id']).']';
            
            MasterEmails::email("Axisbank",$toEmail,"admin@tejora.com" ,$toName,$subject);
//            $objme = new MasterEmails;
//            $objme->from_name = "Axisbank";
//            $objme->to_email = $userdata[$key]['email_id'];
//            $objme->from_email = "admin.com";
//            $objme->to_name = $userdata[$key]['name'];
//
//            $objme->subject = "RND";
//            $objme->save();
        }
    }

}

?>
