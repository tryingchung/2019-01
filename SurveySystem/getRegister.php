<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    $newID = $_POST['user'];
    $userName = $_POST['userName'];
    $psd = $_POST['pswd1'];
    $sex = $_POST['gender'];
    $telPhone = $_POST['telphone'];
    $realName = $_POST['realName'];

    $newID = trim($newID);
    $userName = trim($userName);
    $psd = trim($psd);
    $telPhone = trim($telPhone);
    $realName = trim($realName);
    if ($sex == 'male'){
        $sex = '男';
    }elseif ($sex == 'female'){
        $sex = '女';
    }

    $show = 1;

    $sql = sprintf("INSERT INTO `user`(UserID,UserName,`Password`,telphone,gender,realname) VALUES('%s','%s','%s','%s','%s','%s')",
        $newID,$userName,$psd,$telPhone,$sex,$realName);
    $res = $mysqli->query($sql);
    if ($mysqli->insert_id == $newID){
       $show = 0;
    }else{
       $show = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线问卷调查系统--注册</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			background: url('img/back1.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% auto;
			vertical-align: middle;
		}
		.con {
			background-color: white;
			background: rgba(255, 255, 255, 0.2) !important;
			filter: alpha(opacity=30);
			border-radius: 20px;
			color: white;
			margin: 20px;
			padding: 30px;
			line-height: 30px;
			font-family: 'Microsoft YeHei';
		}
		#goIndex {
			text-decoration: none;
			font-weight: bolder;
			font-size: 20px;
			color: white;
			font-family: 'Microsoft YeHei';
		}
		h3 a{
			color: #ffc;
		}
	</style>
</head>
<body>
	<div style="margin-left: 50px; margin-top: 30px;">
		<a href="index.html" id="goIndex" class="text-left">
			<span class="glyphicon glyphicon-menu-left"></span>
			返回首页
		</a>
	</div>
	<div class="con container " style="width: 600px;margin: 200px auto;padding: 20px;">
		
		<?php
			if ($show==0) {
				echo '<h3 class="text-center">注册成功，请前往<a href="goLogin.html" style="color: #fcc;">登录页面</a></h3>';
			}else{
				echo '<h3 class="text-center">注册失败，请<a href="goRegister.html" style="color: #fcc;">重新注册</a></h3>';
			}
		?>
	</div>
</body>
</html>