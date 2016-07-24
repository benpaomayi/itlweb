<?php
ob_start ();
require_once 'db/dbconnect.php';
require_once 'check/searchCheck.php';
require_once 'items/conference/detailConfInfo.php';
require_once 'items/paper/detailPaperInfo.php';
require_once 'items/patent/detailPatentInfo.php';
require_once 'items/project/detailProjectInfo.php';
require_once 'items/reward/detailRewdInfo.php';
require_once 'items/softcpr/detailSoftcprInfo.php';
require_once 'items/conference/conferenceFiles.php';
require_once 'items/paper/paperFiles.php';
require_once 'items/patent/patentFiles.php';
require_once 'items/project/projectFiles.php';
require_once 'items/reward/rewardFiles.php';
require_once 'items/softcpr/softcprFiles.php';
require_once 'items/conference/searchConfInfo.php';
require_once 'items/paper/searchPaperInfo.php';
require_once 'items/patent/searchPatentInfo.php';
require_once 'items/project/searchProjectInfo.php';
require_once 'items/reward/searchRewdInfo.php';
require_once 'items/softcpr/searchSoftcprInfo.php';
require_once 'sqlsearch/sqlsplit.php';
require_once 'sqlsearch/projectSearch.php';
require_once 'sqlsearch/confSearch.php';
require_once 'sqlsearch/paperSearch.php';
require_once 'sqlsearch/patentSearch.php';
require_once 'sqlsearch/rewardSearch.php';
require_once 'sqlsearch/softcprSearch.php';
require_once 'export/fileCreation.php';
require_once 'searchresult/confResult.php';
require_once 'searchresult/paperResult.php';
require_once 'searchresult/patentResult.php';
require_once 'searchresult/projectResult.php';
require_once 'searchresult/rewardResult.php';
require_once 'searchresult/softcprResult.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ITL实验室科研信息管理系统</title>
<link rel="stylesheet" href="css/search.css" type="text/css" />
<link rel="stylesheet" href="css/complexSearch.css" type="text/css" />
<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="jquery/jquery.cookie.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/complexSearch.js"></script>
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
		<div class="select">
			<p style="color: #F00">选择查询范围</p>
			<input name="checkbox" id="chk_project" type="checkbox" /> <label
				for="chk_project">项目</label><br> <input name="checkbox"
				id="chk_paper" type="checkbox" /> <label for="chk_paper">论文</label><br>
			<input name="checkbox" id="chk_patent" type="checkbox" /> <label
				for="chk_patent">专利</label><br> <input name="checkbox"
				id="chk_softcpr" type="checkbox" /> <label for="chk_softcpr">软件著作权</label><br>
			<input name="checkbox" id="chk_conference" type="checkbox" /> <label
				for="chk_conference">会议</label><br> <input name="checkbox"
				id="chk_reward" type="checkbox" /> <label for="chk_reward">获奖</label>
		</div>
		<div class="bar"></div>
		<div class="condition">
			<p class="p_homepage">
				<a class="a_homepage" href="
		    	<?php 
		    	$username = $_SESSION['username'];
		    	if($username == 'admin') {
		    		echo "admin.php";
		    	} else if($username == 'user') {
		    		echo "user.php";
		    	}
		    	?>">&lt;&lt;首页</a>
			</p>
			<div id="projectCondition" style="display: none">
				<span>编号</span>
				<input id="projectNum" type="text" /><br>
				<span>名称</span>
				<input id="projectName" type="text" /><br>
				<span>类别</span>
				<input id="projectType" type="text" /><br>
				<span>主持人</span> 
				<input class="shortInput" id="projectHost" type="text" /><br>
				<span>参与人</span>
				<input class="shortInput" id="projectOther" type="text" /><br> 
			</div>
			<div id="paperCondition" style="display: none">
				<span>名称</span>
				<input id="paperName" type="text" /><br>
				<span>作者</span>
				<input id="author" type="text" /><br>
				<span>第一作者</span>
				<input	class="shortInput" id="firstAuth" type="text" />or
				<input class="shortInput" id="another" type="text" /><br>
				<span>刊物名称</span>
				<input id="journal" type="text" /><br> 
			</div>
			<div id="patentCondition" style="display: none">
				<span>名称</span>
				<input id="patentName" type="text" /><br>
				<span>专利号</span>
				<input id="patentNum" type="text" /><br>
				<span>发明人</span>
				<input id="inventor" type="text" /><br>
			</div>
			<div id="softcprCondition" style="display: none">
				<span>软件名</span>
				<input id="softcprName"	type="text" /><br>
				<span>著作权人</span>
				<input id="softcprOwner" type="text" /><br>
				<span>作者</span>
				<input id="softcprAuth" type="text" /><br>
				<span>著作权号</span>
				<input id="softcprNum" type="text" /><br> 
			</div>
			<div id="confCondition" style="display: none">
  				<span>会议名</span>
  				<input id="confName" type="text" /><br>
  				<span>参会人</span>
				<input id="confAttendee" type="text" /><br> 
			</div>
			<div id="rewardCondition" style="display: none">
				<span>类型</span>
				<input id="rewardType" type="text" /><br>
				<span>级别</span>
				<input id="rewardLevel"	type="text" /><br>
				<span>名称</span>
				<input	id="rewardName" type="text" /><br>
				<span>证书号</span> 
				<input	id="rewardNum" type="text" /><br> 
			</div>
			<div id="moreCondition" style="display: none">
	  			<span>参与人</span>
	  			<input id="attendee" type="text" /><br>
			</div>
			<div id="div_time" style="display: none;">
				<span>时间</span>
				<input class="time" id="timeStart" type="text">年 -- <input
						class="time" id="timeEnd" type="text">年
			</div> 
			<input id="img_comsearch" type="image" src="img/searchbtn.png"
				style="display: none" value="查询" />
		</div>
		<div>
			<?php
			$arr = '';
			$string = '';
			$html = '';
			$allHtml = '';
			if (isset ( $_GET ['project'] ) && isset ( $_GET ['paper'] ) && isset ( $_GET ['patent'] ) && isset ( $_GET ['softcpr'] ) && isset ( $_GET ['conference'] ) && isset ( $_GET ['reward'] )) {
				$project = $_GET ['project'];
				$paper = $_GET ['paper'];
				$patent = $_GET ['patent'];
				$softcpr = $_GET ['softcpr'];
				$conference = $_GET ['conference'];
				$reward = $_GET ['reward'];
				if (! isset ( $_GET ['attendee'] )) {
					$html .= '<table name="searchInfo">';
					if ($project == 1) {
						$arr = getProjectResult ( $html, $arr, $string, $con );
					}
					if ($paper == 1) {
						$arr = getPaperResult ( $html, $arr, $string, $con );
					}
					if ($patent == 1) {
						$arr = getPatentResult ( $html, $arr, $string, $con );
					}
					if ($softcpr == 1) {
						$arr = getSoftcprResult ( $html, $arr, $string, $con );
					}
					if ($conference == 1) {
						$arr = getConfResult ( $html, $arr, $string, $con );
					}
					if ($reward == 1) {
						$arr = getRewardResult ( $html, $arr, $string, $con );
					}
					if (isset ( $arr ['html'] )) {
						$html = $arr ['html'];
					}
					if (isset ( $arr ['string'] )) {
						$string = $arr ['string'];
					}
					if($html != '')
						echo  '<p class="export"><img src="img/export.jpg" alt="导出" width="30" height="30" /><span>导出信息</span></p>';
					echo $html;
				} else {
					if ($project == 1) {
						$html = '<table name="searchInfo">';
						$arr = getProjectResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";                         
						$allHtml .= $html; 
					}
					if ($paper == 1) {
						$html ='<table name="searchInfo">';
						$arr = getPaperResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";
						$allHtml .= $html;
					}
					if ($patent == 1) {
						$html ='<table name="searchInfo">';
						$arr = getPatentResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";
						$allHtml .= $html;
					}
					if ($softcpr == 1) {
						$html = '<table name="searchInfo">';
						$arr = getSoftcprResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";
						$allHtml .= $html;
					}
					if ($conference == 1) {
						$html ='<table name="searchInfo">';
						$arr = getConfResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";
						$allHtml .= $html;
					}
					if ($reward == 1) {
						$html = '<table name="searchInfo">';
						$arr = getRewardResult ( $html, $arr, '', $con );
						if(isset($arr ['html']))
							$html .= $arr ['html'];
						if (isset ( $arr ['string'] ))
							$string .= $arr ['string'];
						$html .= "</table>";
						$allHtml .= $html;
					}
					if(strip_tags($allHtml) != '')
						echo  '<p class="export"><img src="img/export.jpg" alt="导出" width="30" height="30" /><span>导出信息</span></p>';
					else
						echo "无相关记录！";
					echo $allHtml;
				}
			}
			$_SESSION ['string'] = $string; // 储存将要导出的信息内容
			if (isset ( $_GET ['exportation'] )) {
				if ($_GET ['exportation'] == 'y') {
					$path = "export/fileExportation.php";
					header ( "Location:$path" );
					ob_end_flush ();
				}
			}
			?>
		</div>
	</div>
</body>
</html>