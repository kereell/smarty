<?php

class Model{
	
	protected $dbh;
	
	protected $db_dsn;
	protected $db_user;
	protected $db_passwd;
	protected $db_opts;
	
	public function __construct($db_name, $db_host, $db_user, $db_passwd, array $db_opts=array()){
		
		$this->db_dsn = sprintf('mysql:dbname=%s;host=%s',$db_name,$db_host);
		$this->db_user = $db_user;
		$this->db_passwd = $db_passwd;
		$this->db_opts = $db_opts;
		
		try{				
			$this->dbh = new PDO($this->db_dsn, $this->db_user, $this->db_passwd,$this->db_opts);
			
			if(DEVELOPER_MODE){
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} else {
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			}
			
			} catch (PDOException $e){
				
				throw new dbExeption($e);
				
			}		
	
		}
	
	public function __destruct(){

		$this->dbh = NULL;
		
		unset($this->db_dsn);
		unset($this->db_user);
		unset($this->db_passwd);
		unset($this->db_opts);
		
	}
}
