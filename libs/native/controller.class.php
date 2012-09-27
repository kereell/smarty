<?php
class Controller {

	protected $_controller;
	protected $_action;
	protected $_params;
	protected $model;
	protected $smarty;
	protected $xajax;

	function __construct($model, $controller, $action, $params) {
		
			/** MVC and params **/
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_params = $params;
		$this->model = new $model();	
		
			/** XAJAX **/
		$this->xajax = new xajaxSetup();
		
			/** TPL SMARTY**/
		$this->smarty = new smrtSetup();
		$this->smarty->caching = FALSE;
		
	}
}