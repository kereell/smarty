<!DOCTYPE html>
<html>
	<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
	<script type="text/javascript" src="../libs/jsHttpRequest/JsHttpRequest.js"></script>
	<script type="text/javascript" src="{$smarty.const.JS_DIR}test.js"></script>
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="cache-control" content="no-cache" />
	</head>
	<body>
		<div id="error">&nbsp;</div>
		<p>&nbsp;</p>
		<div id="response">&nbsp;</div>
		<p>&nbsp;</p>
		<form name="frm" action="" method="get">
			<input type="text" id="test" name="nameTest" /><br />
			<input type="text" id="name" name="name" /><br />
			<input type="text" id="lastname" name="lastname" /><br />
			<input type="button" name="btn" value="BURN IT!" onclick="doLoad(this.form)" />
		</form>
	</body>
</html>