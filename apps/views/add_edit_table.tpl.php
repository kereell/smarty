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
		
			<!-- Style Sheet for jQuery Date Picker -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}datePicker.css" />
			<!-- General Style Sheet -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}addEdit.css" />
			<!-- jQuery -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
			<!-- jQuery required plugins for Date Picker -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}date.js"></script>
			<!-- jQuery Date Picker -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}jquery.datePicker.js"></script>
			<!-- Custom js -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}addEdit.js"></script>
			
	</head>

	<body>
	
		<div class="title">{$title}</div>
		<div class="jqmdX jqmClose">&nbsp;</div>
		<form class="addEditFrm" name="addEditFrm" action="{$actMethod}" method="post">
		<div><span>Login</span><input type="text" id="login" name="login" value="{$login}" autocomplete="off" placeholder="Put Your Login" /></div>
		<div><span>Name</span><input type="text" id="name" name="name" value="{$name}" autocomplete="off" placeholder="Put Your Name" /></div>
		<div><span>Last Name</span><input type="text" id="lastname" name="lastname" value="{$lastname}" autocomplete="off" placeholder="Put Your Last Name" /></div>
		<div><span>Email</span><input type="email" id="email" name="email" value="{$email}" autocomplete="off" placeholder="Put Your Email Address" /></div>
		<div><span>Password</span><input type="password" id="pass" name="pass" autocomplete="off" placeholder="Put Your Password" /></div>
		<div><span>Re-Enter Password</span><input type="password" id="rePass" name="rePass" autocomplete="off" placeholder="Repeat Your Password" /></div>
		<div><span>Birthday</span><input type="text" id="birthday" name="birthday" value="{$birthday}" autocomplete="off" placeholder="Put Your Birthday" /></div>
		<div><input type="submit" id="sBtn" name="sBtn" value="{$sBtnVal}" ></div>
		</form>
	</body>
</html>