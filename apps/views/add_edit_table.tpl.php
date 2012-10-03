		<!-- Custom js -->
	<script type="text/javascript" src="{$smarty.const.JS_DIR}addEdit.js"></script>
	<div class="title">{$title}</div>
	<div class="badWords" id="badWords">&nbsp;</div>
	<div class="jqmdX jqmClose">&nbsp;</div>
	<form class="addEditFrm" id="addEditFrm" name="addEditFrm" action="{$actMethod}" method="post">
		<div><span>Login</span><input type="text" id="login" name="login" value="{$login}" autocomplete="off" placeholder="Put Your Login" /></div>
		<div><span>Name</span><input type="text" id="name" name="name" value="{$name}" autocomplete="off" placeholder="Put Your Name" /></div>
		<div><span>Last Name</span><input type="text" id="lastname" name="lastname" value="{$lastname}" autocomplete="off" placeholder="Put Your Last Name" /></div>
		<div><span>Email</span><input type="email" id="email" name="email" value="{$email}" autocomplete="off" placeholder="Put Your Email Address" /></div>
		<div><span>Password</span><input type="password" id="pass" name="pass" autocomplete="off" placeholder="Put Your Password" /></div>
		<div><span>Re-Enter Password</span><input type="password" id="rePass" name="rePass" autocomplete="off" placeholder="Repeat Your Password" /></div>
		<div><span>Birthday</span><input type="text" id="birthday" name="birthday" value="{$birthday}" autocomplete="off" placeholder="Put Your Birthday" /></div>
		<div><input type="button" id="sBtn" name="sBtn" value="{$sBtnVal}" onclick="procAddEdtRcrd(this.form)" ></div>
	</form>
