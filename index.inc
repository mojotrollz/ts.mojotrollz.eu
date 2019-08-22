<?php

require_once 'lib/autoload.inc';                                         //SYSTEM Classes
require_once 'teamspeak/autoload.inc';                                           //Project Classes
require_once '../../config/get_config.php';

\SYSTEM\system::start(\WEBCRAFT\get_config(dirname(__FILE__)));