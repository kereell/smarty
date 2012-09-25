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
		
			<!-- General Style Sheet -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}page.css" />
			<!-- jQuery Modal Window Style Sheet -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}jqModal.css" />
			<!-- jQuery Flexgrid Table Style Sheet  -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}flexigrid.css" />
		
			<!-- jQuery -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
			<!-- jQuery Modal Window --> 
		<script type="text/javascript" src="{$smarty.const.JS_DIR}jqModal.js"></script>
			<!-- jQuery Flexgrid Table -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}flexigrid.js"></script> 
			<!-- User Functions -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}user.js"></script>
	</head>
	<body>
		<div class="tblWrap">
		<div class="addRcrd"><a href="/dev/page/add" onclick="return false">Add User</a></div>
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
			   			<td class="edtRcrd"><a href="/dev/page/edit/?id={$user['id']}" onclick="return false">&nbsp;</a></td>
			   			<td class="rmRcrd"><a href="/dev/page/remove/?id={$user['id']}" onclick="return false">&nbsp;</a></td>
					</tr>
				{/foreach}
				</tbody>
			</table>
			<p>&nbsp;</p>
			<table id="flex1" style="display:none"></table>
			<table class="ourTbl">
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