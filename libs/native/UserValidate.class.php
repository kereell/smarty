<?php

class UserValidate {
	
	protected $userData; 
	
	public function __construct(){
		
		 $this->userData = new PageMdl();
		
	}
	
	public function validLogin($login,$uniq=FALSE,$id=NULL){
	
		if(!$login){
			throw new ValidExeption('login_empty');
		} elseif(!preg_match('/^[a-z0-9\_\@\-\$]{1,20}$/si', $login)){
			throw new ValidExeption('login_restricted');
		} elseif ($uniq && $this->userData->isExist('login', $login)){
			throw new ValidExeption('login_exists');
		} 
	
		return $login;
	}
	
	public function validName($name, $lastname){
	
		if(!$name){
			throw new ValidExeption('name_empty');
		} elseif(!preg_match('/^[a-z]{1,20}$/si', $name)){
			throw new ValidExeption('name_restricted');
		} elseif ($name==$lastname){
			throw new ValidExeption('name_equal_lastname');
		}
	
		return ucfirst(strtolower($name));
	}
	
	public function validEmail($email,$uniq=FALSE){
	
		if(!$email){
			throw new ValidExeption('email_empty');
		} elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			throw new ValidExeption('email_restricted');
		} elseif ($uniq && $this->userData->isExist('email', $email)){
			throw new ValidExeption('email_exists');
		}
	
		return $email;
	}
	
	public function validPasswd($passwd, $rePasswd){
	
		if(!($passwd || $rePasswd)){
			throw new ValidExeption('passwd_empty');
		} elseif ($passwd!=$rePasswd){
			throw new ValidExeption('passwd_not_equal_rePasswd');
		}
			
		return md5($rePasswd);
	}
	
	public function validBirth($birth){
	
		if(!$birth){
			throw new ValidExeption('birth_empty');
		} elseif(!preg_match('/^\d{2}\-\d{2}\-\d{4}$/s', $birth)){
			throw new ValidExeption('bitrh_restricted');
		}
		
		return implode('-', array_reverse(explode('-', $birth)));
	}
	
	public function validRemove($id){
		
		if(!$this->userData->isExist('id', $id)){
			throw new ValidExeption('id_not_exists');
		} elseif ($id < 10) {
			throw new ValidExeption('E456');
		}
		
		return $id;
	}
	
}