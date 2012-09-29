<?php

class DbExeption extends Exception {
	
	public function __construct($e){
		
		exit('DB Exeption: '.$e->getMessage());
		
	}
	
}