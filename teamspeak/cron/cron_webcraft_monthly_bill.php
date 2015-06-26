<?php
class cron_webcraft_monthly_bill extends \SYSTEM\CRON\cronjob {
    public static function run(){
        $res = \DBD\WEBCRAFT_MONTHLY_BILL_PROJECTS::QQ();
        while($row = $res->next()){
            //für jede rechnungsvorlage eine rechnung
            //rechnung verschicken
            mail('service@webcraft-media.de', 'Rechnung', 'message', 'From: Webcraft-Media <service@webcraft-media.de>');
        }
        return \SYSTEM\CRON\cronstatus::CRON_STATUS_SUCCESFULLY;
    }
}