<?php
class PageModel extends dBase {
	
	public function __construct() {
		
		parent::__construct(get_cfg_var('zend_developer_cloud.db.host'), 
				get_cfg_var('zend_developer_cloud.db.username'), 
				get_cfg_var('zend_developer_cloud.db.password'), 
				get_cfg_var('zend_developer_cloud.db.name'));
		
		}
	
	public function getAllUsers(){
		
		$this->getAllData('users');
		
		return $this->getResArr();
		
	}
		/* $dsn = sprintf(
				'mysql:dbname=%s;host=%s',
				get_cfg_var('zend_developer_cloud.db.name'),
				get_cfg_var('zend_developer_cloud.db.host')
		);
		
		$db = new PDO(
				$dsn,
				get_cfg_var('zend_developer_cloud.db.username'),
				get_cfg_var('zend_developer_cloud.db.password')
		); */
	
	}