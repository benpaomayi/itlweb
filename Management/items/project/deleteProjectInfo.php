<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM project_path WHERE project_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询项目附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['application_path']) {
			$path = "../".$arr['application_path'];
			deleteFile($path);
		}
		if($arr['endreport_path']) {
			$path = "../".$arr['endreport_path'];
			deleteFile($path);
		}
		if($arr['plan_path']) {
			$path = "../".$arr['plan_path'];
			deleteFile($path);
		}
		if($arr['contract_path']) {
			$path = "../".$arr['contract_path'];
			deleteFile($path);
		}
		if($arr['acceptcert_path']) {
			$path = "../".$arr['acceptcert_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM project_path WHERE project_id=$id";
	if(!mysql_query($sql)) {
		echo "删除项目附件路径失败！";
	}
	$sql = "DELETE FROM project WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除项目信息失败！";
	}
}