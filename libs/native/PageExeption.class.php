<?php
class PageExeption extends Exception{
	
	public function __construct($e){
		exit('Page Exeption: '.$e);
	}
	
}