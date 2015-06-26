<?php
class cron_webcraft_monthly_backup extends \SYSTEM\CRON\cronjob {
    public static function run(){
        return \SYSTEM\CRON\cronstatus::CRON_STATUS_SUCCESFULLY;
    }
}