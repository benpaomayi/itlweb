<?php
require 'db/dbconnect.php';
require 'rowsNum.php';
require 'conference/conferenceInfo.php';
require 'paper/paperInfo.php';
require 'patent/patentInfo.php';
require 'project/projectInfo.php';
require 'reward/rewardInfo.php';
require 'softcpr/softcprInfo.php';
mysql_query('set names utf8');

$html_head = '';
$hrefPage = '';
if(!isset($_GET['li_id'])) {
	$li_id = 'li_project';
} else {
	$li_id = $_GET['li_id'];
}
if(!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
}
$_SESSION['username'] == 'admin'?$hrefPage = 'admin.php':$hrefPage = 'user.php';
//一次显示的条目数
define('PAGESIZE', 20);
switch($li_id) {
	case "li_project":
		$li_id = "li_project";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>名称</td>";
		$html_head .= "<td>类别</td>";
		$html_head .= "<td>主持人</td>";
		$html_head .= "<td>资助金额</td>";
		$html_head .= "<td>起止时间</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showProjectInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	case "li_paper":
		$li_id = "li_paper";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>论文名称</td>";
		$html_head .= "<td>论文作者</td>";
		$html_head .= "<td>刊物名称</td>";
		$html_head .= "<td>刊出时间</td>";
		$html_head .= "<td>刊物级别</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showPaperInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	case "li_patent":
		$li_id = "li_patent";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>专利名称</td>";
		$html_head .= "<td>发明人</td>";
		$html_head .= "<td>专利权人</td>";
		$html_head .= "<td>申请时间</td>";
		$html_head .= "<td>是否授权</td>";
		$html_head .= "<td>专利号</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showPatentInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	case "li_soft_cpr":
		$li_id = "li_soft_cpr";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>软件名称</td>";
		$html_head .= "<td>作者</td>";
		$html_head .= "<td>申请时间</td>";
		$html_head .= "<td>著作权人</td>";
		$html_head .= "<td>著作权号</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showSoftCprInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	case "li_conference":
		$li_id = "li_conference";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>会议名称</td>";
		$html_head .= "<td>参会人</td>";
		$html_head .= "<td>地点</td>";
		$html_head .= "<td>时间</td>";
		$html_head .= "<td>主办单位</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showConfInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	case "li_rewards":
		$li_id = "li_rewards";
		$html_head .= "<table id='info'><tr>";
		$html_head .= "<td>名称</td>";
		$html_head .= "<td>获奖人</td>";
		$html_head .= "<td>类型</td>";
		$html_head .= "<td>级别</td>";
		$html_head .= "<td>时间</td>";
		$html_head .= "<td>证书号</td>";
		$html_head .= "<td>附件</td>";
		$html_head .= "<td></td>";
		if ($_SESSION['username'] == 'admin') {
			$html_head .= "<td></td>";
		}
		$html_head .= "</tr>";
		showRewardInfo($con,$li_id,$page,$html_head, $hrefPage);
		break;
	default:break;
}
mysql_close($con);
?>