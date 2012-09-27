<?php

class dbExeption extends Exception {
	
	public function __construct($e){
		
		exit('DB Exeption: '.$e->getMessage());
		
	}
	
}