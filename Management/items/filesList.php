<?php
chdir(dirname(__FILE__));
require '../db/dbconnect.php';
require 'conference/conferenceFiles.php';
require 'paper/paperFiles.php';
require 'patent/patentFiles.php';
require 'project/projectFiles.php';
require 'reward/rewardFiles.php';
require 'softcpr/softcprFiles.php';
if(!isset($_POST['id'])) {
	echo "没有相关附件";
	return 0;
}
mysql_query('SET NAMES UTF8');
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$html = '<div id="div_filelist" class="filelist" style="margin-left:30px">';
switch ($type) {
	case 'project':
		$html .= showProjectFiles($id, $name, $con);
		break;
	case 'paper':
		$html .= showPaperFiles($id, $name, $con);
		break;
	case 'patent':
		$html .= showPatentFiles($id, $name, $con);
		break;
	case 'softcpr':
		$html .= showSoftCprFiles($id, $name, $con);
		break;
	case 'conference':
		$html .= showConfFiles($id, $name, $con);
		break;
	case 'reward':
		$html .= showRewdFiles($id, $name, $con);
		break;
	default:
		break;
}
$html .= '</div>';
echo $html;
mysql_close($con);
?>