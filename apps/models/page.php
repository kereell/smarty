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
			
			$this->sth = $this->dbh->prepare('SELECT * FROM `users`');
			$this->sth->execute();
			$this->sth->setFetchMode(PDO::FETCH_ASSOC);
			
		} catch (PDOException $e){
				
				throw new dbExeption($e);
				
			}
		
		return $this->sth->fetchAll();
		
	}
	

	public function getUser($id){
		
		try{
			
			$this->sth = $this->dbh->prepare('SELECT `login`, `name`, `lastname`, `email`, 
					DATE_FORMAT(`birthday`, "%d-%m-%Y") AS `birthday` FROM `users` WHERE `id`=:id');
			
			$this->sth->bindParam(':id', $id, PDO::PARAM_INT);
			
			$this->sth->execute();
			
			$this->sth->setFetchMode(PDO::FETCH_ASSOC);
			
		} catch (PDOException $e){
			
				throw new dbExeption($e);
				
			}
		
		return $this->sth->fetch();
		
	}
	
	public function setUser($data){
		
		try{
			
			$this->sth = $this->dbh->prepare('INSERT INTO `users` (`login`, `name`, `lastname`, 
					`email`, `pass`, `birthday`) VALUES (:login, :name, :lastname, :email, :pass, :birthday)');
			
			$this->sth->bindParam(':login', $this->validLogin($data['login']), PDO::PARAM_STR);
			$this->sth->bindParam(':name', $this->validName($data['name']), PDO::PARAM_STR);
			$this->sth->bindParam(':lastname', $this->validName($data['lastname']), PDO::PARAM_STR);
			$this->sth->bindParam(':email', $this->validEmail($data['email']), PDO::PARAM_STR);
			$this->sth->bindParam(':pass', $this->validPasswd($data['pass']));
			$this->sth->bindParam(':birthday', $this->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$this->sth->execute();
		
		} catch (PDOException $e){

			throw new dbExeption($e);
		
		}
		
		return $this->dbh->lastInsertId();
		
	}
	
	public function editUser($id, $data){
		
		try{
			
			$this->sth = $this->dbh->prepare('UPDATE `users` SET `login`=:login, `name`=:name, 
					`lastname`=:lastname, `email`=:email, `pass`=:pass, `birthday`=:birthday WHERE `id`=:id');
			
			$this->sth->bindParam(':id', $id, PDO::PARAM_INT);
			$this->sth->bindParam(':login', $this->validLogin($data['login']), PDO::PARAM_STR);
			$this->sth->bindParam(':name', $this->validName($data['name']), PDO::PARAM_STR);
			$this->sth->bindParam(':lastname', $this->validName($data['lastname']), PDO::PARAM_STR);
			$this->sth->bindParam(':email', $this->validEmail($data['email']), PDO::PARAM_STR);
			$this->sth->bindParam(':pass', $this->validPasswd($data['pass']));
			$this->sth->bindParam(':birthday', $this->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$affected = $this->sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $affected;
	}
	
	public function removeUser($id){
		
		try {
			
			$this->sth = $this->dbh->prepare('DELETE FROM `users` WHERE `id`=:id');
			
			$this->sth->bindParam(':id', $id, PDO::PARAM_INT);
			
			$affected = $this->sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
	
		return $affected;
		
	}
	
	private function validLogin($login){
		
		try{	
			
			if ($this->isExist('login', $login)){	
	
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
			
			$this->sth = $this->dbh->prepare('SELECT `id` FROM `users` WHERE `'.$col.'` = :value');
			
			$this->sth->bindParam(':value', $val, PDO::PARAM_STR);
			
			$this->sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $this->sth->rowCount();
		
	}
	
}