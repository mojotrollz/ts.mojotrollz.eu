<?php
class api_teamspeak extends \SYSTEM\API\api_system {
    public static function call_billing_action_customer($token){
        return webcraft_satelite::getCustomer($token);}
    public static function call_billing_action_project($token){
        return webcraft_satelite::getProject($token);}
    public static function call_billing_action_billing($token){
        return webcraft_satelite::getBilling($token);}
    public static function call_billing_action_bill($token,$ID){
        return webcraft_satelite::getBill($token,$ID);}

    public static function call_map_action_markers(){
        return map::markers();}
}