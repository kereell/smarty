<?php

class dbConnect{
	
	protected $dbh;
	
	protected $db_dsn;
	protected $db_user;
	protected $db_passwd;
	protected $db_opts;
	
	public function __construct($db_name, $db_host, $db_user, $db_passwd, $db_opts=''){
		
		$this->db_dsn = sprintf('mysql:dbname=%s;host=%s',$db_name,$db_host);
		$this->db_user = $db_user;
		$this->db_passwd = $db_passwd;
		$this->db_opts = $db_opts;
		
		try{				
			$this->dbh = new PDO($this->db_dsn, $this->db_user, $this->db_passwd);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			} catch (PDOException $e){
				
				throw new dbExeption($e);
				
			}		
	
		}
	
	public function __destruct(){

		unset($this->dbh);
		
		unset($this->db_dsn);
		unset($this->db_user);
		unset($this->db_passwd);
		unset($this->db_opts);
		
	}
}
