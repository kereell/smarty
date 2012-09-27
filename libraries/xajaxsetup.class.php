<?php
require_once(ROOT.DS.'libraries'.DS.'xajax'.DS.'xajax_core'.DS.'xajax.inc.php');

class XajaxSetup {
	
	protected $xajax;
	
	public function __constructor(){
		
		$this->xajax = new xajax();
		
	}
	
}
