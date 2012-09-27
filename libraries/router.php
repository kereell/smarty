<?php

/** Check if environment is development and display errors **/

function setReporting() {
	if(DEVELOPER_MODE == true){
		error_reporting(E_ALL);
		ini_set('display_errors','On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
			}
	}
	
/** Check for Magic Quotes and remove them **/
	
function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
	}
	
function removeMagicQuotes() {
	if(get_magic_quotes_gpc()){
		$_GET    = stripSlashesDeep($_GET   );
		$_POST   = stripSlashesDeep($_POST  );
		$_COOKIE = stripSlashesDeep($_COOKIE);
		}
	}
	
/** Check register globals and remove them **/
	
function unregisterGlobals() {
	if(ini_get('register_globals')){
		$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var === $GLOBALS[$key]) {
					unset($GLOBALS[$key]);
					}
				}
			}
		}
	}
	
/** Main Call Function **/
	
function callHook() {
	global $url;

	$tmpUrl = explode('?', $url);
	$pathArray = explode('/', $tmpUrl[0]);
	$controller = $pathArray[2];
	$action = @$pathArray[3] ? $pathArray[3] : 'index';
//	$params = $tmpurl[1];
	parse_str(@$tmpUrl[1], $params);

	$controllerName = $controller;
	$controller = ucwords($controller);
	$model = $controller.'Model';
	$controller .= 'Controller';
	if(class_exists($controller)){
		$dispatch = new $controller($model, $controllerName, $action, $params);
		} else {
			exit('Class '.$controller.' does not exists');
			}
	if(method_exists($controller, $action)){
		call_user_func_array(array($dispatch, $action), $params);
		} else {
			exit('Method '.$action.' does not exists in '.$controller);
			}
}
	
/** Autoload any classes that are required **/
	
function autoloader($className) {
	if(!strstr($className, 'Smarty')){
		if(file_exists(ROOT.DS.'libraries'.DS.strtolower($className).'.class.php')){
			require_once(ROOT.DS.'libraries'.DS.strtolower($className).'.class.php');
		} else if(file_exists(ROOT.DS.'apps'.DS.'controllers'.DS.substr(strtolower($className), 0,-10).'.php')){
				require_once(ROOT.DS.'apps'.DS.'controllers'.DS.substr(strtolower($className), 0,-10).'.php');
			} else if (file_exists(ROOT.DS.'apps'.DS.'models'.DS.substr(strtolower($className), 0,-5).'.php')){
					require_once(ROOT.DS.'apps'.DS.'models'.DS.substr(strtolower($className), 0,-5).'.php');
				} else {
						exit('Can\'t load '.$className);
					}				
	} /* elseif (strstr($className, 'xajax')){
		
		 }*/
}
	
setReporting();
removeMagicQuotes();
unregisterGlobals();
spl_autoload_register('autoloader');
callHook();