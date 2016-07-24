<?php
require '../db/dbconnect.php';
require 'conference/detailConfInfo.php';
require 'paper/detailPaperInfo.php';
require 'patent/detailPatentInfo.php';
require 'project/detailProjectInfo.php';
require 'reward/detailRewdInfo.php';
require 'softcpr/detailSoftcprInfo.php';
mysql_query('SET NAMES UTF8');
$id = $_POST['id'];
$type = $_POST['type'];
$html = "<div style='width:1100px;'>";
$html .= "<div id='detailInfo'>";
switch ($type) {
	case 'project':
		$html .= showDetailProjectInfo($con, $id);
		break;
	case 'paper':
		$html .= showDetailPaperInfo($con, $id);
		break;
	case 'patent':
		$html .= showDetailPatentInfo($con, $id);
		break;
	case 'softcpr':
		$html .= showDetailSoftCprInfo($con, $id);
		break;
	case 'conference':
		$html .= showDetailConfInfo($con, $id);
		break;
	case 'reward':
		$html .= showDetailRewdInfo($con, $id);
		break;
	default:
		break;
}
$html .= "</div>";
$html .= "<div class='div_alterInfo'><span id='alterInfo'>修改信息</span></div>";
$html .= "</div>";
echo $html;
?>