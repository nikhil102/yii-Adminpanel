<?php
//0-clean,1-reversed,2-insurance,3-lein.
ini_alter('date.timezone', 'Asia/Calcutta');

class aprovemailCommand extends CConsoleCommand {
    
    public function run($args)
   {   
        
            $todayaprovecasesdata = array();
            $time = time();
            $day = 24 * 3600; //seconds in day
            $toDay = date('d-M-y'); // 18-Aug-14 format

            $todayaprovecasesdata = ApprovedCases::model()-> findAll(array('condition' => '"created_on"='."'".$toDay."'"));
       
            
    foreach ($todayaprovecasesdata as $key => $val) {
        
             $subject = "account id ".$todayaprovecasesdata[$key]-> account_id.""." settlement case aprove today";
             $subject.="<br>";
             $subject .= "Total outstanding is ".$todayaprovecasesdata[$key]-> total_outstanding." ";
             $subject.="<br>";
             $subject .= "Settlement amount ".$todayaprovecasesdata[$key]-> settlement_amount." ";
             $subject.="<br>";
             $subject .= "Duration is".$todayaprovecasesdata[$key]-> duration."";
             $subject.="<br>";
             MasterEmails::email("Axisbank aprove case","admin@axis.com","admin@axis.com" ,"admin",$subject);
//            $objme = new MasterEmails;
//            $objme->from_name = "Axisbank aprove case";
//            $objme->to_email = 'admin@axis.com';
//            $objme->from_email = "admin@axis.com";
//            $objme->to_name = "admin";
//            $objme->subject = $subject;
//            $objme->save();
       
        }
     
      
                
    }
    
    
    
}
?>
