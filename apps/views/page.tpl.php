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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
			<!-- jQuery Modal Window --> 
		<script type="text/javascript" src="{$smarty.const.JS_DIR}jqModal.js"></script>
			<!-- jQuery Sort Element Function -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}sortElements.js"></script> 
			<!-- Custom js -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}page.js"></script>
	</head>
	<body>
	<div class="title">{$title}</div>
		<div class="tblWrap">
		<div class="addRcrd" id="addRcrd"><a href="/smarty/page/openAddRecord" onclick="void(0)">Add User</a></div>
		<div class="jqmWindow" id="addEditDialog">Please wait... <img src="{$smarty.const.IMG_DIR}busy.gif" alt="loading" /></div>
	 		<table class="usrTbl">
					<tr>
						<th id="id">ID#</th>
						<th id="login">Login</th>
						<th id="name">Name</th>
						<th id="lastname">Last Name</th>
						<th id="email">Email</th>
						<th id="birthday">Date of Birth</th>
						<th colspan="2">Edit | Remove</th>
					</tr>
					{foreach from=$users item=user}
					<tr class="{cycle values='oddTr, evenTr'}">
			   			<td>{$user['id']}</td>
			   			<td>{$user['login']}</td>
			   			<td>{$user['name']}</td>
			   			<td>{$user['lastname']}</td>
			   			<td class="email">{mailto address="{$user['email']}" encode="javascript"}</td>
			   			<td>{$user['birthday']}</td>
			   			<td class="edtRmRcrd">
				   			<a href="/smarty/page/openEditRecord?id={$user['id']}" class="edtRcrd" >&nbsp;</a>&nbsp;
				   			<a href="{$dellMethod}/?id={$user['id']}" class="rmRcrd" >&nbsp;</a>
				   		</td>
					</tr>
					{/foreach}
					<tr>
						<td id="paginator" colspan="7">
							<form action="{$smarty.server.SCRIPT_URL}" method="get">
								{if $prev_page['exists']}
								<a href="{$smarty.server.SCRIPT_URL}?cp={$prev_page['page']}&pp={$smarty.get.pp}">Previous Page</a>
								&nbsp;&nbsp;&nbsp;
								{/if}
								<input type="text" id="cp" name="cp" value="{$smarty.get.cp}" size="1" readonly />
								&nbsp;&nbsp;&nbsp;
								{if $next_page['exists']}
								<a href="{$smarty.server.SCRIPT_URL}?cp={$next_page['page']}&pp={$smarty.get.pp}">Next Page</a>
								&nbsp;&nbsp;&nbsp;
								{/if}
								{foreach from=$pp_arr item=pp}
								<input type="radio" name="pp" value="{$pp}" {if $smarty.get.pp==$pp}checked{/if} />{$pp}
								{/foreach}
							</form>
						</td>
					</tr>
			</table>
	</body>
</html>