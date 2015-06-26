<?php

class default_page extends SYSTEM\PAGE\Page {
    public static function js(){
        return  '<script src="'.\LIB\lib_jquery::js().'" type="text/javascript"></script>'.
                '<script src="'.\LIB\lib_bootstrap::js().'" type="text/javascript"></script>'.
                '<script src="'.\LIB\lib_jqbootstrapvalidation::js().'" type="text/javascript"></script>'.
                '<script type="text/javascript" src="'.\SYSTEM\WEBPATH(new PPAGE(),'default_page/js/default_page.js').'"></script>'.
                '<script type="text/javascript" src="'.\SYSTEM\WEBPATH(new PLIB(),'tsstatus/tsstatus.js').'"></script>';}
    public static function css(){
        return  '<link rel="stylesheet" href="'.\LIB\lib_bootstrap::css().'" type="text/css" />'.
                '<link rel="stylesheet" href="'.\LIB\lib_system::css().'" type="text/css" />'.
                '<link rel="stylesheet" href="'.\SYSTEM\WEBPATH(new PPAGE(),'default_page/css/default_page.css').'" type="text/css" />'.
                '<link rel="stylesheet" href="'.\SYSTEM\WEBPATH(new PLIB(),'tsstatus/tsstatus.css').'" type="text/css" />';}
                
    private static function ts_app(){
        $ts = new TSStatus('mojotrollz.eu');
        $ts->setLoginPassword('mojotrollztsquery', '9aYllYkG');
        $ts->imagePath = \SYSTEM\WEBPATH(new PLIB(),'tsstatus/img/');
        return $ts->render();
    }
                
    public function html($_escaped_fragment_ = NULL) {
        $vars = array();
        $vars['css'] = self::css();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['ts_app'] = self::ts_app();
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag('teamspeak'));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PPAGE(),'default_page/tpl/teamspeak.tpl'), $vars);
    }
}