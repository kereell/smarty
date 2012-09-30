<?php

require_once(XAJAX_DIR.'xajax_core'.DS.'xajax.inc.php');
require_once(SMARTY_DIR.'Smarty.class.php');

class Controller {

	protected $_action;
	protected $mdl;
	
	protected $tpl;
	protected $xajax;

	function __construct($model, $action) {
		
			/** Controller properties **/
		$this->_action = $action;
		$this->mdl = new $model();	
		
			/** XAJAX **/
		$this->xajax = new xajax();
		
			/** TPL SMARTY**/
		$this->tpl = new Smarty();
		$this->tpl->caching = FALSE;
		$this->tpl->setTemplateDir(TPL_DIR);
		$this->tpl->setCompileDir(TMP_DIR.'tpl_c'.DS);
		$this->tpl->setConfigDir(CFG_DIR);
		$this->tpl->setCacheDir(CACHE_DIR);
		
	}
}