<?php
namespace DBD;

class WEBCRAFT_PROJECT_MARKERS extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg            
'',
//mys
'SELECT * FROM webcraft_project WHERE lon IS NOT NULL AND lat IS NOT NULL;'
);}}