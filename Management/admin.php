<?php
require_once 'check/adminCheck.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ITL实验室科研信息管理系统</title>
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="jquery/jquery.wresize.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</head>

<body>
	<div id="nav">
		<div class='title'>ITL实验室科研信息管理系统</div>
	    <div id="setting">
			<span id="expand"> <span id="displayName"><?php echo $_SESSION['name'];?></span>
				<img src="img/caret.png" alt="caret" />
			</span>
			<div id="expanddiv">
				<ul>
					<li><a href="personal.php"><img src="img/personal.png" alt="" />密码设置</a></li>
					<li><a href="management.php"><img src="img/admin.png" alt="用户管理" />用户管理</a></li>
					<li><a id="logout" href=""><img src="img/logout.png" alt="" />退出</a></li>
				</ul>
			</div>
	 	 </div>
	</div>
	<div id="imgTop">
		<img src="img/top.jpg" alt="图片" width="1000" height="100" />
	</div>
	<div id="wrapper">
		<div id="leftNav">
			<div id="leftNavList">
				<ul id="groupList">
					<li id="li_project">项目</li>
					<li id="li_paper">论文</li>
					<li id="li_patent">专利</li>
					<li id="li_soft_cpr">软件著作权</li>
					<li id="li_conference">会议</li>
					<li id="li_rewards">获奖</li>
				</ul>
			</div>
		</div>
		<div id="controls">
			<div style="width: 1150px">
				<div id="upload">
					<img src="img/upload.png" alt="上传信息" />
				</div>
				<div id="search">                      
					<div id="searchCondition">
						<?php include 'items/searchControls.php';?>
					</div>
					<input id="btn_search" type="image" src="img/searchbtn.png" />
					<input id="btn_comsearch" type="image" src="img/comsearchbtn.png" />
				</div>
			</div>
		</div>
		<div id="content">
			<?php include 'items/pagedDispaly.php';?>
		</div>
	</div>
</body>
</html>
