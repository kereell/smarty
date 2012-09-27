<?php
require_once(SMARTY_DIR.'Smarty.class.php');

class smrtSetup extends Smarty{
	
	public function __construct(){

		parent::__construct();
		$this->setTemplateDir(ROOT.DS.'apps'.DS.'views'.DS);
		$this->setCompileDir(ROOT.DS.'tmp'.DS.'tpl_c'.DS);
		$this->setCompileDir(ROOT.DS.'etc'.DS);
		$this->setCompileDir(ROOT.DS.'tmp'.DS.'cache'.DS);
		
		}	
	}