<?php

class default_page implements SYSTEM\PAGE\DefaultPage {
    public static function js(){
        return  '<script src="'.\LIB\lib_jquery::js()->WEBPATH().'" type="text/javascript"></script>'.
                '<script src="'.\LIB\lib_bootstrap::js()->WEBPATH().'" type="text/javascript"></script>'.
                '<script src="'.\LIB\lib_jqbootstrapvalidation::js()->WEBPATH().'" type="text/javascript"></script>'.
                '<script type="text/javascript" src="'.(new PPAGE('default_page/js/default_page.js'))->WEBPATH().'"></script>'.
                '<script type="text/javascript" src="'.(new PLIB('tsstatus/tsstatus.js'))->WEBPATH().'"></script>';}
    public static function css(){
        return  '<link rel="stylesheet" href="'.\LIB\lib_bootstrap::css()->WEBPATH().'" type="text/css" />'.
                '<link rel="stylesheet" href="'.\LIB\lib_system::css()->WEBPATH().'" type="text/css" />'.
                '<link rel="stylesheet" href="'.(new PPAGE('default_page/css/default_page.css'))->WEBPATH().'" type="text/css" />'.
                '<link rel="stylesheet" href="'.(new PLIB('tsstatus/tsstatus.css'))->WEBPATH().'" type="text/css" />';}
                
    private static function ts_app(){
        $ts = new TSStatus('127.0.0.1');
        //$ts = new TSStatus('mojotrollz.eu');
        $ts->setLoginPassword('mojotrollztsquery', '9aYllYkG');
        $ts->imagePath = 'api.php?call=files&cat=img&id=';
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
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/teamspeak.tpl'))->SERVERPATH(), $vars);
    }
}