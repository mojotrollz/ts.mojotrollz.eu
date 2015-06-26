<?php
class webcraft_satelite {
    public static function getCustomer($token){
        return JsonResult::toString(\DBD\WEBCRAFT_CUSTOMER_TOKEN::Q1(array($token)));}
    public static function getProject($token){        
        return JsonResult::toString(\DBD\WEBCRAFT_PROJECT_TOKEN::QA(array($token)));}
    public static function getBilling($token){        
        return JsonResult::toString(\DBD\WEBCRAFT_BILL_TOKEN::QA(array($token)));}
    public static function getBill($token,$ID){
        $bill = \DBD\WEBCRAFT_BILL_ID::Q1(array($token,$ID));
        if(!$bill){
            throw new ERROR('No such Bill for your Account. Bill ID: '.$ID);}
        $bill['items'] = '';
        $bill['date'] = date("d.m.Y", strtotime($bill['date']));
        $bill['balance'] = number_format($bill['balance'], 2, ",", ".");
        $items = DBD\WEBCRAFT_BILL_ITEM_ID::QQ(array($ID));
        $count = 1;
        while($item = $items->next()){
            $item['count'] = $count++;
            $item['cost'] = number_format($item['cost'], 2, ",", ".");
            $bill['items'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_webcraft_billing/saimod_webcraft_billing_pdf_item.tpl'), $item);}
        $bill = \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(),'saimod_webcraft_billing/saimod_webcraft_billing_pdf.tpl'), $bill);
        require_once(\SYSTEM\SERVERPATH(new PSAI(),'saimod_webcraft_billing/dompdf/dompdf_config.inc.php'));
        $dompdf = new DOMPDF();            
        $dompdf->load_html($bill);
        $dompdf->set_paper("a4", 'portrait'); 
        $dompdf->render();        
        $dompdf->stream("rechnung.pdf", array("Attachment" => 0));
        return;
    }
}
