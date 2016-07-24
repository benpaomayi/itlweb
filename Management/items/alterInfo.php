<?php
require '../db/dbconnect.php';
require '../upload/uploadfiles.php';
require 'deleteFiles.php';
require 'conference/alterConfInfoFiles.php';
require 'paper/alterPaperInfoFiles.php';
require 'patent/alterPatentInfoFiles.php';
require 'project/alterProjectInfoFiles.php';
require 'reward/alterRewdInfoFiles.php';
require 'softcpr/alterSoftcprInfoFiles.php';
header("Content-type:text/html;charset=utf-8");

$alterType = $_POST['alterType'];
$id = $_POST['id'];
$url = $_POST['url'];
switch ($alterType) {
	case 'project':
		$path = "../documents/project";
		if(alterProjectInfo($con, $id) && alterProjectFiles($con, $id, $path)) {
			echo "修改成功！";
		} else {
			echo "修改失败！";
		}
		break;
	case 'paper':
		$path = "../documents/paper";
		if(alterPaperInfo($con, $id) && alterPaperFiles($con, $id, $path)) {
			echo "修改成功！";
		}else {
			echo "修改失败！";
		}
		break;
	case 'patent':
		$path = "../documents/patent";
		if(alterPatentInfo($con, $id) && alterPatentFiles($con, $id, $path)) {
			echo "修改成功！";
		}else {
			echo "修改失败！";
		}
		break;
	case 'softcpr':
		$path = "../documents/softcpr";
		if(alterSoftcprInfo($con, $id) && alterSoftCprFiles($con, $id, $path)) {
			echo "修改成功！";
		}else {
			echo "修改失败！";
		}
		break;
	case 'conference':
		$path = "../documents/conference";
		if(alterConfInfo($con, $id) && alterConfFiles($con, $id, $path)) {
			echo "修改成功！";
		}else {
			echo "修改失败！";
		}
		break;
	case 'reward':
		$path = "../documents/reward";
		if(alterRewdInfo($con, $id) && alterRewdFiles($con, $id, $path)) {
			echo "修改成功！";
		}else {
			echo "修改失败！";
		}
		break;
	default:
		break;
}
mysql_close($con);
header("Refresh:2; url=$url");
?>