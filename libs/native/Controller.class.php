<?php

class Controller {

	protected $_action;
	protected $mdl;
	protected $tpl;

	function __construct($model, $action) {
		
			/** Controller properties **/
		$this->_action = $action;
		$this->mdl = new $model();	
		
			/** TPL SMARTY**/
		$this->tpl = new Smarty();
		$this->tpl->caching = FALSE;
		$this->tpl->setTemplateDir(TPL_DIR);
		$this->tpl->setCompileDir(TMP_DIR.'tpl_c'.DS);
		$this->tpl->setConfigDir(CFG_DIR);
		$this->tpl->setCacheDir(CACHE_DIR);
		
	}
}