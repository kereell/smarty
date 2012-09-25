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
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}addEdit.css" />
			<!-- Style Sheet for jQuery Date Picker -->
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_DIR}datePicker.css" />
			<!-- jQuery -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
			<!-- jQuery required plugins for Date Picker -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}date.js"></script>
			<!-- jQuery required plugins for Date Picker - Localization -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}date_ru_utf8.js"></script>
			<!-- jQuery Date Picker -->
		<script type="text/javascript" src="{$smarty.const.JS_DIR}jquery.datePicker.js"></script>
			
	</head>

	<body>
	
		<div>{$title}</div>
	
		<form name="addEditFrm" action="" method="post">
			<input type="text" id="login" name="login" placeholder="Put Your Login" />
			<input type="text" id="name" name="name" placeholder="Put Your Name" />
			<input type="text" id="lastname" name="lastname" placeholder="Put Your Last Name" />
			<input type="email" id="email" name="email" placeholder="Put Your Email Address" />
			<input type="password" id="pass" name="pass" placeholder="Put Your Password" />
			<input type="password" id="rePass" name="rePass" placeholder="Repeat Your Password" />
			<input type="date" id="birthday" name="birthday" placeholder="Put Your Birthday" />
			<input type="submit" id="sBtn" name="sBtn" value="{$sBtnVal}" >
		</form>
	</body>
</html>