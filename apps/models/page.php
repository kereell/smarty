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
	
<<<<<<< HEAD
	public function getUser($id){
		
		$tbl = 'users';
		$flds = '`login`, `name`, `lastname`, `email`, DATE_FORMAT(`birthday`, "%d-%m-%Y") AS `birthday`';
		$cnd = 'WHERE `id` = "'.$id.'"';
		
		$this->getData($tbl, $flds, $cnd);
		
		return $this->getResRow();
		
	}
	
	public function setUser($vals){
		
		$ins_id = $this->setData('users', $vals);
		
		return $ins_id;
		
	}
	
	public function editUser($id, $vals){
		
		$affected = $this->editData('users', $vals, 'WHERE `id` = "'.$id.'"');
		
		return $affected;
		
		
	}
	
	public function removeUser($id){
		
		$affected = $this->removeData('users', 'WHERE `id` = "'.$id.'"');
	
		return $affected;
	
	
	}
	
=======
>>>>>>> branch 'master' of https://github.com/kereell/smarty.git
}
