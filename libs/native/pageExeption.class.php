<?php
class pageExeption extends Exception{
	
	public function __construct($e){
		exit('Page Exeption: '.$e);
	}
	
}