<?php
require 'check/searchCheck.php';
$name = $_SESSION['name'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ITL实验室科研信息管理系统</title>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<link rel="stylesheet" href="css/personal.css" type="text/css" />
<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript" src="js/personal.js"></script>
</head>

<body>
	<div id="nav">
		<div class='title'>ITL实验室科研信息管理系统</div>
		<div id="setting">
			<span id="expand"> <span id="displayName"><?php echo $name;?></span>
				<img src="img/caret.png" alt="caret" />
			</span>
			<div id="expanddiv">
				<ul>
					<li><a href="personal.php"><img src="img/personal.png" alt="" />密码设置</a></li>
					<?php if($_SESSION['username'] == 'admin')
							echo "<li><a href='management.php'><img src='img/admin.png' alt='用户管理' />用户管理</a></li>";	
					?>
					<li><a id="logout" href=""><img src="img/logout.png" alt="" />退出</a></li>
				</ul>
			</div>
		</div>
	</div>
    <div id="imgTop">
		<img src="img/top.jpg" alt="图片" width="1000" height="100" />
    </div>
    <div id="content" class="content">
    	<p><a href="
    	<?php 
    	$username = $_SESSION['username'];
    	if($username == 'admin') {
    		echo "admin.php";
    	} else if($username == 'user') {
    		echo "user.php";
    	}
    	?>">&lt;&lt;首页</a></p>
    	<div class="div_psw">
		    <p><span>用户名：</span><?php echo $name;?></p>
		   	<p><span>新密码：</span><input id="psw01" type="password" /></p>
		   	<p><span>确认密码：</span><input id="psw02" type="password" /></p>
		   	<input id="btn_psw" class="button" type="image" src="img/confirm.png" />
    	</div>
	</div>
</body>
</html>