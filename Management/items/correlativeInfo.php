<?php
require '../db/dbconnect.php';
mysql_query('SET NAMES UTF8');
$id = $_POST['id'];
$type = $_POST['type'];
$html = '';
$html .= "<div id='detailInfo'>";
switch ($type) {
	case 'project':
		$html .= showProjectInfo($con, $id);
		break;
	case 'paper':
		$html .= showPaperInfo($con, $id);
		break;
	default:
		break;
}
$html .= "</div>";
echo $html;


//显示项目信息
function showProjectInfo($con, $id) {
	$currentPapers = 0;
	$html = '';
	$html .= "<div id='projectInfoLeft'>";
	$sql = "select * from project where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$name = $arr['name'];
			$num = $arr['num'];
			$type = $arr['type'];
			$owner = $arr['owner'];
			$cooper = $arr['cooper'];
			$host = $arr['host'];
			$sum = $arr['sum'];
			$other = $arr['other'];
			$time = $arr['time'];
			$estabtime = $arr['estabtime'];
			$quota = $arr['quota'];
			$papersum = $arr['papersum'];
			$patentsum = $arr['patentsum'];
			$html .= "<p>名称：$name</p>";
			$html .= "<p>编号：$num</p>";
			$html .= "<p>类别：$type</p>";
			$html .= "<p>归属单位：$owner</p>";
			$html .= "<p>合作单位：$cooper</p>";
			$html .= "<p>主持人：$host</p>";
			$html .= "<p>资助金额：$sum</p>";
			$html .= "<p>其他参与人：$other</p>";
			$html .= "<p>起止时间：$time</p>";
			$html .= "<p>立项时间：$estabtime</p>";
			$html .= "<p>结题指标：$quota</p>";
			$html .= "<p>所需论文数：$papersum</p>";
			$html .= "<p>所需专利数：$patentsum</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "</div>";
	return $html;
}

//显示论文信息
function showPaperInfo($con, $id) {
	$html = '';
	$html .= "<div id='paperInfoLeft'>";
	$sql = "select * from paper where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$firstauth = $arr['firstauth'];
			$othauth = $arr['othauth'];
			$comauth = $arr['comauth'];
			$name = $arr['name'];
			$journame = $arr['journame'];
			$journum = $arr['journum'];
			$page = $arr['page'];
			$time = $arr['time'];
			$type = $arr['type'];
			$projectnum = $arr['projectnum'];
			$state = $arr['state'];
			$html .= "<p>第一作者：$firstauth</p>";
			$html .= "<p>其他作者：$othauth</p>";
			$html .= "<p>通讯作者：$comauth</p>";
			$html .= "<p>名称：$name</p>";
			$html .= "<p>刊物名称：$journame</p>";
			$html .= "<p>刊物标号：$journum</p>";
			$html .= "<p>页码：$page</p>";
			$html .= "<p>刊出时间：$time</p>";
			$html .= "<p>刊物级别：$type</p>";
			$html .= "<p>所挂项目编号：$projectnum</p>";
			$html .= "<p>投稿状态：$state</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "</div>";
	return $html;
}
?>