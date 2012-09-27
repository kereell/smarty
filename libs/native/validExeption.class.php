<?php

class validExeption extends Exception {
	
	public function __construct($e){
		
		exit('Validation exeption: '.$e);
		
	}
	
}