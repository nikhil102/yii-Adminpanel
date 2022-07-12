<?php

ini_alter('date.timezone', 'Asia/Calcutta');

class sendMailsCommand extends CConsoleCommand {

    var $mail;

    public $jobID=11;
    public function run($args) {
//        return true;
        $lockCron   = Cron::lock($this->jobID);
        if($lockCron===false) exit;

        $this->mail = Yii::app()->Smtpmail;
        $items      = MasterEmails::model()->findAll(array('limit' => 10));
        $totalEmails = count($items);
        if ($totalEmails <= 0) {
            echo "\nNo mails to send.\n";
            Cron::free($this->jobID);
            return true;
        }

        for ($i = 0; $i < $totalEmails; $i++) {
            $emailID    = $items[$i]['email_id'];
            $toName     = json_decode($items[$i]['to_name'], true);
            $toEmail    = json_decode($items[$i]['to_email'], true);
            $fromName   = $items[$i]['from_name'];
            $fromEmail  = $items[$i]['from_email'];
            $subject    = $items[$i]['subject'];
            $html       = $items[$i]['html'];
            $attachments = empty($items[$i]['attachments']) ? array() : json_decode($items[$i]['attachments'], true);

//            $plain      = $items[$i]['plain'];

            $sent         = $this->send($toName, $toEmail, $fromName, $fromEmail, $subject, $html, $attachments);
            if($sent===true){
                MasterEmails::model()->deleteByPk($emailID);
            }
        }
        
        Cron::free($this->jobID);
    }

    public function send($toName, $toEmail, $fromName, $fromEmail, $subject, $html, $attachments = array()) {
        
        try {
            $this->mail->ClearAllRecipients();

            $this->mail->SetFrom($fromEmail, $fromName);
            $this->mail->Subject = $subject;
            $this->mail->MsgHTML($html);

            foreach($attachments as $attachment){
                $this->mail->addAttachment( $attachment );
            }

            $this->mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            for($i=0,$totalItems=count($toEmail); $i<$totalItems; $i++){
                $this->mail->AddAddress('nikhil.shinde@tejora.com', $toName[$i]);//$toEmail[$i]
            }

            if (!$this->mail->Send()) {
                echo "Mailer Error: " . $this->mail->ErrorInfo;
                return false;
            }
            echo "\nMessage sent!";
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
}
?>