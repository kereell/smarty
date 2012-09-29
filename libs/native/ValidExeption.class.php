<?php

class ValidExeption extends Exception {
	
	protected $message;
	
	public function __construct($type, $msg=''){
		
		$this->getError($type);		
		
		exit('Validation exeption: '.$this->message);
		
		
	}
	private function getError($type){
		
		switch ($type){
			
			case 'login_empty':
				$this->message = 'Login can NOT be empty!';
				break;
			case 'login_restricted':
				$this->message = 'Login can contain only alphanumeric latin symbols, "_", "@", "-" or "$"! 
						Other symbols are restricted! 
						Also it should be ONE word (maximum 20 characters)!';
				break;
			case 'login_exists':
				$this->message = 'Such login already taken!';
				break;
				
			case 'name_empty':
				$this->message = 'Name or Lastname can NOT be empty!';
				break;
			case 'name_restricted':
				$this->message = 'Name or Lastname should contain only latin letters. 
						Other symbols or numbers are restricted! 
						Also it should be ONE word (maximum 20 characters)!';
				break;
			case 'name_equal_lastname':
				$this->message = 'Name and Lastname can NOT be the same!';
				break;
				
			case 'email_empty':
				$this->message = 'Email can NOT be empty!';
				break;
			case 'email_restricted':
				$this->message = 'Email is not valid (maybe contains some crap...)! 
						It should look like "email@domain.com"!';
				break;
			case 'email_exists':
				$this->message = 'Such email already taken!';
				break;
				
			case 'birth_empty':
				$this->message = 'Birthday can NOT be empty!';
				break;
			case 'bitrh_restricted':
				$this->message = 'Birthday must be in a format "dd-mm-yyyy"! 
						It should NOT contain any latters or characters exept "-"!';
				break;
				
			case 'passwd_empty':
				$this->message = '"Password" field or "Re-Enter Password" field can NOT be empty!';
				break;
			case 'passwd_not_equal_rePasswd':
				$this->message = '"Password" field and "Re-Enter Password" should be equal!';
				break;
				
			case 'id_not_exists':
				$this->message = '"Password" field and "Re-Enter Password" should be equal!';
				break;
			case 'E456':
				$this->message = 'Entry can NOT be removed! Error code: E456!';
				break;
		}
		
	} 
}