
<?php
	@include_once ("./include/SqlHelper.php");
	@include "./include/common.inc.php";
	@include "./include/bean.php";
	@include "./include/time.php";
	header("Content-type:text/html; charset=utf-8");
	session_start();
	$db = new SqlHelper();
	$user = $_SESSION['user'];
	
	$sql = "select * from tb_user where user_id = $user->user_id;";
	$user = $db->execute_dql3($sql);
	$_SESSION['user'] = $user;
	
	$borrow = $_SESSION['borrow'];
	$back = $_SESSION['back'];
	
		//获取借伞记录
						$sql = "select * from tb_borrow where borrow_userid='{$user->user_card_id}';";
						$borrow = $db->execute_dql2($sql);
						$_SESSION['borrow'] = $borrow;
						
						//获取还伞记录
						$sql = "select * from tb_back where back_userid='{$user->user_card_id}';";
						$back = $db->execute_dql2($sql);
						$_SESSION['back'] = $back;
	?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="css/personal.css" />
    <title>东理小U-个人中心</title>
</head>
<body>
    <header>
        东理小U-<span><?php echo $user->user_name;?></span>
    </header>
    <div class="message" style="display: block">
        <table>
            <tr>
                <td>姓名：</td>
                <td><?php echo $user->user_name;?></td>
            </tr>
            <tr>
                <td>学号：</td>
                <td><?php echo $user->user_stu_id;?></td>
            </tr>
            <tr>
                <td>手机号：</td>
                <td><?php echo $user->user_tel;?></td>
            </tr>
            <tr>
                <td>注册码：</td>
                <td><?php echo $user->user_regcode;?></td>
            </tr>
        </table>
    </div>
    <div class="money" style="display: none">
        <p>亲爱的用户你好，设置押金的目的是为了让你更好的使用东理小U共享雨伞。</p>
        <div class="lgh">
            <span>余额：</span>
            <span>￥<?php echo $user->user_balance;?>元</span>
        </div>
        <a href="pay.html" class="chong">充值</a>
    </div>
    <div class="jie" style="display: none">
        <p>亲爱的用户你好，希望您能够准确的还伞,合作愉快</p>
        <hr size="3" color="#0086b3"/>
        <table border="0" cellspacing="0" cellpadding="0">
        	<?php
        		foreach ($borrow as $key => $value) {
        			//var_dump($value);

					$datetime = $value['borrow_datetime'];
					//echo "$borrow->borrow_datetime";
        			echo "<tr><td>借伞</td><td>$datetime</td></tr>";
        		}
        			foreach ($back as $key => $value) {
        			//var_dump($value);

					$datetime = $value['back_datetime'];
					//echo "$borrow->borrow_datetime";
        			echo "<tr><td>还伞</td><td>$datetime</td></tr>";
        		}
        		?>
        	
           
        </table>
    </div>
    <footer>
        <div class="grxx">个人信息</div>
        <div class="yjye">押金余额</div>
        <div class="jsjl">用伞记录</div>
    </footer>
    <script>
        var btn_1 = document.getElementsByClassName("grxx").item(0);
        var btn1 = document.getElementsByClassName("message").item(0);
        var btn_2 = document.getElementsByClassName("yjye").item(0);
        var btn2 = document.getElementsByClassName("money").item(0);
        var btn_3 = document.getElementsByClassName("jsjl").item(0);
        var btn3 = document.getElementsByClassName("jie").item(0);
        var boo1 = true;
        var boo2 = true;
        var boo3 = true;
        btn_1.onclick = function(){
            if(boo1){
                btn1.setAttribute("style","display:block");
                btn2.setAttribute("style","display:none");
                btn3.setAttribute("style","display:none");

            }

        };
        btn_2.onclick = function(){
            if(boo2){
                btn1.setAttribute("style","display:none");
                btn2.setAttribute("style","display:block");
                btn3.setAttribute("style","display:none");

            }

        };
        btn_3.onclick = function(){
            if(boo3){
                btn1.setAttribute("style","display:none");
                btn2.setAttribute("style","display:none");
                btn3.setAttribute("style","display:block");


            }

        }
    </script>
</body>
</html>