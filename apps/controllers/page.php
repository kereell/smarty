<?php

class PageController extends Controller{
	
	public function index(){

			/** Getting Data **/
 		$users = $this->mdl->getAllUsers();
 			

 			/** TPL DATA **/
 		$this->tpl->assign('title', 'List of Users');
 		$this->tpl->assign('meta_keys', 'List of Users:: Meta Keys');
 		$this->tpl->assign('meta_desc', 'List of Users:: Description');
 		$this->tpl->assign('users', $users);
 		$this->tpl->assign('dellMethod', '/smarty/page/_processDeleteRecord');
 		$this->tpl->display('page.tpl.php');
		
	}
	

	public function openAddRecord(){
		
			/** TPL DATA **/
 		$this->tpl->assign('title', 'Add User');
 		$this->tpl->assign('meta_keys', 'Add User:: Meta Keys');
 		$this->tpl->assign('meta_desc', 'Add User:: Description');
 		$this->tpl->assign('login', '');
 		$this->tpl->assign('name', '');
 		$this->tpl->assign('lastname', '');
 		$this->tpl->assign('email', '');
 		$this->tpl->assign('birthday', '');
 		$this->tpl->assign('actMethod', '/smarty/page/_processAddRecord');
		$this->tpl->assign('sBtnVal', 'Add Record');	
		$this->tpl->display('add_edit_table.tpl.php');

	}
	
	public function openEditRecord(){
		
			/** Getting Data **/
		$user = $this->mdl->getUser($this->_params['id']);
		
			/** TPL DATA **/
 		$this->tpl->assign('title', 'Edit User');
 		$this->tpl->assign('meta_keys', 'Edit User:: Meta Keys');
 		$this->tpl->assign('meta_desc', 'Edit User:: Description');
 		$this->tpl->assign('login', $user['login']);
 		$this->tpl->assign('name', $user['name']);
 		$this->tpl->assign('lastname', $user['lastname']);
 		$this->tpl->assign('email', $user['email']);
 		$this->tpl->assign('birthday', $user['birthday']);
 		$this->tpl->assign('actMethod', '/smarty/page/_processEditRecord?id='.$this->_params['id']);
		$this->tpl->assign('sBtnVal', 'Edit Record');	
		$this->tpl->display('add_edit_table.tpl.php');
	
	}
	
	public function _processAddRecord(){
		
		$added = $this->mdl->setUser($_POST);
		
		$this->_redirect('/smarty/page');
		
		
	}
	
	public function _processEditRecord(){
		
		$affected = $this->mdl->editUser($this->_params['id'], $_POST);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _processDeleteRecord(){
		
		$affected = $this->mdl->removeUser($this->_params['id']);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _buildTable(){
		
	}
	
	public function test(){

		echo "<pre>";
		print_r(parse_url($_SERVER['REQUEST_URI']));
		echo "</pre>";
		/** TPL DATA **/
	//	$this->tpl->display('test.tpl.php');
		
	}
	
	private function _redirect($addr){
		
		header('Location:'.$addr);
		
	}
}
