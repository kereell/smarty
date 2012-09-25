<?php
require_once(ROOT.DS.'libraries'.DS.'smarty'.DS.'Smarty.class.php');

class SmrtSetup extends Smarty{
	
	public function __construct(){

		parent::__construct();
		$this->setTemplateDir(ROOT.DS.'apps'.DS.'views'.DS);
		$this->setCompileDir(ROOT.DS.'tmp'.DS.'tpl_c'.DS);
		$this->setCompileDir(ROOT.DS.'etc'.DS);
		$this->setCompileDir(ROOT.DS.'tmp'.DS.'cache'.DS);
		
		}	
	}