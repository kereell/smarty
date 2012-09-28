<?php

class PageModel extends dbConnect {
	
	public function __construct() {

		if (get_cfg_var('zend_developer_cloud.db.host')){
					
			parent::__construct(get_cfg_var('zend_developer_cloud.db.name'),
					get_cfg_var('zend_developer_cloud.db.host'), 
					get_cfg_var('zend_developer_cloud.db.username'),
					get_cfg_var('zend_developer_cloud.db.password'),
					array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
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
		
		$userValidate = new UserValidate();
		
		try{
			
			$sth = $this->dbh->prepare('INSERT INTO `users` (`login`, `name`, `lastname`, 
					`email`, `pass`, `birthday`) VALUES (:login, :name, :lastname, :email, :pass, :birthday)');
			
			$sth->bindParam(':login', $userValidate->validLogin($data['login']), PDO::PARAM_STR);
			$sth->bindParam(':name', $userValidate->validName($data['name'], $data['lastname']), PDO::PARAM_STR);
			$sth->bindParam(':lastname', $userValidate->validName($data['lastname'], $data['name']), PDO::PARAM_STR);
			$sth->bindParam(':email', $userValidate->validEmail($data['email']), PDO::PARAM_STR);
			$sth->bindParam(':pass', $userValidate->validPasswd($data['pass'], $data['rePass']));
			$sth->bindParam(':birthday', $userValidate->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$sth->execute();
		
		} catch (PDOException $e){

			throw new dbExeption($e);
		
		}
		
		return $this->dbh->lastInsertId();
		
	}
	
	public function editUser($id, $data){
		
		$userValidate = new UserValidate();
		
		try{
			
			$sth = $this->dbh->prepare('UPDATE `users` SET `login`=:login, `name`=:name, 
					`lastname`=:lastname, `email`=:email, `pass`=:pass, `birthday`=:birthday WHERE `id`=:id');
			
			$sth->bindParam(':id', $id, PDO::PARAM_INT);
			$sth->bindParam(':login', $userValidate->validLogin($data['login']), PDO::PARAM_STR);
			$sth->bindParam(':name', $userValidate->validName($data['name'], $data['lastname']), PDO::PARAM_STR);
			$sth->bindParam(':lastname', $userValidate->validName($data['lastname'], $data['name']), PDO::PARAM_STR);
			$sth->bindParam(':email', $userValidate->validEmail($data['email']), PDO::PARAM_STR);
			$sth->bindParam(':pass', $userValidate->validPasswd($data['pass'], $data['rePass']));
			$sth->bindParam(':birthday', $userValidate->validBirth($data['birthday']), PDO::PARAM_STR);
			
			$affected = $sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $affected;
	}
	
	public function removeUser($id){
		
		$userValidate = new UserValidate();
		
		try {
			
			$sth = $this->dbh->prepare('DELETE FROM `users` WHERE `id`=:id');
			
			$sth->bindParam(':id', $userValidate->validRemove($id), PDO::PARAM_INT);
			
			$affected = $sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
	
		return $affected;
		
	}
	
	public function isExist($col, $val){
	
		try{
			
			$sth = $this->dbh->prepare('SELECT `id` FROM `users` WHERE `'.$col.'`=:value');
			
			$sth->bindParam(':value', $val, PDO::PARAM_STR);
			
			$sth->execute();
			
		} catch (PDOException $e){
			
			throw new dbExeption($e);
			
		}
		
		return $sth->rowCount();
		
	}
	
}