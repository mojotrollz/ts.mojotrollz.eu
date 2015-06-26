<?php
namespace DBD;

class WEBCRAFT_MONTHLY_BILL_PROJECTS extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM webcraft_project LEFT JOIN webcraft_bill ON webcraft_project.repeat_bill = webcraft_bill.ID WHERE webcraft_bill.`group` = 1;'
);}}