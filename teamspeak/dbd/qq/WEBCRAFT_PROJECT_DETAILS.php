<?php
namespace DBD;

class WEBCRAFT_PROJECT_DETAILS extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM webcraft_project WHERE lon IS NOT NULL AND lat IS NOT NULL AND ID = ?;'
);}}