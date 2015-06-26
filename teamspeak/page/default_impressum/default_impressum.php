<?php
class default_impressum extends SYSTEM\PAGE\Page {
    public function html() {
        return \SYSTEM\PAGE\text::get('impressum');
    }
}