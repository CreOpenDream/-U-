<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>共享雨伞-注册页面</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="html5shiv.min.js"></script>
</head>
<body>
	<div class="jq22-container" style="">
		<div class="login-wrap">
			<form action="loginPro.php" method="get">
				<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked value="1"><label for="tab-1" class="tab">登 录</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up" value="2"><label for="tab-2" class="tab">注 册</label>
				<div class="login-form">
					<div class="sign-in-htm">
						<div class="group">
							<label for="user1" class="label">手机号</label>
							<input id="user1" name="phone"  type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<input id="pass" name="pwd" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span>记住密码</label>
						</div>
						<div class="group">
							<input type="submit" class="button" value="登 录" style="font-size: 18px">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">Forgot Password?</a>
						</div>
					</div>
					<div class="sign-up-htm">
						<div class="group">
							<label for="name" class="label">姓名</label>
							<input id="name" name="username1" type="text" class="input">
						</div>
						<div class="group">
							<label for="user" class="label">手机号</label>
							<input id="user" name="phone1" type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<input id="pass" name="pwd1" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<label for="pass1" class="label">确认密码</label>
							<input id="pass1" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<label for="code" class="label">注册码</label>
							<input id="code" name="regcode" type="text" class="input">
						</div>
						<div class="group">
							<label for="code1" class="label">学号</label>
							<input id="code1" name="stuid" type="text" class="input">
						</div>
						<div class="group">
							<input type="submit" class="button" value="注 册" style="font-size: 18px">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">Already Member?</label>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	
</body>
<?php
	if(isset($_GET['ret'])){
		$ret = $_GET['ret'];
		if($ret == 1){
			echo "<script>alert('账号或密码出错')</script>";
		}
	}
	?>
</html>