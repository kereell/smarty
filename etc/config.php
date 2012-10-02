<?php

/** DEVELOPER MODE **/
define('DEVELOPER_MODE', TRUE);

/** CONFIGURATION DB **/
define('DB_HOST', 'localhost');
define('DB_USER', 'kereell');
define('DB_PASSWD', 'kirillius');
define('DB_NAME', 'kereell');

/** LIBRARIES CONTROLLERS MODELS TEMPLATES **/
define('LIB_DIR', ROOT.DS.'libs'.DS.'native'.DS);
define('CONTROLLER_DIR', ROOT.DS.'apps'.DS.'controllers'.DS);
define('MODEL_DIR', ROOT.DS.'apps'.DS.'models'.DS);
define('TPL_DIR', ROOT.DS.'apps'.DS.'views'.DS);

/** CONFIG TMP **/
define('CFG_DIR', ROOT.DS.'etc'.DS);
define('TMP_DIR', ROOT.DS.'tmp'.DS);

/** LOG CACHE **/
define('LOG_DIR', TMP_DIR.'logs'.DS);
define('CACHE_DIR', TMP_DIR.'cache'.DS);

/** CSS IMG JS **/
define('CSS_DIR', DS.'smarty'.DS.'css'.DS);
define('IMG_DIR', DS.'smarty'.DS.'img'.DS);
define('JS_DIR', DS.'smarty'.DS.'js'.DS);

/** JS HTTP REQUEST DIR **/
define('JS_HTTP_REQUEST_DIR', ROOT.DS.'libs'.DS.'jsHttpRequest'.DS);

/** SMARTY DIR **/
define('SMARTY_DIR', ROOT.DS.'libs'.DS.'smarty'.DS);
