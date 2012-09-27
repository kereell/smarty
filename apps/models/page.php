<?php

class PageModel extends dbConnect {
	
	public function __construct() {

		if (get_cfg_var('zend_developer_cloud.db.host')){
					
			parent::__construct(get_cfg_var('zend_developer_cloud.db.name'),
					get_cfg_var('zend_developer_cloud.db.host'), 
					get_cfg_var('zend_developer_cloud.db.username'),
					get_cfg_var('zend_developer_cloud.db.password'));
	} else {
			
			parent::__construct(DB_NAME, DB_HOST, DB_USER, DB_PASSWD);
			
		}
		
	}
	
	public function getAllUsers(){
		
		try{
			
			$sth = $this->dbh->prepare('SELECT * FROM `users`');
			$sth->execute();
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
		} catch (PDOException $e){
				
				throw new dbExeption($e);
				
			}
		
		return $sth->fetchAll();
		
	}
	

	public function getUser($id){
		
		try{
			
			$sth = $this->dbh->prepare('SELECT `login`, `name`, `lastname`, `email`, 
					DATE_FORMAT(`birthday`, "%d-%m-%Y") AS `birthday` FROM `users` WHERE `id`=:id');
			
			$sth->bindParam(':id', $id, PDO::PARAM_INT);
			
			$sth->execute();
			
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
		} catch (PDOException $e){
			
				throw new dbExeption($e);
				
			}
		
		return $sth->fetch();
		
	}
	
	public function setUser($data){
		
		try{
			
			$sth = $this->dbh->prepare('INSERT INTO `users` (`login`, `name`, `lastname`, 
					`email`, `pass`, `birthday`) VALUES (:login, :name, :lastname, :email, :pass, :birthday)');
			
			$sth->bindParam(':login', $this->validLogin($data['login']), PDO::PARAM_STR);
			$sth->bindParam(':name', $this->validName($data['name']), PDO::PARAM_STR);
			$sth->bindParam(':lastname', $this->validName($data['lastname']), PDO::PARAM_STR);
			$sth->bindParam(':email', $this->validEmail($data['email']), PDO::PARAM_STR);
			$sth->bindParam(':pass', $this->validPasswd($data['pass']));
			$sth->bindParam(':birthday', $this->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$sth->execute();
		
		} catch (PDOException $e){

			throw new dbExeption($e);
		
		}
		
		return $this->dbh->lastInsertId();
		
	}
	
	public function editUser($id, $data){
		
		try{
			
			$sth = $this->dbh->prepare('UPDATE `users` SET `login`=:login, `name`=:name, 
					`lastname`=:lastname, `email`=:email, `pass`=:pass, `birthday`=:birthday WHERE `id`=:id');
			
			$sth->bindParam(':id', $id, PDO::PARAM_INT);
			$sth->bindParam(':login', $this->validLogin($data['login']), PDO::PARAM_STR);
			$sth->bindParam(':name', $this->validName($data['name']), PDO::PARAM_STR);
			$sth->bindParam(':lastname', $this->validName($data['lastname']), PDO::PARAM_STR);
			$sth->bindParam(':email', $this->validEmail($data['email']), PDO::PARAM_STR);
			$sth->bindParam(':pass', $this->validPasswd($data['pass']));
			$sth->bindParam(':birthday', $this->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$affected = $sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $affected;
	}
	
	public function removeUser($id){
		
		try {
			
			$sth = $this->dbh->prepare('DELETE FROM `users` WHERE `id`=:id');
			
			$sth->bindParam(':id', $id, PDO::PARAM_INT);
			
			$affected = $sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
	
		return $affected;
		
	}
	
	private function validLogin($login){
		
		try{

			if(!preg_match('/[a-zA-Z0-9\_\@\-]+/i', $login)){
				
				throw new validExeption('Login can contain only alphanumeric latin symbols, "_", "@" and "-". 
						Other symbols are restricted');
				
			}elseif ($this->isExist('login', $login)){	
	
					throw new validExeption('Login Exists');
		 	}	 	
				
		} catch (validExeption $e){
			
			
		}
			
		return $login;
	
	}
	
	private function validName($name){
		
		return $name;
	
	}
	
	private function validEmail($email){
		
		return $email;
		
	}
	
	private function validBirth($birth){
	
		return $birth;
		
	}
	
	private function validPasswd($passwd){
		
		return $passwd;
	
	}
	
	private function isExist($col, $val){
	
		try{
			
			$sth = $this->dbh->prepare('SELECT id FROM `users` WHERE :column=:value');
			
			$sth->bindParam(':column', $col, PDO::PARAM_STR);
			$sth->bindParam(':value', $val, PDO::PARAM_STR);
			
			$sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $sth->rowCount();
		
	}
	
}