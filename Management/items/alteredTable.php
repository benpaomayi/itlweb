<?php
require '../db/dbconnect.php';
require 'conference/alteredConfTable.php';
require 'paper/alteredPaperTable.php';
require 'patent/alteredPatentTable.php';
require 'project/alteredProjectTable.php';
require 'reward/alteredRewdTable.php';
require 'softcpr/alteredSoftcprTable.php';
mysql_query('SET NAMES UTF8');
$type = $_POST['type'];
$id = $_POST['id'];
$selfUrl = $_POST['selfUrl'];
$alterUrl = 'items/alterInfo.php';
$path = '';
$html = '';
$html .= "<div id='div_alterInfo'>";
$html .= "<form method='post' enctype='multipart/form-data' action='$alterUrl'>";
switch ($type) {
	case 'project':
		$alterType = $type;
		$html .= showAlteredProjectInfo($con, $alterType, $id , $selfUrl);
		break;
	case 'paper':
		$alterType = $type;
		$html .= showAlteredPaperInfo($con, $alterType, $id, $selfUrl);
		break;
	case 'patent':
		$alterType = $type;
		$html .= showAlteredPatentInfo($con, $alterType, $id, $selfUrl);
		break;
	case 'softcpr':
		$alterType = $type;
		$html .= showAlteredSoftCprInfo($con, $alterType, $id, $selfUrl);
		break;
	case 'conference':
		$alterType = $type;
		$html .= showAlteredConfInfo($con, $alterType, $id, $selfUrl);
		break;
	case 'reward':
		$alterType = $type;
		$html .= showAlteredRewdInfo($con, $alterType, $id, $selfUrl);
		break;
	default:
		break;
}
$html .= "<input type='image' src='img/confirm.png' />";
$html .= "</form>";
$html .= "</div>";
echo $html;
mysql_close($con);
?>