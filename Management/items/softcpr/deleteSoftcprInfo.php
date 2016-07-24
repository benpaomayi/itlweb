<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM softcpr_path WHERE softcpr_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询软件著作权附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['registercert_path']) {
			$path = "../".$arr['registercert_path'];
			deleteFile($path);
		}
		if($arr['application_path']) {
			$path = "../".$arr['application_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM softcpr_path WHERE softcpr_id=$id";
	if(!mysql_query($sql)) {
		echo "删除软件著作权附件路径失败！";
	}
	$sql = "DELETE FROM softcpr WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除软件著作权信息失败！";
	}
}