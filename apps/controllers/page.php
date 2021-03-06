<?php

class PageController extends Controller{
	
	public function index($cp=1, $pp=5){

		$rows = $this->mdl->getCountRows();
			
			/** Pagination **/ 
		$paginator = new Pagination($rows, $cp, $pp);
		$offset = $paginator->count_offset();
		$prev_page = $paginator->previous();
		$next_page = $paginator->next();
		$limit = $paginator->per_page;
		$pages = $paginator->pages;
			
			/** Getting Data **/
 		$users = $this->mdl->getAllUsers($offset, $limit);
 			
 			/** TPL DATA **/
 		$this->tpl->assign('title', 'List of Users');
 		$this->tpl->assign('meta_keys', 'List of Users :: Meta Keys');
 		$this->tpl->assign('meta_desc', 'List of Users :: Description');
 		$this->tpl->assign('users', $users);
 		$this->tpl->assign('pages', $pages);
 		$this->tpl->assign('pp_arr', array(1,2,3,4));
 		$this->tpl->assign('prev_page', $prev_page);
 		$this->tpl->assign('next_page', $next_page);
 		$this->tpl->assign('dellMethod', '/smarty/page/_processDeleteRecord');
 		$this->tpl->display('page.tpl.php');
		
	}
	

	public function openAddRecord(){
		
			/** TPL DATA **/
 		$this->tpl->assign('title', 'Add User');
 		$this->tpl->assign('meta_keys', 'Add User :: Meta Keys');
 		$this->tpl->assign('meta_desc', 'Add User :: Description');
 		$this->tpl->assign('login', '');
 		$this->tpl->assign('name', '');
 		$this->tpl->assign('lastname', '');
 		$this->tpl->assign('email', '');
 		$this->tpl->assign('birthday', '');
 		$this->tpl->assign('actMethod', '/smarty/page/_processAddRecord');
		$this->tpl->assign('sBtnVal', 'Add Record');	
		$this->tpl->display('add_edit_table.tpl.php');

	}
	
	public function openEditRecord($id){
		
			/** Getting Data **/
		$user = $this->mdl->getUser($id);
		
			/** TPL DATA **/
 		$this->tpl->assign('title', 'Edit User');
 		$this->tpl->assign('meta_keys', 'Edit User :: Meta Keys');
 		$this->tpl->assign('meta_desc', 'Edit User :: Description');
 		$this->tpl->assign('login', $user['login']);
 		$this->tpl->assign('name', $user['name']);
 		$this->tpl->assign('lastname', $user['lastname']);
 		$this->tpl->assign('email', $user['email']);
 		$this->tpl->assign('birthday', $user['birthday']);
 		$this->tpl->assign('actMethod', '/smarty/page/_processEditRecord?id='.$id);
		$this->tpl->assign('sBtnVal', 'Edit Record');	
		$this->tpl->display('add_edit_table.tpl.php');
	
	}
	
	public function _processAddRecord(){
		
		$added = $this->mdl->setUser($_POST);
		
		$this->_redirect('/smarty/page');
		
		
	}
	
	public function _processEditRecord($id){
		
		$affected = $this->mdl->editUser($id, $_POST);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _processDeleteRecord($id){
		
		$affected = $this->mdl->removeUser($id);
		
		$this->_redirect('/smarty/page');
		
	}
	
	public function _buildTable(){
		
	}
	
	public function test(){
		
		
		$this->xajax->registerFunction('myFunction');
		
	function myFunction($arg){
// do some stuff based on $arg like query data from a database and
// put it into a variable like $newContent
$newContent = "Value of \$arg: ".$arg;
// Instantiate the xajaxResponse object
$objResponse = new xajaxResponse();
 // add a command to the response to assign the innerHTML attribute of
 // the element with id="SomeElementId" to whatever the new content is
 $objResponse->assign("some","innerHTML", $newContent); 
 //return the�  xajaxResponse object
 return $objResponse;
}

$this->xajax->processRequest();

//$this->xajax->configure('debug', true);
$this->xajax->configure('javascript URI', XAJAX_DIR);
$this->xajax->printJavascript();

echo '<div id="some">&nbsp;</div>';
echo '<form name="frm" action="" method="post" /><br />';
echo '<input type="text" id="test" name="nameTest" /><br />';
echo '<input type="button" value="BURN IT!" onclick="xajax_myFunction(\'It worked!\')" />';




		echo "<pre>";
//		echo ini_get('register_globals') ? 'true' : 'false';
//		print_r($_GET);
		echo "</pre>";
		/** TPL DATA **/
///		$this->tpl->display('test.tpl.php');
		
	}
	
	private function _redirect($addr){
		
		header('Location:'.$addr);
		
	}
}
