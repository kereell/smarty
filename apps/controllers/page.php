<?php

class PageController{

	
	protected $model;
	protected $params = array();
	
	public function __constructor($params){
		$this->params = $params;
	}
	
	public function index(){

			/** Getting Data **/
 		$page = new PageModel(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 		$users = $page->getAllUsers();
 			
 			
 			/** Tpl Data **/
		$smarty = new SmrtSetup();
		$smarty->caching = FALSE;
 		$smarty->assign('title', 'List of Users');
 		$smarty->assign('meta_keys', 'List of Users:: Meta Keys');
 		$smarty->assign('meta_desc', 'List of Users:: Description');
 		$smarty->assign('users', $users);
 		$smarty->display('page.tpl.php');
 		
		
	}
	
	public function add(){
	
		$smarty = new SmrtSetup();
		$smarty->caching = FALSE;
 		$smarty->assign('title', 'Add User');
 		$smarty->assign('meta_keys', 'Add User:: Meta Keys');
 		$smarty->assign('meta_desc', 'Add User:: Description');
		
		$smarty->display('add_edit_table.tpl.php');
	
	}
	
	public function edit(){
	
		$smarty = new SmrtSetup();
		$smarty->caching = FALSE;
 		$smarty->assign('title', 'Edit User');
 		$smarty->assign('meta_keys', 'Edit User:: Meta Keys');
 		$smarty->assign('meta_desc', 'Edit User:: Description');
		
		$smarty->display('add_edit_table.tpl.php');
	
	}
	
	public function processAddRecord(){
		
	}
	
	public function processEditRecord(){
		
	}
	
	public function buildTable(){
		
	}
	
	public function test(){
		
		$smarty = new SmrtSetup();
		$smarty->display('test.tpl.php');
		
	}
}
	