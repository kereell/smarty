<?php
class Controller {

	protected $_model;
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
		$this->_model = $model;
		$this->_params = $params;
		$this->model = new $model(DB_HOST, DB_USER, DB_PASS, DB_NAME);	
		
			/** XAJAX **/
		$this->xajax = new XajaxSetup();
		
			/** TPL SMARTY**/
		$this->smarty = new SmrtSetup();
		$this->smarty->caching = FALSE;
		
	}
}