<?php
ob_start();
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
<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="js/search.js"></script>
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
	<div id="content">
	<p class="p_homepage"><a href="
    	<?php 
    	$username = $_SESSION['username'];
    	if($username == 'admin') {
    		echo "admin.php";
    	} else if($username == 'user') {
    		echo "user.php";
    	}
    	?>">&lt;&lt;首页</a></p>
<?php
$arr = '';
$searchCondition = '';
$string = '';
$html = '';
if (isset ( $_GET ['searchCondition'] )) {
	$searchCondition = $_GET ['searchCondition'];
	switch ($searchCondition) {
		case "projectCondition" :
			$arr = getProjectResult($html, $arr, $string, $con);
			break;
		case "paperCondition" :
			$arr = getPaperResult($html, $arr, $string, $con);
			break;
		case "patentCondition" :
			$arr = getPatentResult($html, $arr, $string, $con);
			break;
		case "softcprCondition" :
			$arr = getSoftcprResult($html, $arr, $string, $con);
			break;
		case "confCondition" :
			$arr = getConfResult($html, $arr, $string, $con);
			break;
		case "rewardCondition" :
			$arr = getRewardResult($html, $arr, $string, $con);		
			break;
	}
	$html = $arr ['html'];
	if (isset($html)) {
		if($html != '')
			echo '<p class="export"><img src="img/export.jpg" alt="导出" width="30" height="30" /><span>导出信息</span></p>';
	}
	echo '<table name="searchInfo">';
}
echo $html;
if(isset($arr['string'])) {
	$string = $arr['string'];
}
$_SESSION ['string'] = $string; // 储存将要导出的信息内容
if (isset ( $_GET ['exportation'] )) {
	if ($_GET ['exportation'] == 'y') {
		$path = "export/fileExportation.php";
		header ( "Location:$path" );
		ob_end_flush();
	}
}
echo "</table>";
?>

		<div id="detailInfo">
<?php
if (isset ( $_GET ['type'] ) && isset ( $_GET ['id'] ) && isset ( $_GET ['name'] )) {
	$type = $_GET ['type'];
	$id = $_GET ['id'];
	$name = $_GET ['name'];
	$html = '<div id="div_filelist" class="filelist">';
	switch ($type) {
		case 'project' :
			$html .= showProjectFiles ( $id, $name, $con );
			break;
		case 'paper' :
			$html .= showPaperFiles ( $id, $name, $con );
			break;
		case 'patent' :
			$html .= showPatentFiles ( $id, $name, $con );
			break;
		case 'softcpr' :
			$html .= showSoftCprFiles ( $id, $name, $con );
			break;
		case 'conference' :
			$html .= showConfFiles ( $id, $name, $con );
			break;
		case 'reward' :
			$html .= showRewdFiles ( $id, $name, $con );
			break;
		default :
			break;
	}
	$html .= '</div>';
	echo $html;
	exit ( 0 );
}

if (isset ( $_GET ['type'] ) && isset ( $_GET ['id'] )) {
	$type = $_GET ['type'];
	$id = $_GET ['id'];
	$html = '';
	switch ($type) {
		case 'project' :
			$html .= showDetailProjectInfo ( $con, $id );
			break;
		case 'paper' :
			$html .= showDetailPaperInfo ( $con, $id );
			break;
		case 'patent' :
			$html .= showDetailPatentInfo ( $con, $id );
			break;
		case 'softcpr' :
			$html .= showDetailSoftCprInfo ( $con, $id );
			break;
		case 'conference' :
			$html .= showDetailConfInfo ( $con, $id );
			break;
		case 'reward' :
			$html .= showDetailRewdInfo ( $con, $id );
			break;
		default :
			break;
	}
	echo $html;
}
?>
</div>
	</div>
</body>
</html>