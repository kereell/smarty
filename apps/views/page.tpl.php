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
			<!-- JsHttpRequest --> 
		<script type="text/javascript" src="/smarty/libs/jsHttpRequest/JsHttpRequest.js"></script> 
			<!-- Custom js -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}page.js"></script>
	</head>
	<body>
	<div class="title">{$title}</div>
	
		<!-- Confirm Delete JQM Dialog -->
	<div class="jqmConfirm" id="confirm">		
		<div id="ex3b" class="jqmConfirmWindow">
			<div class="jqmConfirmTitle clearfix">
				<h1>Delete confirmation!</h1>
			</div>
			<div class="jqmConfirmContent">
				<p class="jqmConfirmMsg">Continue?</p>
			</div>
			<div class="sBtns">
				<input type="submit" value="no" />
				<input type="submit" value="yes" />
			</div>
		</div>
	</div>
	<div id="response">&nbsp;</div>
		<div class="tblWrap">
			<!-- Add or Edit JQM Dialog -->
		<div class="addRcrd"><a href="/smarty/page/_openAddRecord">Add User</a></div>
		<div class="jqmWindow" id="addEditDialog">&nbsp;</div>
	 		<table class="usrTbl">
					<tr>
						<th id="id" onclick="processLoad('hello')">ID#</th>
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
				   			<a href="/smarty/page/_openEditRecord?id={$user['id']}">&nbsp;</a>&nbsp;
				   			<a href="{$dellMethod}/?id={$user['id']}" id="{$user['id']}">&nbsp;</a>
				   		</td>
					</tr>
					{/foreach}
					<tr>
						<td id="paginator" colspan="7">
							<form action="{$smarty.server.SCRIPT_URL}" method="get">
							<div id="paginate_wrap">
								{if $prev_page['exists']}
								<a href="{$smarty.server.SCRIPT_URL}?cp={$prev_page['page']}&pp={$smarty.get.pp}">Previous Page</a>
								&nbsp;&nbsp;&nbsp;
								{/if}
								<input type="text" id="cur_page" name="cp" value="Page:: {$smarty.get.cp}" readonly/>
								&nbsp;&nbsp;&nbsp;
								{if $next_page['exists']}
								<a href="{$smarty.server.SCRIPT_URL}?cp={$next_page['page']}&pp={$smarty.get.pp}">Next Page</a>
								&nbsp;&nbsp;&nbsp;
								{/if}
								<select name="pp" >
									{foreach from=$pp_arr item=pp}
									<option value="{$pp}" {if $smarty.get.pp==$pp}selected{/if}>{$pp}</option>
									{/foreach}
								</select>
								<input type="submit" class="pBtn" name="pBtn" value="Items per page" />
							</div>
							</form>
						</td>
					</tr>
			</table>
			</div>
	</body>
</html>