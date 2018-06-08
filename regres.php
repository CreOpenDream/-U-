<?php

	header("Content-type:text/html; charset=utf-8");
	if(!empty($_GET['result'])){
	$result = $_GET['result'];
	if($result == 2 || $result == 3 || $result == 4){
			echo "注册失败！请检查您的卡号或注册码并重试！3秒后跳转至注册页面...";
	header("Refresh:3;url=index.php");
	}
	else if($result == 1){
	echo "恭喜您注册成功！3秒后自动跳转登录页面...";
	header("Refresh:3;url=http://www.leipikeji.com");
	}
	else if($result == 5){
	echo "访问出错！3秒后自动跳转至雷劈科技官网...";
	header("Refresh:3;url=http://www.leipikeji.com");
	}
}
?>