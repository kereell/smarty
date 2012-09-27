<!DOCTYPE html>
<html>
	<head>
		<title>{$title}</title>
		
			<!-- Meta Tags -->
		<meta name="keywords" content="{$meta_keys}" />
		<meta name="description" content="{$meta_desc}" />
		<meta name="author" content="Kereell" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="cache-control" content="no-cache" />
		
			<!-- jQuery Modal Window Style Sheet -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}jqModal.css" />
			<!-- jQuery Flexgrid Table Style Sheet  -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}flexigrid.css" />
			<!-- General Style Sheet -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}page.css" />
			<!-- jQuery -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
			<!-- jQuery Modal Window --> 
		<script type="text/javascript" src="{$smarty.const.JS_DIR}jqModal.js"></script>
			<!-- jQuery Flexgrid Table -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}flexigrid.js"></script> 
			<!-- Custom js -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}page.js"></script>
	</head>
	<body>
	<div class="title">{$title}</div>
		<div class="tblWrap">
<<<<<<< HEAD
		<div class="addRcrd" id="addRcrd"><a href="/smarty/page/openAddRecord" onclick="void(0)">Add User</a></div>
		<div class="jqmWindow" id="addEditDialog">Please wait... <img src="{$smarty.const.IMG_DIR}busy.gif" alt="loading" /></div>
=======
		<div class="addRcrd"><a href="/smarty/page/add" onclick="">Add User</a></div>
>>>>>>> branch 'master' of https://github.com/kereell/smarty.git
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
				{foreach from=$users item=user}
					<tr class="{cycle values='oddTr, evenTr'}">
			   			<td>{$user['id']}</td>
			   			<td>{$user['login']}</td>
			   			<td>{$user['name']}</td>
			   			<td>{$user['lastname']}</td>
			   			<td class="email">{mailto address="{$user['email']}" encode="javascript"}</td>
			   			<td>{$user['birthday']}</td>
			   			<td class="edtRmRcrd">
<<<<<<< HEAD
				   			<a href="/smarty/page/openEditRecord/?id={$user['id']}" class="edtRcrd" >&nbsp;</a>&nbsp;
				   			<a href="{$dellMethod}/?id={$user['id']}" class="rmRcrd" >&nbsp;</a>
=======
				   			<a href="/smarty/page/edit/?id={$user['id']}" class="edtRcrd" onclick="return false">&nbsp;</a>&nbsp;
				   			<a href="/smarty/page/remove/?id={$user['id']}" class="rmRcrd" onclick="return false">&nbsp;</a>
>>>>>>> branch 'master' of https://github.com/kereell/smarty.git
				   		</td>
					</tr>
				{/foreach}
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
</html>
