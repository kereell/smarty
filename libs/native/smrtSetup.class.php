<?php
require_once(SMARTY_DIR.'Smarty.class.php');

class smrtSetup extends Smarty{
	
	public function __construct(){

		parent::__construct();
		
		$this->setTemplateDir(TPL_DIR);
		$this->setCompileDir(TMP_DIR.'tpl_c'.DS);
		$this->setConfigDir(CFG_DIR);
		$this->setCacheDir(CACHE_DIR);
		
		}	
	}