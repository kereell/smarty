<?php /* Smarty version Smarty-3.1.11, created on 2012-09-26 02:33:43
         compiled from "D:\Stuff\www\smarty\smarty\apps\views\page.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:3923506208d811f9c3-21542093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92bb49c2e470a4a13121062fa10a9125c053d806' => 
    array (
      0 => 'D:\\Stuff\\www\\smarty\\smarty\\apps\\views\\page.tpl.php',
      1 => 1348615102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3923506208d811f9c3-21542093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506208d931f9f6_76256234',
  'variables' => 
  array (
    'title' => 0,
    'meta_keys' => 0,
    'meta_desc' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506208d931f9f6_76256234')) {function content_506208d931f9f6_76256234($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'D:\\Stuff\\www\\smarty\\smarty\\libraries\\smarty\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_mailto')) include 'D:\\Stuff\\www\\smarty\\smarty\\libraries\\smarty\\plugins\\function.mailto.php';
?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		
			<!-- Meta Tags -->
		<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['meta_keys']->value;?>
" />
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['meta_desc']->value;?>
" />
		<meta name="author" content="Kereell" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="cache-control" content="no-cache" />
		
			<!-- General Style Sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_DIR;?>
page.css" />
			<!-- jQuery Modal Window Style Sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_DIR;?>
jqModal.css" />
			<!-- jQuery Flexgrid Table Style Sheet  -->
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_DIR;?>
flexigrid.css" />
		
			<!-- jQuery -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
			<!-- jQuery Modal Window --> 
		<script type="text/javascript" src="<?php echo @JS_DIR;?>
jqModal.js"></script>
			<!-- jQuery Flexgrid Table -->
		<script type="text/javascript" src="<?php echo @JS_DIR;?>
flexigrid.js"></script> 
			<!-- User Functions -->
		<script type="text/javascript" src="<?php echo @JS_DIR;?>
user.js"></script>
	</head>
	<body>
	<div class="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
		<div class="tblWrap">
		<div class="addRcrd"><a href="/smarty/page/add" onclick="">Add User</a></div>
			<table class="usrTbl">
				<thead>
					<tr>
						<th><a href="#" onclick="return false">ID#</a></th>
						<th><a href="#" onclick="return false">Login</a></th>
						<th><a href="#" onclick="return false">Name</a></th>
						<th><a href="#" onclick="return false">Last Name</a></th>
						<th><a href="#" onclick="return false">Email</a></th>
						<th><a href="#" onclick="return false">Date of Birth</a></th>
						<th colspan="2"><a href="#" onclick="return false">Edit | Remove</a></th>
					</tr>
				</thead>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'oddTr, evenTr'),$_smarty_tpl);?>
">
			   			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
			   			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</td>
			   			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
			   			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
</td>
			   			<td class="email"><?php echo smarty_function_mailto(array('address'=>((string)$_smarty_tpl->tpl_vars['user']->value['email']),'encode'=>"javascript"),$_smarty_tpl);?>
</td>
			   			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
</td>
			   			<td class="edtRmRcrd">
				   			<a href="/smarty/page/edit/?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="edtRcrd" onclick="return false">&nbsp;</a>&nbsp;
				   			<a href="/smarty/page/remove/?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="rmRcrd" onclick="return false">&nbsp;</a>
				   		</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<p>&nbsp;</p>
			<table id="flex1" style="display:none"></table>
			<table class="ourTbl" style="display:none">
			    <thead>
			    <tr>
			        <th>ID</th>
			        <th>NAME</th>
			        <th>CATEGORY</th>
			        <th>DATE</th>
			      </tr>
			  	</thead>
			  	<tbody>
			        <tr>
			        <td>This is data 1 with overflowing content</td>
			        <td>This is data 2</td>
			        <td>This is data 3</td>
			        <td>This is data 4</td>
			      </tr>
			  	</tbody>
			</table>
		</div>
	</body>
</html><?php }} ?>