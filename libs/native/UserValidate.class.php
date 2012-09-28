<?php

class UserValidate {
	
	protected $userData; 
	
	public function __construct(){
		
		 $this->userData = new PageModel();
		
	}
	
	public function validLogin($login){
	
		if(!$login){
				
			throw new validExeption('login_empty');
				
		} elseif(!preg_match('/^[a-z0-9\_\@\-\$]{1,20}$/si', $login)){
				
			throw new validExeption('login_restricted');
				
		} elseif ($this->userData->isExist('login', $login)){
	
			throw new validExeption('login_exists');
		}
	
		return $login;
	
	}
	
	public function validName($name, $lastname){
	
		if(!$name){
	
			throw new validExeption('name_empty');
	
		} elseif(!preg_match('/^[a-z]{1,20}$/si', $name)){
	
			throw new validExeption('name_restricted');
	
		} elseif ($name==$lastname){
				
			throw new validExeption('name_equal_lastname');
				
		}
	
		return ucfirst($name);
	
	}
	
	public function validEmail($email){
	
		if(!$email){
	
			throw new validExeption('email_empty');
	
		} elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	
			throw new validExeption('email_restricted');
	
		} elseif ($this->userData->isExist('email', $email)){
	
			throw new validExeption('email_exists');
		}
	
		return $email;
	
	}
	
	public function validPasswd($passwd, $rePasswd){
	
		if(!($passwd || $rePasswd)){
	
			throw new validExeption('passwd_empty');
	
		} elseif ($passwd!=$rePasswd){
				
			throw new validExeption('passwd_not_equal_rePasswd');
				
		}
	
		$crypted = md5($rePasswd);
			
		return $crypted;
	
	}
	
	public function validBirth($birth){
	
		if(!$birth){
	
			throw new validExeption('birth_empty');
	
		} elseif(!preg_match('/^\d{2}\-\d{2}\-\d{4}$/s', $birth)){
	
			throw new validExeption('bitrh_restricted');
	
		}
	
		$birthday = implode('-', array_reverse(explode('-', $birth)));
	
		return $birthday;
	
	}
	
	public function validRemove($id){
		
		if(!$this->userData->isExist('id', $id)){
			
			throw new validExeption('id_not_exists');
			
		} elseif ($id < 10) {
			
			throw new validExeption('E456');
			
		}
		
		return $id;
		
	}
	
}