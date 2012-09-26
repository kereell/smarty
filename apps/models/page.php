<?php
class PageModel extends dBase {
	
	public function __construct($db_host,$db_user,$db_pass,$db_name) {
		
		if (get_cfg_var('zend_developer_cloud.db.host')){		
			parent::__construct(get_cfg_var('zend_developer_cloud.db.host'), 
					get_cfg_var('zend_developer_cloud.db.username'), 
					get_cfg_var('zend_developer_cloud.db.password'), 
					get_cfg_var('zend_developer_cloud.db.name'));
		} else {
				parent::__construct($db_host, $db_user, $db_pass, $db_name);
			}
		
	}
	
	public function getAllUsers(){
		
		$this->getAllData('users');
		
		return $this->getResArr();
		
	}
	
}