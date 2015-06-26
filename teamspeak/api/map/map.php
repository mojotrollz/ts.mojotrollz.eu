<?php
class map {
    public static function markers(){
        $result = array();
        $markers = \DBD\WEBCRAFT_PROJECT_MARKERS::QQ();
        while($marker = $markers->next()){
            $result[]= array( 'ID' => $marker['ID'],
                              'lon' =>  $marker['lon'],
                              'lat' => $marker['lat']);
        }
        
        return JsonResult::toString($result);}
}

