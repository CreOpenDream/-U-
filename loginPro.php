<?php
	
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	@include_once ("./include/SqlHelper.php");
	@include "./include/common.inc.php";
	@include "./include/bean.php";
	@include "./include/time.php";
	$db = new SqlHelper();
	$user = new User();
	$borrow = new Borrow();
	$back = new Back();
	//判断是登录还是注册
	if(isset($_GET['tab'])){
		if($_GET['tab'] == "1"){
				if(isset($_GET['phone']) && isset($_GET['pwd'])){
					$username=$_GET["phone"];
					$password=$_GET['pwd'];
					//		 //判断该用户名是否存在
					$sql = "select user_id from tb_user where user_tel='{$username}' and user_pwd='{$password}';";
					$res = $db -> execute_dql($sql);
					if (mysqli_num_rows($res)) {
						
						//查找该用户成功，登录成功
						//获取用户所有的信息存入bean中
						$sql = "select * from tb_user where user_tel='{$username}' and user_pwd='{$password}';";
						$user = $db->execute_dql3($sql);
						$_SESSION['user'] = $user;
					
					
						header("location:personal.php");
					}else{
							//不存在该用户,登录失败
						header("location:index.php?ret=1");
						
					}
				
				}else{
					echo "go wrong";
					}	
		}else{
			if(isset($_GET['username1']) && isset($_GET['phone1']) && isset($_GET['pwd1']) && isset($_GET['regcode'])&& isset($_GET['stuid']) ){
				
				$username = $_GET['username1'];
				$phone = $_GET['phone1'];
				$pwd = $_GET['pwd1'];
				$regcode = $_GET['regcode'];
				$stuid = $_GET['stuid'];
	
			$user->user_regcode = $regcode;
			$user->user_stu_id = $stuid;
			$user->user_name = $username;
			$user->user_tel = $phone;
			$user->user_pwd = $pwd;
			$user->user_reg_date = getCurrentTime();
			
			  //判断是否有该注册码
	$sql = "select user_card_id from tb_user where user_regcode ='{$user->user_regcode}' and user_status = 0;";
    if($res = $db->execute_dql($sql)){
    	$num=mysqli_num_rows($res);
		if($num == 1){
			//注册码正确，且没有注册过,则注册新账号

			$sql = "update `tb_user` set user_name = '{$user->user_name}',user_stu_id = '{$user->user_stu_id}',";
			$sql.= "user_tel = '{$user->user_tel}',user_reg_date = '{$user->user_reg_date}',user_status = 1, user_pwd = '{$user->user_pwd}' where user_regcode ='{$user->user_regcode}' and user_status = 0;";
			if($res = $db->execute_dml($sql)){
				//注册成功
				$result = 1;
				
			}else{
				//注册失败，插入语句执行失败
				$result = 2;
			}
		}else{
			//查找该用户失败，则注册失败
  			 $result=3;
		}
	
 	}else{
 		//查询语句出错
 		$result = 4;
 	}
 	}else{
 		$result = 5;
	}
		header("Location:regres.php?result=".$result); 
		//echo $result;
			}
		
	}
?>