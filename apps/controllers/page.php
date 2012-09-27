<?php

class PageController extends controller{
	
	public function index(){

			/** Getting Data **/
 		$users = $this->model->getAllUsers();
 			

 			/** TPL DATA **/
 		$this->smarty->assign('title', 'List of Users');
 		$this->smarty->assign('meta_keys', 'List of Users:: Meta Keys');
 		$this->smarty->assign('meta_desc', 'List of Users:: Description');
 		$this->smarty->assign('users', $users);
 		$this->smarty->assign('dellMethod', '/smarty/page/_processDeleteRecord');
 		$this->smarty->display('page.tpl.php');
		
	}
	

	public function openAddRecord(){
		
			/** TPL DATA **/
 		$this->smarty->assign('title', 'Add User');
 		$this->smarty->assign('meta_keys', 'Add User:: Meta Keys');
 		$this->smarty->assign('meta_desc', 'Add User:: Description');
 		$this->smarty->assign('login', '');
 		$this->smarty->assign('name', '');
 		$this->smarty->assign('lastname', '');
 		$this->smarty->assign('email', '');
 		$this->smarty->assign('birthday', '');
 		$this->smarty->assign('actMethod', '/smarty/page/_processAddRecord');
		$this->smarty->assign('sBtnVal', 'Add Record');	
		$this->smarty->display('add_edit_table.tpl.php');

	}
	
	
	public function openEditRecord(){
		
			/** Getting Data **/
		$user = $this->model->getUser($this->_params['id']);
		
			/** TPL DATA **/
 		$this->smarty->assign('title', 'Edit User');
 		$this->smarty->assign('meta_keys', 'Edit User:: Meta Keys');
 		$this->smarty->assign('meta_desc', 'Edit User:: Description');
 		$this->smarty->assign('login', $user['login']);
 		$this->smarty->assign('name', $user['name']);
 		$this->smarty->assign('lastname', $user['lastname']);
 		$this->smarty->assign('email', $user['email']);
 		$this->smarty->assign('birthday', $user['birthday']);
 		$this->smarty->assign('actMethod', '/smarty/page/_processEditRecord?id='.$this->_params['id']);
		$this->smarty->assign('sBtnVal', 'Edit Record');	
		$this->smarty->display('add_edit_table.tpl.php');
	
	}
	
	public function _processAddRecord(){
		
		$vals = array(
				'login' => $_POST['login'],
				'name' => $_POST['name'],
				'lastname' => $_POST['lastname'],
				'email' => $_POST['email'],
				'pass' => md5($_POST['rePass']),
				'birthday' => implode('-', array_reverse(explode('-', $_POST['birthday'])))
				);
		
		$added = $this->model->setUser($vals);
		
		$this->_redirect('/smarty/page');
		
		
	}
	
	public function _processEditRecord(){
		
		$vals = array(
				'login' => $_POST['login'],
				'name' => $_POST['name'],
				'lastname' => $_POST['lastname'],
				'email' => $_POST['email'],
				'pass' => md5($_POST['rePass']),
				'birthday' => implode('-', array_reverse(explode('-', $_POST['birthday'])))
		);
		
		$affected = $this->model->editUser($this->_params['id'], $vals);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _processDeleteRecord(){
		
		$affected = $this->model->removeUser($this->_params['id']);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _buildTable(){
		
	}
	
	public function test(){

		echo "<pre>";
		print_r($_SERVER);
		echo "</pre>";
		/** TPL DATA **/
	//	$this->smarty->display('test.tpl.php');
		
	}
	
	private function _redirect($addr){
		
		header('Location:'.$addr);
		
	}
}
